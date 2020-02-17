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
      #our-projects {
        margin: 30px;
      }

      #our-projects .thumbnail {
       padding: 0;
      }
    </style>
     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb2.inc.php'); ?>
                <div id="projects" class="maincontent">
                   <h2>Ifactor (Gallery)</h2>
                   <hr>
                    
                   <div id="our-projects" class="row">
                     <div class="col-xs-12 col-sm-6">
                       <div class="thumbnail">
                         <img src="img/projects/ifactor/ifactor-1.jpg" alt="Ifactor Project">
                       </div>
                     </div>
                     <div class="col-xs-12 col-sm-6">
                       <div class="thumbnail">
                         <img src="img/projects/ifactor/ifactor-2.jpg" alt="Ifactor Project">
                       </div>
                     </div>
                     <div class="col-xs-12 col-sm-6">
                       <div class="thumbnail">
                         <img src="img/projects/ifactor/ifactor-3.jpg" alt="Ifactor Project">
                       </div>
                     </div>

                     <div class="col-xs-12 col-sm-6">
                       <div class="thumbnail">
                         <img src="img/projects/ifactor/ifactor-4.jpg" alt="Ifactor Project">
                       </div>
                     </div>

                     <div class="col-xs-12 col-sm-6">
                       <div class="thumbnail">
                         <img src="img/projects/ifactor/ifactor-stage-1.jpg" alt="Ifactor Project">
                       </div>
                     </div>
                     <div class="col-xs-12 col-sm-6">
                       <div class="thumbnail">
                         <img src="img/projects/ifactor/ifactor-stage-2.jpg" alt="Ifactor Project">
                       </div>
                     </div>
                     <div class="col-xs-12 col-sm-6">
                       <div class="thumbnail">
                         <img src="img/projects/ifactor/ifactor-stage-3.jpg" alt="Ifactor Project">
                       </div>
                     </div>

                     <div class="col-xs-12 col-sm-6">
                       <div class="thumbnail">
                         <img src="img/projects/ifactor/ifactor-stage-4.jpg" alt="Ifactor Project">
                       </div>
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
