<?php
  session_start();
  include('../config.php');

if(isset($_POST['sub'])){
$email=$_POST['email'];
$pass=$_POST['pwd'];

$ql=mysqli_query($con,"update admin_login set email='$email',password='$pass' where email='".$_SESSION['email']."'");

if($ql){
$_SESSION['pmsg']='<span style="color:green;">'."Data was successfully updated".'</span>';
$_SESSION['email']=$email;
}
else{
$_SESSION['pmsg']='<span style="color:red;">'."Data was not successfully updated".'</span>';    
}
}

 header("location:profile.php");
?>