﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <?php include_once("include/header.php");?>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                
        <?php include_once("include/menu.php");?>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                       <center> <h1 class="page-subhead-line">
                            <?php

                            if($_REQUEST['msg'])
                            {
                             ?>
                              <div class="alert alert-success">
                                <?=$_REQUEST['msg']?>
                                </div> </h1></center>
                         
                         <?php   
                           }
                        ?>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="panel-body">
                            <div class="alert alert-success">
                               Success! Your Session has been started
                            </div>

                            <p align="left">
                                You can view Contents by using the links at the left side of the page. If you want to change your password click the user account link towards the left of the page.</p> <br>
<p align="left">If you want to manage your gallery details click on the gallery management link to the left of the page.</p><br>

<p> <h5> <font color="red">Security Tip : Please Log Out before closing the browser.</font></h5></p>
                            </div>

                
                <!-- /. ROW  -->

               
                <!-- /. ROW  -->


               

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        <?php include_once("include/footer.php");?>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    


</body>
</html>
