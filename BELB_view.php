<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/BELB.php");
	include_once("{$currDir}/BELB_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('BELB');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'BELB';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`BELB`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`BELB`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`BELB`.`NamaKontraktor`" => "NamaKontraktor",
		"`BELB`.`TarikhSST`" => "TarikhSST",
		"`BELB`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`BELB`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`BELB`.`Panjang`" => "Panjang",
		"`BELB`.`gambar1`" => "gambar1",
		"`BELB`.`Latitud`" => "Latitud",
		"`BELB`.`Peta`" => "Peta",
		"FORMAT(`BELB`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`BELB`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`BELB`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`BELB`.`KKSVO`, 2)" => "KKSVO",
		"`BELB`.`Perbelanjaan`" => "Perbelanjaan",
		"`BELB`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`BELB`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`BELB`.`sumber_permohonan`" => "sumber_permohonan",
		"`BELB`.`catatan`" => "catatan",
		"`BELB`.`inden`" => "inden",
		"`BELB`.`Baucer`" => "Baucer",
		"`BELB`.`gambar2`" => "gambar2",
		"`BELB`.`gambar3`" => "gambar3",
		"`BELB`.`updated`" => "updated",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`BELB`.`ID`',
		2 => '`tahun1`.`tahun`',
		3 => '`waran1`.`sumber_waran`',
		4 => '`kelulusan1`.`kelulusan_jawatankuasa`',
		5 => 5,
		6 => '`negeri1`.`nama_negeri`',
		7 => '`daerah1`.`nama_daerah`',
		8 => '`PARLIMEN1`.`nama_parlimen`',
		9 => '`Dun1`.`nama_dun`',
		10 => '`agensi_pelaksana1`.`pelaksana`',
		11 => '`agensi_bayar1`.`agensi`',
		12 => '`penyelia_projek1`.`nama_penyelia`',
		13 => 13,
		14 => 14,
		15 => 15,
		16 => 16,
		17 => 17,
		18 => 18,
		19 => 19,
		20 => 20,
		21 => '`BELB`.`PeruntukanDiluluskan`',
		22 => '`BELB`.`peruntukan_dipinda`',
		23 => '`BELB`.`Kosprojek`',
		24 => '`BELB`.`KKSVO`',
		25 => '`BELB`.`Perbelanjaan`',
		26 => '`BELB`.`penjimatan`',
		27 => '`status_pelaksanaan1`.`status_laksana`',
		28 => 28,
		29 => 29,
		30 => 30,
		31 => 31,
		32 => 32,
		33 => 33,
		34 => 34,
		35 => 35,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`BELB`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`BELB`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`BELB`.`NamaKontraktor`" => "NamaKontraktor",
		"`BELB`.`TarikhSST`" => "TarikhSST",
		"`BELB`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`BELB`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`BELB`.`Panjang`" => "Panjang",
		"`BELB`.`gambar1`" => "gambar1",
		"`BELB`.`Latitud`" => "Latitud",
		"`BELB`.`Peta`" => "Peta",
		"FORMAT(`BELB`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`BELB`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`BELB`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`BELB`.`KKSVO`, 2)" => "KKSVO",
		"`BELB`.`Perbelanjaan`" => "Perbelanjaan",
		"`BELB`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`BELB`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`BELB`.`sumber_permohonan`" => "sumber_permohonan",
		"`BELB`.`catatan`" => "catatan",
		"`BELB`.`inden`" => "inden",
		"`BELB`.`Baucer`" => "Baucer",
		"`BELB`.`gambar2`" => "gambar2",
		"`BELB`.`gambar3`" => "gambar3",
		"`BELB`.`updated`" => "updated",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`BELB`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "Tahun laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Sumber Peruntukan",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`BELB`.`NamaProjek`" => "Nama Projek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "Agensi Pelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "AGENSI PEMBAYAR",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "Penyelia projek",
		"`BELB`.`NamaKontraktor`" => "Nama Kontraktor",
		"`BELB`.`TarikhSST`" => "Tarikh SST",
		"`BELB`.`TarikhSiapProjek`" => "Tarikh Siap Projek",
		"`BELB`.`TarikhSiapSepenuhnya`" => "Tarikh Siap Sepenuhnya",
		"`BELB`.`Panjang`" => "Panjang Jalan (M)",
		"`BELB`.`Latitud`" => "Latitud",
		"`BELB`.`Peta`" => "Peta",
		"`BELB`.`PeruntukanDiluluskan`" => "Peruntukan Diluluskan",
		"`BELB`.`peruntukan_dipinda`" => "Peruntukan Asal",
		"`BELB`.`Kosprojek`" => "Kos projek",
		"`BELB`.`KKSVO`" => "KKSVO",
		"`BELB`.`Perbelanjaan`" => "Perbelanjaan",
		"`BELB`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`BELB`.`PenerimaManfaat`" => "Penerima Manfaat",
		"`BELB`.`sumber_permohonan`" => "Sumber Permohonan",
		"`BELB`.`catatan`" => "Catatan",
		"`BELB`.`inden`" => "Inden Kerja",
		"`BELB`.`Baucer`" => "Baucer Bayaran",
		"`BELB`.`updated`" => "Dikemaskini oleh",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`BELB`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`BELB`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`BELB`.`NamaKontraktor`" => "NamaKontraktor",
		"`BELB`.`TarikhSST`" => "TarikhSST",
		"`BELB`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`BELB`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`BELB`.`Panjang`" => "Panjang",
		"`BELB`.`Latitud`" => "Latitud",
		"`BELB`.`Peta`" => "Peta",
		"FORMAT(`BELB`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`BELB`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`BELB`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`BELB`.`KKSVO`, 2)" => "KKSVO",
		"`BELB`.`Perbelanjaan`" => "Perbelanjaan",
		"`BELB`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`BELB`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`BELB`.`sumber_permohonan`" => "sumber_permohonan",
		"`BELB`.`catatan`" => "catatan",
		"`BELB`.`inden`" => "inden",
		"`BELB`.`Baucer`" => "Baucer",
		"`BELB`.`updated`" => "updated",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['tahun_laksana' => 'Tahun laksana', 'Waran' => 'Sumber Peruntukan', 'Kelulusan' => 'Kelulusan', 'negeri' => 'Negeri', 'Daerah' => 'Daerah', 'Parlimen' => 'Parlimen', 'DUN' => 'DUN', 'AgensiPelaksana' => 'Agensi Pelaksana', 'agensi_pembayar' => 'AGENSI PEMBAYAR', 'penyelia_projek' => 'Penyelia projek', 'Status' => 'Status', ];

	$x->QueryFrom = "`BELB` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`BELB`.`tahun_laksana` LEFT JOIN `waran` as waran1 ON `waran1`.`id`=`BELB`.`Waran` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`BELB`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`BELB`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`BELB`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`BELB`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`BELB`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`BELB`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`BELB`.`agensi_pembayar` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`BELB`.`penyelia_projek` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`BELB`.`Status` ";
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
	$x->ScriptFileName = 'BELB_view.php';
	$x->RedirectAfterInsert = 'BELB_view.php?SelectedID=#ID#';
	$x->TableTitle = 'BELB';
	$x->TableIcon = 'resources/table_icons/car.png';
	$x->PrimaryKey = '`BELB`.`ID`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Tahun laksana', 'Sumber Peruntukan', 'Kelulusan', 'Nama Projek', 'Negeri', 'Daerah', 'Parlimen', 'DUN', 'Penyelia projek', 'Nama Kontraktor', 'Tarikh SST', 'Tarikh Siap Sepenuhnya', 'Panjang Jalan (M)', 'Gambar', 'Peta', 'Peruntukan Diluluskan', 'Kos projek', 'KKSVO', 'Perbelanjaan', 'penjimatan', 'Status', 'Penerima Manfaat', 'Sumber Permohonan', 'Catatan', 'Inden Kerja', 'Gambar ', 'Gambar  ', 'Dikemaskini oleh', ];
	$x->ColFieldName = ['tahun_laksana', 'Waran', 'Kelulusan', 'NamaProjek', 'negeri', 'Daerah', 'Parlimen', 'DUN', 'penyelia_projek', 'NamaKontraktor', 'TarikhSST', 'TarikhSiapSepenuhnya', 'Panjang', 'gambar1', 'Peta', 'PeruntukanDiluluskan', 'Kosprojek', 'KKSVO', 'Perbelanjaan', 'penjimatan', 'Status', 'PenerimaManfaat', 'sumber_permohonan', 'catatan', 'inden', 'gambar2', 'gambar3', 'updated', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, 9, 12, 13, 14, 16, 17, 18, 20, 21, 23, 24, 25, 26, 27, 28, 29, 30, 31, 33, 34, 35, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/BELB_templateTV.html';
	$x->SelectedTemplate = 'templates/BELB_templateTVS.html';
	$x->TemplateDV = 'templates/BELB_templateDV.html';
	$x->TemplateDVP = 'templates/BELB_templateDVP.html';

	$x->ShowTableHeader = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = true;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: BELB_init
	$render = true;
	if(function_exists('BELB_init')) {
		$args = [];
		$render = BELB_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: BELB_header
	$headerCode = '';
	if(function_exists('BELB_header')) {
		$args = [];
		$headerCode = BELB_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: BELB_footer
	$footerCode = '';
	if(function_exists('BELB_footer')) {
		$args = [];
		$footerCode = BELB_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}