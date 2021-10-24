<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/jpd_khas.php");
	include_once("{$currDir}/jpd_khas_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('jpd_khas');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'jpd_khas';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`jpd_khas`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`jpd_khas`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"`jpd_khas`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`jpd_khas`.`TarikhSST`,date_format(`jpd_khas`.`TarikhSST`,'%d/%m/%Y'),'')" => "TarikhSST",
		"if(`jpd_khas`.`TarikhSiapProjek`,date_format(`jpd_khas`.`TarikhSiapProjek`,'%d/%m/%Y'),'')" => "TarikhSiapProjek",
		"`jpd_khas`.`TarikhSiapsebenar`" => "TarikhSiapsebenar",
		"`jpd_khas`.`PanjangJalanM`" => "PanjangJalanM",
		"`jpd_khas`.`LebarM`" => "LebarM",
		"IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') /* Skop Kerja */" => "skop",
		"`jpd_khas`.`gambar_projek`" => "gambar_projek",
		"`jpd_khas`.`Latitud`" => "Latitud",
		"`jpd_khas`.`Peta`" => "Peta",
		"FORMAT(`jpd_khas`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`jpd_khas`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`jpd_khas`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`jpd_khas`.`KKSVO`, 2)" => "KKSVO",
		"`jpd_khas`.`Perbelanjaan`" => "Perbelanjaan",
		"`jpd_khas`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`jpd_khas`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`jpd_khas`.`sumber_permohonan`" => "sumber_permohonan",
		"`jpd_khas`.`catatan`" => "catatan",
		"`jpd_khas`.`inden`" => "inden",
		"`jpd_khas`.`Baucer`" => "Baucer",
		"`jpd_khas`.`gambar_projek_1`" => "gambar_projek_1",
		"`jpd_khas`.`gambar_projek_2`" => "gambar_projek_2",
		"`jpd_khas`.`updated`" => "updated",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`jpd_khas`.`ID`',
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
		13 => '`jpd_khas`.`TarikhSST`',
		14 => '`jpd_khas`.`TarikhSiapProjek`',
		15 => 15,
		16 => '`jpd_khas`.`PanjangJalanM`',
		17 => 17,
		18 => '`skop_jpd1`.`skop_jpd`',
		19 => 19,
		20 => 20,
		21 => 21,
		22 => '`jpd_khas`.`PeruntukanDiluluskan`',
		23 => '`jpd_khas`.`peruntukan_dipinda`',
		24 => '`jpd_khas`.`Kosprojek`',
		25 => '`jpd_khas`.`KKSVO`',
		26 => '`jpd_khas`.`Perbelanjaan`',
		27 => '`jpd_khas`.`penjimatan`',
		28 => '`status_pelaksanaan1`.`status_laksana`',
		29 => '`penyelia_projek1`.`nama_penyelia`',
		30 => 30,
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
		"`jpd_khas`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`jpd_khas`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"`jpd_khas`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`jpd_khas`.`TarikhSST`,date_format(`jpd_khas`.`TarikhSST`,'%d/%m/%Y'),'')" => "TarikhSST",
		"if(`jpd_khas`.`TarikhSiapProjek`,date_format(`jpd_khas`.`TarikhSiapProjek`,'%d/%m/%Y'),'')" => "TarikhSiapProjek",
		"`jpd_khas`.`TarikhSiapsebenar`" => "TarikhSiapsebenar",
		"`jpd_khas`.`PanjangJalanM`" => "PanjangJalanM",
		"`jpd_khas`.`LebarM`" => "LebarM",
		"IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') /* Skop Kerja */" => "skop",
		"`jpd_khas`.`gambar_projek`" => "gambar_projek",
		"`jpd_khas`.`Latitud`" => "Latitud",
		"`jpd_khas`.`Peta`" => "Peta",
		"FORMAT(`jpd_khas`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`jpd_khas`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`jpd_khas`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`jpd_khas`.`KKSVO`, 2)" => "KKSVO",
		"`jpd_khas`.`Perbelanjaan`" => "Perbelanjaan",
		"`jpd_khas`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`jpd_khas`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`jpd_khas`.`sumber_permohonan`" => "sumber_permohonan",
		"`jpd_khas`.`catatan`" => "catatan",
		"`jpd_khas`.`inden`" => "inden",
		"`jpd_khas`.`Baucer`" => "Baucer",
		"`jpd_khas`.`gambar_projek_1`" => "gambar_projek_1",
		"`jpd_khas`.`gambar_projek_2`" => "gambar_projek_2",
		"`jpd_khas`.`updated`" => "updated",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`jpd_khas`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "Tahun laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Sumber Peruntukan",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`jpd_khas`.`NamaProjek`" => "Nama Projek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "Agensi Pelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "Agensi Pembayar",
		"`jpd_khas`.`NamaKontraktor`" => "Nama Kontraktor",
		"`jpd_khas`.`TarikhSST`" => "Tarikh SST ",
		"`jpd_khas`.`TarikhSiapProjek`" => "Tarikh Siap Projek",
		"`jpd_khas`.`TarikhSiapsebenar`" => "Tarikh Siap Sebenar",
		"`jpd_khas`.`PanjangJalanM`" => "Panjang Jalan (M)",
		"`jpd_khas`.`LebarM`" => "Lebar (M)",
		"IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') /* Skop Kerja */" => "Skop Kerja",
		"`jpd_khas`.`Latitud`" => "Latitud",
		"`jpd_khas`.`Peta`" => "Peta",
		"`jpd_khas`.`PeruntukanDiluluskan`" => "Peruntukan Diluluskan",
		"`jpd_khas`.`peruntukan_dipinda`" => "Peruntukan asal",
		"`jpd_khas`.`Kosprojek`" => "Kos projek",
		"`jpd_khas`.`KKSVO`" => "KKSVO",
		"`jpd_khas`.`Perbelanjaan`" => "Perbelanjaan",
		"`jpd_khas`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "Penyelia projek",
		"`jpd_khas`.`PenerimaManfaat`" => "Penerima Manfaat",
		"`jpd_khas`.`sumber_permohonan`" => "Sumber Permohonan",
		"`jpd_khas`.`catatan`" => "Catatan",
		"`jpd_khas`.`inden`" => "Inden Kerja",
		"`jpd_khas`.`Baucer`" => "Baucer Bayaran",
		"`jpd_khas`.`updated`" => "Dikemaskini Oleh",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`jpd_khas`.`ID`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') /* Sumber Peruntukan */" => "Waran",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`jpd_khas`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"`jpd_khas`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`jpd_khas`.`TarikhSST`,date_format(`jpd_khas`.`TarikhSST`,'%d/%m/%Y'),'')" => "TarikhSST",
		"if(`jpd_khas`.`TarikhSiapProjek`,date_format(`jpd_khas`.`TarikhSiapProjek`,'%d/%m/%Y'),'')" => "TarikhSiapProjek",
		"`jpd_khas`.`TarikhSiapsebenar`" => "TarikhSiapsebenar",
		"`jpd_khas`.`PanjangJalanM`" => "PanjangJalanM",
		"`jpd_khas`.`LebarM`" => "LebarM",
		"IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') /* Skop Kerja */" => "skop",
		"`jpd_khas`.`Latitud`" => "Latitud",
		"`jpd_khas`.`Peta`" => "Peta",
		"FORMAT(`jpd_khas`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`jpd_khas`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`jpd_khas`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`jpd_khas`.`KKSVO`, 2)" => "KKSVO",
		"`jpd_khas`.`Perbelanjaan`" => "Perbelanjaan",
		"`jpd_khas`.`penjimatan`" => "penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`jpd_khas`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`jpd_khas`.`sumber_permohonan`" => "sumber_permohonan",
		"`jpd_khas`.`catatan`" => "catatan",
		"`jpd_khas`.`inden`" => "inden",
		"`jpd_khas`.`Baucer`" => "Baucer",
		"`jpd_khas`.`updated`" => "updated",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['tahun_laksana' => 'Tahun laksana', 'Waran' => 'Sumber Peruntukan', 'Kelulusan' => 'Kelulusan', 'negeri' => 'Negeri', 'Daerah' => 'Daerah', 'Parlimen' => 'Parlimen', 'DUN' => 'DUN', 'AgensiPelaksana' => 'Agensi Pelaksana', 'agensi_pembayar' => 'Agensi Pembayar', 'skop' => 'Skop Kerja', 'Status' => 'Status', 'penyelia_projek' => 'Penyelia projek', ];

	$x->QueryFrom = "`jpd_khas` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`jpd_khas`.`tahun_laksana` LEFT JOIN `waran` as waran1 ON `waran1`.`id`=`jpd_khas`.`Waran` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`jpd_khas`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`jpd_khas`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`jpd_khas`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`jpd_khas`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`jpd_khas`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`jpd_khas`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`jpd_khas`.`agensi_pembayar` LEFT JOIN `skop_jpd` as skop_jpd1 ON `skop_jpd1`.`id`=`jpd_khas`.`skop` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`jpd_khas`.`Status` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`jpd_khas`.`penyelia_projek` ";
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
	$x->ScriptFileName = 'jpd_khas_view.php';
	$x->RedirectAfterInsert = 'jpd_khas_view.php';
	$x->TableTitle = 'JPD KHAS';
	$x->TableIcon = 'resources/table_icons/car.png';
	$x->PrimaryKey = '`jpd_khas`.`ID`';
	$x->DefaultSortField = '1';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Tahun laksana', 'Sumber Peruntukan', 'Kelulusan', 'Nama Projek', 'Negeri', 'Daerah', 'Parlimen', 'DUN', 'Nama Kontraktor', 'Tarikh SST ', 'Tarikh Siap Sebenar', 'Panjang Jalan (M)', 'Lebar (M)', 'Skop Kerja', 'Gambar ', 'Peta', 'Peruntukan Diluluskan', 'Kos projek', 'KKSVO', 'Perbelanjaan', 'penjimatan', 'Status', 'Penyelia projek', 'Penerima Manfaat', 'Catatan', 'Inden Kerja', 'Baucer Bayaran', 'Gambar   ', 'Gambar projek', 'Dikemaskini Oleh', ];
	$x->ColFieldName = ['tahun_laksana', 'Waran', 'Kelulusan', 'NamaProjek', 'negeri', 'Daerah', 'Parlimen', 'DUN', 'NamaKontraktor', 'TarikhSST', 'TarikhSiapsebenar', 'PanjangJalanM', 'LebarM', 'skop', 'gambar_projek', 'Peta', 'PeruntukanDiluluskan', 'Kosprojek', 'KKSVO', 'Perbelanjaan', 'penjimatan', 'Status', 'penyelia_projek', 'PenerimaManfaat', 'catatan', 'inden', 'Baucer', 'gambar_projek_1', 'gambar_projek_2', 'updated', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, 9, 12, 13, 15, 16, 17, 18, 19, 21, 22, 24, 25, 26, 27, 28, 29, 30, 32, 33, 34, 35, 36, 37, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/jpd_khas_templateTV.html';
	$x->SelectedTemplate = 'templates/jpd_khas_templateTVS.html';
	$x->TemplateDV = 'templates/jpd_khas_templateDV.html';
	$x->TemplateDVP = 'templates/jpd_khas_templateDVP.html';

	$x->ShowTableHeader = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = true;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: jpd_khas_init
	$render = true;
	if(function_exists('jpd_khas_init')) {
		$args = [];
		$render = jpd_khas_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: jpd_khas_header
	$headerCode = '';
	if(function_exists('jpd_khas_header')) {
		$args = [];
		$headerCode = jpd_khas_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: jpd_khas_footer
	$footerCode = '';
	if(function_exists('jpd_khas_footer')) {
		$args = [];
		$footerCode = jpd_khas_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}