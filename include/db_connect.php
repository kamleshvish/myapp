<?php

   error_reporting(E_ALL & ~E_NOTICE); 
    $host = "localhost";
    $user = "root";
    $psw  = "";
  $db_name= "archi";
  $company_name="Y3K IMAGINATIONS";
 
      $conn = mysqli_connect($host,$user,$psw) or die(mysqli_error());
   $db_sel= mysqli_select_db($conn,$db_name);

?>