<?php 
  include_once("include/db_connect.php");
  if($_REQUEST[id])
  {
    $sql="select *from photo where id=$_REQUEST[id]";
    $rs= mysqli_query($conn,$sql);
    $data=mysqli_fetch_assoc($rs);

  }


  if($_REQUEST['act'])

  {
  	   
      
	  	$photo      = $_FILES[photo];
	  	$image_name = $photo[name];
      if($image_name)
      { 
             unlink("uplode/$data[photo]");
    	  	 $img= time()."_".$image_name;
    	  	$location   = $photo[tmp_name];
    	  	$ext        = explode(".",$image_name);
    	  	  if($ext[1] != jpg)
    	  	  {
      	    $msg_error="Image formet must be jpg ";
      		header("location:photo_add.php?msg_error=$msg_error");
      		exit;
      	      }
      	      else
      	    {

      		move_uploaded_file($location,"uplode/$img");
      	    }
      }
      else
      {
          $img=$_REQUEST[pto];
      }
         
        

  		$sql="UPDATE `archi`.`photo` SET `title` = '$_REQUEST[title]', `photo` = '$img' WHERE `photo`.`id` = $_REQUEST[id];";
         $rs = mysqli_query($conn,$sql);
        $msg="Image updated successfuly..";
  		header("location:photo_view.php?msg=$msg");
  	    
     }
  
  ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Photo</title>

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
                        <h1 class="page-head-line">Gallery Management</h1>
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
                           Update Photo
                        </div>
                        <div class="panel-body">
                            <form role="form" action="#" name="frm" method="post" enctype="multipart/form-data">
                            	         <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" type="text" name="title" value="<?=$data[title];?>">
                                            <p class="help-block">update photo title</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Chhose Photo</label>
                                            <input class="form-control" type="file" name="photo">
                                            <p class="help-block">Photo for uploding</p>
                                            <img src="uplode/<?=$data[photo];?>" hight=200px width=200px>
                                        </div>
                                <button type="submit" class="btn btn-inverse"><i class="glyphicon glyphicon-plus"></i>Update</button>
                                        <input type="hidden" name="act" value="update_photo">
                                        <input type="hidden" name="pto" value="<?=$data[photo];?>">

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
    


</body>
</html>
