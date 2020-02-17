<?php $title = "solutions"; $script= true; ?>
<?php
include('includes/config.inc.php');
require(DB);
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Fetch All rows to view the recent content
$query = "SELECT id, name, content FROM solutions2  WHERE link= 0 ORDER BY PRIORITY DESC";
$headings = $db->fetch_all_row($query);
$total = $db->total_affected_rows();

//Fetch All rows to view the recent content
$query = "SELECT id, name, content,link FROM solutions2  WHERE link <> 0 ORDER BY PRIORITY DESC";
$contents = $db->fetch_all_row($query);
$total = $db->total_affected_rows();


$count = 0;

//Get the Tagline
$query = "SELECT content FROM edit where id='4'";
$rows = $db->fetch_first_row($query);
$tagline = $rows['content'];

// $query = "SELECT solutions.id,solutions.name as name,icons.name as icons_name FROM solutions INNER JOIN icons ON solutions.icons_id = icons.id WHERE link = 0";
// $table = $db->fetch_all_row($query);
// $option = "";
// $count = 0;
// foreach ($table as $row){
//   $count++;
//   $option .= '<li class="';
//   if ($row['id'] == $id) $option .= 'active';
//   $option .= '"><a href="solutions.php?page='.$row['id'].'"'.' title="'.$row['name'].'" class="tipsy';
//   $option .= '"><span><i class="'.str_replace("icon-", "fa fa-", $row['icons_name']).'"></i>&nbsp;'.$row['name'].'</span></a></li>';
//   // $option .= '><i class="'.$row['i_name'].'"></i>&nbsp;'.truncate($row['name'],15).'</a></li>';
// }
?>
<?php include('includes/header2.inc.php'); ?>
<style>
  
/* accordions */
.panel{
  border-top:1px solid rgba(0,0,0,.15);
}
.solutions-accordion{
  border:1px solid rgba(0,0,0,.15);
  border-top:none;
  margin-bottom:40px;
}
.panel > div {
  transition-duration: .2s; 
  -moz-transition-duration: .2s; 
  -webkit-transition-duration: initial; 
  -o-transition-duration: .2s; 
}
.panel-heading {
  padding:0 ; 
}
h4.panel-title { 
  background-color: #fafafa; 
  color: #333; 
  font-size: 16px; 
  letter-spacing:1px; 
  font-weight: 600; 
  width:100%; 
  display: block; 
  padding: 15px 18px; 
  border: none; 
  margin: 0; 
  padding:20px 25px; 
  position: relative; 
}
.panel-title span { 
  position: absolute; 
  right: 25px; 
  top: 20px;
}
.panel-body { 
  padding: 20px 60px 25px 25px; 
  background-color:#fff; 
  font-size: 13px; 
  border-top:1px solid rgba(0,0,0,.15);
  line-height: 23px;
}
.panel-heading i { 
  font-size:10px; 
  margin: 0;
}
.collapsed .fa-minus:before {
    content: "\f067";
}

.collapsed > h4{
  color:#767676;
  font-weight:400;
}
.active-accordion h4 { font-weight: 600; }
</style>
     </div>
     <!--End of Top Container-->

     <section>
      <div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb2.inc.php'); ?>
                <div class="maincontent">
                    <div id="tab-one">
                      <div class="col-xs-12">
                          <!-- Tab panes -->
                          <div class="tab-content">

                          <h2>Our Solutions<?php //echo $page_name ?></h2>
                          <div class="lead"><?php echo $tagline ?></div>
                          <div class="break"></div>

                          <?php $count=1; foreach($headings as $heading) : ?>

                          <h3><?php echo $heading['name'] ?></h3>
                          <div class="panel-group solutions-accordion" id="accordion-one">

                            <?php  foreach($contents as $content) : 
                              if ($heading['id'] == $content['link']) :?>
                            <!-- accordion item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-one" href="#accordion-one-link<?php echo $count ?>" class="collapsed"><h4 class="panel-title"> <?php echo $content['name'] ?><span class="pull-right"><i class="fa fa-minus"></i></span></h4></a>
                                </div>
                                <div id="accordion-one-link<?php echo $count ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php echo $content['content'] ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion item -->
                            <?php $count++; endif; endforeach; ?>
                          </div>
                          <div class="clearfix"></div>
                          <?php endforeach; ?>

                          </div>
                      </div>
                    </div>
                      <!-- END Tab One -->
                </div>
                <!-- End of Main Content -->
            </div>
      </div>
     </section>

        <?php include('includes/footer2.inc.php'); ?>
    </body>
</html>
