<?php $title = "index"; $script=true; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Get the Tagline
$query = "SELECT content FROM edit where id='1'";
$rows = $db->fetch_first_row($query);
$tagline = $rows['content'];
?>
<?php include('includes/header.inc.php'); ?>       
        <!-- Slideshow -->
        <div id="slideshow">
        <div id="slider">
          <div class="oneByOne_item"><img src="img/slider/slide2.jpg" class="item_1_1" alt="" />
            <div class="text_1_1" style="border:4px solid #737375">
              <h4>Business Consulting</h4>
              <p>Business consulting including business advisory and planning, business structuring and business </p>
              <p class="pull-right"><a href="investment.php"><small>Learn More &raquo;</small></a></p>
            </div>
          </div>
          
          <div class="oneByOne_item"><img src="img/slider/slide1.jpg" class="item_1_1" alt="" />
            <div class="text_1_1" style="border:4px solid #737375">
              <h4>Home Solution</h4>
              <p>Making your home fascinate everyone, including you. Imagine the ability to control your home from your phone.</p>
              <p class="pull-right"><a href="building.php"><small>Learn More &raquo;</small></a></p>
            </div>
          </div><div class="oneByOne_item"><img src="img/slider/slide3.jpg" class="item_1_1" alt="" />
            <div class="text_1_1" style="border:4px solid #737375">
              <h4>Real Estate</h4>
              <p>We provide a wide array of real estate management and advisory services be it property acquisition, development </p>
              <p class="pull-right"><a href="investment.php"><small>Learn More &raquo;</small></a></p>
            </div>
          </div>
        </div>
    	<!-- end slider -->
    	<!-- start slideshow navigation -->
    	<div id="cyclenav"></div>
    	<!-- end slideshow navigation -->
  		</div>
        <!-- End of Slideshow -->
        
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div id="index-content" class="maincontent">
                        <h2>The Solutions Expert</h2>
                        <p class="lead"><?php echo strip_tags($tagline) ?></p>
                        
                        <!-- Page Break -->
                        <div class="break"></div>
                        
                        <!-- Our Expertise -->
                        <h3>Our Expertise</h3>
                        <div class="span4">
                            <img src="img/product.jpg" width="267" height="173" />
                            <h4><a href="expertise.php">Project and Business Consulting</a></h4>
                            <p>Our elite team with related backgrounds, training and experience provides advisory and consultancy services <a href="expertise.php">[...]</a></p>
                        </div>
                        <div class="span4">
                            <img src="img/technology.jpg" width="267" height="173" />
                            <h4><a href="expertise.php">Technology Solutions</a></h4>
                            <p>The world as it is today is managed by various spheres of technological gadgets and solutions. Highrachy gives <a href="expertise.php">[...]</a></p>
                        </div>
                         <div class="span4 last">
                            <img src="img/investment.jpg" width="267" height="173" />
                            <h4><a href="expertise.php">Investment</a></h4>
                            <p>We provide a wide array of real estate management and advisory services be it property acquisition <a href="expertise.php">[...]</a></p>
                        </div>
                        <!-- End of Our Expertise -->
                        
                        <div class="clearfix"></div>
                        
                        
                                           
                    </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>
     
    
        <?php include('includes/footer.inc.php'); ?>

    </body>
</html>
