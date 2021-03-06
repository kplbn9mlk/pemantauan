<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/jpd_de_REKOD.php");
	include_once("{$currDir}/jpd_de_REKOD_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('jpd_de_REKOD');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'jpd_de_REKOD';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`jpd_de_REKOD`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`jpd_de_REKOD`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`jpd_de_REKOD`.`NamaKontraktor`" => "NamaKontraktor",
		"`jpd_de_REKOD`.`TarikhSST`" => "TarikhSST",
		"`jpd_de_REKOD`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`jpd_de_REKOD`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`jpd_de_REKOD`.`PanjangJalanM`" => "PanjangJalanM",
		"`jpd_de_REKOD`.`LebarM`" => "LebarM",
		"`jpd_de_REKOD`.`Latitud`" => "Latitud",
		"`jpd_de_REKOD`.`Longitud`" => "Longitud",
		"FORMAT(`jpd_de_REKOD`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`jpd_de_REKOD`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`jpd_de_REKOD`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`jpd_de_REKOD`.`KKSVO`, 2)" => "KKSVO",
		"`jpd_de_REKOD`.`Perbelanjaan`" => "Perbelanjaan",
		"`jpd_de_REKOD`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`jpd_de_REKOD`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`jpd_de_REKOD`.`sumber_permohonan`" => "sumber_permohonan",
		"`jpd_de_REKOD`.`catatan`" => "catatan",
		"`jpd_de_REKOD`.`gambar1`" => "gambar1",
		"`jpd_de_REKOD`.`gambar2`" => "gambar2",
		"`jpd_de_REKOD`.`gambar3`" => "gambar3",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`jpd_de_REKOD`.`ID`',
		2 => '`tahun1`.`tahun`',
		3 => '`kelulusan1`.`kelulusan_jawatankuasa`',
		4 => 4,
		5 => '`negeri1`.`nama_negeri`',
		6 => '`daerah1`.`nama_daerah`',
		7 => '`PARLIMEN1`.`nama_parlimen`',
		8 => '`Dun1`.`nama_dun`',
		9 => '`agensi_pelaksana1`.`pelaksana`',
		10 => '`agensi_bayar1`.`agensi`',
		11 => '`penyelia_projek1`.`nama_penyelia`',
		12 => 12,
		13 => 13,
		14 => 14,
		15 => 15,
		16 => 16,
		17 => 17,
		18 => 18,
		19 => 19,
		20 => '`jpd_de_REKOD`.`PeruntukanDiluluskan`',
		21 => '`jpd_de_REKOD`.`peruntukan_dipinda`',
		22 => '`jpd_de_REKOD`.`Kosprojek`',
		23 => '`jpd_de_REKOD`.`KKSVO`',
		24 => '`jpd_de_REKOD`.`Perbelanjaan`',
		25 => '`jpd_de_REKOD`.`penjimatan`',
		26 => '`status_pelaksanaan1`.`status_laksana`',
		27 => 27,
		28 => 28,
		29 => 29,
		30 => 30,
		31 => 31,
		32 => 32,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`jpd_de_REKOD`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`jpd_de_REKOD`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`jpd_de_REKOD`.`NamaKontraktor`" => "NamaKontraktor",
		"`jpd_de_REKOD`.`TarikhSST`" => "TarikhSST",
		"`jpd_de_REKOD`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`jpd_de_REKOD`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`jpd_de_REKOD`.`PanjangJalanM`" => "PanjangJalanM",
		"`jpd_de_REKOD`.`LebarM`" => "LebarM",
		"`jpd_de_REKOD`.`Latitud`" => "Latitud",
		"`jpd_de_REKOD`.`Longitud`" => "Longitud",
		"FORMAT(`jpd_de_REKOD`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`jpd_de_REKOD`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`jpd_de_REKOD`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`jpd_de_REKOD`.`KKSVO`, 2)" => "KKSVO",
		"`jpd_de_REKOD`.`Perbelanjaan`" => "Perbelanjaan",
		"`jpd_de_REKOD`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`jpd_de_REKOD`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`jpd_de_REKOD`.`sumber_permohonan`" => "sumber_permohonan",
		"`jpd_de_REKOD`.`catatan`" => "catatan",
		"`jpd_de_REKOD`.`gambar1`" => "gambar1",
		"`jpd_de_REKOD`.`gambar2`" => "gambar2",
		"`jpd_de_REKOD`.`gambar3`" => "gambar3",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`jpd_de_REKOD`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "Tahun laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`jpd_de_REKOD`.`NamaProjek`" => "Nama Projek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "Agensi Pelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "AGENSI PEMBAYAR",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "Penyelia projek",
		"`jpd_de_REKOD`.`NamaKontraktor`" => "Nama Kontraktor",
		"`jpd_de_REKOD`.`TarikhSST`" => "Tarikh SST",
		"`jpd_de_REKOD`.`TarikhSiapProjek`" => "Tarikh Siap Projek",
		"`jpd_de_REKOD`.`TarikhSiapSepenuhnya`" => "Tarikh Siap Sepenuhnya",
		"`jpd_de_REKOD`.`PanjangJalanM`" => "Panjang Jalan (M)",
		"`jpd_de_REKOD`.`LebarM`" => "Lebar (M)",
		"`jpd_de_REKOD`.`Latitud`" => "Latitud",
		"`jpd_de_REKOD`.`Longitud`" => "Longitud",
		"`jpd_de_REKOD`.`PeruntukanDiluluskan`" => "Peruntukan Diluluskan",
		"`jpd_de_REKOD`.`peruntukan_dipinda`" => "Peruntukan Asal",
		"`jpd_de_REKOD`.`Kosprojek`" => "Kos projek",
		"`jpd_de_REKOD`.`KKSVO`" => "KKSVO",
		"`jpd_de_REKOD`.`Perbelanjaan`" => "Perbelanjaan",
		"`jpd_de_REKOD`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`jpd_de_REKOD`.`PenerimaManfaat`" => "Penerima Manfaat",
		"`jpd_de_REKOD`.`sumber_permohonan`" => "Sumber Permohonan",
		"`jpd_de_REKOD`.`catatan`" => "Catatan",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`jpd_de_REKOD`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`jpd_de_REKOD`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* AGENSI PEMBAYAR */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`jpd_de_REKOD`.`NamaKontraktor`" => "NamaKontraktor",
		"`jpd_de_REKOD`.`TarikhSST`" => "TarikhSST",
		"`jpd_de_REKOD`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`jpd_de_REKOD`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`jpd_de_REKOD`.`PanjangJalanM`" => "PanjangJalanM",
		"`jpd_de_REKOD`.`LebarM`" => "LebarM",
		"`jpd_de_REKOD`.`Latitud`" => "Latitud",
		"`jpd_de_REKOD`.`Longitud`" => "Longitud",
		"FORMAT(`jpd_de_REKOD`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`jpd_de_REKOD`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`jpd_de_REKOD`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`jpd_de_REKOD`.`KKSVO`, 2)" => "KKSVO",
		"`jpd_de_REKOD`.`Perbelanjaan`" => "Perbelanjaan",
		"`jpd_de_REKOD`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`jpd_de_REKOD`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`jpd_de_REKOD`.`sumber_permohonan`" => "sumber_permohonan",
		"`jpd_de_REKOD`.`catatan`" => "catatan",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['tahun_laksana' => 'Tahun laksana', 'Kelulusan' => 'Kelulusan', 'negeri' => 'Negeri', 'Daerah' => 'Daerah', 'Parlimen' => 'Parlimen', 'DUN' => 'DUN', 'AgensiPelaksana' => 'Agensi Pelaksana', 'agensi_pembayar' => 'AGENSI PEMBAYAR', 'penyelia_projek' => 'Penyelia projek', 'Status' => 'Status', ];

	$x->QueryFrom = "`jpd_de_REKOD` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`jpd_de_REKOD`.`tahun_laksana` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`jpd_de_REKOD`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`jpd_de_REKOD`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`jpd_de_REKOD`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`jpd_de_REKOD`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`jpd_de_REKOD`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`jpd_de_REKOD`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`jpd_de_REKOD`.`agensi_pembayar` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`jpd_de_REKOD`.`penyelia_projek` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`jpd_de_REKOD`.`Status` ";
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
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'jpd_de_REKOD_view.php';
	$x->RedirectAfterInsert = 'jpd_de_REKOD_view.php?SelectedID=#ID#';
	$x->TableTitle = 'REKOD JPD DE';
	$x->TableIcon = 'resources/table_icons/car.png';
	$x->PrimaryKey = '`jpd_de_REKOD`.`ID`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Tahun laksana', 'Kelulusan', 'Nama Projek', 'Negeri', 'Daerah', 'Parlimen', 'DUN', 'Agensi Pelaksana', 'AGENSI PEMBAYAR', 'Penyelia projek', 'Nama Kontraktor', 'Tarikh SST', 'Tarikh Siap Projek', 'Tarikh Siap Sepenuhnya', 'Panjang Jalan (M)', 'Lebar (M)', 'Latitud', 'Longitud', 'Peruntukan Diluluskan', 'Peruntukan Asal', 'Kos projek', 'KKSVO', 'Perbelanjaan', 'penjimatan', 'Status', 'Penerima Manfaat', 'Sumber Permohonan', 'Catatan', 'Gambar projek', 'Gambar projek', 'Gambar projek', ];
	$x->ColFieldName = ['tahun_laksana', 'Kelulusan', 'NamaProjek', 'negeri', 'Daerah', 'Parlimen', 'DUN', 'AgensiPelaksana', 'agensi_pembayar', 'penyelia_projek', 'NamaKontraktor', 'TarikhSST', 'TarikhSiapProjek', 'TarikhSiapSepenuhnya', 'PanjangJalanM', 'LebarM', 'Latitud', 'Longitud', 'PeruntukanDiluluskan', 'peruntukan_dipinda', 'Kosprojek', 'KKSVO', 'Perbelanjaan', 'penjimatan', 'Status', 'PenerimaManfaat', 'sumber_permohonan', 'catatan', 'gambar1', 'gambar2', 'gambar3', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/jpd_de_REKOD_templateTV.html';
	$x->SelectedTemplate = 'templates/jpd_de_REKOD_templateTVS.html';
	$x->TemplateDV = 'templates/jpd_de_REKOD_templateDV.html';
	$x->TemplateDVP = 'templates/jpd_de_REKOD_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = true;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: jpd_de_REKOD_init
	$render = true;
	if(function_exists('jpd_de_REKOD_init')) {
		$args = [];
		$render = jpd_de_REKOD_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// column sums
	if(strpos($x->HTML, '<!-- tv data below -->')) {
		// if printing multi-selection TV, calculate the sum only for the selected records
		if(isset($_REQUEST['Print_x']) && is_array($_REQUEST['record_selector'])) {
			$QueryWhere = '';
			foreach($_REQUEST['record_selector'] as $id) {   // get selected records
				if($id != '') $QueryWhere .= "'" . makeSafe($id) . "',";
			}
			if($QueryWhere != '') {
				$QueryWhere = 'where `jpd_de_REKOD`.`ID` in ('.substr($QueryWhere, 0, -1).')';
			} else { // if no selected records, write the where clause to return an empty result
				$QueryWhere = 'where 1=0';
			}
		} else {
			$QueryWhere = $x->QueryWhere;
		}

		$sumQuery = "SELECT FORMAT(SUM(`jpd_de_REKOD`.`PeruntukanDiluluskan`), 2), SUM(`jpd_de_REKOD`.`peruntukan_dipinda`), FORMAT(SUM(`jpd_de_REKOD`.`Kosprojek`), 2), FORMAT(SUM(`jpd_de_REKOD`.`KKSVO`), 2), SUM(`jpd_de_REKOD`.`Perbelanjaan`), SUM(`jpd_de_REKOD`.`penjimatan`) FROM {$x->QueryFrom} {$QueryWhere}";
		$res = sql($sumQuery, $eo);
		if($row = db_fetch_row($res)) {
			$sumRow = '<tr class="success sum">';
			if(!isset($_REQUEST['Print_x'])) $sumRow .= '<th class="text-center sum">&sum;</th>';
			$sumRow .= '<td class="jpd_de_REKOD-tahun_laksana sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-Kelulusan sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-NamaProjek sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-negeri sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-Daerah sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-Parlimen sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-DUN sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-AgensiPelaksana sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-agensi_pembayar sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-penyelia_projek sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-NamaKontraktor sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-TarikhSST sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-TarikhSiapProjek sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-TarikhSiapSepenuhnya sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-PanjangJalanM sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-LebarM sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-Latitud sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-Longitud sum"></td>';
			$sumRow .= "<td class=\"jpd_de_REKOD-PeruntukanDiluluskan text-right sum\">{$row[0]}</td>";
			$sumRow .= "<td class=\"jpd_de_REKOD-peruntukan_dipinda text-right sum\">{$row[1]}</td>";
			$sumRow .= "<td class=\"jpd_de_REKOD-Kosprojek text-right sum\">{$row[2]}</td>";
			$sumRow .= "<td class=\"jpd_de_REKOD-KKSVO text-right sum\">{$row[3]}</td>";
			$sumRow .= "<td class=\"jpd_de_REKOD-Perbelanjaan text-right sum\">{$row[4]}</td>";
			$sumRow .= "<td class=\"jpd_de_REKOD-penjimatan text-right sum\">{$row[5]}</td>";
			$sumRow .= '<td class="jpd_de_REKOD-Status sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-PenerimaManfaat sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-sumber_permohonan sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-catatan sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-gambar1 sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-gambar2 sum"></td>';
			$sumRow .= '<td class="jpd_de_REKOD-gambar3 sum"></td>';
			$sumRow .= '</tr>';

			$x->HTML = str_replace('<!-- tv data below -->', '', $x->HTML);
			$x->HTML = str_replace('<!-- tv data above -->', $sumRow, $x->HTML);
		}
	}

	// hook: jpd_de_REKOD_header
	$headerCode = '';
	if(function_exists('jpd_de_REKOD_header')) {
		$args = [];
		$headerCode = jpd_de_REKOD_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: jpd_de_REKOD_footer
	$footerCode = '';
	if(function_exists('jpd_de_REKOD_footer')) {
		$args = [];
		$footerCode = jpd_de_REKOD_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
