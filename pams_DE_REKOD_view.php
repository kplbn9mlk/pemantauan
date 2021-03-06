<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/pams_DE_REKOD.php");
	include_once("{$currDir}/pams_DE_REKOD_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('pams_DE_REKOD');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'pams_DE_REKOD';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`pams_DE_REKOD`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`pams_DE_REKOD`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`pams_DE_REKOD`.`NamaKontraktor`" => "NamaKontraktor",
		"`pams_DE_REKOD`.`TarikhSST`" => "TarikhSST",
		"`pams_DE_REKOD`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`pams_DE_REKOD`.`TarikhSiapSebenar`" => "TarikhSiapSebenar",
		"`pams_DE_REKOD`.`PanjangJalanM`" => "PanjangJalanM",
		"`pams_DE_REKOD`.`LebarM`" => "LebarM",
		"`pams_DE_REKOD`.`Latitud`" => "Latitud",
		"`pams_DE_REKOD`.`Longitud`" => "Longitud",
		"FORMAT(`pams_DE_REKOD`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`pams_DE_REKOD`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`pams_DE_REKOD`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`pams_DE_REKOD`.`KKSVO`, 2)" => "KKSVO",
		"`pams_DE_REKOD`.`Perbelanjaan`" => "Perbelanjaan",
		"`pams_DE_REKOD`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`pams_DE_REKOD`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`pams_DE_REKOD`.`sumber_permohonan`" => "sumber_permohonan",
		"`pams_DE_REKOD`.`catatan`" => "catatan",
		"`pams_DE_REKOD`.`gambar_projek`" => "gambar_projek",
		"`pams_DE_REKOD`.`gambar_projek_1`" => "gambar_projek_1",
		"`pams_DE_REKOD`.`gambar_projek_2`" => "gambar_projek_2",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`pams_DE_REKOD`.`id`',
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
		20 => '`pams_DE_REKOD`.`PeruntukanDiluluskan`',
		21 => '`pams_DE_REKOD`.`peruntukan_dipinda`',
		22 => '`pams_DE_REKOD`.`Kosprojek`',
		23 => '`pams_DE_REKOD`.`KKSVO`',
		24 => '`pams_DE_REKOD`.`Perbelanjaan`',
		25 => '`pams_DE_REKOD`.`Penjimatan`',
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
		"`pams_DE_REKOD`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`pams_DE_REKOD`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`pams_DE_REKOD`.`NamaKontraktor`" => "NamaKontraktor",
		"`pams_DE_REKOD`.`TarikhSST`" => "TarikhSST",
		"`pams_DE_REKOD`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`pams_DE_REKOD`.`TarikhSiapSebenar`" => "TarikhSiapSebenar",
		"`pams_DE_REKOD`.`PanjangJalanM`" => "PanjangJalanM",
		"`pams_DE_REKOD`.`LebarM`" => "LebarM",
		"`pams_DE_REKOD`.`Latitud`" => "Latitud",
		"`pams_DE_REKOD`.`Longitud`" => "Longitud",
		"FORMAT(`pams_DE_REKOD`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`pams_DE_REKOD`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`pams_DE_REKOD`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`pams_DE_REKOD`.`KKSVO`, 2)" => "KKSVO",
		"`pams_DE_REKOD`.`Perbelanjaan`" => "Perbelanjaan",
		"`pams_DE_REKOD`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`pams_DE_REKOD`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`pams_DE_REKOD`.`sumber_permohonan`" => "sumber_permohonan",
		"`pams_DE_REKOD`.`catatan`" => "catatan",
		"`pams_DE_REKOD`.`gambar_projek`" => "gambar_projek",
		"`pams_DE_REKOD`.`gambar_projek_1`" => "gambar_projek_1",
		"`pams_DE_REKOD`.`gambar_projek_2`" => "gambar_projek_2",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`pams_DE_REKOD`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "Tahun laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`pams_DE_REKOD`.`NamaProjek`" => "Nama Projek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "Agensi Pelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "Agensi Pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "Penyelia projek",
		"`pams_DE_REKOD`.`NamaKontraktor`" => "Nama Kontraktor",
		"`pams_DE_REKOD`.`TarikhSST`" => "Tarikh SST",
		"`pams_DE_REKOD`.`TarikhSiapProjek`" => "Tarikh Siap Projek",
		"`pams_DE_REKOD`.`TarikhSiapSebenar`" => "Tarikh Siap Sebenar",
		"`pams_DE_REKOD`.`PanjangJalanM`" => " Panjang Jalan (M)",
		"`pams_DE_REKOD`.`LebarM`" => "Lebar (M)",
		"`pams_DE_REKOD`.`Latitud`" => "Latitud",
		"`pams_DE_REKOD`.`Longitud`" => "Longitud",
		"`pams_DE_REKOD`.`PeruntukanDiluluskan`" => "Peruntukan Diluluskan",
		"`pams_DE_REKOD`.`peruntukan_dipinda`" => "Peruntukan asal",
		"`pams_DE_REKOD`.`Kosprojek`" => "Kos projek",
		"`pams_DE_REKOD`.`KKSVO`" => "KKS / VO",
		"`pams_DE_REKOD`.`Perbelanjaan`" => "Perbelanjaan",
		"`pams_DE_REKOD`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`pams_DE_REKOD`.`PenerimaManfaat`" => "Penerima Manfaat",
		"`pams_DE_REKOD`.`sumber_permohonan`" => "Sumber Permohonan",
		"`pams_DE_REKOD`.`catatan`" => "Catatan",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`pams_DE_REKOD`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`pams_DE_REKOD`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`pams_DE_REKOD`.`NamaKontraktor`" => "NamaKontraktor",
		"`pams_DE_REKOD`.`TarikhSST`" => "TarikhSST",
		"`pams_DE_REKOD`.`TarikhSiapProjek`" => "TarikhSiapProjek",
		"`pams_DE_REKOD`.`TarikhSiapSebenar`" => "TarikhSiapSebenar",
		"`pams_DE_REKOD`.`PanjangJalanM`" => "PanjangJalanM",
		"`pams_DE_REKOD`.`LebarM`" => "LebarM",
		"`pams_DE_REKOD`.`Latitud`" => "Latitud",
		"`pams_DE_REKOD`.`Longitud`" => "Longitud",
		"FORMAT(`pams_DE_REKOD`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`pams_DE_REKOD`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`pams_DE_REKOD`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`pams_DE_REKOD`.`KKSVO`, 2)" => "KKSVO",
		"`pams_DE_REKOD`.`Perbelanjaan`" => "Perbelanjaan",
		"`pams_DE_REKOD`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"`pams_DE_REKOD`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`pams_DE_REKOD`.`sumber_permohonan`" => "sumber_permohonan",
		"`pams_DE_REKOD`.`catatan`" => "catatan",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['tahun_laksana' => 'Tahun laksana', 'Kelulusan' => 'Kelulusan', 'negeri' => 'Negeri', 'Daerah' => 'Daerah', 'Parlimen' => 'Parlimen', 'DUN' => 'DUN', 'AgensiPelaksana' => 'Agensi Pelaksana', 'agensi_pembayar' => 'Agensi Pembayar', 'penyelia_projek' => 'Penyelia projek', 'Status' => 'Status', ];

	$x->QueryFrom = "`pams_DE_REKOD` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pams_DE_REKOD`.`tahun_laksana` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`pams_DE_REKOD`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pams_DE_REKOD`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pams_DE_REKOD`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pams_DE_REKOD`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pams_DE_REKOD`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`pams_DE_REKOD`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`pams_DE_REKOD`.`agensi_pembayar` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`pams_DE_REKOD`.`penyelia_projek` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`pams_DE_REKOD`.`Status` ";
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
	$x->ScriptFileName = 'pams_DE_REKOD_view.php';
	$x->RedirectAfterInsert = 'pams_DE_REKOD_view.php?SelectedID=#ID#';
	$x->TableTitle = 'REKOD PAMS DE';
	$x->TableIcon = 'resources/table_icons/house.png';
	$x->PrimaryKey = '`pams_DE_REKOD`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Tahun laksana', 'Kelulusan', 'Nama Projek', 'Negeri', 'Daerah', 'Parlimen', 'DUN', 'Agensi Pelaksana', 'Agensi Pembayar', 'Penyelia projek', 'Nama Kontraktor', 'Tarikh SST', 'Tarikh Siap Projek', 'Tarikh Siap Sebenar', ' Panjang Jalan (M)', 'Lebar (M)', 'Latitud', 'Longitud', 'Peruntukan Diluluskan', 'Peruntukan asal', 'Kos projek', 'KKS / VO', 'Perbelanjaan', 'Penjimatan', 'Status', 'Penerima Manfaat', 'Sumber Permohonan', 'Catatan', 'Gambar projek', 'Gambar projek', 'Gambar projek', ];
	$x->ColFieldName = ['tahun_laksana', 'Kelulusan', 'NamaProjek', 'negeri', 'Daerah', 'Parlimen', 'DUN', 'AgensiPelaksana', 'agensi_pembayar', 'penyelia_projek', 'NamaKontraktor', 'TarikhSST', 'TarikhSiapProjek', 'TarikhSiapSebenar', 'PanjangJalanM', 'LebarM', 'Latitud', 'Longitud', 'PeruntukanDiluluskan', 'peruntukan_dipinda', 'Kosprojek', 'KKSVO', 'Perbelanjaan', 'Penjimatan', 'Status', 'PenerimaManfaat', 'sumber_permohonan', 'catatan', 'gambar_projek', 'gambar_projek_1', 'gambar_projek_2', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/pams_DE_REKOD_templateTV.html';
	$x->SelectedTemplate = 'templates/pams_DE_REKOD_templateTVS.html';
	$x->TemplateDV = 'templates/pams_DE_REKOD_templateDV.html';
	$x->TemplateDVP = 'templates/pams_DE_REKOD_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = true;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: pams_DE_REKOD_init
	$render = true;
	if(function_exists('pams_DE_REKOD_init')) {
		$args = [];
		$render = pams_DE_REKOD_init($x, getMemberInfo(), $args);
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
				$QueryWhere = 'where `pams_DE_REKOD`.`id` in ('.substr($QueryWhere, 0, -1).')';
			} else { // if no selected records, write the where clause to return an empty result
				$QueryWhere = 'where 1=0';
			}
		} else {
			$QueryWhere = $x->QueryWhere;
		}

		$sumQuery = "SELECT FORMAT(SUM(`pams_DE_REKOD`.`PeruntukanDiluluskan`), 2), SUM(`pams_DE_REKOD`.`peruntukan_dipinda`), FORMAT(SUM(`pams_DE_REKOD`.`Kosprojek`), 2), FORMAT(SUM(`pams_DE_REKOD`.`KKSVO`), 2), SUM(`pams_DE_REKOD`.`Perbelanjaan`), SUM(`pams_DE_REKOD`.`Penjimatan`) FROM {$x->QueryFrom} {$QueryWhere}";
		$res = sql($sumQuery, $eo);
		if($row = db_fetch_row($res)) {
			$sumRow = '<tr class="success sum">';
			if(!isset($_REQUEST['Print_x'])) $sumRow .= '<th class="text-center sum">&sum;</th>';
			$sumRow .= '<td class="pams_DE_REKOD-tahun_laksana sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-Kelulusan sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-NamaProjek sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-negeri sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-Daerah sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-Parlimen sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-DUN sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-AgensiPelaksana sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-agensi_pembayar sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-penyelia_projek sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-NamaKontraktor sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-TarikhSST sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-TarikhSiapProjek sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-TarikhSiapSebenar sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-PanjangJalanM sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-LebarM sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-Latitud sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-Longitud sum"></td>';
			$sumRow .= "<td class=\"pams_DE_REKOD-PeruntukanDiluluskan text-right sum\">{$row[0]}</td>";
			$sumRow .= "<td class=\"pams_DE_REKOD-peruntukan_dipinda text-right sum\">{$row[1]}</td>";
			$sumRow .= "<td class=\"pams_DE_REKOD-Kosprojek text-right sum\">{$row[2]}</td>";
			$sumRow .= "<td class=\"pams_DE_REKOD-KKSVO text-right sum\">{$row[3]}</td>";
			$sumRow .= "<td class=\"pams_DE_REKOD-Perbelanjaan text-right sum\">{$row[4]}</td>";
			$sumRow .= "<td class=\"pams_DE_REKOD-Penjimatan text-right sum\">{$row[5]}</td>";
			$sumRow .= '<td class="pams_DE_REKOD-Status sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-PenerimaManfaat sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-sumber_permohonan sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-catatan sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-gambar_projek sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-gambar_projek_1 sum"></td>';
			$sumRow .= '<td class="pams_DE_REKOD-gambar_projek_2 sum"></td>';
			$sumRow .= '</tr>';

			$x->HTML = str_replace('<!-- tv data below -->', '', $x->HTML);
			$x->HTML = str_replace('<!-- tv data above -->', $sumRow, $x->HTML);
		}
	}

	// hook: pams_DE_REKOD_header
	$headerCode = '';
	if(function_exists('pams_DE_REKOD_header')) {
		$args = [];
		$headerCode = pams_DE_REKOD_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: pams_DE_REKOD_footer
	$footerCode = '';
	if(function_exists('pams_DE_REKOD_footer')) {
		$args = [];
		$footerCode = pams_DE_REKOD_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
