<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/balb.php");
	include_once("{$currDir}/balb_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('balb');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'balb';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`balb`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`balb`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`balb`.`NamaKontraktor`" => "NamaKontraktor",
		"`balb`.`TarikhSST`" => "TarikhSST",
		"`balb`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`balb`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`balb`.`Panjang`" => "Panjang",
		"`balb`.`gambar1`" => "gambar1",
		"`balb`.`Latitud`" => "Latitud",
		"`balb`.`Peta`" => "Peta",
		"FORMAT(`balb`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`balb`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`balb`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`balb`.`KKSVO`, 2)" => "KKSVO",
		"`balb`.`Perbelanjaan`" => "Perbelanjaan",
		"`balb`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`balb`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`balb`.`sumber_permohonan`" => "sumber_permohonan",
		"`balb`.`catatan`" => "catatan",
		"`balb`.`inden`" => "inden",
		"`balb`.`Baucer`" => "Baucer",
		"`balb`.`gambar2`" => "gambar2",
		"`balb`.`gambar3`" => "gambar3",
		"`balb`.`updated`" => "updated",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`balb`.`ID`',
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
		21 => '`balb`.`PeruntukanDiluluskan`',
		22 => '`balb`.`peruntukan_dipinda`',
		23 => '`balb`.`Kosprojek`',
		24 => '`balb`.`KKSVO`',
		25 => '`balb`.`Perbelanjaan`',
		26 => '`balb`.`penjimatan`',
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
		"`balb`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`balb`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`balb`.`NamaKontraktor`" => "NamaKontraktor",
		"`balb`.`TarikhSST`" => "TarikhSST",
		"`balb`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`balb`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`balb`.`Panjang`" => "Panjang",
		"`balb`.`gambar1`" => "gambar1",
		"`balb`.`Latitud`" => "Latitud",
		"`balb`.`Peta`" => "Peta",
		"FORMAT(`balb`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`balb`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`balb`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`balb`.`KKSVO`, 2)" => "KKSVO",
		"`balb`.`Perbelanjaan`" => "Perbelanjaan",
		"`balb`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`balb`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`balb`.`sumber_permohonan`" => "sumber_permohonan",
		"`balb`.`catatan`" => "catatan",
		"`balb`.`inden`" => "inden",
		"`balb`.`Baucer`" => "Baucer",
		"`balb`.`gambar2`" => "gambar2",
		"`balb`.`gambar3`" => "gambar3",
		"`balb`.`updated`" => "updated",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`balb`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "Tahun laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Sumber Peruntukan",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`balb`.`NamaProjek`" => "Nama Projek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "Agensi Pelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "AGENSI PEMBAYAR",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "Penyelia projek",
		"`balb`.`NamaKontraktor`" => "Nama Kontraktor",
		"`balb`.`TarikhSST`" => "Tarikh SST",
		"`balb`.`TarikhSiapProjek`" => "Tarikh Siap Projek",
		"`balb`.`TarikhSiapSepenuhnya`" => "Tarikh Siap Sepenuhnya",
		"`balb`.`Panjang`" => "Panjang Jalan (M)",
		"`balb`.`Latitud`" => "Latitud",
		"`balb`.`Peta`" => "Peta",
		"`balb`.`PeruntukanDiluluskan`" => "Peruntukan Diluluskan",
		"`balb`.`peruntukan_dipinda`" => "Peruntukan Asal",
		"`balb`.`Kosprojek`" => "Kos projek",
		"`balb`.`KKSVO`" => "KKSVO",
		"`balb`.`Perbelanjaan`" => "Perbelanjaan",
		"`balb`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`balb`.`PenerimaManfaat`" => "Penerima Manfaat",
		"`balb`.`sumber_permohonan`" => "Sumber Permohonan",
		"`balb`.`catatan`" => "Catatan",
		"`balb`.`inden`" => "Inden Kerja",
		"`balb`.`Baucer`" => "Baucer Bayaran",
		"`balb`.`updated`" => "Dikemaskini oleh",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`balb`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`balb`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`balb`.`NamaKontraktor`" => "NamaKontraktor",
		"`balb`.`TarikhSST`" => "TarikhSST",
		"`balb`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`balb`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`balb`.`Panjang`" => "Panjang",
		"`balb`.`Latitud`" => "Latitud",
		"`balb`.`Peta`" => "Peta",
		"FORMAT(`balb`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`balb`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`balb`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`balb`.`KKSVO`, 2)" => "KKSVO",
		"`balb`.`Perbelanjaan`" => "Perbelanjaan",
		"`balb`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`balb`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`balb`.`sumber_permohonan`" => "sumber_permohonan",
		"`balb`.`catatan`" => "catatan",
		"`balb`.`inden`" => "inden",
		"`balb`.`Baucer`" => "Baucer",
		"`balb`.`updated`" => "updated",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['tahun_laksana' => 'Tahun laksana', 'Waran' => 'Sumber Peruntukan', 'Kelulusan' => 'Kelulusan', 'negeri' => 'Negeri', 'Daerah' => 'Daerah', 'Parlimen' => 'Parlimen', 'DUN' => 'DUN', 'AgensiPelaksana' => 'Agensi Pelaksana', 'agensi_pembayar' => 'AGENSI PEMBAYAR', 'penyelia_projek' => 'Penyelia projek', 'Status' => 'Status', ];

	$x->QueryFrom = "`balb` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`balb`.`tahun_laksana` LEFT JOIN `waran` as waran1 ON `waran1`.`id`=`balb`.`Waran` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`balb`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`balb`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`balb`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`balb`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`balb`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`balb`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`balb`.`agensi_pembayar` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`balb`.`penyelia_projek` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`balb`.`Status` ";
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
	$x->ScriptFileName = 'balb_view.php';
	$x->RedirectAfterInsert = 'balb_view.php?SelectedID=#ID#';
	$x->TableTitle = 'BEKALAN AIR';
	$x->TableIcon = 'resources/table_icons/car.png';
	$x->PrimaryKey = '`balb`.`ID`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Tahun laksana', 'Sumber Peruntukan', 'Kelulusan', 'Nama Projek', 'Negeri', 'Daerah', 'Parlimen', 'DUN', 'Penyelia projek', 'Nama Kontraktor', 'Tarikh SST', 'Tarikh Siap Sepenuhnya', 'Panjang Jalan (M)', 'Gambar', 'Peta', 'Peruntukan Diluluskan', 'Kos projek', 'KKSVO', 'Perbelanjaan', 'penjimatan', 'Status', 'Penerima Manfaat', 'Sumber Permohonan', 'Catatan', 'Inden Kerja', 'Gambar ', 'Gambar  ', 'Dikemaskini oleh', ];
	$x->ColFieldName = ['tahun_laksana', 'Waran', 'Kelulusan', 'NamaProjek', 'negeri', 'Daerah', 'Parlimen', 'DUN', 'penyelia_projek', 'NamaKontraktor', 'TarikhSST', 'TarikhSiapSepenuhnya', 'Panjang', 'gambar1', 'Peta', 'PeruntukanDiluluskan', 'Kosprojek', 'KKSVO', 'Perbelanjaan', 'penjimatan', 'Status', 'PenerimaManfaat', 'sumber_permohonan', 'catatan', 'inden', 'gambar2', 'gambar3', 'updated', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, 9, 12, 13, 14, 16, 17, 18, 20, 21, 23, 24, 25, 26, 27, 28, 29, 30, 31, 33, 34, 35, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/balb_templateTV.html';
	$x->SelectedTemplate = 'templates/balb_templateTVS.html';
	$x->TemplateDV = 'templates/balb_templateDV.html';
	$x->TemplateDVP = 'templates/balb_templateDVP.html';

	$x->ShowTableHeader = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = true;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: balb_init
	$render = true;
	if(function_exists('balb_init')) {
		$args = [];
		$render = balb_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: balb_header
	$headerCode = '';
	if(function_exists('balb_header')) {
		$args = [];
		$headerCode = balb_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: balb_footer
	$footerCode = '';
	if(function_exists('balb_footer')) {
		$args = [];
		$footerCode = balb_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
