<?php $title = "contact";
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
                   <iframe style="width:100%; height:320px" class="embed-responsive-item" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Fubara+Dublin+Green+Street&amp;aq=&amp;sll=6.440177,3.506784&amp;sspn=0.043753,0.0739&amp;ie=UTF8&amp;hq=&amp;hnear=Fubara+Dublin+Green+Street&amp;t=m&amp;z=14&amp;ll=6.430162,3.523923&amp;output=embed"></iframe>
                </div>
                <div class="break"></div>

                <div class="row">

                      <div id="contact-us" class="col-sm-4 col-sm-push-8">
                       <h3>Contact Us</h3>
                        <address>
                        <?php //echo $address ?>
                            Suite 1, Wabeco Filling Station,<br>
                            Lekki-Epe Expressway, Lakowe, Lagos.
                            nnamdi@highrachy.com<br>
                            <?php echo $mobile1 ?>
                         </address>
                        <ul class="list-unstyled list-inline">
                            <li><a href="http://<?php echo $facebook ?>"><img src="img/facebook.png" width="32" height="28"></a></li>
                            <li><a href="http://<?php echo $twitter ?>"><img src="img/twitter.png" width="32" height="28"></a></li>
                            <li><a href="http://<?php echo $linked ?>"><img src="img/linkedin.png" width="32" height="28"></a></li>
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
