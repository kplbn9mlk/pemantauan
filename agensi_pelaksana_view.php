<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/agensi_pelaksana.php");
	include_once("{$currDir}/agensi_pelaksana_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('agensi_pelaksana');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'agensi_pelaksana';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`agensi_pelaksana`.`id`" => "id",
		"`agensi_pelaksana`.`pelaksana`" => "pelaksana",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`agensi_pelaksana`.`id`',
		2 => 2,
		3 => '`negeri1`.`nama_negeri`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`agensi_pelaksana`.`id`" => "id",
		"`agensi_pelaksana`.`pelaksana`" => "pelaksana",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`agensi_pelaksana`.`id`" => "ID",
		"`agensi_pelaksana`.`pelaksana`" => "Pelaksana",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`agensi_pelaksana`.`id`" => "id",
		"`agensi_pelaksana`.`pelaksana`" => "pelaksana",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['negeri' => 'Negeri', ];

	$x->QueryFrom = "`agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ";
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
	$x->ScriptFileName = 'agensi_pelaksana_view.php';
	$x->RedirectAfterInsert = 'agensi_pelaksana_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Agensi pelaksana';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`agensi_pelaksana`.`id`';

	$x->ColWidth = [150, 150, ];
	$x->ColCaption = ['Pelaksana', 'Negeri', ];
	$x->ColFieldName = ['pelaksana', 'negeri', ];
	$x->ColNumber  = [2, 3, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/agensi_pelaksana_templateTV.html';
	$x->SelectedTemplate = 'templates/agensi_pelaksana_templateTVS.html';
	$x->TemplateDV = 'templates/agensi_pelaksana_templateDV.html';
	$x->TemplateDVP = 'templates/agensi_pelaksana_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: agensi_pelaksana_init
	$render = true;
	if(function_exists('agensi_pelaksana_init')) {
		$args = [];
		$render = agensi_pelaksana_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: agensi_pelaksana_header
	$headerCode = '';
	if(function_exists('agensi_pelaksana_header')) {
		$args = [];
		$headerCode = agensi_pelaksana_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: agensi_pelaksana_footer
	$footerCode = '';
	if(function_exists('agensi_pelaksana_footer')) {
		$args = [];
		$footerCode = agensi_pelaksana_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
