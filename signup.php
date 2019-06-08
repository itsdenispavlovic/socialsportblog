<?php 
include 'header.inc.php'; 

//Registration form
$firstname = @$_POST['firstname'];
$lastname = @$_POST['lastname'];
$email = @$_POST['email'];
$username = @$_POST['username'];
$password = @$_POST['password'];
$password2 = @$_POST['password2'];
$birthday = @$_POST['birthday'];
$IP = $_SERVER['REMOTE_ADDR'];
if(isset($_POST['reg']))
{
  $user->registration($firstname, $lastname, $email, $username, $password, $password2, $birthday, $IP);
}
?>
<!-- Content -->
<div class="container">
  <center>
    <h1>Be a part of us!</h1>
  </center>
  <hr />
  <form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputFirstname1">Firstname</label>
    <input type="text" name="firstname" class="form-control" id="exampleInputFirstname1" placeholder="Enter firstname" required>
  </div>
  <div class="form-group">
    <label for="xampleInputLastname1">Lastname</label>
    <input type="text" name="lastname" class="form-control" id="xampleInputLastname1" placeholder="Enter lastname" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputUsername1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputUsername1" aria-describedby="emailHelp" placeholder="Enter username" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Repeat Password</label>
    <input type="password" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Repeat Password" required>
  </div>
 <div class="form-group">
  
    <label for="exampleInputBirthday1">Birthday</label>
    <input class="form-control" name="birthday" type="date" value="1998-08-19" id="example-date-input" required>
</div>

  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" name="t" class="form-check-input" required>
      I agree to the <a href="#">Terms and Conditions</a>
    </label>
  </div>
  <center>
    <input type="submit" value="SIGN UP" name="reg" class="btn btn-primary" />
    <br />Already a member? <a href="login.php">Log in</a>
  </center>

</form>
</div>
<!-- End Content -->
<?php include 'footer.inc.php'; ?>