<?php
  session_start();
  include('../config.php');

if(isset($_POST['sub'])){
$email=$_POST['email'];
$pass=$_POST['pwd'];

$q=mysqli_query($con,"update user_login set email='$email',password='$pass' where email='".$_SESSION['email']."'");
$q2=mysqli_query($con,"update suggestion set sender='$email' where sender='".$_SESSION['email']."'");

if(($q)&&($q2)){
$_SESSION['pmsg']='<span style="color:green;">'."Data was successfully updated".'</span>';
$_SESSION['email']=$email;
}
else{
$_SESSION['pmsg']='<span style="color:red;">'."Data was not successfully updated".'</span>';    
}
}

 header("location:profile.php");
?>