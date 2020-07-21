<?php 
  include_once("include/db_connect.php");
  $sql = "select * from login";
  $rs  = mysqli_query($conn,$sql) or die(mysqli_error());
  $data = mysqli_fetch_assoc($rs) or die(mysqli_error());
  if($_REQUEST['submit'])
  {
    //print_r($data);die;
    if($data['login_password']!=$_REQUEST['current_password'])
    {
        echo "<script type='text/javascript'>alert('Current password in incorrect.'); window.location.href='user.php'; </script>";
        exit();

    }
    if($_REQUEST['new_password']!=$_REQUEST['confirm_password'])
    {
         echo "<script type='text/javascript'>alert('Entered password not matched.'); window.location.href='user.php'; </script>";
        exit();
    }

    $sql="UPDATE `archi`.`login` SET `login_password` = '$_REQUEST[new_password]' WHERE `login`.`login_id` = 1;";
   
    $rs = mysqli_query($conn,$sql);

    $msg="Password change successfully..";
    header("location:dashboard.php?msg=$msg");
  }
  
  ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type="text/javascript">
        
        function change_password()
        {
            if(confirm("Do you want change password"))
            {
                document.frm.action="#"
                document.frm.submit();
            }
        }
    </script>
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
                        <h1 class="page-head-line">User Account</h1>
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
                    <div class="row">
            
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Change Password
                        </div>
                        <div class="panel-body">
                            <form role="form" action="#" name="frm">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input class="form-control" type="text" name="login_name" value="<?=$data[login_name];?>" readonly>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input name="current_password" class="form-control" type="password" required="re" />
                                     
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                             <input class="form-control" type="password" name="new_password"  required="re" />
                                        </div>
                                         <div class="form-group">
                                            <label>Confirm Password</label>
                                             <input class="form-control" type="password" name="confirm_password"  required="re" />
                                        </div>
                                  
                                 
                                       <a href="javascript:change_password()"> <input onclick="return validate();" value="Change Password" type="submit" class="btn btn-info" name="submit"></a>
                                   <!--      <input type="hidden" name="act" value="change_password"> -->

                                    </form>
                            </div>
                        </div>
                            </div>
                <!-- /. ROW  -->
                </div>
            </div>
        </div>


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
    <script>
      function validate() {

        
      }
    </script>


</body>
</html>
