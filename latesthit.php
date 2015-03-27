<?php session_id('admin');

	session_start();
	if(!isset($_SESSION['user_id'])or($_SESSION['user_id']!=666)){
		header("locaton:index.php");
		exit();
	}
?>
<?php include("adminheader.php"); ?>
<h2 class="admin">Set Latest Hit</h2>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
require('database_connect.php');
		if(isset($_POST['youtubelink'])){
			if(isset($_POST['detail_1'])){
				if(isset($_POST['detail_2'])){
					$youtubelink=mysqli_real_escape_string($dprv,trim($_POST['youtubelink']));
					$detail_1=mysqli_real_escape_string($dprv,trim($_POST['detail_1']));
					$detail_2=mysqli_real_escape_string($dprv,trim($_POST['detail_2']));
					$q1="UPDATE latest_hit SET `current`='false' WHERE `current`='true'";
					$ud=@mysqli_query($dprv,$q1);
					if($ud){
						$q2="INSERT INTO latest_hit (`youtubelink`,`detail_1`,`detail_2`,`current`) VALUES ('$youtubelink','$detail_1','$detail_2','true');";
						$is=@mysqli_query($dprv,$q2);
						if($is){
							echo"<h2 class='admin'>update successful</h2>";
						}else{
							echo"<h2 class='admin'><b>Extremely Fatal Sever Error contact samwdoss@outlook.com if you ever see this message before trying this operation again.</b></h2>";
						}
					}else{
						echo"<h2 class='admin'>error try again</h2>";
					}
					mysqli_close($dprv);
				}else{
					echo "<h2 class='admin'>You did not enter a secondary detail</h2>";
				}
			}else{
				echo "<h2 class='admin'>You did not enter a primary detail</h2>";
			}
		}else{
			echo "<h2 class='admin'>You did not enter a YouTube link</h2>";
		}
	}
?>
<form class="admin" method="post" action="latesthit.php">
	<div class="form-group">
		<label for="youtubelink">Youtube Video Link</label>
		<input type="text" class="form-conrol" id="youtubelink" name="youtubelink" />
	</div>
	<div class="form-group">
		<label for="detail_1">1<sup>st</sup> Detail</label>
		<textarea type="text" rows="8" class="form-conrol" id="detail_1" name="detail_1"></textarea>
	</div>
	<div class="form-group">
		<label for="detail_2">2<sup>nd</sup> Detail</label>
		<textarea type="text" rows="8" class="form-conrol" id="detail_2" name="detail_2"></textarea>
	</div>
	<input class='btn btn-default admin' id='submit' type='submit' name='submit' value='Submit'>
</form>
<?php include("footer.php"); ?>
