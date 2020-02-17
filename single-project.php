<?php $title = "solutions"; $script= true; ?>
<?php
include('includes/config.inc.php');
require(DB);
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


// if (isset($_GET['page']))
//   $id = $_GET['page'];
// else $id = '1';

// $query = "SELECT solutions.name as e_name FROM solutions WHERE solutions.id =$id";
// $rows = $db->fetch_all_row($query);
// $e_name = $i_name = "";
// if ($db->total_affected_rows() == 1){
//   foreach($rows as $row){
//   $page_name =$row['e_name'];
//   }
// }
// else redirect("dashboard_solutions.php");

?>
<?php include('includes/header2.inc.php'); ?>

<style>


</style>
     </div>
     <!--End of Top Container-->

     <section>
      <div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb2.inc.php'); ?>
                <div class="maincontent">
                    <div id="tab-one"class="row">


                      <div class="col-md-4 col-sm-6">
                          <div class="col-md-10 col-sm-12 no-padding wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                              <h6 class="black-text no-margin-top margin-one no-letter-spacing"><strong>Custom Field</strong></h6>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><br>
                              <h6 class="black-text no-margin-top margin-one no-letter-spacing"><strong>Date</strong></h6>
                              <p>Saturday, 7 March 2015</p><br>
                              <h6 class="black-text no-margin-top margin-one no-letter-spacing"><strong>Category</strong></h6>
                              <p>Art, Business, Fashion</p><br>
                              <h6 class="black-text no-margin-top margin-one no-letter-spacing"><strong>Client</strong></h6>
                              <p>Monster Alfred &amp; Co.</p>
                              <div class="thin-separator-line bg-mid-gray margin-ten no-margin-lr"></div>
                          </div>
                          <div class="col-md-10 col-sm-12 text-med text-uppercase no-padding wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text.</p>
                              <div class="thin-separator-line bg-mid-gray margin-ten no-margin-lr"></div>
                          </div>
                          <div class="col-md-10 col-sm-12 no-padding wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text.</p><br>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text.</p>
                              <div class="thin-separator-line bg-mid-gray margin-ten no-margin-lr"></div>
                          </div>
                          <div class="col-md-10 col-sm-12 no-padding testimonial-style2 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                              <i class="fa fa-quote-left small-icon black-text margin-ten no-margin-bottom xs-margin-top-four"></i>
                              <p>Focused, hard work is the real key to success. Keep your eyes on the goal, and just keep taking the next step towards completing it. If you aren't sure which way to do something, do it both ways and see which works better.</p>
                              <span class="name">John Carmack - Google Inc</span>
                          </div>
                      </div>
                      <div class="col-md-8 col-sm-6">
                          <img src="http://placehold.it/800x500" class="img-responsive" alt="" style="visibility: visible; animation-name: fadeInUp;">
                          <img src="http://placehold.it/800x700" class="img-responsive" alt="" style="visibility: visible; animation-name: fadeInUp;">
                          <img src="http://placehold.it/800x500" class="img-responsive" alt="" style="visibility: visible; animation-name: fadeInUp;">
                      </div>


                    </div>
                      <!-- END Tab One -->
                </div>
                <!-- End of Main Content -->
            </div>
      </div>
     </section>

        <?php include('includes/footer2.inc.php'); ?>
    </body>
</html>
