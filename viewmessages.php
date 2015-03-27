<?php
	session_id('admin');
	session_start();
	if(!isset($_SESSION['user_id'])or($_SESSION['user_id']!=666)){
		header("locaton:index.php");
		exit();
	}
?>
<?php include("adminheader.php"); ?>
<h2 class="admin">Questions and Comments form the site's User's</h2>
<?php require('database_connect.php');

	$q="SELECT message_id,name,CONCAT(street,', ',state,', ',zip) AS address,email,CONCAT(month,' ',day,', ',year) AS bdate,preference,type,message FROM message ORDER BY message_id ASC;";
	$result=@mysqli_query($dprv,$q);
	if($result){
		echo'<div class="admin table-responsive"><table class="table table-hover table-condensed">
		<tr>
			<th><b>Name</b></th>
			<th><b>Birth Date</b></th>
			<th><b>Address</b></th>
			<th><b>Email</b></th>
			<th><b>Email Preference</b></th>
			<th><b>Message Type</b></th>
			<th><b>Message</b></th>
			<th><b>Respond</b></th>
		</tr>';
		while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo'<tr>
				<td>'.$row['name'].'</td>
				<td>'.$row['bdate'].'</td>
				<td>'.$row['address'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['preference'].'</td>
				<td>'.$row['type'].'</td>
				<td>'.$row['message'].'</td>
				<td><a href="respond.php?id='.$row['message_id'].'">Mail</a></td>
			</tr>';
		}
		echo "</table></div>";
	}
?>
<?php include("footer.php"); ?>