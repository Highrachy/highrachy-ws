<?php $dashboard = true; $title = "dashboard";
include('includes/config.inc.php'); ?>
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
                          <h2>DashBoard</h2>
                          <h4>Welcome back<?php if (isset($_SESSION['name'])) echo " ".$_SESSION['name']; ?>, </h4>
                          <ul class="thumbnails">
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="add-product.php">
                                    	<i class="icon-shopping-cart"></i>Add Product</a>
                                  	</div>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="add-slideshow.php">
                                    	<i class="icon-picture"></i>Add Slideshow</a>
                                  	</div>
                                </div>
                              </li>
                              
                             <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="dashboard_content.php">
                                    	<i class="icon-edit"></i>Edit Content</a>
                                  	</div>
                                </div>
                              </li>
                              
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="logout.php">
                                    	<i class="icon-signout"></i>Log Out</a>
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
