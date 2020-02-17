<?php $title = "search" ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$product = $about_page = $expertise_page = $solutions_page = $edit_page = "";
$search_details = $product_search_title = $pages_search_title = $search_category = "";
$found = $pages_no = $product_no = $product_count = $count = 0;
$show_info = false;
$search_number = "";

function wrapTag($inVal){
	return '<b class="red">'.$inVal. '</b>';
}

//Get the query term
	if ((isset($_GET['q'])) && ($_GET['q'] != "")) {
		$show_info = true;
		$search_term = $_GET['q'];
		//Split into different words and store the array into the variable single_word
		
		if ((isset($_GET['s'])) && ($_GET['s'] != "")) $search_category = $_GET['s'];
		
		$single_word = explode(" ",$search_term);
		
		//Breaking the string to array of words
		$product_query = $page_query = $page_order = "";
		
		//Build the search query by using the array of words that might be listed by the user
		while(list($key,$val) = each($single_word)){
			if ($val <> " " and strlen($val)>0){
				$product_query .= "name LIKE '%$val%' OR ";
				$page_query .="name LIKE '%$val%' OR content LIKE '%$val%' OR ";
				$page_order .= "name LIKE '%$val%' OR ";
			}
		}
		
		//perform the function of each word in the single word variable by using the array map
		$replace = array_map('wrapTag',$single_word);
	
		//Remove the last 'OR' after building the query
		$product_query = substr($product_query,0,(strlen($product_query) - 3));		
		$page_query = substr($page_query,0,(strlen($page_query) - 3));	
		$page_order = substr($page_order,0,(strlen($page_order) - 3));
		
		//Check if the category is not pages
		if (strtolower($search_category) != "pages") {
			//Search for the product in the database
			$query = "SELECT * FROM product WHERE $product_query ORDER BY modified DESC";
			$rows = $db->fetch_all_row($query);
			$product_no = $db->total_affected_rows();
			if ($product_no < 1){
				$show_info = false;
			} else {
				$show_info = true;
				foreach ($rows as $row){
					$product_count++;
					$id = $row['id'];
					$name = $row['name'];
					$pics= $row['product_pics'];
					$name_changed = str_replace($single_word,$replace,$name);
					$product .= '<li class="span4"><h4> '.$name_changed.'</h4><img src="img/product/'.$pics.'" alt="'.$name.'" width="150" /></li>';	
				}	
				$product .='<div class="clearfix">&nbsp;</div>';
			}
		}
		
		//Check if the category is not products
		if (strtolower($search_category) != "products") {
			//Search for the page in the edit table name
			$query = "SELECT * FROM edit WHERE $page_query AND content IS NOT NULL AND content <> '' ORDER BY $page_order";
			$rows = $db->fetch_all_row($query);
			$pages_no = $pages_no + $db->total_affected_rows();
			if ($db->total_affected_rows() >= 1){
				$show_info = true;
				foreach ($rows as $row){
					$count++;
					$page_id = $row['id'];
					$page_name = $row['name'];
					$page_content = strip_tags($row['content']);
					$page_url = "about.php?page=$page_id";
					
					$page_content = strip_tags($page_content);	
					
					
					//Extract the search term from the page.
					$page_piece ="";
					foreach($single_word as $tmp){
					$pos = strpos($page_content,$tmp);
						if (strpos($page_content,$tmp) !==false){
							if (strlen($page_content) < 250)//The description is less than 250
								$page_piece = $page_content;
							else if ((strlen($page_content) - $pos) > 250)//The description is in the begining of the description
								$page_piece = substr($page_content,0, 250)." ...";
							else if ((strlen($page_content) - $pos) < 250)//The description is in the end of the description
								$page_piece =  "...".substr($page_content, (2*(strlen($page_content) - $pos)-250), 250);
							else $page_piece = "...".substr($page_content, $pos-50, 250);
						} else if(strlen($page_content) < 250) {$page_piece = $page_content;}
						else $page_piece = substr($page_content,0, 250)." ...";
					}
					//Replace the word by making the selection bold
					$page_piece = str_replace($single_word,$replace,$page_piece);
					//if ($page_piece == "") $page_piece = substr($page_content,0,250)." ...";
					// $edit_page .= "<li><h4><a href='$page_url'>$page_name</a></h4><p><a class='search' href='$page_url'>$page_piece</a></p></li>";	

					return $page_piece;
					
				}
			}
			
			
			//Search for the page in the about table name
			$query = "SELECT * FROM about WHERE $page_query AND content IS NOT NULL AND content <> '' ORDER BY $page_order";
			$rows = $db->fetch_all_row($query);
			$pages_no = $pages_no + $db->total_affected_rows();
			if ($db->total_affected_rows() >= 1){
				$show_info = true;
				foreach ($rows as $row){
					$count++;
					$page_id = $row['id'];
					$page_name = $row['name'];
					$page_content = strip_tags($row['content']);
					$page_url = "about.php?page=$page_id";
					
					$page_content = strip_tags($page_content);	
					
					
					//Extract the search term from the page.
					$page_piece ="";
					foreach($single_word as $tmp){
					$pos = strpos($page_content,$tmp);
						if (strpos($page_content,$tmp) !==false){
							if (strlen($page_content) < 250)//The description is less than 250
								$page_piece = $page_content;
							else if ((strlen($page_content) - $pos) > 250)//The description is in the begining of the description
								$page_piece = substr($page_content,0, 250)." ...";
							else if ((strlen($page_content) - $pos) < 250)//The description is in the end of the description
								$page_piece =  "...".substr($page_content, (2*(strlen($page_content) - $pos)-250), 250);
							else $page_piece = "...".substr($page_content, $pos-50, 250);
						} else if(strlen($page_content) < 250) {$page_piece = $page_content;}
						else $page_piece = substr($page_content,0, 250)." ...";
					}
					//Replace the word by making the selection bold
					$page_piece = str_replace($single_word,$replace,$page_piece);
					$edit_page .= "<li><h4><a href='$page_url'>$page_name</a></h4><p><a class='search' href='$page_url'>$page_piece</a></p></li>";	
					
				}
			}
			
			
			
			//Search for the page in the expertise table name
			$query = "SELECT * FROM expertise WHERE $page_query AND content IS NOT NULL AND content <> '' ORDER BY $page_order";
			$rows = $db->fetch_all_row($query);
			$pages_no = $pages_no + $db->total_affected_rows();
			if ($db->total_affected_rows() >= 1){
				$show_info = true;
				foreach ($rows as $row){
					$count++;
					$page_id = $row['id'];
					$page_name = $row['name'];
					$page_content = strip_tags($row['content']);
					$page_url = "expertise.php?page=$page_id";
					
					$page_content = strip_tags($page_content);	
					
					
					//Extract the search term from the page.
					$page_piece ="";
					foreach($single_word as $tmp){
					$pos = strpos($page_content,$tmp);
						if (strpos($page_content,$tmp) !==false){
							if (strlen($page_content) < 250)//The description is less than 250
								$page_piece = $page_content;
							else if ((strlen($page_content) - $pos) > 250)//The description is in the begining of the description
								$page_piece = substr($page_content,0, 250)." ...";
							else if ((strlen($page_content) - $pos) < 250)//The description is in the end of the description
								$page_piece =  "...".substr($page_content, (2*(strlen($page_content) - $pos)-250), 250);
							else $page_piece = "...".substr($page_content, $pos-50, 250);
						} else if(strlen($page_content) < 250) {$page_piece = $page_content;}
						else $page_piece = substr($page_content,0, 250)." ...";
					}
					//Replace the word by making the selection bold
					$page_piece = str_replace($single_word,$replace,$page_piece);
					//if ($page_piece == "") $page_piece = substr($page_content,0,250)." ...";
					$edit_page .= "<li><h4><a href='$page_url'>$page_name</a></h4><p><a class='search' href='$page_url'>$page_piece</a></p></li>";		
					
				}
			}
			
			//Search for the page in the solutions table name
			$query = "SELECT * FROM solutions WHERE $page_query AND content IS NOT NULL AND content <> '' ORDER BY $page_order";
			$rows = $db->fetch_all_row($query);
			$pages_no = $pages_no + $db->total_affected_rows();
			if ($db->total_affected_rows() >= 1){
				$show_info = true;
				foreach ($rows as $row){
					$count++;
					$page_id = $row['id'];
					$page_name = $row['name'];
					$page_content = strip_tags($row['content']);
					$page_url = "solutions.php?page=$page_id";
					
					$page_content = strip_tags($page_content);	
					
					
					//Extract the search term from the page.
					$page_piece ="";
					foreach($single_word as $tmp){
					$pos = strpos($page_content,$tmp);
						if (strpos($page_content,$tmp) !==false){
							if (strlen($page_content) < 250)//The description is less than 250
								$page_piece = $page_content;
							else if ((strlen($page_content) - $pos) > 250)//The description is in the begining of the description
								$page_piece = substr($page_content,0, 250)." ...";
							else if ((strlen($page_content) - $pos) < 250)//The description is in the end of the description
								$page_piece =  "...".substr($page_content, (2*(strlen($page_content) - $pos)-250), 250);
							else $page_piece = "...".substr($page_content, $pos-50, 250);
						} else if(strlen($page_content) < 250) {$page_piece = $page_content;}
						else $page_piece = substr($page_content,0, 250)." ...";
					}
					//Replace the word by making the selection bold
					$page_piece = str_replace($single_word,$replace,$page_piece);
					//if ($page_piece == "") $page_piece = substr($page_content,0,250)." ...";
					$edit_page .= "<li><h4><a href='$page_url'>$page_name</a></h4><p><a class='search' href='$page_url'>$page_piece</a></p></li>";	
					
				}
			}
		}
		
		if ($search_category == "pages"){
			$found = $pages_no;
			if (($found == 1)) $search_details ="<h3>$found Page found for <i>'$search_term'</i></h3>"; 
			else if (($found > 1)) $search_details ="<h3>$found Pages found for <i>'$search_term'</i></h3>";
			else $search_details ="<h3>No Page found for <i>'$search_term'</i></h3>";	
		} else if ($search_category == "products"){
			
			$found = $product_no;
			if (($found == 1)) $search_details ="<h3>$found Product found for <i>'$search_term'</i></h3>"; 
			else if (($found > 1)) $search_details ="<h3>$found Products found for <i>'$search_term'</i></h3>";
			else $search_details ="<h3>No Product found for <i>'$search_term'</i></h3>";
		
		} else {
			$found = $pages_no + $product_no;
			if (($found == 1)) $search_details ="<h3>$found Match found for <i>'$search_term'</i></h3>"; 
			else if (($found > 1)) $search_details ="<h3>$found Matches found for <i>'$search_term'</i></h3>";
			else $search_details ="<h3>No Match found for <i>'$search_term'</i></h3>";
		}
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
                      <ul class="nav unstyled">
                        <li class="nav-li"><a href="career.php"><i class="icon-briefcase"></i>&nbsp;Careers</a></li>
                        <li class="nav-li"><a href="search.php" class="current"><i class="icon-search"></i>&nbsp;Search</a></li>
                      	<li class="nav-li first"><a href="sitemap.php"><i class="icon-tasks"></i>&nbsp;Sitemap</a></li>
                      </ul>
                      <div class="list-wrap">
                          <h2>Search Result</h2>
                          <div class="input-append">
                          <form class="search" action="search.php" method="get">
                          	<div>
                              <input class="span7 pad_input" name="q" id="search" placeholder="Type Something Here..." type="text">
                              <button class="btn pad_input" type="submit"><i class="icon-search"></i><b>Search</b></button>
                              </div>
                              <div class="offset2">
                                <label class="radio inline">
                                  <input type="radio" name="s" id="all" value="all" checked>
                                  All&nbsp;&nbsp;&nbsp;
                                </label>
                                <label class="radio inline">
                                  <input type="radio" name="s" id="products" value="products">Products Only&nbsp;&nbsp;&nbsp;
                                </label>
                                <label class="radio inline">
                                  <input type="radio" name="s" id="pages" value="pages">Pages Only&nbsp;&nbsp;&nbsp;
                                </label>
                             </div>
                          </form>
                          </div>
                          <?php  echo $search_details; //Give the total number of search made ?>
                          <?php //echo $product_search_title; //Give the total number of products return ?>
                          <ol>
                           <?php echo $product ?>
                          <div class="clearfix"></div>
                          <?php //echo $pages_search_title ?>
                          <?php echo $edit_page; ?>
                           <?php echo $search_number ?>
                          </ol>
                        
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
    </body>
</html>
