<?php $title = "about" ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


//Fetch All rows to view the recent content
$query = "SELECT id, name, content, priority FROM about ORDER BY priority, name DESC";
$rows = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
$content = "";
$count = 0;

foreach ($rows as $row){
	$count++;
	$content .= '<div class="span4';
	if (($count % 3 ) == 0) $content .= ' last ';
	$content .= '"><h3>'.$row['name'].'</h3><p>'.$row['content'].'</p></div>';	
	 
	}
                              

//Get the Tagline
$query = "SELECT content FROM edit where id='2'";
$rows = $db->fetch_first_row($query);
$tagline = $rows['content'];
?>
<?php include('includes/header.inc.php'); ?>
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div id="index-content" class="maincontent">
                        <h2>About Us</h2>
                        <p class="lead"><?php echo strip_tags($tagline) ?></p>
                        
                        <!-- Page Break -->
                        <div class="break"></div>
                        
                       <?php echo $content ?>
                        
                        <div class="clearfix"></div>
                        
                        <!-- Page Break -->
                        <div class="break"></div>
                        
                        
                        <aside>
                        	<div>
                            	<h3>Our Partners</h3>
                                <ul class="inline unstyled">
                                	<li class="pad30"><a href="#"><img src="img/hauba.jpg"></a></li>
                                	<li class="pad30"><a href="#"><img src="img/highrachy_interactive.jpg"></a></li>
                                	<li class="pad30"><a href="#"><img src="img/browncoughar.jpg"></a></li>
                            </div>
                            
                        </aside>
                    
                    </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>
     
    
        <?php include('includes/footer.inc.php'); ?>
    </body>
</html>
