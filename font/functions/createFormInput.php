<?php

//Create Form was created for twitter bootstrap.

function createFormInput($label,$name="", $type="text",$placeholder="") {
	
	$label = ucfirst($label);
	if ($name == "") $name = strtolower($label);
		
	// Assume no value already exists:
	$value = false;
	
	
	if ($type != 'input'){
		// Check for a value in POST:
		if (isset($_POST[$name]))
			$value = $_POST[$name];
	} 
	
	// Strip slashes if Magic Quotes is enabled:
	if ($value && get_magic_quotes_gpc()) $value = stripslashes($value);

	// Conditional to determine what kind of element to create:
	if ( ($type == 'text') || ($type == 'password') ) { // Create text or password inputs.
		
		// Start creating the input:
		echo '<label for="'.$name.'">'.$label.'</label>';
		echo '<input type="' . $type . '" name="' . $name . '" id="' . $name . '" placeholder="' . $placeholder . '"';
		
		// Add the value to the input:
		if ($value) echo ' value="' . htmlspecialchars($value) . '"';
		
		//append the ending tag to the text element
		echo '>';		
		
	} elseif ($type == 'textarea') { // Create a TEXTAREA.
		// Start creating the textarea:
		echo '<label class="control-label" >'.$label.'</label><textarea name="' . $name . '" id="' . $name . '" class="text-input" rows="10" cols="80"';
		if ($placeholder == "editor") echo ' class="editor"';
		
		echo ">";	
		
		// Add the value to the textarea:
		if ($value) echo $value;

		// Complete the textarea:
		echo '</textarea>';
		
	} // End of primary IF-ELSE.

} // End of the create_form_input() function.
