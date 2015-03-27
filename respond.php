<?php
	session_id('admin');
	session_start();
	if(!isset($_SESSION['user_id'])or($_SESSION['user_id']!=666)){
		header("locaton:index.php");
		exit();
	}
?>
<?php include("adminheader.php"); ?>
<?php require('database_connect.php');

	if((isset($_GET['id']))&&(is_numeric($_GET['id']))){
		$id=$_GET['id'];
	}elseif((isset($_POST['id']))&&(is_numeric($_POST['id']))){
		$id=$_POST['id'];
	}else{
		if(isset($_GET['submit'])or(isset($_POST['submit']))){
			$response=mysqli_real_escape_string($dprv,trim($_POST['response']));
		}else{
			echo'<p class="error">This page has been accessed in error</p>';
			exit();
		}
		if((isset($_GET['submitid']))&&(is_numeric($_GET['submitid']))){
			$submitid=$_GET['submitid'];
		}elseif((isset($_POST['submitid']))&&(is_numeric($_POST['submitid']))){
			$submitid=$_POST['submitid'];
		}
		$q="SELECT message_id,name,CONCAT(street,', ',state,', ',zip) AS address,email,CONCAT(month,' ',day,', ',year) AS bdate,preference,type,message FROM message WHERE message_id='$submitid';";
		$result=@mysqli_query($dprv,$q);
		$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
		$to=$row['email'];
		$subject="In response to your ".$row['type']." ".(($row['type']==="question")?"for":"about")." Train";
		if($row['preference']==="PlainText"){
			$message=nl2br($response."\nYour ".$row['type'].": ".$row['message']."<br/>");
		}elseif($row['preference']==="HTML"){
			$h=file_get_contents('email_header.php');
			$f=file_get_contents('email_footer.php');
			$message=$h."<h2 class='admin'>In response to your".$row['type']." ".(($row['type']==="question")?"for":"about")." Train</h2><div class='jumbotron admin message'><p>".$response."</p></div>".$f;
		}
		mail($to, $subject, $message);
		echo '<h2 class="admin">Response Sent!</h2>';
	}
	if(isset($id)){
		$q="SELECT message_id,name,CONCAT(street,', ',state,', ',zip) AS address,email,CONCAT(month,' ',day,', ',year) AS bdate,preference,type,message FROM message WHERE message_id='$id';";
		$result=@mysqli_query($dprv,$q);
		if (mysqli_num_rows($result)===1){
			$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo "<h2 class='admin'>Responding to ".$row['name']."'s ".$row['type']."<sup><b>(id#".$row['message_id'].")</b></sup>:</h2><div class='jumbotron message admin'><p class='admin'>".$row['message']."</p></div><div class='addinfo'><h3>Additional Information</h3><ol><li>Birth Date:".$row['bdate']."</li><li>Address:".$row['address']."</li></ol></div>
	<form action='respond.php' method='post'>
	<h2 class='admin'><label for='response'>Response:</label></h2>
	<textarea class='form-control admin' name='response'></textarea>
	<input class='btn btn-default admin' id='submit' type='submit' name='submit' value='Submit'>
	<input type='hidden' name='submitid' value='".$row['message_id']."'>
	</form>"
	//. $row['email'],$row['preference']
			;
	}
	}
?>
<?php include("footer.php"); ?>