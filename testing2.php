 <?php
 // Generate the filename for the backup file
$filess = 'all';

$return = "testing";

$handle = fopen($filess.'.sql','w');
		fwrite($handle,$return);
		fclose($handle);			
?>
