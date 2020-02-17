<?php $dashboard = true; $title = "dashboard_content";?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if (isset($_GET['action'])){
$action = $_GET['action'];
if ($action == 'home') $success = "Your Home Page has been successfully updated";
else if ($action == 'about') $success = "Your About Page has been successfully updated";
else if ($action == 'expertise') $success = "Your Expertise Page has been successfully updated";
else if ($action == 'solutions') $success = "Your Solutions Page has been successfully updated";
else if ($action == 'slogan') $success = "Your Slogan has been successfully updated";
else if ($action == 'contact') $success = "Your Contact Page has been successfully updated";
}


?>
<?php include('includes/header.inc.php'); ?>      
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div id="dashboard"  class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div class="maincontent">
                    <div id="tab-one">
               			 <?php include('includes/dash-nav.inc.php'); ?>
                      <div class="list-wrap">
                          <h2>Edit Content</h2>
                      	  <?php alert() ?>
                          <ul class="thumbnails">
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="home-content.php"><i class="icon-home"></i>HomePage</a>
                                  	</div>
                                </div>
                              </li>
                              
                             <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="about-content.php"><i class="icon-folder-close"></i>About Us</a>
                                  	</div>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="dashboard_expertise.php"><i class="icon-qrcode"></i>Expertise</a>
                                  	</div>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	<a href="dashboard_solutions.php"><i class="icon-cogs"></i>Solutions</a>
                                  	</div>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	<a href="edit-product.php"><i class="icon-shopping-cart"></i>Products</a>
                                  	</div>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	<a href="edit-contact.php"><i class="icon-envelope-alt"></i>Contact Us</a>
                                  	</div>
                                </div>
                              </li>
                              
                            </ul>
                            
                          </div>
                      <!-- END List Wrap -->
                      <div class="list-wrap-bottom"></div>
                    </div>
                      <!-- END Tab One -->
                </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>
    
        <?php include('includes/footer.inc.php'); ?>
    </body>
</html>
