<?php
session_start();
$_SESSION['email']=="";
$_SESSION['login']=="";
session_unset();
$_SESSION['msg']='<span style="color:green;">'."You have successfully logged out".'</span>';
?>
<script language="javascript">
document.location="../login.php";
</script>
