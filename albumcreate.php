<?php session_id('admin');

	session_start();
	if(!isset($_SESSION['user_id'])or($_SESSION['user_id']!=666)){
		header("locaton:index.php");
		exit();
	}
	session_write_close();
?>
<?php include("adminheader.php"); ?>
<h2 class="admin">Add Album Form</h2>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
require('database_connect.php');
		if(isset($_POST['title'])){
			if(isset($_POST['year'])){
				if(isset($_POST['info'])){
					session_id('album');
					session_start();
					$title=mysqli_real_escape_string($dprv,trim($_POST['title']));
					$year=mysqli_real_escape_string($dprv,trim($_POST['year']));
					$info=mysqli_real_escape_string($dprv,trim($_POST['info']));
					// $tracknumber=mysqli_real_escape_string($dprv,trim($_POST['tracknumber']));
					$q="INSERT INTO album (`title`,`year`,`info`) VALUES ('$title','$year','$info');";
					echo $q;
					$result=@mysqli_query($dprv,$q);
					if($result){
						$fai="SELECT `album_id` FROM album WHERE `title`='$title';";
						$findalbumid=@mysqli_query($dprv,$fai);
						if($findalbumid){
							$ai=mysqli_fetch_array($findalbumid,MYSQLI_ASSOC);
							$_SESSION['album_id']=$ai['album_id'];
							header('Location: trackform.php');
							mysqli_close($dprv);
							exit();
						}else{
							echo"<h2 class='admin'>Fatal Error Try again.</h2>";
						}
					}else{
						echo"<h2 class='admin'>Fatal Server Error Try again.</h2>";
					}
					mysqli_close($dprv);
				}else{
					echo "You did not enter any information";
				}
			}else{
				echo "You did not enter a year";
			}
		}else{
			echo "You did not enter a title";
		}
	}
?>
<form class="admin" method="post" action="albumcreate.php">
	<div class="form-group">
		<label for="title">Album Title</label>
		<input type="text" class="form-conrol" id="title" name="title" />
	</div><!-- 
	<div class="form-group">
		<label for="tracknumber">Number of Tracks</label>
		<input type="number" class="form-conrol" id="tracknumber" name="tracknumber" />
	</div> -->
	<div class="form-group">
		<label for="year">Year copyrighted</label>
		<input type="number" class="form-conrol" id="year" name="year"  min="1999" max="9999"/>
	</div>
	<div class="form-group">
		<label for="info">Info to display on webpage</label>
		<textarea type="text" rows="8" class="form-conrol" id="info" name="info"></textarea>
	</div>
	<input class='btn btn-default admin' id='submit' type='submit' name='submit' value='Submit'>
</form>
<?php include("footer.php"); ?>