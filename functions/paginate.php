<?php
function paginate($total_returned_rows,$limit=3,$present_page=0,$var="",$value=""){
	//define the other varialbles	
	$targetpage = $_SERVER['PHP_SELF']; 	
	$stages = 2;

	// Initial page num setup
	if ($present_page == 0){$present_page = 1;}
	$prev = $present_page - 1;	
	$next = $present_page + 1;							
	$lastpage = ceil($total_returned_rows/$limit);		
	$LastPagem1 = $lastpage - 1;
	
	if (($var == "") || ($value == ""))
	$append = "";
	else $append = "&$var=$value";
	
	
	$listPaginage = '';
	if($lastpage > 1)
	{


		$listPaginage .= "<ul class='pro_pages'>";
		// Previous
		if ($present_page > 1){
			$listPaginage.= "<li><a href='$targetpage?s=$prev$append' class='pro_btn pro_prev'><span></span></a></li>";
		}else{
			$listPaginage.= "<li class='current'><a href='#' class='pro_btn pro_prev'><span></span></a></li>";
	}
	
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $present_page){
					$listPaginage.= "<li class='current'><a href='#' class='pro_btn pro_page'> $counter</a></li>";
				}else{
					$listPaginage.= "<li><a href='$targetpage?s=$counter$append' class='pro_btn pro_page'>$counter</a></li>";}					
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($present_page < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $present_page){
						$listPaginage.= "<li class='current'><a href='#' class='pro_btn pro_page'>$counter</a></li>";
					}else{
						$listPaginage.= "<li><a href='$targetpage?s=$counter$append' class='pro_btn pro_page'>$counter</a></li>";}					
				}
				$listPaginage.= "<li class='dots'><a class='pro_btn pro_page' href='#'>.&nbsp;.&nbsp;.</a></li>";
				$listPaginage.= "<li><a href='$targetpage?s=$LastPagem1' class='pro_btn pro_page'>$LastPagem1</a></li>";
				$listPaginage.= "<li><a href='$targetpage?s=$lastpage' class='pro_btn pro_page'>$lastpage</a></li>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $present_page && $present_page > ($stages * 2))
			{
				$listPaginage.= "<li><a href='$targetpage?s=1' class='pro_btn pro_page'>1</a></li>";
				$listPaginage.= "<li><a href='$targetpage?s=2' class='pro_btn pro_page'>2</a></li>";
				$listPaginage.= "<li class='dots'><a class='pro_btn pro_page' href='#'>.&nbsp;.&nbsp;.</a></li>";
				for ($counter = $present_page - $stages; $counter <= $present_page + $stages; $counter++)
				{
					if ($counter == $present_page){
						$listPaginage.= "<li class='current'><a href='#' class='pro_btn pro_page'>$counter</a></li>";
					}else{
						$listPaginage.= "<li><a href='$targetpage?s=$counter' class='pro_btn pro_page'>$counter</a></li>";}					
				}
				$listPaginage.= "<li class='dots'><a class='pro_btn pro_page' href='#'>.&nbsp;.&nbsp;.</a></li>";
				$listPaginage.= "<li><a href='$targetpage?s=$LastPagem1$append' class='pro_btn pro_page'>$LastPagem1</a></li>";
				$listPaginage.= "<li><a href='$targetpage?s=$lastpage$append' class='pro_btn pro_page'>$lastpage</a></li>";		
			}
			// End only hide early pages
			else
			{
				$listPaginage.= "<li><a href='$targetpage?s=1$append' class='pro_btn pro_page'>1</a></li>"; 
				$listPaginage.= "<li><a href='$targetpage?s=2$append' class='pro_btn pro_page'>2</a></li>";
				$listPaginage.= "<li class='dots'><a class='pro_btn pro_page' href='#'>.&nbsp;.&nbsp;.</a></li>";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $present_page){
						$listPaginage.= "<li class='current'><a class='pro_btn pro_page'>$counter</a></li>";
					}else{
						$listPaginage.= "<li><a href='$targetpage?s=$counter$append' class='pro_btn pro_page'>$counter</a></li>";}					
				}
			}
		}
					
				// Next
		if ($present_page < $counter - 1){ 
			$listPaginage.= "<li><a href='$targetpage?s=$next$append' class='pro_btn pro_next'><span></span></a></li>";
		}else{
			$listPaginage.= "<li class='current'><a href='#' class='pro_btn pro_next'><span></span></a></li>";
			}
			
		$listPaginage.= "</ul>";
		}
		return $listPaginage;
}
?>