<?php
include_once('../config/config.php');

//check if already logged in
if( $user->is_logged_in() ){
	header('Location: index.php'); 
}

include_once('meta.php');
include_once('../header.php');

//process login form if submitted
if(isset($_POST['submit'])){
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	if($user->login($username,$password)){ 
		//logged in return to index page
		header('Location: index.php');
		exit;
	} 
	else{
		$message = '<p class="error">Wrong username or password</p>';
	}
}//end if submit

if(isset($message)){
	echo $message; 
}
?>

<body>
<div class="content-body">
	<div class="container">
		<div class="row">
			<div id="login">
				<main class="col-md-offset-4 col-md-4">
					<form action="" method="post">
						<label>Username</label><br>
						<input type="text" class="input-group" name="username" value=""  /><br>
						<label>Password</label><br>
						<input type="password" name="password" value=""  /><br><br>
						<input type="submit" class="btn btn-lg btn-danger" name="submit" value="Login"  />
					</form>
				</main>
			</div>
		</div>
	</div>
</div>

</body>
</html>
