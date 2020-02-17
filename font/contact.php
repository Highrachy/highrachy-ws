<?php $title = "contact";
include('includes/config.inc.php'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
include('includes/contactus.inc.php');
 ?>
<?php include('includes/header.inc.php'); ?>      
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div class="maincontent">
                <div id="map" class="pad30">
                <iframe width="898" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Fubara+Dublin+Green+Street&amp;aq=&amp;sll=6.440177,3.506784&amp;sspn=0.043753,0.0739&amp;ie=UTF8&amp;hq=&amp;hnear=Fubara+Dublin+Green+Street&amp;t=m&amp;z=14&amp;ll=6.430162,3.523923&amp;output=embed"></iframe>
                </div>
                <div class="break"></div>
                <div class="row">
                	<div class="span3">
                    	<h3>Contact Us</h3>
                        <address>
                            Suite 182 Block E Admiralty Estates,<br />
                            15-17 Fubara Dublin Green Street,<br />
                            Alpha beach, Lekki, Lagos.<br /><br />
                            
                            nnamdi@highrachy.com <br />
                            +234 802 833 7440
                         </address>
                        <ul class="inline">
                            <li><a href="#"><img src="img/facebook.png" width="32" height="28"></a></li>
                            <li><a href="#"><img src="img/twitter.png" width="32" height="28"></a></li>
                            <li><a href="#"><img src="img/linkedin.png" width="32" height="28"></a></li>
                        </ul>
                               
                    </div>
                    <div class="row">
                    <div id="contact" class="span8">
                    	<h3>Send Us a Message</h3>
                        <p>We will love to hear from you</p>
                        <div id="message"></div>
                       <form class="form-horizontal" method="post">
                          <div class="control-group">
                            <label class="control-label" for="name">Name</label>
                            <div class="controls">
                              <input type="text" id="name" name="name" class="span4" placeholder="Type Your Name..."
                              value="<?php if (isset($_POST["name"])){ 
							  $value = $_POST["name"];
							  if ($value && get_magic_quotes_gpc())
							   echo stripslashes($value); else echo $value; }?>">
                            </div>
                          </div>
                          
                          <div class="control-group">
                            <label class="control-label" for="email">Email</label>
                            <div class="controls">
                              <input type="text" id="email" name="email" class="span4"  placeholder="Type Your Email..."
                              value="<?php if (isset($_POST["email"])){ 
							  $value = $_POST["email"];
							  if ($value && get_magic_quotes_gpc())
							   echo stripslashes($value); else echo $value; }?>">
                            </div>
                          </div>
                          
                          <div class="control-group">
                            <label class="control-label" for="phone">Phone</label>
                            <div class="controls">
                              <input type="text" id="phone" name="phone" class="span4" placeholder="Type Your Phone No..."
                              value="<?php if (isset($_POST["phone"])){ 
							  $value = $_POST["phone"];
							  if ($value && get_magic_quotes_gpc())
							   echo stripslashes($value); else echo $value; }?>">
                            </div>
                          </div>
                          
                          <div class="control-group">
                            <label class="control-label" for="comment">Comments</label>
                            <div class="controls">
                              <textarea id="comments" class="span6" name="comments" rows="6">
							  <?php if (isset($_POST["comments"])){ 
							  $value = $_POST["comments"];
							  if ($value && get_magic_quotes_gpc())
							   $value = stripslashes($value); else echo $value; }?>
                              </textarea>
                            </div>
                          </div>
                          <?php alert() ?>
                           <div class="control-group">
                                <div class="controls">
                                  <div class=" offset4">
                                  <button type="reset" class="btn" data-type="reset">Clear</button>
                                  <button type="submit" class="btn">Submit</button>
                                  </div>
                                </div>
                              </div>
                        </form>
                       </div>
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
