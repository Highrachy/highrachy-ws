<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "aboutinfo.php" ?>
<?php include "userfn7.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Create page object
$about_edit = new cabout_edit();
$Page =& $about_edit;

// Page init
$about_edit->Page_Init();

// Page main
$about_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var about_edit = new ew_Page("about_edit");

// page properties
about_edit.PageID = "edit"; // page ID
about_edit.FormID = "faboutedit"; // form ID
var EW_PAGE_ID = about_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
about_edit.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_content"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($about->content->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
about_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
about_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
about_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p><span class="phpmaker"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $about->TableCaption() ?><br><br>
<a href="<?php echo $about->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$about_edit->ShowMessage();
?>
<form name="faboutedit" id="faboutedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return about_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="about">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($about->id->Visible) { // id ?>
	<tr<?php echo $about->id->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $about->id->FldCaption() ?></td>
		<td<?php echo $about->id->CellAttributes() ?>><span id="el_id">
<div<?php echo $about->id->ViewAttributes() ?>><?php echo $about->id->EditValue ?></div><input type="hidden" name="x_id" id="x_id" value="<?php echo ew_HtmlEncode($about->id->CurrentValue) ?>">
</span><?php echo $about->id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($about->content->Visible) { // content ?>
	<tr<?php echo $about->content->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $about->content->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $about->content->CellAttributes() ?>><span id="el_content">
<textarea name="x_content" id="x_content" title="<?php echo $about->content->FldTitle() ?>" cols="35" rows="4"<?php echo $about->content->EditAttributes() ?>><?php echo $about->content->EditValue ?></textarea>
</span><?php echo $about->content->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$about_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cabout_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'about';

	// Page object name
	var $PageObjName = 'about_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $about;
		if ($about->UseTokenInUrl) $PageUrl .= "t=" . $about->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
			$_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
		} else {
			$_SESSION[EW_SESSION_MESSAGE] = $v;
		}
	}

	// Show message
	function ShowMessage() {
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage);
		if ($sMessage <> "") { // Message in Session, display
			echo "<p><span class=\"ewMessage\">" . $sMessage . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm, $about;
		if ($about->UseTokenInUrl) {
			if ($objForm)
				return ($about->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($about->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cabout_edit() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (about)
		$GLOBALS["about"] = new cabout();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'about', TRUE);

		// Start timer
		$GLOBALS["gsTimer"] = new cTimer();

		// Open connection
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $about;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}

		// Create form object
		$objForm = new cFormObj();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		$this->Page_Redirecting($url);
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}
	var $sDbMasterFilter;
	var $sDbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $about;

		// Load key from QueryString
		if (@$_GET["id"] <> "")
			$about->id->setQueryStringValue($_GET["id"]);
		if (@$_POST["a_edit"] <> "") {
			$about->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$about->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$about->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$about->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($about->id->CurrentValue == "")
			$this->Page_Terminate("aboutlist.php"); // Invalid key, return to list
		switch ($about->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("aboutlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$about->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $about->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$about->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$about->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $about;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $about;
		$about->id->setFormValue($objForm->GetValue("x_id"));
		$about->content->setFormValue($objForm->GetValue("x_content"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $about;
		$this->LoadRow();
		$about->id->CurrentValue = $about->id->FormValue;
		$about->content->CurrentValue = $about->content->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $about;
		$sFilter = $about->KeyFilter();

		// Call Row Selecting event
		$about->Row_Selecting($sFilter);

		// Load SQL based on filter
		$about->CurrentFilter = $sFilter;
		$sSql = $about->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$about->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $about;
		$about->id->setDbValue($rs->fields('id'));
		$about->content->setDbValue($rs->fields('content'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $about;

		// Initialize URLs
		// Call Row_Rendering event

		$about->Row_Rendering();

		// Common render codes for all row types
		// id

		$about->id->CellCssStyle = ""; $about->id->CellCssClass = "";
		$about->id->CellAttrs = array(); $about->id->ViewAttrs = array(); $about->id->EditAttrs = array();

		// content
		$about->content->CellCssStyle = ""; $about->content->CellCssClass = "";
		$about->content->CellAttrs = array(); $about->content->ViewAttrs = array(); $about->content->EditAttrs = array();
		if ($about->RowType == EW_ROWTYPE_VIEW) { // View row

			// id
			$about->id->ViewValue = $about->id->CurrentValue;
			$about->id->CssStyle = "";
			$about->id->CssClass = "";
			$about->id->ViewCustomAttributes = "";

			// content
			$about->content->ViewValue = $about->content->CurrentValue;
			$about->content->CssStyle = "";
			$about->content->CssClass = "";
			$about->content->ViewCustomAttributes = "";

			// id
			$about->id->HrefValue = "";
			$about->id->TooltipValue = "";

			// content
			$about->content->HrefValue = "";
			$about->content->TooltipValue = "";
		} elseif ($about->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// id
			$about->id->EditCustomAttributes = "";
			$about->id->EditValue = $about->id->CurrentValue;
			$about->id->CssStyle = "";
			$about->id->CssClass = "";
			$about->id->ViewCustomAttributes = "";

			// content
			$about->content->EditCustomAttributes = "";
			$about->content->EditValue = ew_HtmlEncode($about->content->CurrentValue);

			// Edit refer script
			// id

			$about->id->HrefValue = "";

			// content
			$about->content->HrefValue = "";
		}

		// Call Row Rendered event
		if ($about->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$about->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $about;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($about->content->FormValue) && $about->content->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $about->content->FldCaption();
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $ValidateForm;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $about;
		$sFilter = $about->KeyFilter();
		$about->CurrentFilter = $sFilter;
		$sSql = $about->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// content
			$about->content->SetDbValueDef($rsnew, $about->content->CurrentValue, "", FALSE);

			// Call Row Updating event
			$bUpdateRow = $about->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($about->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($about->CancelMessage <> "") {
					$this->setMessage($about->CancelMessage);
					$about->CancelMessage = "";
				} else {
					$this->setMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$about->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	function Message_Showing(&$msg) {

		// Example:
		//$msg = "your new message";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
