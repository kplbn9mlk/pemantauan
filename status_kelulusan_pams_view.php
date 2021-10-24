<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/status_kelulusan_pams.php");
	include_once("{$currDir}/status_kelulusan_pams_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('status_kelulusan_pams');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'status_kelulusan_pams';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`status_kelulusan_pams`.`id`" => "id",
		"IF(    CHAR_LENGTH(`pams_mohon1`.`Nama_Projek`) || CHAR_LENGTH(`pams_mohon1`.`anggaran_kos`), CONCAT_WS('',   `pams_mohon1`.`Nama_Projek`, '- RM', `pams_mohon1`.`anggaran_kos`), '') /* Pemohon */" => "pemohon",
		"`status_kelulusan_pams`.`kelulusan`" => "kelulusan",
		"if(`status_kelulusan_pams`.`tarikh_kelulusan`,date_format(`status_kelulusan_pams`.`tarikh_kelulusan`,'%d/%m/%Y %h:%i %p'),'')" => "tarikh_kelulusan",
		"`status_kelulusan_pams`.`pelulus`" => "pelulus",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`status_kelulusan_pams`.`id`',
		2 => 2,
		3 => 3,
		4 => '`status_kelulusan_pams`.`tarikh_kelulusan`',
		5 => 5,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`status_kelulusan_pams`.`id`" => "id",
		"IF(    CHAR_LENGTH(`pams_mohon1`.`Nama_Projek`) || CHAR_LENGTH(`pams_mohon1`.`anggaran_kos`), CONCAT_WS('',   `pams_mohon1`.`Nama_Projek`, '- RM', `pams_mohon1`.`anggaran_kos`), '') /* Pemohon */" => "pemohon",
		"`status_kelulusan_pams`.`kelulusan`" => "kelulusan",
		"if(`status_kelulusan_pams`.`tarikh_kelulusan`,date_format(`status_kelulusan_pams`.`tarikh_kelulusan`,'%d/%m/%Y %h:%i %p'),'')" => "tarikh_kelulusan",
		"`status_kelulusan_pams`.`pelulus`" => "pelulus",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`status_kelulusan_pams`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`pams_mohon1`.`Nama_Projek`) || CHAR_LENGTH(`pams_mohon1`.`anggaran_kos`), CONCAT_WS('',   `pams_mohon1`.`Nama_Projek`, '- RM', `pams_mohon1`.`anggaran_kos`), '') /* Pemohon */" => "Pemohon",
		"`status_kelulusan_pams`.`kelulusan`" => "Kelulusan",
		"`status_kelulusan_pams`.`tarikh_kelulusan`" => "tarikh_kelulusan",
		"`status_kelulusan_pams`.`pelulus`" => "Pelulus",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`status_kelulusan_pams`.`id`" => "id",
		"IF(    CHAR_LENGTH(`pams_mohon1`.`Nama_Projek`) || CHAR_LENGTH(`pams_mohon1`.`anggaran_kos`), CONCAT_WS('',   `pams_mohon1`.`Nama_Projek`, '- RM', `pams_mohon1`.`anggaran_kos`), '') /* Pemohon */" => "pemohon",
		"`status_kelulusan_pams`.`kelulusan`" => "kelulusan",
		"if(`status_kelulusan_pams`.`tarikh_kelulusan`,date_format(`status_kelulusan_pams`.`tarikh_kelulusan`,'%d/%m/%Y %h:%i %p'),'')" => "tarikh_kelulusan",
		"`status_kelulusan_pams`.`pelulus`" => "pelulus",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['pemohon' => 'Pemohon', ];

	$x->QueryFrom = "`status_kelulusan_pams` LEFT JOIN `pams_mohon` as pams_mohon1 ON `pams_mohon1`.`ID`=`status_kelulusan_pams`.`pemohon` ";
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
	$x->ScriptFileName = 'status_kelulusan_pams_view.php';
	$x->RedirectAfterInsert = 'status_kelulusan_pams_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Kelulusan PAMS';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`status_kelulusan_pams`.`id`';

	$x->ColWidth = [150, 150, 150, 150, ];
	$x->ColCaption = ['Pemohon', 'Kelulusan', 'tarikh_kelulusan', 'Pelulus', ];
	$x->ColFieldName = ['pemohon', 'kelulusan', 'tarikh_kelulusan', 'pelulus', ];
	$x->ColNumber  = [2, 3, 4, 5, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/status_kelulusan_pams_templateTV.html';
	$x->SelectedTemplate = 'templates/status_kelulusan_pams_templateTVS.html';
	$x->TemplateDV = 'templates/status_kelulusan_pams_templateDV.html';
	$x->TemplateDVP = 'templates/status_kelulusan_pams_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: status_kelulusan_pams_init
	$render = true;
	if(function_exists('status_kelulusan_pams_init')) {
		$args = [];
		$render = status_kelulusan_pams_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: status_kelulusan_pams_header
	$headerCode = '';
	if(function_exists('status_kelulusan_pams_header')) {
		$args = [];
		$headerCode = status_kelulusan_pams_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: status_kelulusan_pams_footer
	$footerCode = '';
	if(function_exists('status_kelulusan_pams_footer')) {
		$args = [];
		$footerCode = status_kelulusan_pams_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
