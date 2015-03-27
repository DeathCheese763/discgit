<?php
	session_id('admin');
	session_start();
	session_destroy();
	setcookie('PHPSESSID', ", time()-3600,'/',", 0, 0);
	header('location:index.php');
?>