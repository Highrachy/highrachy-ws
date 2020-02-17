<?php $title = "career"; $sub_title = "Programmer"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>

<?php include('includes/header.inc.php'); ?>      
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div class="maincontent">
                    <div id="tab-one">
                      <ul class="nav unstyled">
                        <li class="nav-li"><a href="career.php" class="current"><i class="icon-briefcase"></i>&nbsp;Programmer</a></li>
                        <li class="nav-li"><a href="search.php"><i class="icon-briefcase"></i>&nbsp;Manager</a></li>
                      	<li class="nav-li first"><a href="sitemap.php"><i class="icon-briefcase"></i>&nbsp;Web Designer</a></li>
                      </ul>
                      <div class="list-wrap">
                          <h2>Programmer</h2>
                          <p class="lead">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat..</p>
                          <div class="break"></div>
                          
                          
                          <h3>Job Description</h3>
                          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.
Vivamus nec sapien massa, a imperdiet diam. Aliquam erat volutpat. Sed consectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo tristique odio, quis fringilla ligula aliquet ut. Maecenas sed justo varius velit imperdiet bibendum. Vivamus nec sapien massa, a imperdiet diam. Aliquam erat volutpat. Sed tetur suscipit nunc et rutrum.</p>
                          <div class="break"></div>
                          
                          
                          <h3>Requirements</h3>
                          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.
Vivamus nec sapien massa, a imperdiet diam. Aliquam erat volutpat. Sed consectetur suscipit nunc et rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo tristique odio, quis fringilla ligula aliquet ut. Maecenas sed justo varius velit imperdiet bibendum. Vivamus nec sapien massa, a imperdiet diam. Aliquam erat volutpat. Sed tetur suscipit nunc et rutrum.</p>
                          <div class="break"></div>
                          
                          
                          <h3>Apply for this Job</h3>
                          
                          <form method="post" id="custom" enctype="multipart/form-data"> 
													<?php 
														createFormInput('Name','name','text');
														createFormInput('Phone','phone','text');
														createFormInput('Email','email','text');
														
													 ?>
                                                     <div><br></div>
                                     <label for="cv">Upload CV</label><input type="file" name="cv">
                                    
                                    <div class="clearfix"></div>
                                    
									<div class="pull-right pad30">
									<input type="submit" class="btn" value="Apply">&nbsp;&nbsp;<input type="reset" class="btn" value="Clear">
                                    </div>

                                <?php alert() ?>
                            </fieldset>
                        </form>
                          
                          
                                                                   
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
