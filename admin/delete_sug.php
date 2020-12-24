<?php
  session_start();
  $id=$_GET['id'];
  include('../config.php');
 mysqli_query($con,"delete from suggestion where id='$id'");
 $_SESSION['dmsg']= '<span style="color:green;">'."Suggestion was successfully deleted".'</span>';
 header("location:view_sug.php");
?>