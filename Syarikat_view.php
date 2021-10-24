<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/Syarikat.php");
	include_once("{$currDir}/Syarikat_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('Syarikat');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'Syarikat';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`Syarikat`.`id`" => "id",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"`Syarikat`.`nama_syarikat`" => "nama_syarikat",
		"`Syarikat`.`Alamat`" => "Alamat",
		"`Syarikat`.`no_ssm`" => "no_ssm",
		"`Syarikat`.`no_cidb`" => "no_cidb",
		"`Syarikat`.`lantik_kplb`" => "lantik_kplb",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun Dilantik oleh KPLB */" => "Tahun_lantik",
		"if(`Syarikat`.`tarikh_dokumen`,date_format(`Syarikat`.`tarikh_dokumen`,'%d/%m/%Y'),'')" => "tarikh_dokumen",
		"`Syarikat`.`tajuk_kerja`" => "tajuk_kerja",
		"`Syarikat`.`kaedah_perolehan`" => "kaedah_perolehan",
		"`Syarikat`.`kos_projek`" => "kos_projek",
		"IF(    CHAR_LENGTH(`BLACKLIST1`.`disenaraihitamkan`) || CHAR_LENGTH(`BLACKLIST1`.`sebab`), CONCAT_WS('',   `BLACKLIST1`.`disenaraihitamkan`, '-', `BLACKLIST1`.`sebab`), '') /* Senarai Hitam */" => "blacklist",
		"`Syarikat`.`catatan`" => "catatan",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`Syarikat`.`id`',
		2 => '`negeri1`.`nama_negeri`',
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => 7,
		8 => '`tahun1`.`tahun`',
		9 => '`Syarikat`.`tarikh_dokumen`',
		10 => 10,
		11 => 11,
		12 => 12,
		13 => 13,
		14 => 14,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`Syarikat`.`id`" => "id",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"`Syarikat`.`nama_syarikat`" => "nama_syarikat",
		"`Syarikat`.`Alamat`" => "Alamat",
		"`Syarikat`.`no_ssm`" => "no_ssm",
		"`Syarikat`.`no_cidb`" => "no_cidb",
		"`Syarikat`.`lantik_kplb`" => "lantik_kplb",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun Dilantik oleh KPLB */" => "Tahun_lantik",
		"if(`Syarikat`.`tarikh_dokumen`,date_format(`Syarikat`.`tarikh_dokumen`,'%d/%m/%Y'),'')" => "tarikh_dokumen",
		"`Syarikat`.`tajuk_kerja`" => "tajuk_kerja",
		"`Syarikat`.`kaedah_perolehan`" => "kaedah_perolehan",
		"`Syarikat`.`kos_projek`" => "kos_projek",
		"IF(    CHAR_LENGTH(`BLACKLIST1`.`disenaraihitamkan`) || CHAR_LENGTH(`BLACKLIST1`.`sebab`), CONCAT_WS('',   `BLACKLIST1`.`disenaraihitamkan`, '-', `BLACKLIST1`.`sebab`), '') /* Senarai Hitam */" => "blacklist",
		"`Syarikat`.`catatan`" => "catatan",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`Syarikat`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
		"`Syarikat`.`nama_syarikat`" => "Nama Syarikat",
		"`Syarikat`.`Alamat`" => "Alamat Syarikat",
		"`Syarikat`.`no_ssm`" => "No SSM",
		"`Syarikat`.`no_cidb`" => "No Cidb",
		"`Syarikat`.`lantik_kplb`" => "Pernah Mendapat Kerja KPLB",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun Dilantik oleh KPLB */" => "Tahun Dilantik oleh KPLB",
		"`Syarikat`.`tarikh_dokumen`" => "Tarikh Lantik",
		"`Syarikat`.`tajuk_kerja`" => "Tajuk kerja",
		"`Syarikat`.`kaedah_perolehan`" => "Kaedah perolehan",
		"`Syarikat`.`kos_projek`" => "Kos projek",
		"IF(    CHAR_LENGTH(`BLACKLIST1`.`disenaraihitamkan`) || CHAR_LENGTH(`BLACKLIST1`.`sebab`), CONCAT_WS('',   `BLACKLIST1`.`disenaraihitamkan`, '-', `BLACKLIST1`.`sebab`), '') /* Senarai Hitam */" => "Senarai Hitam",
		"`Syarikat`.`catatan`" => "Catatan",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`Syarikat`.`id`" => "id",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"`Syarikat`.`nama_syarikat`" => "nama_syarikat",
		"`Syarikat`.`Alamat`" => "Alamat",
		"`Syarikat`.`no_ssm`" => "no_ssm",
		"`Syarikat`.`no_cidb`" => "no_cidb",
		"`Syarikat`.`lantik_kplb`" => "lantik_kplb",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun Dilantik oleh KPLB */" => "Tahun_lantik",
		"if(`Syarikat`.`tarikh_dokumen`,date_format(`Syarikat`.`tarikh_dokumen`,'%d/%m/%Y'),'')" => "tarikh_dokumen",
		"`Syarikat`.`tajuk_kerja`" => "tajuk_kerja",
		"`Syarikat`.`kaedah_perolehan`" => "kaedah_perolehan",
		"`Syarikat`.`kos_projek`" => "kos_projek",
		"IF(    CHAR_LENGTH(`BLACKLIST1`.`disenaraihitamkan`) || CHAR_LENGTH(`BLACKLIST1`.`sebab`), CONCAT_WS('',   `BLACKLIST1`.`disenaraihitamkan`, '-', `BLACKLIST1`.`sebab`), '') /* Senarai Hitam */" => "blacklist",
		"`Syarikat`.`catatan`" => "catatan",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['negeri' => 'Negeri', 'Tahun_lantik' => 'Tahun Dilantik oleh KPLB', 'blacklist' => 'Senarai Hitam', ];

	$x->QueryFrom = "`Syarikat` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`Syarikat`.`negeri` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`Syarikat`.`Tahun_lantik` LEFT JOIN `BLACKLIST` as BLACKLIST1 ON `BLACKLIST1`.`ID`=`Syarikat`.`blacklist` ";
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
	$x->RecordsPerPage = 100;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'Syarikat_view.php';
	$x->RedirectAfterInsert = 'Syarikat_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Syarikat Berjaya';
	$x->TableIcon = 'table.gif';
	$x->PrimaryKey = '`Syarikat`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Negeri', 'Nama Syarikat', 'Alamat Syarikat', 'No SSM', 'No Cidb', 'Pernah Mendapat Kerja KPLB', 'Tahun Dilantik oleh KPLB', 'Tarikh Lantik', 'Tajuk kerja', 'Kaedah perolehan', 'Kos projek', 'Senarai Hitam', 'Catatan', ];
	$x->ColFieldName = ['negeri', 'nama_syarikat', 'Alamat', 'no_ssm', 'no_cidb', 'lantik_kplb', 'Tahun_lantik', 'tarikh_dokumen', 'tajuk_kerja', 'kaedah_perolehan', 'kos_projek', 'blacklist', 'catatan', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/Syarikat_templateTV.html';
	$x->SelectedTemplate = 'templates/Syarikat_templateTVS.html';
	$x->TemplateDV = 'templates/Syarikat_templateDV.html';
	$x->TemplateDVP = 'templates/Syarikat_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: Syarikat_init
	$render = true;
	if(function_exists('Syarikat_init')) {
		$args = [];
		$render = Syarikat_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: Syarikat_header
	$headerCode = '';
	if(function_exists('Syarikat_header')) {
		$args = [];
		$headerCode = Syarikat_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: Syarikat_footer
	$footerCode = '';
	if(function_exists('Syarikat_footer')) {
		$args = [];
		$footerCode = Syarikat_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}