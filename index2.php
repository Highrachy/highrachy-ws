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
$query = "SELECT home.id, home.pics, home.link, name,content FROM home INNER JOIN expertise ON home.link = expertise.id ORDER BY expertise.id LIMIT 3";
$recent_contents = $rows = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
$content = "";
$count = 0;


foreach ($rows as $row){
  $count++;
  $content .= '<div class="col-sm-6 col-md-4';
  $content .= '"><img src="img/expertise/'.$row['pics'].'" class="img-responsive" /><h4>'.$row['name'].'</h4><p>'.more($row['content'],100,"").' <a href="expertise2.php">[...]</a></p><br></div>';
  }

#-############################################
# SlideShow
#-############################################
$query = "SELECT name,description,link_text,link_page,slideshow_pics FROM slideshow WHERE show_home='YES' ORDER BY RAND() LIMIT 3";
$slideshow = "";

$slideshows = $table = $db->fetch_all_row($query);
$total_slideshow = $db->total_affected_rows();
if ($db->total_affected_rows() > 1){
foreach ($table as $rows){
    $slideshow .= "<div class='oneByOne_item'><img src='img/slideshow/{$rows['slideshow_pics']}' alt='Slideshow Picture of {$rows['name']}'><div class='text_1_1' style='border:4px solid #737375'><h4>{$rows['name']}</h4><p>{$rows['description']}</p><p class='pull-right'><a href='{$rows['link_page']}'><small>{$rows['link_text']}&raquo;</small></a></p></div></div>";
  }
}
?>
<?php include('includes/header2.inc.php'); ?>
      <div class="row">

        <div id="myCarousel" class="carousel slide">

          <ol class="carousel-indicators hidden-xs">
            <?php for ($i=0; $i < $total_slideshow; $i++){
             echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"';
             if ($i == 0 ) echo ' class="active"';
             echo '></li>';
             } ?>
          </ol>

          <div class="carousel-inner">
            <?php $count=0; foreach ($slideshows as $slideshow) {  $count++;?>

            <!-- Slide 1 -->
            <div class="item<?php if ($count == 1) echo " active"; ?>">
              <img src='img/slideshow/<?php echo $slideshow['slideshow_pics'] ?>' alt='Slideshow Picture of <?php echo $slideshow['name'] ?>'>
              <div class="carousel-caption caption-right">
                <h4><?php echo $slideshow['name'] ?></h4>
                <?php echo $slideshow['description'] ?>
                <a class="pull-right" href="<?php echo $slideshow['link_page'] ?>"><?php echo $slideshow['link_text']; ?>&raquo;</a>
              </div>
            </div>
            <?php } ?>
          </div>
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="fa fa-prev"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="fa fa-next"></span>
          </a>
        </div>

      </div>
     </div>
     <!--End of Top Container-->

     <section>
      <div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb2.inc.php'); ?>
                <div id="index-content" class="maincontent">
                        <h2>The Solutions Expert</h2>
                        <!-- <p class="lead"><?php echo str_ireplace('<p>','',str_ireplace('</p>','',$tagline)) ?></p> -->
                        <div class="lead"><?php echo $tagline ?></div>

                        <!-- Page Break -->
                        <div class="break"></div>

                        <!-- Our Expertise -->
                        <div class="center-content">
                          <h3>Our Expertise</h3>
                          <div class="row">
                            <?php echo $content ?>
                          </div>
                        </div>
                        <!-- End of Our Expertise -->

                        <div class="clearfix"></div>
                    </div>
                <!-- End of Main Content -->
            </div>
      </div>
     </section>


        <?php include('includes/footer2.inc.php'); ?>

    </body>
</html>
