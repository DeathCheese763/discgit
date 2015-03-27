<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php 
	if(basename($_SERVER['PHP_SELF'])=="adminpage.php"){
		echo "<title>Welcome {$_SESSION['fname']}</title>";
	}elseif(basename($_SERVER['PHP_SELF'])=="addalbums.php"){
		echo "<title>Admin | Album List</title>";
	}elseif(basename($_SERVER['PHP_SELF'])=="albumcreate.php"){
		echo "<title>Admin | Add Album</title>";
	}elseif(basename($_SERVER['PHP_SELF'])=="latesthit.php"){
		echo "<title>Admin | Update Latest Hit</title>";
	}elseif(basename($_SERVER['PHP_SELF'])=="viewmessages.php"){
		echo "<title>Admin | View Messages</title>";
	}else{
		echo "<title>Admin | Respond to Message</title>";
	}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="formnormalize.css"/>
<link href="bootstrap.min.css" rel="stylesheet">
<link href="custom.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="formstyle.css"/>
<link href="http://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet" type="text/css">
<script src="respond.js"  type="text/javascript"></script>
<!--[if lt IE 11.1]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!--[if lt IE8]>
<style>
legend{
	display:block;
	padding:0;
	padding-top:30px;
	font-weight:bold;
	font-size:1.25em;
	color:#ffd98d;
	margin:0 auto;
}
</style>
<![endif]-->
	</head>
	<body>
		<div class="container">
		<!-- row 1: navigation -->
		<header class="row"><!-- row 1: navigation -->
<?php
echo '<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="glyphicon glyphicon-arrow-down"></span>MENU</button>
	</div>
	<div class="collapse navbar-collapse" id="collapse">
		<ul class="nav navbar-nav lingth">
			'.((basename($_SERVER['PHP_SELF'])=="adminpage.php")?"<li class=active>":"<li>").'<a href="adminpage.php">Admin Home</a></li>
			'.((basename($_SERVER['PHP_SELF'])=="viewmessages.php")?"<li class=active>":"<li>").'<a href="viewmessages.php">View Messages</a></li>
			'.((basename($_SERVER['PHP_SELF'])=="addalbums.php")?"<li class=active>":"<li>").'<a href="addalbums.php">Album List</a></li>
			'.((basename($_SERVER['PHP_SELF'])=="latesthit.php")?"<li class=active>":"<li>").'<a href="latesthit.php">Set Latest Hit</a></li>
			<li class="admin"><a href="logout.php">Logout</a></li>
		</ul> 
	</div>
</nav>';
?>
</header><!-- end of row 1: navigation -->
		<!-- row 2 -->
		<div class="row">