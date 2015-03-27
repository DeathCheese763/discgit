<?php session_id('admin');

	session_start();
	if( ( !isset($_SESSION['user_id']) )or($_SESSION['user_id']!=666) ){
		header("locaton:index.php");
		exit();
	}
?>
<?php include("adminheader.php"); ?>
<?php echo"<h2 class='admin'>Welcome {$_SESSION['fname']} you have the following administrative privileges:</h2><ul class='admin'><li>View and respond to Messages</li><li>Add and remove albums</li><li>Set Latest Hit</li></ul>";?>
<?php include('footer.php'); ?>