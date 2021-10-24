<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/daerah.php");
	include_once("{$currDir}/daerah_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('daerah');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'daerah';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`daerah`.`id`" => "id",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"`daerah`.`nama_daerah`" => "nama_daerah",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`daerah`.`id`',
		2 => '`negeri1`.`nama_negeri`',
		3 => 3,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`daerah`.`id`" => "id",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"`daerah`.`nama_daerah`" => "nama_daerah",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`daerah`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
		"`daerah`.`nama_daerah`" => "Nama daerah",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`daerah`.`id`" => "id",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"`daerah`.`nama_daerah`" => "nama_daerah",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['negeri' => 'Negeri', ];

	$x->QueryFrom = "`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ";
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
	$x->ScriptFileName = 'daerah_view.php';
	$x->RedirectAfterInsert = 'daerah_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Daerah';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`daerah`.`id`';

	$x->ColWidth = [150, 150, 150, ];
	$x->ColCaption = ['ID', 'Negeri', 'Nama daerah', ];
	$x->ColFieldName = ['id', 'negeri', 'nama_daerah', ];
	$x->ColNumber  = [1, 2, 3, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/daerah_templateTV.html';
	$x->SelectedTemplate = 'templates/daerah_templateTVS.html';
	$x->TemplateDV = 'templates/daerah_templateDV.html';
	$x->TemplateDVP = 'templates/daerah_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: daerah_init
	$render = true;
	if(function_exists('daerah_init')) {
		$args = [];
		$render = daerah_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: daerah_header
	$headerCode = '';
	if(function_exists('daerah_header')) {
		$args = [];
		$headerCode = daerah_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: daerah_footer
	$footerCode = '';
	if(function_exists('daerah_footer')) {
		$args = [];
		$footerCode = daerah_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}