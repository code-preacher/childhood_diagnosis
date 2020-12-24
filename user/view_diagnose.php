<?php
session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
?>
<?php
include '../config.php';

$fg=mysqli_query($con,"select id from user_login where email='".$_SESSION['email']."' ");
$ff=mysqli_fetch_array($fg);
$idn=$ff['id'];


$qf=mysqli_query($con,"select * from diagnose where pid='$idn' order by id desc");
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
        <script>
      function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
      </script>
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">View Diagnosis</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                    <!-- /# column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>ALL DIAGNOSTIC REPORT </h4>
                                <p>
                               
                                <?php if (!empty($_SESSION['dtmsg'])) {
                                    echo $_SESSION['dtmsg'];
                                }
                                $_SESSION['dtmsg']="";
                                ?>

                            </p>

                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                            
                                                <th>Child Name</th>
                                                <th>Child Age</th>
                                                <th>Headache</th>
                                                <th>Fever</th>
                                                <th>Vomiting</th>
                                                <th>Blood Stool</th>
                                                <th>Cold</th>
                                                <th>Abdominal Pain</th>
                                                <th>Sweating</th>
                                                <th>Rash</th>
                                                <th>Result</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id=0;
                                            while ($r=mysqli_fetch_array($qf)) {
                                                $id++;

                                             ?>
                                            <tr>
                                                <th scope="row"><?php echo $id; ?></th>
                                                
                                                  <td><?php  echo $r['child']; ?></td>
                                                   <td><?php  echo $r['age']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($r['hd']=='1') {
                                                       echo "Yes";
                                                    } else {
                                                      echo "No";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['fv']=='1') {
                                                       echo "Yes";
                                                    } else {
                                                      echo "No";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['vt']=='1') {
                                                       echo "Yes";
                                                    } else {
                                                      echo "No";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['bs']=='1') {
                                                       echo "Yes";
                                                    } else {
                                                      echo "No";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['cd']=='1') {
                                                       echo "Yes";
                                                    } else {
                                                      echo "No";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['ap']=='1') {
                                                       echo "Yes";
                                                    } else {
                                                      echo "No";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['st']=='1') {
                                                       echo "Yes";
                                                    } else {
                                                      echo "No";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r['rs']=='1') {
                                                       echo "Yes";
                                                    } else {
                                                      echo "No";
                                                    }
                                                    ?>
                                                </td>

                                                <td><?php echo $r['result']; ?></td>
                                                <td><?php echo $r['date']; ?></td>
                                            </tr>
                                            <?php                                                
                                            }
                                             ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->


                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->

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

        <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>

</body>

</html>