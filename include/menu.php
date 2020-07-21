<ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div" align="left">
                            <img src="assets/img/user.jpg" class="img-thumbnail" />


                            <div class="inner-text" align="right">
                                Admin
                            <br />
                                <small><?=date("Y-m-d");?></small>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="dashboard.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Manage Gallery <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="photo_add.php"><i class="fa fa-toggle-on"></i>Add Photo</a>
                            </li>
                            <li>
                                <a href="photo_view.php"><i class="fa fa-bell "></i>View Photo</a>
                            </li>
                             <li>
                               
                             
                            
                           
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-yelp "></i>User Account<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="user.php"><i class="fa fa-coffee"></i>Change Password</a>
                            </li>
                            <li>
                                <a href="login.php?act=logout"><i class="fa fa-flash "></i>Logout</a>
                            </li>
                            
                            
                           
                        </ul>
                    </li>
                    
                    
                </ul>