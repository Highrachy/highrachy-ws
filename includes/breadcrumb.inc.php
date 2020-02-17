				<div id="breadcrumb">
                    <div class="pull-left text">
                    <p>You are here: 
                    
                    <?php 
					//Change dashboard to home or home to dashboard
					if (isset($dashboard) && ($dashboard)){
						 $home = "Dashboard";
						 $home_url = "dashboard.php";
					} else { 
						$home = "Home";
						$home_url = "index.php";
					}
						if (($title == "index") || ($title == "dashboard")) echo '<a href="'.$home_url.'">'.$home.'</a>';
						else if (!isset($sub_title)) echo '<a href="'.$home_url.'" class="arrow">'.$home.'</a><a href="#">'.replace($title).'</a>';
						else if (!isset($sub_title2)) echo '<a href="'.$home_url.'" class="arrow">'.$home.'</a><a href="'.$title.'.php" class="arrow">'.replace($title).'</a><a href="#">'.replace($sub_title).'</a>';
						
						else if (!isset($sub_title3)) echo '<a href="'.$home_url.'" class="arrow">'.$home.'</a><a href="'.$title.'.php" class="arrow">'.replace($title).'</a><a href="'.$sub_title.'.php" class="arrow">'.replace($sub_title).'</a><a href="#">'.replace($sub_title2).'</a>';
						
						else  if (!isset($sub_title4)) echo '<a href="'.$home_url.'" class="arrow">'.$home.'</a><a href="'.$title.'.php" class="arrow">'.replace($title).'</a><a href="'.$sub_title.'.php" class="arrow">'.replace($sub_title).'</a><a href="'.$sub_title2.'.php" class="arrow">'.replace($sub_title2).'</a><a href="#">'.replace($sub_title3).'</a>';
						
						else echo '<a href="'.$home_url.'" class="arrow">'.$home.'</a><a href="'.$title.'.php" class="arrow">'.replace($title).'</a><a href="'.$sub_title.'.php" class="arrow">'.replace($sub_title).'</a><a href="'.$sub_title2.'.php" class="arrow">'.replace($sub_title2).'</a><a href="'.$sub_title3.'.php">'.replace($sub_title3).'</a><a href="#">'.replace($sub_title4).'</a>';
					 ?>
                     
                     </p>
                    </div>
                    
                    <!--End of BreadCrumb-->
                    <div class="pull-right">
                        <div class="input-append">
                          <form action="search.php" method="get">
                              <input class="span2" name="q" id="search" placeholder="Search..." type="text">
                              <button class="btn" type="submit"><i class="icon-search"></i></button>
                          </form>
                        </div>
                    </div>
                    <div class="pull-right" id="clogin"><p><a href="http://weprotect.highrachy.com"> Highrachy WeProtect &nbsp;| </a>&nbsp;<a href="sitemap.php"> Sitemap&nbsp; | </a>&nbsp;<a href="career.php"> Careers&nbsp; | </a> </p></div>
                </div><!--End of BreadCrumb-->