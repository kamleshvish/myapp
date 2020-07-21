  <?php
   session_start();
   error_reporting(E_ALL & ~E_NOTICE);  
      include_once("include/db_connect.php");
      if($_REQUEST['act']=="logout")
      {
        session_destroy();
        $_SESSION[login]=0;
        
        $msg="Logout successfully..";
        header("location:login.php?msg=$msg");
       }

      if($_REQUEST['act']=="check_login")
      {
        $sql="select * from login where login_name = '$_REQUEST[login_name]' and login_password ='$_REQUEST[login_password]'";
        $rs= mysqli_query($conn,$sql) or die(mysqli_error());
        if(mysqli_num_rows($rs))
        {
           $_SESSION[login]=1;
            $msg="Login Success Fully..";
            header("location:dashboard.php?msg=$msg");
        }
        else
        {
            $msg_error="Invalid User Name OR Password";
            header("location:login.php?msg_error=$msg_error");
        }
      }

  ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.jpg" />
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <?php
                                  if($_REQUEST[msg_error])
                                  {
                                    ?>
                                    <div class="alert alert-danger">
                                      <?= $_REQUEST['msg_error']?>
                            </div>
                                 <?php
                                  }
                                ?>
                                  <?php

                            if($_REQUEST['msg'])
                            {
                             ?>
                              <div class="alert alert-success">
                                <?=$_REQUEST['msg']?>
                                </div> 
                         
                         <?php   
                           }
                        ?>
                                <form role="form" action="#">
                                    <hr />
                                    <h5>Enter Details to Login</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Username " name="login_name" />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your Password" name="login_password" />
                                        </div>
                                    
                                     
                                     <input type="submit" name="login" value="login"/>
                                    <input type="hidden" name="act" value="check_login">
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
