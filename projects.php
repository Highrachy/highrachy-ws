<?php $title = "projects"; $script = true; ?>
<?php
include('includes/config.inc.php');
include(DB);
include('functions/database.class.php');
include('functions/createFormInput.php');

$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

?>
<?php include('includes/header2.inc.php'); ?>
     </div>
     <!--End of Top Container-->

    <style>
      .project-wrapper {
        background: #fafafa;
        border: 1px solid #f5f5f5;
        overflow: hidden;
        margin: 40px 30px 60px;
      }

      .project-image {
        margin: 0 -15px;
      }

      .project-details {
        padding: 20px 15px 20px 30px;
      }

      .project-details h2 {
        font-weight: 600;
      }

      .project-details span {
        font-size: 16px;
        color: #666;
        display: block;
        margin: 0 0 15px;
        line-height: 1.4;
      }

      .project-details p {
        font-size: 14px;
        margin-bottom: 20px;
        color: #888;
      }
    </style>
     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb2.inc.php'); ?>
                <div id="projects" class="maincontent">
                   <h2>Projects</h2>
                   Find below some of our projects
                   <hr>
                    
                    <div class="project-wrapper">
                      <div class="col-sm-6 col-md-8 project-image">
                        <img src="img/projects/blissville-day.jpg" class="img-responsive" alt="Blissville">
                      </div>
                      <div class="col-sm-6 col-md-4 project-details">
                        <h2>Blissville</h2>
                        <span>Start Planning your New Dream Home with us</span>

                        <p>Actualize the dream of buying a home, readily tailored to suit your peculiar taste with the specific finishing details you desire.</p>
                        <a href="http://www.blissville.com.ng" target="_blank">More Details</a>
                      </div>
                    </div>

                    <div class="project-wrapper">
                      <div class="col-sm-6 col-md-8 project-image">
                        <img src="img/projects/ifactor.jpg" class="img-responsive" alt="I-factor">
                      </div>
                      <div class="col-sm-6 col-md-4 project-details">
                        <h2>Ifactor</h2>
                        <p>Ifactor is an exquisitely designed, Energy Efficient, world class mini estate within a secure environment. It comprises of 6 apartments and an array of relaxation and recreational facilities including a roof top gym, lounged rooftop terrace with large jacuzzi overlooking the Lagos Lagoon with other wonderful sights.</p>
                        <a href="ifactor.php">View Gallery</a>
                      </div>
                    </div>
                    
                    <div class="project-wrapper">
                      <div class="col-sm-6 col-md-8 project-image">
                        <img src="img/projects/dreamworld.jpg" class="img-responsive" alt="Dreamworld Technology Mall">
                      </div>
                      <div class="col-sm-6 col-md-4 project-details">
                        <h2>Dreamworld Technology Mall</h2>
                        <p>Dreamworld Technology Mall is approximately 6,000 sqm of retail and office space which will be a tech hub and home of some of the global Technology companies</p>

                      </div>
                    </div>
                    
                </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>
        <?php include('includes/footer2.inc.php'); ?>
    </body>
</html>
