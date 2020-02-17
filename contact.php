<?php $title = "contact";
$script = true;
include('includes/config.inc.php');
require(DB);
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if ($_SERVER['REQUEST_METHOD'] == 'POST')
include('includes/contactus.inc.php');

#-############################################
# Get all the contact information
#-############################################

$query = "SELECT address, land, mobile1,facebook,twitter,linked FROM contact WHERE id='1'";
$table = $db->fetch_first_row($query);
$address = $table['address'];
$land = $table['land'];
$mobile1 = $table['mobile1'];
$facebook = $table['facebook'];
$twitter = $table['twitter'];
$linked = $table['linked'];

 ?>
<?php include('includes/header2.inc.php'); ?>
     </div>
     <!--End of Top Container-->

     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb2.inc.php'); ?>
                <div class="maincontent">
                <div align="center">
                	<h2>GET IN TOUCH WITH US</h2>
                    <p>Do you need to talk to us, have a question, or even just want to tell us how awesome we are? <br>
Well great, find all the information you need here,or even send us a message.</p>
                </div>
                <!-- 4:3 aspect ratio -->
                <div>
                   <!-- <iframe style="width:100%; height:320px" class="embed-responsive-item" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.399604284048!2d3.710648000000001!3d6.47096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bfe7afa404753%3A0x6e52d65172bb4161!2sAwoyaya+Bus+Stop!5e0!3m2!1sen!2sus!4v1434378778412"></iframe> -->

                   <div id="map1" style="width: 100%; height: 324px; border: 1px solid #ccc; overflow: hidden;">
                    </div>

                </div>
                <div class="break"></div>

                <div class="row">

                      <div id="contact-us" class="col-sm-4 col-sm-push-8">
                       <h3>Contact Us</h3>
                        <address>
                        <?php //echo $address ?>
                            <?php echo $address ?>
                            <a href="mailto:nnamdi@highrachy.com">nnamdi@highrachy.com</a><br>
                            <?php echo $mobile1 ?>
                         </address>
                        <ul class="list-unstyled list-inline">
                            <li><a href="http://<?php echo $facebook ?>"><img src="img/facebook.png"></a></li>
                            <li><a href="http://<?php echo $twitter ?>"><img src="img/twitter.png"></a></li>
                            <li><a href="http://<?php echo $linked ?>"><img src="img/linkedin.png"></a></li>
                        </ul>

                      </div>
                    <div id="contact" class="col-sm-8 col-sm-pull-4">
                    	<h3>Send Us a Message</h3>

                        <div id="message"></div>
                        <form class="form-horizontal" method="post">
                          <div class="form-group">
                          	<label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-8">
                              <input type="text" id="name" class="form-control" name="name" placeholder="Your Full Name">
                            </div>
                          </div>

                          <div class="form-group">
                          	<label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                              <input type="text" id="email" class="form-control" name="email" placeholder="Your Email Address">
                            </div>
                          </div>

                          <div class="form-group">
                          	<label for="phone" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-8">
                              <input type="text" id="phone" class="form-control" name="phone" placeholder="Your Phone Number">
                            </div>
                          </div>

                          <div class="form-group">
                          <label for="message" class="col-sm-2 control-label">Message</label>
                            <div class="col-sm-10">
                              <textarea rows="10" class="form-control" name="comments" title="Your Message" placeholder="Enter your Message here"></textarea>
                            </div>
                          </div>
                          <?php alert() ?>
                           <div class="col-sm-offset-2">
                                <div class="">
                                  &nbsp;<button type="submit" class="btn btn-primary">Submit</button>&nbsp;
                                  <button type="reset" class="btn btn-default" data-type="reset">&nbsp;Clear</button>&nbsp;
                                </div>
                            </div>
                        </form>
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
