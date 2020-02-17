		<footer>
		<?php
        if (!isset($db)){
            $db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        }
        #-############################################
        # Get all the contact information
        #-############################################

        $query = "SELECT address, mobile1, land,facebook, twitter, linked FROM contact WHERE id='1'";
        $table = $db->fetch_first_row($query);
        $address = $table['address'];
        $mobile1 = $table['mobile1'];
        $facebook = $table['facebook'];
        $twitter = $table['twitter'];
        $linked = $table['linked'];

        $query = "SELECT id,link,name FROM expertise WHERE link <> 0 LIMIT 3";
        $rows = $db->fetch_all_row($query);
		$service = "";
		foreach ($rows as $row){
			$service .= '<li><a href="expertise.php?page='.$row['link'].'">'.$row['name'].'</a></li>';
		}

		//Get the Tagline
		$query = "SELECT content FROM edit where id='2'";
		$rows = $db->fetch_first_row($query);
		$about = $rows['content'];

        ?>
         <div class="container">
            	<div class="span4">
                				<h3>Contact Us</h3>
                                <address>
                                <p class="home"><span> Address : </span><?php echo strip_tags($address) ?></p>
                                <p class="email"><span>Email : </span><a href="mailto:nnamdi@highrachy.com">nnamdi@highrachy.com</a></p>
                                <p class="phone"><span>Phone : </span><strong><?php echo $mobile1 ?></strong></p>
                                </address>
                </div>

                <div class="span4">
                <h3>Our Services</h3>
                <p>We pride ourselves in our excellent service delivery standards in line with our core competencies. These competencies are;  </p>
                    <ul id="footer-links">
                    <?php echo $service ?>
                    </ul>
                </div>
            	<div class="span4 last"><h3>Why Choose Us</h3>
                <p><?php echo strip_tags($about) ?></p></div>

                <div class="clearfix"></div>
            <div id="copyright" class="row">
            		<div class="clearfix"></div>
                	<div class="span4 pull-left">Copyright &copy; 2013 Highrachy. All rights reserved.</div>
               	    <div class="span7 pull-right">
                        <ul class="unstyled inline align-right">
                            <li><a href="<?php echo $facebook ?>"><span id="facebook_icon"></span></a></li>
                            <li><a href="<?php echo $twitter ?>"><span id="twitter_icon"></span></a></li>
                            <li><a href="<?php echo $linked ?>"><span id="linkedin_icon"></span></a></li>
                        <!-- END .social-icons -->
                        </ul>
                    </div>
            </div>

         </div>

     </footer>

        <?php if ((isset($script)) && ($script)): ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <?php if ((isset($title)) && ($title == "index")): ?>
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
        <?php endif ?>

<?php endif ?>