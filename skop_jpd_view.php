<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/skop_jpd.php");
	include_once("{$currDir}/skop_jpd_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('skop_jpd');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'skop_jpd';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`skop_jpd`.`id`" => "id",
		"`skop_jpd`.`skop_jpd`" => "skop_jpd",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`skop_jpd`.`id`',
		2 => 2,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`skop_jpd`.`id`" => "id",
		"`skop_jpd`.`skop_jpd`" => "skop_jpd",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`skop_jpd`.`id`" => "ID",
		"`skop_jpd`.`skop_jpd`" => "Skop Kerja",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`skop_jpd`.`id`" => "id",
		"`skop_jpd`.`skop_jpd`" => "skop_jpd",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`skop_jpd` ";
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
	$x->ScriptFileName = 'skop_jpd_view.php';
	$x->RedirectAfterInsert = 'skop_jpd_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Skop jpd';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`skop_jpd`.`id`';

	$x->ColWidth = [150, ];
	$x->ColCaption = ['Skop Kerja', ];
	$x->ColFieldName = ['skop_jpd', ];
	$x->ColNumber  = [2, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/skop_jpd_templateTV.html';
	$x->SelectedTemplate = 'templates/skop_jpd_templateTVS.html';
	$x->TemplateDV = 'templates/skop_jpd_templateDV.html';
	$x->TemplateDVP = 'templates/skop_jpd_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: skop_jpd_init
	$render = true;
	if(function_exists('skop_jpd_init')) {
		$args = [];
		$render = skop_jpd_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: skop_jpd_header
	$headerCode = '';
	if(function_exists('skop_jpd_header')) {
		$args = [];
		$headerCode = skop_jpd_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: skop_jpd_footer
	$footerCode = '';
	if(function_exists('skop_jpd_footer')) {
		$args = [];
		$footerCode = skop_jpd_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
