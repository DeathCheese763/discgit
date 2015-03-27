<?php include("adminheader.php"); ?>
<div class="jumbotron" id="adminlogin">
	<form action="adMin_lOgin.php" method="post" class="form-signin">
		<h2 class="form-signin-heading">Please Enter Admin Sign-in information</h2>
		<?php
			if($_SERVER['REQUEST_METHOD']=='POST'){
		require('database_connect.php');
				if (!empty($_POST['adminusername'])){
					$aun=mysqli_real_escape_string($dprv, $_POST['adminusername']);
				}else{
					$aun=FALSE;
					echo '<p class="error">You forgot to enter your Admin Username.</p>';
				}
				if(!empty($_POST['password'])){
					$p=mysqli_real_escape_string($dprv, $_POST['password']);
				}else{
					$p=FALSE;
					echo '<p class="error">You forgot to enter your password.</p>';
				}
				if($aun&&$p){
					$q="SELECT user_id,adminusername,fname FROM admin WHERE (adminusername='$aun' AND password=SHA1('$p'))";
					$result=mysqli_query($dprv,$q);
					if(@mysqli_num_rows($result)==1){
						session_id('admin');
						session_start();
						$_SESSION=mysqli_fetch_array($result,MYSQLI_ASSOC);
						$url=($_SESSION['user_id']=666)?'adminpage.php':'index.php';
						header('Location: '.$url);
						exit();
						mysqli_free_result($result);
						mysqli_close($dprv);
					}else{
						header('Location: index.php');
						exit();
						mysqli_free_result($result);
						mysqli_close($dprv);
					}
				}else{
					echo '<p class="error">Please try again.</p>';
				}
				mysqli_close($dprv);
			}
		?>
		<label for="adminusername" class="sr-only">Admin Username</label>
		<input name="adminusername" type="text" class="form-control" id="adminusername" placeholder="Admin Username" required autofocus>
		<label for="password" class="sr-only">Password</label>
		<input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
</div>
<?php include("footer.php"); ?>