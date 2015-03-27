<?php	session_id('admin');

	session_start();
	if(!isset($_SESSION['user_id'])or($_SESSION['user_id']!=666)){
		header("locaton:index.php");
		exit();
	}
	session_write_close();
?>
<?php include("adminheader.php"); ?>
<?php	session_id('album');

	session_start();
	if(isset($_SESSION['album_id'])){
		$album_id=$_SESSION['album_id'];
	}elseif(isset($_POST['album_id'])){
		$album_id=$_POST['album_id'];
	}elseif(isset($_GET['album_id'])){
		$album_id=$_GET['album_id'];
	}
	else{
		header("Location:adminpage.php");
		exit();
	}
	if(isset($album_id)){
require('database_connect.php');
		$q="SELECT title FROM album WHERE album_id=$album_id";
		$result=@mysqli_query($dprv,$q);
		$_SESSION=mysqli_fetch_array($result,MYSQLI_ASSOC);
		$atitle=($_SESSION['title']);
		echo'
		<h2 class="admin">Add Tracks to &ldquo;'.$atitle.'&rdquo;</h2>
		<form class="admin" method="post" action="trackform.php?album_id='.$album_id.'">
			<div class="form-group">
				<label for="title">Track Title</label>
				<input type="text" class="form-conrol" id="title" name="title" />
			</div>
			<input class="btn btn-default admin" id="submit" type="submit" name="submit" value="Submit">
		</form>
		';
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['title'])){
			$title=mysqli_real_escape_string($dprv,trim($_POST['title']));
			$q="INSERT INTO track (`title`,`album_id`) VALUES ('$title','$album_id')";
			$result=@mysqli_query($dprv,$q);
			if($result){
				echo"<p>Entry Successful - ".$title." added to ".$atitle."</p>";
			}
		}
	}
	mysqli_close($dprv);
?>
<?php include("footer.php"); ?>