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
<?php include('includes/header.inc.php'); ?>      
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div class="maincontent">
                <div align="center">
                	<h2>GET IN TOUCH WITH US</h2>
                    <p>Do you need to talk to us, have a question, or even just want to tell us how awesome we are? <br>
Well great, find all the information you need here,or even send us a message.</p>
                </div>
                <div id="map" class="pad30">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.399604284048!2d3.710648000000001!3d6.47096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bfe7afa404753%3A0x6e52d65172bb4161!2sAwoyaya+Bus+Stop!5e0!3m2!1sen!2sus!4v1434378778412" width="898" height="350" frameborder="0" style="border:0"></iframe>
                </div>
                <div class="break"></div>
                
                <div class="row">
                    <div id="contact" class="span8">
                    	<h3>Send Us a Message</h3>
                        
                        <div id="message"></div>
                       <form class="form-horizontal" method="post">
                          <div class="control-group">
                          	<label for="name">Name</label>
                            <div class="controls">
                              <input type="text" id="name" name="name" class="span5" value="">
                            </div>
                          </div>
                          
                          <div class="control-group">
                          	<label for="email">Email</label>
                            <div class="controls">
                              <input type="text" id="email" name="email" class="span5" value="">
                            </div>
                          </div>
                          
                          <div class="control-group">
                          	<label for="phone">Phone Number</label>
                            <div class="controls">
                              <input type="text" id="phone" name="phone" class="span5" value="">
                            </div>
                          </div>
                          
                          <div class="control-group">
                          <label for="message">Message</label>
                            <div class="controls">
                              <textarea rows="10" class="span8" name="comments" title="Your Message"></textarea>
                            </div>
                          </div>
                          <?php alert() ?>
                           <div class="control-group">
                                <div class="controls">
                                  <div class="pull-right">
                                  <button type="reset" class="btn" data-type="reset">&nbsp;Clear</button>&nbsp;
                                  <button type="submit" class="btn">Submit</button>
                                  </div>
                                </div>
                              </div>
                        </form>
                       </div>
                       
                       <div id="contact-us" class="span3">
                    	<h3>Contact Us</h3>
                        <address>
                        <?php //echo $address ?>
                            <?php echo $address ?>
                            <a href="mailto:nnamdi@highrachy.com">nnamdi@highrachy.com</a><br>
                            <?php echo $mobile1 ?>
                         </address>
                        <ul class="inline">
                            <li><a href="http://<?php echo $facebook ?>"><img src="img/facebook.png" width="32" height="28"></a></li>
                            <li><a href="http://<?php echo $twitter ?>"><img src="img/twitter.png" width="32" height="28"></a></li>
                            <li><a href="http://<?php echo $linked ?>"><img src="img/linkedin.png" width="32" height="28"></a></li>
                        </ul>
                               
                    </div>
      				</div>
                    
                
                </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>
    
        <?php include('includes/footer.inc.php'); ?>

    </body>
</html>
