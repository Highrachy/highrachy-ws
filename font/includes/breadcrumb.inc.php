				<div id="breadcrumb">
                    <div class="pull-left text">
                    <p>You are here: 
                    
                    <?php 
					//Change dashboard to home or home to dashboard
					if (isset($dashboard) && ($dashboard)) $home = "Dashboard"; else $home = "Home";
						if ($title == "index") echo '<a href="index.php">'.$home.'</a>';
						else if (!isset($sub_title)) echo '<a href="index.php" class="arrow">'.$home.'</a><a href="#">'.ucfirst($title).'</a>';
						else if (!isset($sub_title2)) echo '<a href="index.php" class="arrow">'.$home.'</a><a href="'.$title.'.php" class="arrow">'.ucfirst($title).'</a><a href="#">'.ucfirst($sub_title).'</a>';
						
						else if (!isset($sub_title3)) echo '<a href="index.php" class="arrow">'.$home.'</a><a href="'.$title.'.php" class="arrow">'.ucfirst($title).'</a><a href="'.$sub_title.'.php" class="arrow">'.ucfirst($sub_title).'</a><a href="#">'.ucfirst($sub_title2).'</a>';
						
						else echo '<a href="index.php" class="arrow">'.$home.'</a><a href="'.$title.'.php" class="arrow">'.ucfirst($title).'</a><a href="'.$sub_title.'.php" class="arrow">'.ucfirst($sub_title).'</a><a href="'.$sub_title2.'.php" class="arrow">'.ucfirst($sub_title2).'</a><a href="#">'.ucfirst($sub_title3).'</a>';
					 ?>
                     
                     </p>
                    </div>
                </div><!--End of BreadCrumb-->