<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/report.php");
	include_once("{$currDir}/report_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('report');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'report';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`report`.`id`" => "id",
		"`report`.`projek`" => "projek",
		"`report`.`peruntukan`" => "peruntukan",
		"`report`.`jumlahprojek`" => "jumlahprojek",
		"`report`.`BM`" => "BM",
		"`report`.`perolehan`" => "perolehan",
		"`report`.`Dp`" => "Dp",
		"`report`.`Sp`" => "Sp",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`report`.`id`',
		2 => 2,
		3 => 3,
		4 => '`report`.`jumlahprojek`',
		5 => 5,
		6 => 6,
		7 => 7,
		8 => 8,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`report`.`id`" => "id",
		"`report`.`projek`" => "projek",
		"`report`.`peruntukan`" => "peruntukan",
		"`report`.`jumlahprojek`" => "jumlahprojek",
		"`report`.`BM`" => "BM",
		"`report`.`perolehan`" => "perolehan",
		"`report`.`Dp`" => "Dp",
		"`report`.`Sp`" => "Sp",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`report`.`id`" => "ID",
		"`report`.`projek`" => "Program",
		"`report`.`peruntukan`" => "Peruntukan (RM)",
		"`report`.`jumlahprojek`" => "Bil Projek",
		"`report`.`BM`" => "Belum Mula",
		"`report`.`perolehan`" => "Perolehan",
		"`report`.`Dp`" => "Dalam Perlaksanaan",
		"`report`.`Sp`" => "Siap",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`report`.`id`" => "id",
		"`report`.`projek`" => "projek",
		"`report`.`peruntukan`" => "peruntukan",
		"`report`.`jumlahprojek`" => "jumlahprojek",
		"`report`.`BM`" => "BM",
		"`report`.`perolehan`" => "perolehan",
		"`report`.`Dp`" => "Dp",
		"`report`.`Sp`" => "Sp",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`report` ";
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
	$x->ScriptFileName = 'report_view.php';
	$x->RedirectAfterInsert = 'report_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Report';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`report`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Program', 'Peruntukan (RM)', 'Bil Projek', 'Belum Mula', 'Perolehan', 'Dalam Perlaksanaan', 'Siap', ];
	$x->ColFieldName = ['projek', 'peruntukan', 'jumlahprojek', 'BM', 'perolehan', 'Dp', 'Sp', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/report_templateTV.html';
	$x->SelectedTemplate = 'templates/report_templateTVS.html';
	$x->TemplateDV = 'templates/report_templateDV.html';
	$x->TemplateDVP = 'templates/report_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: report_init
	$render = true;
	if(function_exists('report_init')) {
		$args = [];
		$render = report_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: report_header
	$headerCode = '';
	if(function_exists('report_header')) {
		$args = [];
		$headerCode = report_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: report_footer
	$footerCode = '';
	if(function_exists('report_footer')) {
		$args = [];
		$footerCode = report_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
