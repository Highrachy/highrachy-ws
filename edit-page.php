<?php $dashboard = true; $title = "dashboard"; $script = true; ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['id']))
$id = $_GET['id'];
else $id = 1;

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (empty($_POST['editText'])) {
	$errors[] = "The content of the page cannot be empty";
	} else {
		$data['content'] = $_POST['editText'];
	}
		
		$data['modified'] = "NOW()";
	if (empty($errors)){
		//Used to update
		$value = $db->update_query("edit",$data,"id=$id");
		if ($value == 1) { // If it ran OK.
					redirect('dashboard.php');		
		} else { 
			$errors[] = 'The page could not be updated now, Please try again later';
		}
	
	} 
} 

	// Retrieve the content from the database
	$query = "SELECT id, name, content,modified from edit where id='$id'";
	$rows = $db->fetch_first_row($query);
	$id = $rows['id'];
	$name = $rows['name'];
	$content = $rows['content'];
	$modified = $rows['modified'];
	
	$_POST['editText'] = $content;
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
                          <h2>Edit Tagline</h2>
                          <p> Edit the tagline of </p>
                          <form method="post">
                        	<fieldset><legend><?php echo $name ?> Page</legend>                            
							  	<?php createFormInput('','editText','textarea') ?>
                                <div class="smaller"> <i>Last Modified : <?php echo $modified ?></i></div>
                              <div class="control-group">
                                <div class="controls">
                                  <button type="submit" class="btn">Update</button>
                                </div>
                              </div>
                              <br class="clear" />
                                
                                <?php alert() ?>
                            </fieldset>
                        </form>
                        
                        
                        
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
