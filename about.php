<?php $title = "about" ?>
<?php
include('includes/config.inc.php');
require(DB);
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


//Fetch All rows to view the recent content
$query = "SELECT id, name, content, priority FROM about ORDER BY priority DESC, name DESC";
$rows = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
$content = "";
$count = 0;

foreach ($rows as $row){
	$count++;
	$content .= '<div class="col-sm-4';
	if (($count % 3 ) == 0) $content .= ' last ';
	$content .= '"><h3>'.$row['name'].'</h3><p>'.$row['content'].'</p></div>';

	}


//Get the Tagline
$query = "SELECT content FROM edit where id='2'";
$rows = $db->fetch_first_row($query);
$tagline = $rows['content'];
?>
<?php include('includes/header2.inc.php'); ?>
     </div>
     <!--End of Top Container-->

     <section>
        <div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb2.inc.php'); ?>
                <div id="index-content" class="maincontent">
                        <h2>About Us</h2>
                        <p class="lead"><?php echo strip_tags($tagline) ?></p>

                        <!-- Page Break -->
                        <div class="break"></div>

                       <?php echo $content ?>

                        <div class="clearfix"></div>

                        <!-- Page Break -->
                        <div id="projects" class="break"></div>

                        <h3>Our Projects</h3>
                        <div id="our-projects" class="row">
                          <div class="col-xs-12 col-sm-4">
                            <div class="thumbnail">
                              <img src="img/projects/blissville.jpg" alt="Home Automation">
                              <h4>Blissville Condominiums</h4>
                              <p>Blissville projects strategically aim at providing secure, efficient, convenient and luxurious residential dwellings while availing investors with lucrative investment opportunities.</p>
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-4">
                            <div class="thumbnail">
                              <img src="img/projects/energy-efficient-residential.jpg" alt="Home Automation">
                              <h4>Energy Efficient Residential Units at Ajah</h4>
                              <p>Energy efficient residential dwelling; Smartlighting, Fire and Security Systems, Power Management  <br><br><br></p>
                            </div>
                          </div>

                          
                          <div class="col-xs-12 col-sm-4">
                            <div class="thumbnail">
                              <img src="img/projects/mall-construction.jpg" alt="Home Automation">
                              <h4>Mall Construction</h4>
                              <p>Project Management; We ensure that all construction projects are completed per the construction schedule. <br><br><br></p>
                            </div>
                          </div>


                        </div>

                        <!-- Page Break -->
                        <div id="business-relationships" class="break"></div>

                        <h3>Existing Business Relationships</h3>

                        <ul class="client-logos">
                            <li>
                                <img src="img/clients/highrachy-interactive.jpg" alt="Highrachy Interactive Logo">
                            </li>
                            <li>
                                <img src="img/clients/brown-cougar.jpg" alt="Brown Cougar Logo">
                            </li>
                            <li>
                                <img src="img/clients/axis.jpg" alt="Axis Logo">
                            </li>
                            <li>
                                <img src="img/clients/cineak.jpg" alt="Cineak Logo">
                            </li>
                            <li>
                                <img src="img/clients/legrand.jpg" alt="Legrand Logo">
                            </li>
                            <li>
                                <img src="img/clients/commax.jpg" alt="Commax Logo">
                            </li>
                            <li>
                                <img src="img/clients/elvira-salleras-and-associates.jpg" alt="Elvira Salleras and Associates Logo">
                            </li> 
                            <li>
                                <img src="img/clients/bristow.jpg" alt="Bristow Logo">
                            </li> 
                            <li>
                                <img src="img/clients/somkolch.jpg" alt="Somkolch Logo">
                            </li> 
                            <li>
                                <img src="img/clients/foscam.jpg" alt="Foscam Logo">
                            </li>
                            <li>
                                <img src="img/clients/samsung.jpg" alt="Samsung">
                            </li> 
                        </ul>


                        <!-- Page Break -->
                        <div class="break"></div>


                    </div>
                <!-- End of Main Content -->
            </div>
        </div>
     </section>


        <?php include('includes/footer2.inc.php'); ?>
    </body>
</html>
