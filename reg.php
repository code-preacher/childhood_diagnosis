<?php
session_start();
error_reporting(0);

?>
<?php
include 'config.php';
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$date=date("d-m-y @ g:i A");
$da=mysqli_query($con,"insert into user_login(name,address,phone,email,password,date) values('$name','$address','$phone','$email','$password','$date')");
if ($da) {
$_SESSION['msg']='<span style="color:green;">'."Your account was created successfully, login to begin....".'</span>';
header("location:login.php");
} else {
	$_SESSION['rmsg']='<span style="color:red;">'."Error creating account".'</span>';
	header("location:reg.php");
}

}


?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>CHILDHOOD DIAGNOSIS SYSTEM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="margin-top: -60px;">
				<form action="#" class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-20" style="font-size: 20px;">
						Please provide all necessary data below....
					</span>
					<p>
								<?php echo $_SESSION['rmsg']; ?>
								
								
							</p>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="name" placeholder="Full name" required  />
						<span class="focus-input100">Full name</span>
						<span class="label-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Phone number is required">
						<input class="input100" type="text" name="phone" placeholder="Phone number" required  />
						<span class="focus-input100">Phone number</span>
						<span class="label-input100"></span>
					</div>

							<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<input class="input100" type="email" name="email" placeholder="Email" required  />
						<span class="focus-input100">Email</span>
						<span class="label-input100"></span>
					</div>

							<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="text" name="password" placeholder="Password" required />
						<span class="focus-input100">Password</span>
						<span class="label-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Address is required">
						<input class="input100" type="text" name="address" placeholder="Address" required  />
						<span class="focus-input100">Address</span>
						<span class="label-input100"></span>
					</div>




<div class="container-login100-form-btn">
						<button  type="submit" name="submit" class="login100-form-btn">
							Sign up
						</button>
					</div>
					
						
						<span class="txt2">
							<a href="login.php" style="text-decoration: none;">
						Click to Login...
									<i class="fa fa-sign-in fa-2x"></i>
								</a>
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="index.html" style="text-decoration: none;">
						Go back to home?
									<i class="fa fa-home fa-2x"></i>
								</a>

						</span>
							
						</fieldset>
					</form>

				<div class="login100-more" style="background-image: url('images/s2.png');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>


