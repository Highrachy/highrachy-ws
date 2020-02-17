<?php $dashboard = true; $title = "dashboard_slideshow"; $sub_title = "edit_slideshow"; ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$showInfo = false;
//Check if the product id is set
if (isset($_GET['s'])){
	$showInfo = true;
	$slideshow_id = $_GET['s'];
	
	//If the product id is set but it is not defined
	if ($slideshow_id == ""){
		$errors[] = "Please select the Slideshow you wish to edit";
		$showInfo = false;
	}  else {
		//The product id is defined
		
		//Display information to the user.
		$query = "SELECT name, description,link_text,link_page, slideshow_pics,show_home FROM slideshow WHERE slideshow_id = '$slideshow_id'";
		$table = $db->fetch_first_row($query);
		$total_rows = $db->total_affected_rows();
		
		//Check if the total_rows is less than 1
		if ($total_rows < 1) {
			$errors[] = "The selected Slideshow is not in the database";
			$showInfo = false;
		} else {
			
			//If What the user has posted is empty, assign result to the $_POST global variable
			if (empty($_POST))
			$_POST = $table;
			
			//Get All the information from the database.
			$name = $table['name'];
			$link_text = $table['link_text'];
			$link_page = $table['link_page'];
			$description = $table['description'];
			$show_home = $table['show_home'];
			$pics = $table['slideshow_pics'];
			
			$link_option = "";
			// Retrieve the content from the database
			$query = "SELECT id, name from expertise WHERE link<>0 ORDER BY  `expertise`.`name` ASC";
			$rows = $db->fetch_all_row($query);
			foreach ($rows as $row){
				$link_option .= "<option value='expertise.php?page={$row['id']}'";
				if ($link_page == "expertise.php?page={$row['id']}") $link_option .= " selected";
				$link_option .= ">{$row['name']}</option>";
			}
			$query = "SELECT id, name from solutions WHERE link<>0 ORDER BY  `solutions`.`name` ASC";
			$rows = $db->fetch_all_row($query);
			foreach ($rows as $row){
				
				$link_option .= "<option value='solutions.php?page={$row['id']}'";
				if ($link_page == "solutions.php?page={$row['id']}") $link_option .= " selected";
				$link_option .= ">{$row['name']}</option>";
			}
			
		}
	}
}

//The slideshow_id is not defined, force user to select the slideshow image
if (!$showInfo) {
	//Get a list of all the products in the database.
	$query = "SELECT slideshow_id, name FROM slideshow ORDER BY slideshow.name ASC";
	$table = $db->fetch_all_row($query);
	$option = "<option>- Select Slideshow Image-</option>";
	foreach ($table as $row){
		$option .= "<option value='".$row['slideshow_id']."'>".$row['name']."</option>";
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
               			 <?php include('includes/dash-nav.inc.php'); ?>
                      <div class="list-wrap">
                      
                          <h2>Edit Slideshow</h2>
                      	<?php if ($showInfo) { ?>
                                                	<form method="post" id="custom" enctype="multipart/form-data">   
                                                     
                                                    <label>Slideshow Picture </label><img src="img/slideshow/<?php echo $pics ?>" alt="Picture of <?php echo $name ?>" height="80" width="150">
                                                     <br><br>                       
							  	 					<label for="name">Image Name</label><input type="text" name="name" id="name" value="<?php echo $name ?>" disabled>
                                                    <label for="link_text">Link Text</label><input type="text" name="link_text" id="link_text" placeholder="" value="<?php echo $link_text ?>" disabled>                      
                                                     <label>Link Page</label><input type="text" name="link_page" id="link_page" placeholder="" value="<?php echo $link_page ?>" disabled>   
                                                     <label>Show on HomePage</label>
                                                        <select name="show_home" disabled>
                                                            <option <?php if ($show_home == "YES") echo "selected=selected " ?>value="YES">YES</option>
                                                            <option <?php if ($show_home == "NO") echo "selected=selected " ?>value="NO">NO</option></select>       
                                                    <label>Description</label><textarea name="description" id="description" class="text-input" rows="10" cols="80" disabled><?php echo $description ?></textarea>           
                                     <div>
									<a href="edit-slideshow.php?s=<?php echo $slideshow_id ?>"  class="btn">Edit Slideshow</a>
                                    </div>

                                <?php alert() ?>
                            </fieldset>
                        </form>
                                                <?php } else { ?>
                                                	
                                                	<form id="custom" action="" method="get" enctype="multipart/form-data">
                                                        <label for="s">Select Slideshow
                                                        </label>
                                                             <select name="s">
                                                                <?php echo $option ?>
                                                            </select>
                                                        <div class="align-right pad30">
                                                        <input type="submit" class="btn" value="Edit Slideshow">
                                                        </div>
                                                      <div class="clearfix"></div>
                                                    
												<?php alert(); ?>
                                                    </form>
                                                <?php } ?>
                        
                        
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

		<?php include('includes/tinymce.inc.php'); ?>
    </body>
</html>
