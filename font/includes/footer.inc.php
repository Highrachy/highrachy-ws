		<footer>
         <div class="container">
            	<div class="span4">
                				<h3>Contact Us</h3>
                                <address>
                                <p class="home"><span> Address : </span><br>Suite 182 Block E Admiralty Estates,<br>
                                15-17 Fubara Dublin Green Street,<br>
                                Alpha beach, Lekki, Lagos.</p>
                                <p class="email"><span>Email : </span><a href="mailto:nnamdi@highrachy.com">nnamdi@highrachy.com</a></p>
                                <p class="phone"><span>Phone : </span><strong>+234 802 833 7440</strong></p>
                                </address> 
                </div>
                
                <div class="span4">
                <h3>Our Services</h3>
                <p>We pride ourselves in our excellent service delivery standards in line with our core competencies. These competencies are;  </p>
                    <ul id="footer-links">
                    <li><a href="consulting.php">Project and Business Consulting</a></li>
                    <li><a href="technology.php">Technology Solutions</a></li>
                    <li><a href="investment.php">Real Investment</a></li>
                    </ul>
                </div>
            	<div class="span4 last"><h3>Why Choose Us</h3>
                <p>Far from a mere technology company, we are a solutions company that goes way beyond solving problems as identified by you, but also constantly enhances your lives, lifestyles and living. 
Our solutions are inspired by ideas that promise more convenience, comfort, security, safety, income and plain fun just for YOU.
</p></div>
                
                <div class="clearfix"></div>
            <div id="copyright" class="row">
            		<div class="clearfix"></div>
                	<div class="span4 pull-left">Copyright &copy; 2013 Highrachy. All rights reserved.</div>
               	    <div class="span7 pull-right">
                        <ul class="unstyled inline align-right">
                            <li><a href="#"><span id="facebook_icon"></span></a></li>
                            <li><a href="#"><span id="twitter_icon"></span></a></li>
                            <li><a href="#"><span id="linkedin_icon"></span></a></li>
                        <!-- END .social-icons -->
                        </ul>
                    </div>
            </div>
            
         </div>
         
     </footer>
     	
        <?php if ((isset($script)) && ($script)) { ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        
        <script src="js/jquery.cycle.all.min.js" type="text/javascript"></script>
		<script type="text/javascript">
        $(function() {
            $('#slider').cycle({
                fx: 'fade',
                fadeSpeed: 500,
                timeout: 4100,
                pager:  '#cyclenav'
            });
        });
        </script>
	
<?php } ?>