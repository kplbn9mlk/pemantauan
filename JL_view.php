<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/JL.php");
	include_once("{$currDir}/JL_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('JL');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'JL';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`JL`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`JL`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"`JL`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`JL`.`TarikhSST`,date_format(`JL`.`TarikhSST`,'%d/%m/%Y'),'')" => "TarikhSST",
		"if(`JL`.`TarikhSiapProjek`,date_format(`JL`.`TarikhSiapProjek`,'%d/%m/%Y'),'')" => "TarikhSiapProjek",
		"`JL`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`JL`.`PanjangJalanM`" => "PanjangJalanM",
		"`JL`.`LebarM`" => "LebarM",
		"IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') /* Skop Kerja */" => "skop",
		"`JL`.`gambar_projek`" => "gambar_projek",
		"`JL`.`Latitud`" => "Latitud",
		"`JL`.`Peta`" => "Peta",
		"FORMAT(`JL`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`JL`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`JL`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`JL`.`KKSVO`, 2)" => "KKSVO",
		"`JL`.`Perbelanjaan`" => "Perbelanjaan",
		"`JL`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`JL`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`JL`.`sumber_permohonan`" => "sumber_permohonan",
		"`JL`.`catatan`" => "catatan",
		"`JL`.`inden`" => "inden",
		"`JL`.`Baucer`" => "Baucer",
		"`JL`.`gambar_projek_1`" => "gambar_projek_1",
		"`JL`.`gambar_projek_2`" => "gambar_projek_2",
		"`JL`.`updated`" => "updated",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`JL`.`id`',
		2 => '`tahun1`.`tahun`',
		3 => '`kelulusan1`.`kelulusan_jawatankuasa`',
		4 => 4,
		5 => '`negeri1`.`nama_negeri`',
		6 => '`daerah1`.`nama_daerah`',
		7 => '`PARLIMEN1`.`nama_parlimen`',
		8 => '`Dun1`.`nama_dun`',
		9 => '`agensi_pelaksana1`.`pelaksana`',
		10 => '`agensi_bayar1`.`agensi`',
		11 => 11,
		12 => '`JL`.`TarikhSST`',
		13 => '`JL`.`TarikhSiapProjek`',
		14 => 14,
		15 => '`JL`.`PanjangJalanM`',
		16 => '`JL`.`LebarM`',
		17 => '`skop_jpd1`.`skop_jpd`',
		18 => 18,
		19 => 19,
		20 => 20,
		21 => '`JL`.`PeruntukanDiluluskan`',
		22 => '`JL`.`peruntukan_dipinda`',
		23 => '`JL`.`Kosprojek`',
		24 => '`JL`.`KKSVO`',
		25 => '`JL`.`Perbelanjaan`',
		26 => '`JL`.`Penjimatan`',
		27 => '`status_pelaksanaan1`.`status_laksana`',
		28 => '`penyelia_projek1`.`nama_penyelia`',
		29 => 29,
		30 => 30,
		31 => 31,
		32 => 32,
		33 => 33,
		34 => 34,
		35 => 35,
		36 => 36,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`JL`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`JL`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"`JL`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`JL`.`TarikhSST`,date_format(`JL`.`TarikhSST`,'%d/%m/%Y'),'')" => "TarikhSST",
		"if(`JL`.`TarikhSiapProjek`,date_format(`JL`.`TarikhSiapProjek`,'%d/%m/%Y'),'')" => "TarikhSiapProjek",
		"`JL`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`JL`.`PanjangJalanM`" => "PanjangJalanM",
		"`JL`.`LebarM`" => "LebarM",
		"IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') /* Skop Kerja */" => "skop",
		"`JL`.`gambar_projek`" => "gambar_projek",
		"`JL`.`Latitud`" => "Latitud",
		"`JL`.`Peta`" => "Peta",
		"FORMAT(`JL`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`JL`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`JL`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`JL`.`KKSVO`, 2)" => "KKSVO",
		"`JL`.`Perbelanjaan`" => "Perbelanjaan",
		"`JL`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`JL`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`JL`.`sumber_permohonan`" => "sumber_permohonan",
		"`JL`.`catatan`" => "catatan",
		"`JL`.`inden`" => "inden",
		"`JL`.`Baucer`" => "Baucer",
		"`JL`.`gambar_projek_1`" => "gambar_projek_1",
		"`JL`.`gambar_projek_2`" => "gambar_projek_2",
		"`JL`.`updated`" => "updated",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`JL`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "Tahun laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`JL`.`NamaProjek`" => "Nama Projek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "Negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "Agensi Pelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "Agensi Pembayar",
		"`JL`.`NamaKontraktor`" => "Nama Kontraktor",
		"`JL`.`TarikhSST`" => "Tarikh SST ",
		"`JL`.`TarikhSiapProjek`" => "Tarikh Siap Projek",
		"`JL`.`TarikhSiapSepenuhnya`" => "Tarikh Siap Sepenuhnya",
		"`JL`.`PanjangJalanM`" => " Panjang Jalan (M)",
		"`JL`.`LebarM`" => "Lebar (M)",
		"IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') /* Skop Kerja */" => "Skop Kerja",
		"`JL`.`Latitud`" => "Latitud",
		"`JL`.`Peta`" => "Peta",
		"`JL`.`PeruntukanDiluluskan`" => "Peruntukan Diluluskan",
		"`JL`.`peruntukan_dipinda`" => "Peruntukan asal",
		"`JL`.`Kosprojek`" => "Kos projek",
		"`JL`.`KKSVO`" => "KKS / VO",
		"`JL`.`Perbelanjaan`" => "Perbelanjaan",
		"`JL`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "Penyelia projek",
		"`JL`.`PenerimaManfaat`" => "Penerima Manfaat",
		"`JL`.`sumber_permohonan`" => "Sumber Permohonan",
		"`JL`.`catatan`" => "Catatan",
		"`JL`.`inden`" => "Inden Kerja",
		"`JL`.`Baucer`" => "Baucer Bayaran",
		"`JL`.`updated`" => "Dikemaskini Oleh",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`JL`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') /* Tahun laksana */" => "tahun_laksana",
		"IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') /* Kelulusan */" => "Kelulusan",
		"`JL`.`NamaProjek`" => "NamaProjek",
		"IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') /* Negeri */" => "negeri",
		"IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') /* Daerah */" => "Daerah",
		"IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') /* Parlimen */" => "Parlimen",
		"IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') /* DUN */" => "DUN",
		"IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') /* Agensi Pelaksana */" => "AgensiPelaksana",
		"IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') /* Agensi Pembayar */" => "agensi_pembayar",
		"`JL`.`NamaKontraktor`" => "NamaKontraktor",
		"if(`JL`.`TarikhSST`,date_format(`JL`.`TarikhSST`,'%d/%m/%Y'),'')" => "TarikhSST",
		"if(`JL`.`TarikhSiapProjek`,date_format(`JL`.`TarikhSiapProjek`,'%d/%m/%Y'),'')" => "TarikhSiapProjek",
		"`JL`.`TarikhSiapSepenuhnya`" => "TarikhSiapSepenuhnya",
		"`JL`.`PanjangJalanM`" => "PanjangJalanM",
		"`JL`.`LebarM`" => "LebarM",
		"IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') /* Skop Kerja */" => "skop",
		"`JL`.`Latitud`" => "Latitud",
		"`JL`.`Peta`" => "Peta",
		"FORMAT(`JL`.`PeruntukanDiluluskan`, 2)" => "PeruntukanDiluluskan",
		"`JL`.`peruntukan_dipinda`" => "peruntukan_dipinda",
		"FORMAT(`JL`.`Kosprojek`, 2)" => "Kosprojek",
		"FORMAT(`JL`.`KKSVO`, 2)" => "KKSVO",
		"`JL`.`Perbelanjaan`" => "Perbelanjaan",
		"`JL`.`Penjimatan`" => "Penjimatan",
		"IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') /* Status */" => "Status",
		"IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') /* Penyelia projek */" => "penyelia_projek",
		"`JL`.`PenerimaManfaat`" => "PenerimaManfaat",
		"`JL`.`sumber_permohonan`" => "sumber_permohonan",
		"`JL`.`catatan`" => "catatan",
		"`JL`.`inden`" => "inden",
		"`JL`.`Baucer`" => "Baucer",
		"`JL`.`updated`" => "updated",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['tahun_laksana' => 'Tahun laksana', 'Kelulusan' => 'Kelulusan', 'negeri' => 'Negeri', 'Daerah' => 'Daerah', 'Parlimen' => 'Parlimen', 'DUN' => 'DUN', 'AgensiPelaksana' => 'Agensi Pelaksana', 'agensi_pembayar' => 'Agensi Pembayar', 'skop' => 'Skop Kerja', 'Status' => 'Status', 'penyelia_projek' => 'Penyelia projek', ];

	$x->QueryFrom = "`JL` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`JL`.`tahun_laksana` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`JL`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`JL`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`JL`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`JL`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`JL`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`JL`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`JL`.`agensi_pembayar` LEFT JOIN `skop_jpd` as skop_jpd1 ON `skop_jpd1`.`id`=`JL`.`skop` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`JL`.`Status` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`JL`.`penyelia_projek` ";
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
	$x->ScriptFileName = 'JL_view.php';
	$x->RedirectAfterInsert = 'JL_view.php?SelectedID=#ID#';
	$x->TableTitle = 'JPL DE';
	$x->TableIcon = 'resources/table_icons/house.png';
	$x->PrimaryKey = '`JL`.`id`';
	$x->DefaultSortField = '1';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['Tahun laksana', 'Kelulusan', 'Nama Projek', 'Negeri', 'Daerah', 'Parlimen', 'DUN', 'Nama Kontraktor', 'Tarikh SST ', 'Tarikh Siap Sepenuhnya', ' Panjang Jalan (M)', 'Lebar (M)', 'Skop Kerja', 'Gambar ', 'Peta', 'Peruntukan Diluluskan', 'Kos projek', 'KKS / VO', 'Perbelanjaan', 'Penjimatan', 'Status', 'Penyelia projek', 'Penerima Manfaat', 'Sumber Permohonan', 'Catatan', 'Inden Kerja', 'Baucer Bayaran', 'Gambar  ', 'Gambar   ', 'Dikemaskini Oleh', ];
	$x->ColFieldName = ['tahun_laksana', 'Kelulusan', 'NamaProjek', 'negeri', 'Daerah', 'Parlimen', 'DUN', 'NamaKontraktor', 'TarikhSST', 'TarikhSiapSepenuhnya', 'PanjangJalanM', 'LebarM', 'skop', 'gambar_projek', 'Peta', 'PeruntukanDiluluskan', 'Kosprojek', 'KKSVO', 'Perbelanjaan', 'Penjimatan', 'Status', 'penyelia_projek', 'PenerimaManfaat', 'sumber_permohonan', 'catatan', 'inden', 'Baucer', 'gambar_projek_1', 'gambar_projek_2', 'updated', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, 11, 12, 14, 15, 16, 17, 18, 20, 21, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/JL_templateTV.html';
	$x->SelectedTemplate = 'templates/JL_templateTVS.html';
	$x->TemplateDV = 'templates/JL_templateDV.html';
	$x->TemplateDVP = 'templates/JL_templateDVP.html';

	$x->ShowTableHeader = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = true;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: JL_init
	$render = true;
	if(function_exists('JL_init')) {
		$args = [];
		$render = JL_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: JL_header
	$headerCode = '';
	if(function_exists('JL_header')) {
		$args = [];
		$headerCode = JL_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: JL_footer
	$footerCode = '';
	if(function_exists('JL_footer')) {
		$args = [];
		$footerCode = JL_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}