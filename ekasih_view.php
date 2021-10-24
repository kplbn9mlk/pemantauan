<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/ekasih.php");
	include_once("{$currDir}/ekasih_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('ekasih');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'ekasih';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`ekasih`.`id`" => "id",
		"`ekasih`.`status_ekasih`" => "status_ekasih",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`ekasih`.`id`',
		2 => 2,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`ekasih`.`id`" => "id",
		"`ekasih`.`status_ekasih`" => "status_ekasih",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`ekasih`.`id`" => "ID",
		"`ekasih`.`status_ekasih`" => "Status ekasih",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`ekasih`.`id`" => "id",
		"`ekasih`.`status_ekasih`" => "status_ekasih",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`ekasih` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm['view'] == 0 ? 1 : 0);
	$x->AllowDelete = $perm['delete'];
	$x->AllowMassDelete = (getLoggedAdmin() !== false);
	$x->AllowInsert = $perm['insert'];
	$x->AllowUpdate = $perm['edit'];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = (getLoggedAdmin() !== false);
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'ekasih_view.php';
	$x->RedirectAfterInsert = 'ekasih_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Ekasih';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`ekasih`.`id`';

	$x->ColWidth = [150, ];
	$x->ColCaption = ['Status ekasih', ];
	$x->ColFieldName = ['status_ekasih', ];
	$x->ColNumber  = [2, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/ekasih_templateTV.html';
	$x->SelectedTemplate = 'templates/ekasih_templateTVS.html';
	$x->TemplateDV = 'templates/ekasih_templateDV.html';
	$x->TemplateDVP = 'templates/ekasih_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: ekasih_init
	$render = true;
	if(function_exists('ekasih_init')) {
		$args = [];
		$render = ekasih_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: ekasih_header
	$headerCode = '';
	if(function_exists('ekasih_header')) {
		$args = [];
		$headerCode = ekasih_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: ekasih_footer
	$footerCode = '';
	if(function_exists('ekasih_footer')) {
		$args = [];
		$footerCode = ekasih_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
