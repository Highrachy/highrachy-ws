<form name="form1" method="post" action="">
  <?php CheckBox("week","Mon",true,"disabled"); ?>
  <label for="week">Monday</label>
  <?php CheckBox("week","Tues",true) ?>
  <label for="week">Tuesday</label>
  <?php CheckBox("week","Weds",true) ?>
  <label for="week">Wednesday</label>
  <?php CheckBox("week","Thurs",true) ?>
  <label for="week">Thursday</label>
  <input name="" type="submit">
</form>
<?php 
function Text($name, $value=false,$others=false) {
	//Check the Value
	if (!$value) $value = checkValue($name);
	
	//Start Creating the TextBox
	echo '<input type="text" name="' . $name . '" id="' . $name . '"';
	
	// Add the value to the input:
	if ($value) echo ' value="' . htmlspecialchars($value) . '"';
	
	//Add additional attributes
	if ($others) echo ' '.$others;
	
	//append the ending tag to the text element
	echo '>';	
}

function Password($name, $value=false,$others=false) {
	//Check the Value
	if (!$value) $value = checkValue($name);
	
	//Start Creating the Password Field
	echo '<input type="password" name="' . $name . '" id="' . $name . '"';
	
	// Add the value to the input:
	if ($value) echo ' value="' . htmlspecialchars($value) . '"';
	
	//Add additional attributes
	if ($others) echo ' '.$others;
	
	//append the ending tag to the password element
	echo '>';	
}

function FileUpload($name,$others="") {
	
	//Start Creating the File Upload Field
	echo '<input type="file" name="' . $name . '" id="' . $name . '"';
	
	//Add additional attributes
	if ($others) echo ' '.$others;
	
	//append the ending tag to the password element
	echo '>';	
}

function Radio($name, $value,$checked=false,$others=false) {
	//Check the Value
	$chosen_value = checkValue($name);
	
	//Start Creating the Radio Button
	echo '<input type="radio" name="' . $name . '" id="' . $value . '" value="' . htmlspecialchars($value) . '"';
	
	//If there is a posted value and the posted value is this value
	if ($chosen_value && ($chosen_value == $value)) echo ' checked';
	
	//if there is no posted value but this value is checked by default
	else if ((!$chosen_value) && ($checked)) echo ' checked';
	
	//Add additional attributes
	if ($others) echo ' '.$others;
	
	//append the ending tag to the password element
	echo '>'.$chosen_value;	
}



function CheckBox($name, $value,$checked=false,$others=false) {
	//Check the Value
	$chosen_value[] = array();
	//Assume check box is not marked by default
	$mark = false;
	
	//Get the values passed into the checkbox
	if (isset($_POST[$name])){
		//Get all the values sent from the form
		for ($i=0;$i<count($_POST[$name]);$i++)
		//Assign them into teh chosen value
		$chosen_value[] = $_POST[$name][$i];
	} else $mark = true; //If values is not passed, mark the default checkboxes
	
	
	//Start Creating the Checkbox
	echo '<input type="checkbox" name="' . $name . '[]" id="' . $value . '" value="' . htmlspecialchars($value) . '"';
	
	//If there is a posted value and the posted value is this value
	if (in_array($value,$chosen_value)) echo ' checked';
	
	//if there is no posted value but this value is checked by default
	else if ($mark && $checked) echo ' checked';
	
	//Add additional attributes
	if ($others) echo ' '.$others;
	
	//append the ending tag to the password element
	echo '>';	
}

function Select($name, $data,$value=false,$others=false) {
	//Check the Value
	$chosen_value = checkValue($name);
	
	//Start Creating the Select Field
	echo '<select name="' . $name . '" id="' . $name . '"';
	//Add additional attributes
	if ($others) echo ' '.$others;
	//append the ending tag to the password element
	echo '>';	
	
	//Start Creating the Option Field
	if ($value){ //If the option has a value different from the given data
		foreach ($data as $val => $key) {
		// Do something with $value.
			echo '<option value="'.$val.'"';
			if ($chosen_value == $val) echo ' selected';
			echo '>'.$key.'</option>';
		}
	} else { //Use the same value for the key and value
		foreach($data as $val){
			// Do something with $value.
			echo '<option value="'.$val.'"';
			if ($chosen_value == $val) echo ' selected';
			echo '>'.$val.'</option>';
		}
	}
	
	//Close the select
	echo "</select>";
	
}

function Textarea($name, $value=false,$others=false) {
	//Check the Value
	if (!$value) $value = checkValue($name);
	
	//Start Creating the TextArea
	echo '<textarea name="' . $name . '" id="' . $name . '" rows="10" cols="80"';
	
	//Add additional attributes
	if ($others) echo ' '.$others;
	
	//append the ending tag to the textarea element	
	echo ">";	
		
	// Add the value to the textarea:
	if ($value) echo $value;

	// Complete the textarea:
	echo '</textarea>';
}

function checkValue($name){
	
	$value = false;
	
	//Check if the value has been posted
	if (isset($_POST[$name])){
		
		//Assign posted value
		$value = $_POST[$name];
		
		// Strip slashes if Magic Quotes is enabled:
		if ($value && get_magic_quotes_gpc()) $value = stripslashes($value);
	}
	
	return $value;
}

?>