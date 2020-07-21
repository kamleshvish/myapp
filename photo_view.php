<?php 
  include_once("include/db_connect.php");
  if($_REQUEST[search])
    {
       
      $sql="select * from photo where title like '%$_REQUEST[search]%'";
     
    
     }
    else
     {
       $sql="select *from photo"; 
     }


      
      $rs =mysqli_query($conn,$sql);


      if($_REQUEST['act']=="delete_photo")
      {
        $sql="select *from photo where id=$_REQUEST[id]";
        $rs = mysqli_query($conn,$sql);
        $data=mysqli_fetch_assoc($rs);
        unlink("uplode/$data[photo]");
        $sql="DELETE FROM `photo` WHERE `id` = $_REQUEST[id]";
        $rs = mysqli_query($conn,$sql);
        $msg="Photo delete successfully..";
        header("location:photo_view.php?msg=$msg");
      }


 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <script type="text/javascript">
        
        function delete_photo(id)
        {
            if(confirm("Do you want to delete photo"))
            {
                location.href="photo_view.php?act=delete_photo&id="+id;
                
            }
        }
    </script>
   
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Photo</title>

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
                                </div>



                                 </h1></center>
                         
                         <?php   
                           }
                        ?>

                    </div>
                </div>
                    <div class="row">
             <div class="panel panel-default">
                        <div class="panel-heading">
                            View Photo
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                             
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                           <form action="#"> <div class="panel-footer">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Serch by title" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit">SEARCH</button>
                                    </span>
                                </div>
                            </div></form>
                                           <div align="right"><a href="photo_add.php">ADD PHOTO</a></div>
                                            
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sr=1;
                                    while($data=mysqli_fetch_assoc($rs))
                                    {

                                      ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$sr++?></td>
                                            <td><?=$data[title];?></td>

                                           
                                            <td><img height="50px" width="50px" src="uplode/<?=$data[photo];?>"></td>
                                             <td><?=$data[type];?></td>
                                            <td><a href="photo_edit.php?id=<?=$data[id];?>"><button class="btn btn-primary">Edit</button></a> 
                                            <a href="javascript:delete_photo(<?=$data[id];?>)">
                                                <button class="btn btn-danger">Delete</button></a></td>
                                        </tr>
                                     
                                    </tbody>
                                    <?php
                                  }
                                  ?>
                                </table>
                            
                          
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
