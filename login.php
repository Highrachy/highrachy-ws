<?php $title = "login" ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');

$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (isset($_GET['logout'])){
		$logout = $_GET['logout'];
		if ($logout == 1)
			$success = "You have successfully logged out";
	}
if (isset($_GET['err'])){
		$logout = $_GET['err'];
		if ($logout == 1)
			$errors[] = "You must login to view page";
}


//Check if the user is logged in before 
if ((isset($_SESSION['name'])) && ($_SESSION['name'] != "")){
		//Redirect the user to the dashboard
		$url = BASE_URL . 'dashboard.php'; // Define the URL:
		header("Location: $url");
		exit(); // Quit the script.
}

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include('includes/login.inc.php');
} 

?>
<?php include('includes/header.inc.php'); ?>      
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div id="logincontent" class="maincontent">
                <h2>Featured Project</h2>
                    <div class="row">
                        <div class="span8">
                            <img src="img/slideshow/slideshow_1364618410.jpg">
                            <h3>Real Investment</h3>
                            <p>We provide a wide array of real estate management and advisory services be it property acquisition <a href="expertise.php">[...]</a></p>
                        </div>
                        <div class="span3">
                        <form method="post">
                        	<fieldset><legend>Login</legend>
                            <p>Login to your account to access your latest updates and information.</p>
                             
							  	<?php createFormInput('email') ?>                             
							  	<?php createFormInput('Password','password','password') ?>
                              
                              <div class="control-group">
                                <div class="controls">
                                  <button type="submit" class="btn">Sign in</button>
                                </div>
                              </div>
                              <br class="clear" />
                                
                                <?php alert() ?>
                            </fieldset>
                        </form>
                        </div>
                    </div>
                
                
                </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>
    
        <?php include('includes/footer.inc.php'); ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        
		<script src="js/jquery.organicTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                $("#tab-one").organicTabs();
            });
        </script>
	


        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
