<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/ljk.php");
	include_once("{$currDir}/ljk_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('ljk');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'ljk';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`ljk`.`id`" => "id",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "daerah",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* Dun */" => "dun",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "parlimen",
		"`ljk`.`kampung`" => "kampung",
		"`ljk`.`no_tiang`" => "no_tiang",
		"IF(    CHAR_LENGTH(`LJK_JENIS1`.`jenis_lampu`), CONCAT_WS('',   `LJK_JENIS1`.`jenis_lampu`), '') /* Jenis lampu */" => "jenis_lampu",
		"`ljk`.`status_pemasangan`" => "status_pemasangan",
		"`ljk`.`audit`" => "audit",
		"`ljk`.`catatan`" => "catatan",
		"`ljk`.`gambar`" => "gambar",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`ljk`.`id`',
		2 => '`negeri1`.`nama_negeri`',
		3 => '`daerah1`.`nama_daerah`',
		4 => '`Dun1`.`nama_dun`',
		5 => '`PARLIMEN1`.`nama_parlimen`',
		6 => 6,
		7 => 7,
		8 => '`LJK_JENIS1`.`jenis_lampu`',
		9 => 9,
		10 => 10,
		11 => 11,
		12 => 12,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`ljk`.`id`" => "id",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "daerah",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* Dun */" => "dun",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "parlimen",
		"`ljk`.`kampung`" => "kampung",
		"`ljk`.`no_tiang`" => "no_tiang",
		"IF(    CHAR_LENGTH(`LJK_JENIS1`.`jenis_lampu`), CONCAT_WS('',   `LJK_JENIS1`.`jenis_lampu`), '') /* Jenis lampu */" => "jenis_lampu",
		"`ljk`.`status_pemasangan`" => "status_pemasangan",
		"`ljk`.`audit`" => "audit",
		"`ljk`.`catatan`" => "catatan",
		"`ljk`.`gambar`" => "gambar",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`ljk`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* Dun */" => "Dun",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"`ljk`.`kampung`" => "Nama Kampung",
		"`ljk`.`no_tiang`" => "No tiang",
		"IF(    CHAR_LENGTH(`LJK_JENIS1`.`jenis_lampu`), CONCAT_WS('',   `LJK_JENIS1`.`jenis_lampu`), '') /* Jenis lampu */" => "Jenis lampu",
		"`ljk`.`status_pemasangan`" => "Status",
		"`ljk`.`audit`" => "Audit",
		"`ljk`.`catatan`" => "Catatan",
		"`ljk`.`gambar`" => "Gambar",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`ljk`.`id`" => "id",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "daerah",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* Dun */" => "dun",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "parlimen",
		"`ljk`.`kampung`" => "kampung",
		"`ljk`.`no_tiang`" => "no_tiang",
		"IF(    CHAR_LENGTH(`LJK_JENIS1`.`jenis_lampu`), CONCAT_WS('',   `LJK_JENIS1`.`jenis_lampu`), '') /* Jenis lampu */" => "jenis_lampu",
		"`ljk`.`status_pemasangan`" => "status_pemasangan",
		"`ljk`.`audit`" => "audit",
		"`ljk`.`catatan`" => "catatan",
		"`ljk`.`gambar`" => "gambar",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['negeri' => 'Negeri', 'daerah' => 'Daerah', 'dun' => 'Dun', 'parlimen' => 'Parlimen', 'jenis_lampu' => 'Jenis lampu', ];

	$x->QueryFrom = "`ljk` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`ljk`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`ljk`.`daerah` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`ljk`.`dun` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`ljk`.`parlimen` LEFT JOIN `LJK_JENIS` as LJK_JENIS1 ON `LJK_JENIS1`.`id`=`ljk`.`jenis_lampu` ";
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
	$x->RecordsPerPage = 1000;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'ljk_view.php';
	$x->RedirectAfterInsert = 'ljk_view.php?SelectedID=#ID#';
	$x->TableTitle = 'LJK FASA 10';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`ljk`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['ID', 'Negeri', 'Daerah', 'Dun', 'Parlimen', 'Nama Kampung', 'No tiang', 'Jenis lampu', 'Status', 'Audit', 'Catatan', 'Gambar', ];
	$x->ColFieldName = ['id', 'negeri', 'daerah', 'dun', 'parlimen', 'kampung', 'no_tiang', 'jenis_lampu', 'status_pemasangan', 'audit', 'catatan', 'gambar', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/ljk_templateTV.html';
	$x->SelectedTemplate = 'templates/ljk_templateTVS.html';
	$x->TemplateDV = 'templates/ljk_templateDV.html';
	$x->TemplateDVP = 'templates/ljk_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: ljk_init
	$render = true;
	if(function_exists('ljk_init')) {
		$args = [];
		$render = ljk_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: ljk_header
	$headerCode = '';
	if(function_exists('ljk_header')) {
		$args = [];
		$headerCode = ljk_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: ljk_footer
	$footerCode = '';
	if(function_exists('ljk_footer')) {
		$args = [];
		$footerCode = ljk_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}