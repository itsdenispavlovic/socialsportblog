<?php include 'header.inc.php'; 
//See if the user is logged in
//See if the user is loggedin
if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$username = @$_POST['username'];
	$password = @$_POST['password'];

	if($user->login($username, $password))
	{
		$user->redirect('home.php');
	}
}
?>
<!-- Content -->
<div class="container login">
	<center>
    	<h1>Log in back!</h1>
  	</center>
  	<hr />
  	<form method="POST" action="">
		<div class="form-group">
			<label>Email address/Username</label>
			<input type="text" class="form-control" name="username" placeholder="Enter email" required>
		</div>
		<div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  		</div>
  		<center>
		    <input type="submit" value="LOG IN" name="log" class="btn btn-primary" />
		    <br />Not a member? <a href="signup.php">Sign up</a>
	  	</center>
  	</form>
</div>
<!-- End Content -->
<?php include 'footer.inc.php'; ?>