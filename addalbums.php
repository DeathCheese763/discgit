<?php
	session_id('admin');
	session_start();
	if(!isset($_SESSION['user_id'])or($_SESSION['user_id']!=666)){
		header("locaton:index.php");
		exit();
	}
	session_write_close();
?>
<?php include("adminheader.php"); ?>
<h2 class="admin">Albums</h2>
<?php require('database_connect.php');

	$q="SELECT album_id,title,year,info FROM album ORDER BY album_id ASC;";
	$result=@mysqli_query($dprv,$q);
	if($result){
		echo'<div class="admin table-responsive"><table class="table table-hover table-condensed">
		<tr>
			<th><b>Album_id</b></th>
			<th><b>Title</b></th>
			<th><b>Year</b></th>
			<th><b>Info</b></th>
			<th><b>Tracks</b></th>
		</tr>';
		while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo'<tr><td>'.$row['album_id'].'</td><td>'.$row['title'].'</td><td>'.$row['year'].'</td><td>'.$row['info'].'</td><td>';
			$ai=$row['album_id'];
			$q="SELECT album.title,track.title as songtitle FROM album LEFT JOIN track on track.album_id=album.album_id WHERE album.album_id='$ai' ORDER BY track_id ASC";
			$track=@mysqli_query($dprv,$q);
			if(@mysqli_num_rows($track)>1){
				while($list = mysqli_fetch_array($track, MYSQLI_ASSOC)){
                	echo $list['songtitle'].", ";
            	}
			}else{
				echo "<a href='trackform.php?album_id=".$ai."'>Add Tracks</a>";
			}
			echo'</td></tr>';
		}
		echo "</table></div>";
		echo "<a class='btn btn-default admin btn-block' href='albumcreate.php'>Add an Album</a>";
	}
?>
<?php include("footer.php"); ?>