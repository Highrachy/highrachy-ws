<?php $title = "solutions"; $script= true; ?>
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
//   479 6128 8706 2491
//   }

// }

$count = 0;

//}

//Get the Tagline
$query = "SELECT content FROM edit where id='4'";
$rows = $db->fetch_first_row($query);
$tagline = $rows['content'];

$query = "SELECT solutions.id,solutions.name as name,icons.name as icons_name FROM solutions INNER JOIN icons ON solutions.icons_id = icons.id WHERE link = 0";
$table = $db->fetch_all_row($query);
$option = "";
$count = 0;
foreach ($table as $row){
  $count++;
  $option .= '<li class="';
  if ($row['id'] == $id) $option .= 'active';
  $option .= '"><a href="solutions.php?page='.$row['id'].'"'.' title="'.$row['name'].'" class="tipsy';
  $option .= '"><span><i class="'.str_replace("icon-", "fa fa-", $row['icons_name']).'"></i>&nbsp;'.$row['name'].'</span></a></li>';
  // $option .= '><i class="'.$row['i_name'].'"></i>&nbsp;'.truncate($row['name'],15).'</a></li>';
}
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
  background-color: #f5f5f5; 
  color: #767676; 
  font-size: 12px; 
  letter-spacing:2px; 
  font-weight: 400; 
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
  line-height: 23px;
}
.panel-heading i { 
  font-size:10px; 
  margin: 0;
}
.collapsed .fa-minus:before {
    content: "\f067";
}
.active-accordion h4 { font-weight: 600}
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
                        <div class="panel-group solutions-accordion" id="accordion-one">
                            <!-- accordion item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-one" href="#accordion-one-link1" class="collapsed"><h4 class="panel-title">Accordion Item #1<span class="pull-right"><i class="fa fa-minus"></i></span></h4></a>
                                </div>
                                <div id="accordion-one-link1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion item -->
                            <!-- accordion item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-one" href="#accordion-one-link2" class="collapsed"><h4 class="panel-title">Accordion Item #2<span class="pull-right"><i class="fa fa-minus"></i></span></h4></a>
                                </div>
                                <div id="accordion-one-link2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion item -->
                            <!-- accordion item -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion-one" href="#accordion-one-link3" class="collapsed"><h4 class="panel-title">Accordion Item #3<span class="pull-right"><i class="fa fa-minus"></i></span></h4></a>
                                </div>
                                <div id="accordion-one-link3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion item -->
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
