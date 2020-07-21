<?php 
session_start();
error_reporting(E_ALL & ~E_NOTICE);  
include_once("include/db_connect.php");
if($_SESSION[login]==0)
{
   $msg_error="Please login to continew...";
   header("location:login.php?msg_error=$msg_error");
}
?>
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><?=$company_name;?></a>
            </div>

           
        </nav>