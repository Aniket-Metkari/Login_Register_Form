<?php
include("connection.php");
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="registerstyle.css">
<title>Login & Register Form</title>
</head>
<body>
<form method="POST" action="">
    <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" name="logusername" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" name="logpassword" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" name="login" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" name="username" class="input">
				</div>
                <div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" name="email" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" name="password" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Confirm Password</label>
					<input id="pass" type="password" class="input" name="conpassword" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" name="submit" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
            
		</div>
    
	</div>
</div>
</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$conpassword=$_POST['conpassword'];

$pass=password_hash($password,PASSWORD_BCRYPT);
$conpassword=password_hash($conpassword,PASSWORD_BCRYPT);

$query="INSERT INTO `registerlogin`(`username`, `email`, `password`, `conpassword`)
VALUES ('$username','$email','$password','$conpassword')";
$insertquery=mysqli_query($conn,$query);
if($insertquery){
    echo "<script>alert('Register completed')</script>";
}
else{
    echo "<script>alert('Register incompleted')</script>";
}
}
?>
<?php
if(isset($_POST['login'])){
    $logusername=$_POST['logusername'];
    $logpassword=$_POST['logpassword'];
    $sql="SELECT * FROM registerlogin WHERE username='$logusername' AND password='$logpassword' ";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows >0){
        $row=mysqli_fetch_assoc($result);
        header("Location:example.php");
    }
    else{
        echo "<script> alert('Invalid username or password') </script>";
    }

}
?>