<?php $dashboard = true; $title = "dashboard"; $script = true; ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Retrieve the names of pages you can edit from the database
$query = "SELECT id, name, id from edit";
$rows = $db->fetch_all_row($query);
$page = "";
foreach ($rows as $row){
	$page .= "<p><a href='edit-page.php?id={$row['id']}&id={$row['id']}'>{$row['name']}</a></p>";
}
	
?>

<?php include('includes/header.inc.php'); ?>      
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div id="dashboard" class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div class="maincontent">
                     <div id="tab-one">
               			 <?php include('includes/dash-nav.inc.php'); ?>
                      
                      <div class="list-wrap">
                          <h2>Edit Pages</h2>
                          <ul class="thumbnails">
                              <li class="span2">
                                <div class="thumbnail">
                                <a href="edit-page.php?id=1">
                                	<div class="content">
                                    	<i class="icon-briefcase"></i>
                                  		<p>Home</p>
                                  	</div>
                                </a>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                <a href="edit-page.php?id=2">
                                	<div class="content">
                                    	<i class="icon-briefcase"></i>
                                  		<p>About Us</p>
                                  	</div>
                                </a>
                                </div>
                              </li>
                              
                             <li class="span2">
                                <div class="thumbnail">
                                <a href="edit-page.php?id=3">
                                	<div class="content">
                                    	<i class="icon-bar-chart"></i><p>Expertise</p>
                                  	</div>
                               </a>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                <a href="edit-page.php?id=4">
                                	<div class="content">
                                    	<i class="icon-cogs"></i><p>Solutions</p>
                                  	</div>
                                </a>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                <a href="edit-page.php?id=5">
                                	<div class="content">
                                    	<i class="icon-dashboard"></i><p>Products</p>
                                  	</div>
                                </a>
                                </div>
                              </li>
                              
                              
                              <li class="span2">
                                <div class="thumbnail">
                                <a href="edit-page.php?id=6">
                                	<div class="content">
                                    	<i class="icon-dashboard"></i><p>Contact</p>
                                  	</div>
                                </a>
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
