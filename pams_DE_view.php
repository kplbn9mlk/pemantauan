<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/pams_DE.php");
	include_once("{$currDir}/pams_DE_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('pams_DE');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'pams_DE';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`pams_DE`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`pams_DE`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"`pams_DE`.`sumber_permohonan`" => "sumber_permohonan",
		"`pams_DE`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`pams_DE`.`TarikhTawaranSSTLantikan`,date_format(`pams_DE`.`TarikhTawaranSSTLantikan`,'%d/%m/%Y'),'')" => "TarikhTawaranSSTLantikan",
		"if(`pams_DE`.`TarikhSiapProjek`,date_format(`pams_DE`.`TarikhSiapProjek`,'%d/%m/%Y'),'')" => "TarikhSiapProjek",
		"`pams_DE`.`TarikhSiapSebenar`" => "TarikhSiapSebenar",
		"`pams_DE`.`PanjangJalanM`" => "PanjangJalanM",
		"`pams_DE`.`LebarM`" => "LebarM",
		"`pams_DE`.`Longitud`" => "Longitud",
		"FORMAT(`pams_DE`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"IF(    CHAR_LENGTH(`skop_pams1`.`skop_pams`), CONCAT_WS('',   `skop_pams1`.`skop_pams`), '') /* Skop Kerja */" => "skop",
		"`pams_DE`.`gambar_projek`" => "gambar_projek",
		"`pams_DE`.`Peta`" => "Peta",
		"`pams_DE`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`pams_DE`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`pams_DE`.`KKSVO`, 2)" => "KKSVO",
		"`pams_DE`.`Perbelanjaan`" => "Perbelanjaan",
		"`pams_DE`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`pams_DE`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`pams_DE`.`catatan`" => "catatan",
		"`pams_DE`.`inden`" => "inden",
		"`pams_DE`.`Baucer`" => "Baucer",
		"`pams_DE`.`gambar_projek_1`" => "gambar_projek_1",
		"`pams_DE`.`gambar_projek_2`" => "gambar_projek_2",
		"`pams_DE`.`updated`" => "updated",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`pams_DE`.`id`',
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
		12 => 12,
		13 => 13,
		14 => '`pams_DE`.`TarikhTawaranSSTLantikan`',
		15 => '`pams_DE`.`TarikhSiapProjek`',
		16 => 16,
		17 => 17,
		18 => 18,
		19 => 19,
		20 => '`pams_DE`.`PeruntukanDiluluskan`',
		21 => '`skop_pams1`.`skop_pams`',
		22 => 22,
		23 => 23,
		24 => '`pams_DE`.`peruntukan_dipinda`',
		25 => '`pams_DE`.`Kosprojek`',
		26 => '`pams_DE`.`KKSVO`',
		27 => '`pams_DE`.`Perbelanjaan`',
		28 => '`pams_DE`.`Penjimatan`',
		29 => '`status_pelaksanaan1`.`status_laksana`',
		30 => '`penyelia_projek1`.`nama_penyelia`',
		31 => 31,
		32 => 32,
		33 => 33,
		34 => 34,
		35 => 35,
		36 => 36,
		37 => 37,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`pams_DE`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`pams_DE`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"`pams_DE`.`sumber_permohonan`" => "sumber_permohonan",
		"`pams_DE`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`pams_DE`.`TarikhTawaranSSTLantikan`,date_format(`pams_DE`.`TarikhTawaranSSTLantikan`,'%d/%m/%Y'),'')" => "TarikhTawaranSSTLantikan",
		"if(`pams_DE`.`TarikhSiapProjek`,date_format(`pams_DE`.`TarikhSiapProjek`,'%d/%m/%Y'),'')" => "TarikhSiapProjek",
		"`pams_DE`.`TarikhSiapSebenar`" => "TarikhSiapSebenar",
		"`pams_DE`.`PanjangJalanM`" => "PanjangJalanM",
		"`pams_DE`.`LebarM`" => "LebarM",
		"`pams_DE`.`Longitud`" => "Longitud",
		"FORMAT(`pams_DE`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"IF(    CHAR_LENGTH(`skop_pams1`.`skop_pams`), CONCAT_WS('',   `skop_pams1`.`skop_pams`), '') /* Skop Kerja */" => "skop",
		"`pams_DE`.`gambar_projek`" => "gambar_projek",
		"`pams_DE`.`Peta`" => "Peta",
		"`pams_DE`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`pams_DE`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`pams_DE`.`KKSVO`, 2)" => "KKSVO",
		"`pams_DE`.`Perbelanjaan`" => "Perbelanjaan",
		"`pams_DE`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`pams_DE`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`pams_DE`.`catatan`" => "catatan",
		"`pams_DE`.`inden`" => "inden",
		"`pams_DE`.`Baucer`" => "Baucer",
		"`pams_DE`.`gambar_projek_1`" => "gambar_projek_1",
		"`pams_DE`.`gambar_projek_2`" => "gambar_projek_2",
		"`pams_DE`.`updated`" => "updated",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`pams_DE`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "Tahun laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Sumber Peruntukan",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`pams_DE`.`NamaProjek`" => "Nama Projek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "Agensi Pelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "Agensi Pembayar",
		"`pams_DE`.`sumber_permohonan`" => "Sumber Permohonan",
		"`pams_DE`.`NamaKontraktor`" => "Nama Kontraktor",
		"`pams_DE`.`TarikhTawaranSSTLantikan`" => "Tarikh SST ",
		"`pams_DE`.`TarikhSiapProjek`" => "Tarikh Siap Projek",
		"`pams_DE`.`TarikhSiapSebenar`" => "Tarikh Siap Sebenar",
		"`pams_DE`.`PanjangJalanM`" => " Panjang Jalan (M)",
		"`pams_DE`.`LebarM`" => "Lebar (M)",
		"`pams_DE`.`Longitud`" => "Longitud",
		"`pams_DE`.`PeruntukanDiluluskan`" => "Peruntukan Diluluskan",
		"IF(    CHAR_LENGTH(`skop_pams1`.`skop_pams`), CONCAT_WS('',   `skop_pams1`.`skop_pams`), '') /* Skop Kerja */" => "Skop Kerja",
		"`pams_DE`.`Peta`" => "Peta",
		"`pams_DE`.`peruntukan_dipinda`" => "Peruntukan asal",
		"`pams_DE`.`Kosprojek`" => "Kos projek",
		"`pams_DE`.`KKSVO`" => "KKS / VO",
		"`pams_DE`.`Perbelanjaan`" => "Perbelanjaan",
		"`pams_DE`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "Penyelia projek",
		"`pams_DE`.`PenerimaManfaat`" => "Penerima Manfaat",
		"`pams_DE`.`catatan`" => "Catatan",
		"`pams_DE`.`inden`" => "Inden Kerja",
		"`pams_DE`.`Baucer`" => "Baucer Bayaran",
		"`pams_DE`.`updated`" => "Dikemaskini Oleh",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`pams_DE`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`pams_DE`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"`pams_DE`.`sumber_permohonan`" => "sumber_permohonan",
		"`pams_DE`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`pams_DE`.`TarikhTawaranSSTLantikan`,date_format(`pams_DE`.`TarikhTawaranSSTLantikan`,'%d/%m/%Y'),'')" => "TarikhTawaranSSTLantikan",
		"if(`pams_DE`.`TarikhSiapProjek`,date_format(`pams_DE`.`TarikhSiapProjek`,'%d/%m/%Y'),'')" => "TarikhSiapProjek",
		"`pams_DE`.`TarikhSiapSebenar`" => "TarikhSiapSebenar",
		"`pams_DE`.`PanjangJalanM`" => "PanjangJalanM",
		"`pams_DE`.`LebarM`" => "LebarM",
		"`pams_DE`.`Longitud`" => "Longitud",
		"FORMAT(`pams_DE`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"IF(    CHAR_LENGTH(`skop_pams1`.`skop_pams`), CONCAT_WS('',   `skop_pams1`.`skop_pams`), '') /* Skop Kerja */" => "skop",
		"`pams_DE`.`Peta`" => "Peta",
		"`pams_DE`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`pams_DE`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`pams_DE`.`KKSVO`, 2)" => "KKSVO",
		"`pams_DE`.`Perbelanjaan`" => "Perbelanjaan",
		"`pams_DE`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`pams_DE`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`pams_DE`.`catatan`" => "catatan",
		"`pams_DE`.`inden`" => "inden",
		"`pams_DE`.`Baucer`" => "Baucer",
		"`pams_DE`.`updated`" => "updated",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['tahun_laksana' => 'Tahun laksana', 'Waran' => 'Sumber Peruntukan', 'Kelulusan' => 'Kelulusan', 'negeri' => 'Negeri', 'Daerah' => 'Daerah', 'Parlimen' => 'Parlimen', 'DUN' => 'DUN', 'AgensiPelaksana' => 'Agensi Pelaksana', 'agensi_pembayar' => 'Agensi Pembayar', 'skop' => 'Skop Kerja', 'Status' => 'Status', 'penyelia_projek' => 'Penyelia projek', ];

	$x->QueryFrom = "`pams_DE` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pams_DE`.`tahun_laksana` LEFT JOIN `waran` as waran1 ON `waran1`.`id`=`pams_DE`.`Waran` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`pams_DE`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pams_DE`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pams_DE`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pams_DE`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pams_DE`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`pams_DE`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`pams_DE`.`agensi_pembayar` LEFT JOIN `skop_pams` as skop_pams1 ON `skop_pams1`.`id`=`pams_DE`.`skop` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`pams_DE`.`Status` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`pams_DE`.`penyelia_projek` ";
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
	$x->ScriptFileName = 'pams_DE_view.php';
	$x->RedirectAfterInsert = 'pams_DE_view.php?SelectedID=#ID#';
	$x->TableTitle = 'PAMS DE';
	$x->TableIcon = 'resources/table_icons/house.png';
	$x->PrimaryKey = '`pams_DE`.`id`';
	$x->DefaultSortField = '1';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Tahun laksana', 'Sumber Peruntukan', 'Kelulusan', 'Nama Projek', 'Negeri', 'Daerah', 'Parlimen', 'DUN', 'Nama Kontraktor', 'Tarikh SST ', 'Tarikh Siap Sebenar', 'Peruntukan Diluluskan', 'Skop Kerja', 'Gambar ', 'Peta', 'Kos projek', 'KKS / VO', 'Perbelanjaan', 'Penjimatan', 'Status', 'Penyelia projek', 'Penerima Manfaat', 'Catatan', 'Inden Kerja', 'Baucer Bayaran', 'Gambar  ', 'Gambar   ', 'Dikemaskini Oleh', ];
	$x->ColFieldName = ['tahun_laksana', 'Waran', 'Kelulusan', 'NamaProjek', 'negeri', 'Daerah', 'Parlimen', 'DUN', 'NamaKontraktor', 'TarikhTawaranSSTLantikan', 'TarikhSiapSebenar', 'PeruntukanDiluluskan', 'skop', 'gambar_projek', 'Peta', 'Kosprojek', 'KKSVO', 'Perbelanjaan', 'Penjimatan', 'Status', 'penyelia_projek', 'PenerimaManfaat', 'catatan', 'inden', 'Baucer', 'gambar_projek_1', 'gambar_projek_2', 'updated', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, 9, 13, 14, 16, 20, 21, 22, 23, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/pams_DE_templateTV.html';
	$x->SelectedTemplate = 'templates/pams_DE_templateTVS.html';
	$x->TemplateDV = 'templates/pams_DE_templateDV.html';
	$x->TemplateDVP = 'templates/pams_DE_templateDVP.html';

	$x->ShowTableHeader = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = true;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: pams_DE_init
	$render = true;
	if(function_exists('pams_DE_init')) {
		$args = [];
		$render = pams_DE_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: pams_DE_header
	$headerCode = '';
	if(function_exists('pams_DE_header')) {
		$args = [];
		$headerCode = pams_DE_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: pams_DE_footer
	$footerCode = '';
	if(function_exists('pams_DE_footer')) {
		$args = [];
		$footerCode = pams_DE_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
