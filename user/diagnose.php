<?php
session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
$r="";
?>
<?php
include '../config.php';
$qj=mysqli_query($con,"select id from user_login where email='".$_SESSION['email']."'");
$tr=mysqli_fetch_array($qj);
$id=$tr['id'];
$d=date("d-m-y @ g:i A");

if(isset($_POST['sub'])){
extract($_POST);
//check for malaria
if(($hd && $fv && $vt && $bs && $cd && $ap && $st)=='1' && $rs=='0' ){
    mysqli_query($con,"insert into diagnose(pid,child,age,hd,fv,vt,bs,cd,ap,st,rs,result,date) values('$id','$child','$age','1','1','1','1','1','1','1','0','child has malaria','$d')");
$r='
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>CHILD RESULT</h4><hr/>

                                <p>
                        <span class="text-danger">
                            Illness Status: Your child is suffering from malaria
                        </span>       
                               </p> <p>
                        <span style="color:#3e0878;">
                             Drug Prescription : 
                        </span>       
                        <span style="color:#0b154d;">
                            Artemisinin-based combination therapies (ACTs) , Chloroquine phosphate  
                        </span>  
                            </p>

                            </div>
                           

                        </div>
                    </div>
                   
                </div>
                
            </div>';

}
//check for typhoid
elseif (($hd && $fv && $vt && $bs && $cd && $ap && $st && $rs)=='1') {
     mysqli_query($con,"insert into diagnose(pid,child,age,hd,fv,vt,bs,cd,ap,st,rs,result,date) values('$id','$child','$age','1','1','1','1','1','1','1','1','child has typhoid','$d')");
  $r='
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>CHILD RESULT</h4><hr/>

                                <p>
                        <span class="text-danger">
                            Illness Status: Your child is suffering from typhoid fever
                        </span>       
                               </p> <p>
                        <span style="color:#3e0878;">
                             Drug Prescription : 
                        </span>       
                        <span style="color:#0b154d;">
                            Ciprofloxacin(Cipro) , Azithromycin (Zithromax) , Ceftriaxone
                        </span>  
                            </p>

                            </div>
                           

                        </div>
                    </div>
                   
                </div>
                
            </div>';
}
//check for malaria early stage   
elseif (($hd || $fv || $vt || $bs || $cd || $ap || $st)=='1' && $rs=='0') {
     mysqli_query($con,"insert into diagnose(pid,child,age,hd,fv,vt,bs,cd,ap,st,rs,result,date) values('$id','$child','$age','$hd','$fv','$vt','$bs','$cd','$ap','$st','0','child has signs of malaria','$d')");
$r='
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>CHILD RESULT</h4><hr/>

                                <p>
                        <span class="text-danger">
                            Illness Status: Your child is having signs of malaria
                        </span>       
                               </p> <p>
                        <span style="color:#3e0878;">
                             Drug Prescription : 
                        </span>       
                        <span style="color:#0b154d;">
                            Artemisinin-based combination therapies (ACTs) , Chloroquine phosphate  
                        </span>  
                            </p>

                            </div>
                           

                        </div>
                    </div>
                   
                </div>
                
            </div>';
}
//check for typhoid early stage
elseif (($hd || $fv || $vt || $bs || $cd || $ap || $st)=='1' && $rs=='1') {
     mysqli_query($con,"insert into diagnose(pid,child,age,hd,fv,vt,bs,cd,ap,st,rs,result,date) values('$id','$child','$age','$hd','$fv','$vt','$bs','$cd','$ap','$st','1','child has signs of typhoid fever','$d')");
 $r='
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>CHILD RESULT</h4><hr/>

                                <p>
                        <span class="text-danger">
                            Illness Status: Your child is having signs of typhoid fever
                        </span>       
                               </p> <p>
                        <span style="color:#3e0878;">
                             Drug Prescription : 
                        </span>       
                        <span style="color:#0b154d;">
                            Ciprofloxacin(Cipro) , Azithromycin (Zithromax) , Ceftriaxone
                        </span>  
                            </p>

                            </div>
                           

                        </div>
                    </div>
                   
                </div>
                
            </div>';
}
elseif (($hd && $fv && $vt && $bs && $cd && $ap && $st && $rs)=='0') {
   $r='Please select options to diagnose your child...';
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
    <!-- important meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>CHILDHOOD DIAGNOSIS SYSTEM DASHBOARD</title>
    
    <!-- Basic SEO -->
     <meta name="description" content="CHILDHOOD DIAGNOSIS SYSTEM ">
    <meta name="keywords" content="CHILDHOOD DIAGNOSIS SYSTEM ">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/">
 
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->


    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
   <?php
include "inc/header.php";
   ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
   <?php
include "inc/sidebar.php";
   ?>     
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Diagnose Now</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>DIAGNOSE CHILD</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="#" method="POST">
                                     <div class="row p-t-20">

                                          <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Please enter Child name :</label>
                                                  <input type="text" name="child" placeholder="Please enter Child name" class="form-control" required="required" >
                                                     </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Please enter  Child age :</label>
                                                  <input type="number" name="age" placeholder="Please enter Child age" class="form-control" required="required">
                                                     </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Is you child having Headache?</label>
                                                    <select class="form-control custom-select" name="hd">
                                                        <option value="1">YES</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                     </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label class="control-label">Is your child having Fever?</label>
                                                    <select class="form-control custom-select" name="fv">
                                                        <option value="1">YES</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                     </div>
                                            </div>
                                            <!--/span-->


                                          
                                             <!--/span-->
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label class="control-label">Is your child Vomiting?</label>
                                                    <select class="form-control custom-select" name="vt">
                                                        <option value="1">YES</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                     </div>
                                            </div>
                                            <!--/span-->
                                             <!--/span-->
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label class="control-label">Is your child having Blood Stool?</label>
                                                    <select class="form-control custom-select" name="bs">
                                                        <option value="1">YES</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                     </div>
                                            </div>
                                            <!--/span-->
                                             <!--/span-->
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label class="control-label">Is your child feeling Cold?</label>
                                                    <select class="form-control custom-select" name="cd">
                                                        <option value="1">YES</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                     </div>
                                            </div>
                                            <!--/span-->
                                             <!--/span-->
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label class="control-label">Is your child having Abdominal Pain?</label>
                                                    <select class="form-control custom-select" name="ap">
                                                        <option value="1">YES</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                     </div>
                                            </div>
                                            <!--/span-->
                                             <!--/span-->
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label class="control-label">Is your child Sweeting?</label>
                                                    <select class="form-control custom-select" name="st">
                                                        <option value="1">YES</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                     </div>
                                            </div>
                                            <!--/span-->
                                             <!--/span-->
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label class="control-label">Is your child having Rash?</label>
                                                    <select class="form-control custom-select" name="rs">
                                                        <option value="1">YES</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                     </div>
                                            </div>
                                            <!--/span-->

                                            <div class="offset-sm-4 col-md-9">
                                                        <button type="submit" class="btn btn-success" name="sub"> <i class="fa fa-check"></i> Get Child Result</button>
                                                       
                                                    </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
                               
                                
    

<?php  echo $r; ?>
 <?php  echo $r=""; ?>






<!-- FOOTER REGION -->
<?php
include "inc/footer.php";
?>

            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/scripts.js"></script>

</body>

</html>