<?php $title = "solutions"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if (isset($_GET['page']))
	$id = $_GET['page'];
else $id = '1';



$query = "SELECT solutions.name as e_name FROM solutions WHERE solutions.id =$id";
$rows = $db->fetch_all_row($query);
$e_name = $i_name = "";
if ($db->total_affected_rows() == 1){
	foreach($rows as $row){
	$page_name =$row['e_name'];
	}
}
else redirect("dashboard_solutions.php");

//Fetch All rows to view the recent content
$query = "SELECT id, name, content, priority FROM solutions  WHERE link=$id ";
$contents = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
// foreach ($rows as $row){
//   if ($total == 1)
//   $content .= '<h3>'.$row['name'].'</h3><article>'.$row['content'].'</article>';
//   else {
//   $count++;
//   $content .= '<div class="span4';
//   if ($count % 2 == 1) $content .= ' pad30';
//   $content .= '"><h3>'.$row['name'].'</h3><p>'.$row['content'].'</p></div>';
   
//   }
                              
// }

$count = 0;
                              
//}

//Get the Tagline
$query = "SELECT content FROM edit where id='4'";
$rows = $db->fetch_first_row($query);
$tagline = $rows['content'];

$query = "SELECT solutions.id,solutions.name as name,icons.name as i_name FROM solutions INNER JOIN icons ON solutions.icons_id = icons.id WHERE link = 0";
$table = $db->fetch_all_row($query);
$option = "";
$count = 0;
foreach ($table as $row){
	$count++;
	$option .= '<li class="nav-li';
	if ($count == 1) $option .= ' first';
	$option .= '"><a href="solutions.php?page='.$row['id'].'"'.' title="'.$row['name'].'" class="tipsy';
	if ($row['id'] == $id) $option .= ' current';
  $option .= '"><i class="'.$row['i_name'].'"></i>&nbsp;'.truncate($row['name'],20).'</a></li>';
	// $option .= '><i class="'.$row['i_name'].'"></i>&nbsp;'.truncate($row['name'],15).'</a></li>';
}
?>
<?php include('includes/header.inc.php'); ?>      
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div class="maincontent">
                    <div id="tab-one">
                      <ul class="nav unstyled"><?php echo $option ?></ul>
                      <div class="list-wrap">
                          <h2><?php echo $page_name ?></h2>
                          <div class="lead"><?php echo $tagline ?></div> 
                          <!-- <div class="lead"><?php echo strip_tags($tagline) ?></div>  -->
                          <div class="break"></div>
                           <div class="row">
                            <dl class="accordion">
                              <?php foreach($contents as $content) : ?>
                              <dt><h3><?php echo $content['name'] ?><i class="pull-right icon-plus"></i></h3></dt>
                              <dd><?php echo $content['content'] ?></dd>
                              <?php endforeach ?>
                            </dl>
                           </div>
                          <div class="clearfix"></div>
                        
                      </div>
                      <!-- END List Wrap -->
                      <div class="list-wrap-bottom"></div>
                    </div>
                      <!-- END Tab One -->
                </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>
    
        <?php include('includes/footer.inc.php'); ?>

         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/accordion.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.accordion').accordion({
                open: false, // First List Open, Default Value: false
                autoStart: false, // Auto Start, Default Value: false
                onHoverActive: false, // On Hover Active, Default Value: false
                slideInterval: 3000, // Expression at specified intervals (in milliseconds) Default Value: 3000
                duration: 'slow', // The default duration is slow. The strings 'fast' and 'slow' can be supplied to indicate durations of 200 and 600 milliseconds, respectively.
                easing: 'swing', //  An easing function specifies the speed at which the animation progresses at different points within the animation.
              });
        });
    </script>
        <script src="js/tooltipsy.min.js"></script>
        <script type="text/javascript">
           $(function () {
             $('.tipsy').tooltipsy();
          });
            
        </script>

    </body>
</html>
