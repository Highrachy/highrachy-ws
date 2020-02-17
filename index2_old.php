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

//Fetch All rows to view the recent content
$query = "SELECT home.id, home.pics, home.link, name,content FROM home INNER JOIN expertise ON home.link = expertise.id ORDER BY RAND() LIMIT 3";
$rows = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
$content = "";
$count = 0;


foreach ($rows as $row){
	$count++;
	$content .= '<div class="span4';
	if ($count == 3) $content .= ' last';
	$content .= '"><img src="img/expertise/'.$row['pics'].'" width="267" height="173" /><h4>'.$row['name'].'</h4><p>'.more($row['content'],90,"").' <a href="expertise.php">[...]</a></p></div>';
	}
	
#-############################################
# SlideShow
#-############################################	
$query = "SELECT name,description,link_text,link_page,slideshow_pics FROM slideshow WHERE show_home='YES' ORDER BY RAND() LIMIT 3";
$slideshow = "";

$table = $db->fetch_all_row($query);
if ($db->total_affected_rows() > 1){	
foreach ($table as $rows){
		$slideshow .= "<div class='oneByOne_item'><img src='img/slideshow/{$rows['slideshow_pics']}' alt='Slideshow Picture of {$rows['name']}'><div class='text_1_1' style='border:4px solid #737375'><h4>{$rows['name']}</h4><p>{$rows['description']}</p><p class='pull-right'><a href='{$rows['link_page']}'><small>{$rows['link_text']}&raquo;</small></a></p></div></div>";
	}
}	
?>
<?php include('includes/header.inc.php'); ?>       
        <!-- Slideshow -->
        <div id="slideshow">
        <div id="slider">
          <?php echo $slideshow ?>
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
                        <?php echo $content ?>
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
