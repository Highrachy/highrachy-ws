				<div id="breadcrumb">
                    <div class="col-sm-6 pull-left text">
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
						else if (!isset($sub_title)) echo '<a href="'.$home_url.'" class="arrow hidden-xs">'.$home.'</a><a href="#">'.replace($title).'</a>';
						else if (!isset($sub_title2)) echo '<a href="'.$home_url.'" class="arrow hidden-xs">'.$home.'</a><a href="'.$title.'.php" class="arrow hidden-xs">'.replace($title).'</a><a href="#">'.replace($sub_title).'</a>';

						else if (!isset($sub_title3)) echo '<a href="'.$home_url.'" class="arrow hidden-xs">'.$home.'</a><a href="'.$title.'.php" class="arrow hidden-xs">'.replace($title).'</a><a href="'.$sub_title.'.php" class="arrow hidden-xs">'.replace($sub_title).'</a><a href="#">'.replace($sub_title2).'</a>';

						else  if (!isset($sub_title4)) echo '<a href="'.$home_url.'" class="arrow hidden-xs">'.$home.'</a><a href="'.$title.'.php" class="arrow hidden-xs">'.replace($title).'</a><a href="'.$sub_title.'.php" class="arrow hidden-xs">'.replace($sub_title).'</a><a href="'.$sub_title2.'.php" class="arrow hidden-xs">'.replace($sub_title2).'</a><a href="#">'.replace($sub_title3).'</a>';

						else echo '<a href="'.$home_url.'" class="arrow hidden-xs">'.$home.'</a><a href="'.$title.'.php" class="arrow hidden-xs">'.replace($title).'</a><a href="'.$sub_title.'.php" class="arrow hidden-xs">'.replace($sub_title).'</a><a href="'.$sub_title2.'.php" class="arrow hidden-xs">'.replace($sub_title2).'</a><a href="'.$sub_title3.'.php">'.replace($sub_title3).'</a><a href="#">'.replace($sub_title4).'</a>';
					 ?>

                     </p>
                    </div>
                    <!--End of BreadCrumb-->


                    <div class="col-sm-3" id="clogin">
                        <p class="text-right">
                            <a href="<?php echo $facebook ?>" target="_blank" class="gray facebook_icon"> <span class="fa fa-facebook"></span> </a>&nbsp;
                            <a href="<?php echo $twitter ?>" target="_blank" class="gray twitter_icon"> <span class="fa fa-twitter"></span> </a>&nbsp;
                            <a href="<?php echo $linked ?>" target="_blank" class="gray linkedin_icon"> <span class="fa fa-linkedin"></span> </a>

                        </p>
                    </div>

                    <div class="col-sm-3 hidden-xs">
                        <form role="form" action="search.php" method="post">

                            <div class="input-group">
                             <input id="search" name="q" type="text" class="form-control input-sm" placeholder="Search...">
                              <span class="input-group-btn">
                                <button class="btn btn-default btn-sm" type="submit"><i class="icon-search"></i></button>
                              </span>
                            </div><!-- /input-group -->
                        </form>
                    </div>

                </div><!--End of BreadCrumb-->