<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/JALB.php");
	include_once("{$currDir}/JALB_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('JALB');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'JALB';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`JALB`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"`JALB`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"`JALB`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`JALB`.`TarikhSST`,date_format(`JALB`.`TarikhSST`,'%d/%m/%Y'),'')" => "TarikhSST",
		"if(`JALB`.`TarikhSiapSepenuhnya`,date_format(`JALB`.`TarikhSiapSepenuhnya`,'%d/%m/%Y'),'')" => "TarikhSiapSepenuhnya",
		"`JALB`.`speck`" => "speck",
		"`JALB`.`Panjang`" => "Panjang",
		"`JALB`.`gambar1`" => "gambar1",
		"`JALB`.`gambar2`" => "gambar2",
		"`JALB`.`Latitud`" => "Latitud",
		"`JALB`.`Peta`" => "Peta",
		"FORMAT(`JALB`.`kos_siling`, 2)" => "kos_siling",
		"FORMAT(`JALB`.`Kosprojek`, 2)" => "Kosprojek",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`JALB`.`progress_jadual`" => "progress_jadual",
		"`JALB`.`progress_sebenar`" => "progress_sebenar",
		"`JALB`.`jadual`" => "jadual",
		"`JALB`.`sumber_permohonan`" => "sumber_permohonan",
		"`JALB`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`JALB`.`gambar3`" => "gambar3",
		"`JALB`.`gambar4`" => "gambar4",
		"`JALB`.`updated`" => "updated",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`JALB`.`id`',
		2 => '`tahun1`.`tahun`',
		3 => 3,
		4 => '`negeri1`.`nama_negeri`',
		5 => '`daerah1`.`nama_daerah`',
		6 => '`PARLIMEN1`.`nama_parlimen`',
		7 => '`Dun1`.`nama_dun`',
		8 => '`agensi_pelaksana1`.`pelaksana`',
		9 => 9,
		10 => '`JALB`.`TarikhSST`',
		11 => '`JALB`.`TarikhSiapSepenuhnya`',
		12 => 12,
		13 => 13,
		14 => 14,
		15 => 15,
		16 => 16,
		17 => 17,
		18 => '`JALB`.`kos_siling`',
		19 => '`JALB`.`Kosprojek`',
		20 => '`status_pelaksanaan1`.`status_laksana`',
		21 => '`JALB`.`progress_jadual`',
		22 => '`JALB`.`progress_sebenar`',
		23 => '`JALB`.`jadual`',
		24 => 24,
		25 => 25,
		26 => 26,
		27 => 27,
		28 => 28,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`JALB`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"`JALB`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"`JALB`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`JALB`.`TarikhSST`,date_format(`JALB`.`TarikhSST`,'%d/%m/%Y'),'')" => "TarikhSST",
		"if(`JALB`.`TarikhSiapSepenuhnya`,date_format(`JALB`.`TarikhSiapSepenuhnya`,'%d/%m/%Y'),'')" => "TarikhSiapSepenuhnya",
		"`JALB`.`speck`" => "speck",
		"`JALB`.`Panjang`" => "Panjang",
		"`JALB`.`gambar1`" => "gambar1",
		"`JALB`.`gambar2`" => "gambar2",
		"`JALB`.`Latitud`" => "Latitud",
		"`JALB`.`Peta`" => "Peta",
		"FORMAT(`JALB`.`kos_siling`, 2)" => "kos_siling",
		"FORMAT(`JALB`.`Kosprojek`, 2)" => "Kosprojek",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`JALB`.`progress_jadual`" => "progress_jadual",
		"`JALB`.`progress_sebenar`" => "progress_sebenar",
		"`JALB`.`jadual`" => "jadual",
		"`JALB`.`sumber_permohonan`" => "sumber_permohonan",
		"`JALB`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`JALB`.`gambar3`" => "gambar3",
		"`JALB`.`gambar4`" => "gambar4",
		"`JALB`.`updated`" => "updated",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`JALB`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "Tahun laksana",
		"`JALB`.`NamaProjek`" => "Nama Projek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "Agensi Pelaksana",
		"`JALB`.`NamaKontraktor`" => "Nama Kontraktor",
		"`JALB`.`TarikhSST`" => "Tarikh SST",
		"`JALB`.`TarikhSiapSepenuhnya`" => "Tarikh Siap Sepenuhnya",
		"`JALB`.`speck`" => "Spesifikasi",
		"`JALB`.`Panjang`" => "Panjang Jalan (KM)",
		"`JALB`.`Latitud`" => "Latitud",
		"`JALB`.`Peta`" => "Peta",
		"`JALB`.`kos_siling`" => "Siling Projek",
		"`JALB`.`Kosprojek`" => "Kos projek",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`JALB`.`progress_jadual`" => "% Progress jadual",
		"`JALB`.`progress_sebenar`" => "% Progress sebenar",
		"`JALB`.`jadual`" => "Dahulu/Lewat Jadual",
		"`JALB`.`sumber_permohonan`" => "Sumber Permohonan",
		"`JALB`.`PenerimaManfaat`" => "Penerima Manfaat",
		"`JALB`.`updated`" => "Dikemaskini oleh",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`JALB`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"`JALB`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"`JALB`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`JALB`.`TarikhSST`,date_format(`JALB`.`TarikhSST`,'%d/%m/%Y'),'')" => "TarikhSST",
		"if(`JALB`.`TarikhSiapSepenuhnya`,date_format(`JALB`.`TarikhSiapSepenuhnya`,'%d/%m/%Y'),'')" => "TarikhSiapSepenuhnya",
		"`JALB`.`speck`" => "speck",
		"`JALB`.`Panjang`" => "Panjang",
		"`JALB`.`Latitud`" => "Latitud",
		"`JALB`.`Peta`" => "Peta",
		"FORMAT(`JALB`.`kos_siling`, 2)" => "kos_siling",
		"FORMAT(`JALB`.`Kosprojek`, 2)" => "Kosprojek",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`JALB`.`progress_jadual`" => "progress_jadual",
		"`JALB`.`progress_sebenar`" => "progress_sebenar",
		"`JALB`.`jadual`" => "jadual",
		"`JALB`.`sumber_permohonan`" => "sumber_permohonan",
		"`JALB`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`JALB`.`updated`" => "updated",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['tahun_laksana' => 'Tahun laksana', 'negeri' => 'Negeri', 'Daerah' => 'Daerah', 'Parlimen' => 'Parlimen', 'DUN' => 'DUN', 'AgensiPelaksana' => 'Agensi Pelaksana', 'Status' => 'Status', ];

	$x->QueryFrom = "`JALB` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`JALB`.`tahun_laksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`JALB`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`JALB`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`JALB`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`JALB`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`JALB`.`AgensiPelaksana` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`JALB`.`Status` ";
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
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 5;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'JALB_view.php';
	$x->RedirectAfterInsert = 'JALB_view.php?SelectedID=#ID#';
	$x->TableTitle = 'JALB';
	$x->TableIcon = 'resources/table_icons/car.png';
	$x->PrimaryKey = '`JALB`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Tahun laksana', 'Nama Projek', 'Negeri', 'Daerah', 'Parlimen', 'DUN', 'Agensi Pelaksana', 'Nama Kontraktor', 'Tarikh SST', 'Tarikh Siap Sepenuhnya', 'Spesifikasi', 'Panjang Jalan (KM)', 'Gambar', 'Gambar ', 'Latitud', 'Peta', 'Siling Projek', 'Kos projek', 'Status', '% Progress jadual', '% Progress sebenar', 'Dahulu/Lewat Jadual', 'Sumber Permohonan', 'Penerima Manfaat', 'Gambar  ', 'Gambar  ', 'Dikemaskini oleh', ];
	$x->ColFieldName = ['tahun_laksana', 'NamaProjek', 'negeri', 'Daerah', 'Parlimen', 'DUN', 'AgensiPelaksana', 'NamaKontraktor', 'TarikhSST', 'TarikhSiapSepenuhnya', 'speck', 'Panjang', 'gambar1', 'gambar2', 'Latitud', 'Peta', 'kos_siling', 'Kosprojek', 'Status', 'progress_jadual', 'progress_sebenar', 'jadual', 'sumber_permohonan', 'PenerimaManfaat', 'gambar3', 'gambar4', 'updated', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/JALB_templateTV.html';
	$x->SelectedTemplate = 'templates/JALB_templateTVS.html';
	$x->TemplateDV = 'templates/JALB_templateDV.html';
	$x->TemplateDVP = 'templates/JALB_templateDVP.html';

	$x->ShowTableHeader = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = true;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: JALB_init
	$render = true;
	if(function_exists('JALB_init')) {
		$args = [];
		$render = JALB_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: JALB_header
	$headerCode = '';
	if(function_exists('JALB_header')) {
		$args = [];
		$headerCode = JALB_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: JALB_footer
	$footerCode = '';
	if(function_exists('JALB_footer')) {
		$args = [];
		$footerCode = JALB_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
