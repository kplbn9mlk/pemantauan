<?php

	#########################################################
	/*
	~~~~~~ LIST OF FUNCTIONS ~~~~~~
		getTableList() -- returns an associative array (tableName => tableData, tableData is array(tableCaption, tableDescription, tableIcon)) of tables accessible by current user
		get_table_groups() -- returns an associative array (table_group => tables_array)
		logInMember() -- checks POST login. If not valid, redirects to index.php, else returns TRUE
		getTablePermissions($tn) -- returns an array of permissions allowed for logged member to given table (allowAccess, allowInsert, allowView, allowEdit, allowDelete) -- allowAccess is set to true if any access level is allowed
		get_sql_fields($tn) -- returns the SELECT part of the table view query
		get_sql_from($tn[, true, [, false]]) -- returns the FROM part of the table view query, with full joins (unless third paramaeter is set to true), optionally skipping permissions if true passed as 2nd param.
		get_joined_record($table, $id[, true]) -- returns assoc array of record values for given PK value of given table, with full joins, optionally skipping permissions if true passed as 3rd param.
		get_defaults($table) -- returns assoc array of table fields as array keys and default values (or empty), excluding automatic values as array values
		htmlUserBar() -- returns html code for displaying user login status to be used on top of pages.
		showNotifications($msg, $class) -- returns html code for displaying a notification. If no parameters provided, processes the GET request for possible notifications.
		parseMySQLDate(a, b) -- returns a if valid mysql date, or b if valid mysql date, or today if b is true, or empty if b is false.
		parseCode(code) -- calculates and returns special values to be inserted in automatic fields.
		addFilter(i, filterAnd, filterField, filterOperator, filterValue) -- enforce a filter over data
		clearFilters() -- clear all filters
		loadView($view, $data) -- passes $data to templates/{$view}.php and returns the output
		loadTable($table, $data) -- loads table template, passing $data to it
		filterDropdownBy($filterable, $filterers, $parentFilterers, $parentPKField, $parentCaption, $parentTable, &$filterableCombo) -- applies cascading drop-downs for a lookup field, returns js code to be inserted into the page
		br2nl($text) -- replaces all variations of HTML <br> tags with a new line character
		htmlspecialchars_decode($text) -- inverse of htmlspecialchars()
		entitiesToUTF8($text) -- convert unicode entities (e.g. &#1234;) to actual UTF8 characters, requires multibyte string PHP extension
		func_get_args_byref() -- returns an array of arguments passed to a function, by reference
		permissions_sql($table, $level) -- returns an array containing the FROM and WHERE additions for applying permissions to an SQL query
		error_message($msg[, $back_url]) -- returns html code for a styled error message .. pass explicit false in second param to suppress back button
		toMySQLDate($formattedDate, $sep = datalist_date_separator, $ord = datalist_date_format)
		reIndex(&$arr) -- returns a copy of the given array, with keys replaced by 1-based numeric indices, and values replaced by original keys
		get_embed($provider, $url[, $width, $height, $retrieve]) -- returns embed code for a given url (supported providers: youtube, googlemap)
		check_record_permission($table, $id, $perm = 'view') -- returns true if current user has the specified permission $perm ('view', 'edit' or 'delete') for the given recors, false otherwise
		NavMenus($options) -- returns the HTML code for the top navigation menus. $options is not implemented currently.
		StyleSheet() -- returns the HTML code for included style sheet files to be placed in the <head> section.
		getUploadDir($dir) -- if dir is empty, returns upload dir configured in defaultLang.php, else returns $dir.
		PrepareUploadedFile($FieldName, $MaxSize, $FileTypes='jpg|jpeg|gif|png', $NoRename=false, $dir="") -- validates and moves uploaded file for given $FieldName into the given $dir (or the default one if empty)
		get_home_links($homeLinks, $default_classes, $tgroup) -- process $homeLinks array and return custom links for homepage. Applies $default_classes to links if links have classes defined, and filters links by $tgroup (using '*' matches all table_group values)
		quick_search_html($search_term, $label, $separate_dv = true) -- returns HTML code for the quick search box.
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	*/

	#########################################################

	function getTableList($skip_authentication = false) {
		$arrAccessTables = [];
		$arrTables = [
			/* 'table_name' => ['table caption', 'homepage description', 'icon', 'table group name'] */   
			'jpd_de' => ['JPD DE', '', 'resources/table_icons/car.png', 'PEMANTAUAN'],
			'pams_DE' => ['PAMS DE', '', 'resources/table_icons/house.png', 'PEMANTAUAN'],
			'JL' => ['JPL DE', '', 'resources/table_icons/house.png', 'PEMANTAUAN'],
			'jpd_khas' => ['JPD KHAS', '', 'resources/table_icons/car.png', 'PEMANTAUAN'],
			'pams_khas' => ['PAMS KHAS ', '', 'resources/table_icons/house.png', 'PEMANTAUAN'],
			'jpd_noc' => ['JPD NOC', '', 'resources/table_icons/car.png', 'PEMANTAUAN'],
			'pams_noc' => ['PAMS NOC', '', 'resources/table_icons/house.png', 'PEMANTAUAN'],
			'balb' => ['BEKALAN AIR', '', 'resources/table_icons/car.png', 'PEMANTAUAN'],
			'JALB' => ['JALB', '', 'resources/table_icons/car.png', 'PEMANTAUAN'],
			'BELB' => ['BELB', '', 'resources/table_icons/car.png', 'PEMANTAUAN'],
			'pprt' => ['PPRT', '', 'resources/table_icons/car.png', 'PEMANTAUAN'],
			'ljk' => ['LJK FASA 10', '', 'table.gif', 'PEMANTAUAN'],
			'pemohon_jpd' => ['MOHON JPD', '', 'resources/table_icons/car_add.png', 'PERMOHONAN'],
			'pams_mohon' => ['MOHON PAMS', '', 'resources/table_icons/car_add.png', 'PERMOHONAN'],
			'pemohon_pprt' => ['MOHON PPRT', '', 'resources/table_icons/car_add.png', 'PERMOHONAN'],
			'negeri' => ['Negeri', '', 'table.gif', 'DATABASE'],
			'daerah' => ['Daerah', '', 'table.gif', 'DATABASE'],
			'Dun' => ['Dun', '', 'table.gif', 'DATABASE'],
			'PARLIMEN' => ['PARLIMEN', '', 'table.gif', 'DATABASE'],
			'kelulusan' => ['Kelulusan', '', 'table.gif', 'DATABASE'],
			'status_pelaksanaan' => ['Status pelaksanaan', '', 'table.gif', 'DATABASE'],
			'status_kelulusan_jpd' => ['Kelulusan JPD', '', 'table.gif', 'KELULUSAN'],
			'status_kelulusan_pams' => ['Kelulusan PAMS', '', 'table.gif', 'KELULUSAN'],
			'status_kelulusan_pprt' => ['Kelulusan PPRT', '', 'table.gif', 'KELULUSAN'],
			'tahun' => ['Tahun', '', 'table.gif', 'DATABASE'],
			'penyelia_projek' => ['Penyelia projek', '', 'table.gif', 'DATABASE'],
			'agensi_pelaksana' => ['Agensi pelaksana', '', 'table.gif', 'DATABASE'],
			'agensi_bayar' => ['Agensi bayar', '', 'table.gif', 'DATABASE'],
			'waran' => ['Waran', '', 'table.gif', 'DATABASE'],
			'jpd_de_REKOD' => ['REKOD JPD DE', '', 'resources/table_icons/car.png', 'DATABASE'],
			'pams_DE_REKOD' => ['REKOD PAMS DE', '', 'resources/table_icons/house.png', 'DATABASE'],
			'jpd_test' => ['JPD test', '', 'resources/table_icons/car.png', 'DATABASE'],
			'skop_jpd' => ['Skop jpd', '', 'table.gif', 'DATABASE'],
			'skop_pams' => ['Skop pams', '', 'table.gif', 'DATABASE'],
			'Syarikat' => ['Syarikat Berjaya', '', 'table.gif', 'DATABASE'],
			'Syarikat_baru' => ['Syarikat Berdaftar', '', 'table.gif', 'DATABASE'],
			'ekasih' => ['Ekasih', '', 'table.gif', 'DATABASE'],
			'BLACKLIST' => ['BLACKLIST', '', 'table.gif', 'DATABASE'],
			'LJK_JENIS' => ['LJK JENIS', '', 'table.gif', 'DATABASE'],
			'Laporan_N9_fiz' => ['FIZIKAL N.SEMBILAN', '', 'resources/table_icons/report_edit.png', 'LAPORAN PROJEK'],
			'Kew_n9' => ['KEWANGAN NEGERI SEMBILAN', '', 'table.gif', 'LAPORAN PROJEK'],
			'Laporan_MLK_fiz' => ['FIZIKAL MELAKA', '', 'resources/table_icons/report_edit.png', 'LAPORAN PROJEK'],
			'Kew_MLK' => ['KEWANGAN MELAKA', '', 'table.gif', 'LAPORAN PROJEK'],
		];
		if($skip_authentication || getLoggedAdmin()) return $arrTables;

		if(is_array($arrTables)) {
			foreach($arrTables as $tn => $tc) {
				$arrPerm = getTablePermissions($tn);
				if($arrPerm['access']) $arrAccessTables[$tn] = $tc;
			}
		}

		return $arrAccessTables;
	}

	#########################################################

	function get_table_groups($skip_authentication = false) {
		$tables = getTableList($skip_authentication);
		$all_groups = ['LAPORAN PROJEK', 'PEMANTAUAN', 'PERMOHONAN', 'DATABASE', 'KELULUSAN'];

		$groups = [];
		foreach($all_groups as $grp) {
			foreach($tables as $tn => $td) {
				if($td[3] && $td[3] == $grp) $groups[$grp][] = $tn;
				if(!$td[3]) $groups[0][] = $tn;
			}
		}

		return $groups;
	}

	#########################################################

	function getTablePermissions($tn) {
		static $table_permissions = [];
		if(isset($table_permissions[$tn])) return $table_permissions[$tn];

		$groupID = getLoggedGroupID();
		$memberID = makeSafe(getLoggedMemberID());
		$res_group = sql("SELECT `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete` FROM `membership_grouppermissions` WHERE `groupID`='{$groupID}'", $eo);
		$res_user  = sql("SELECT `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete` FROM `membership_userpermissions`  WHERE LCASE(`memberID`)='{$memberID}'", $eo);

		while($row = db_fetch_assoc($res_group)) {
			$table_permissions[$row['tableName']] = [
				1 => intval($row['allowInsert']),
				2 => intval($row['allowView']),
				3 => intval($row['allowEdit']),
				4 => intval($row['allowDelete']),
				'insert' => intval($row['allowInsert']),
				'view' => intval($row['allowView']),
				'edit' => intval($row['allowEdit']),
				'delete' => intval($row['allowDelete'])
			];
		}

		// user-specific permissions, if specified, overwrite his group permissions
		while($row = db_fetch_assoc($res_user)) {
			$table_permissions[$row['tableName']] = [
				1 => intval($row['allowInsert']),
				2 => intval($row['allowView']),
				3 => intval($row['allowEdit']),
				4 => intval($row['allowDelete']),
				'insert' => intval($row['allowInsert']),
				'view' => intval($row['allowView']),
				'edit' => intval($row['allowEdit']),
				'delete' => intval($row['allowDelete'])
			];
		}

		// if user has any type of access, set 'access' flag
		foreach($table_permissions as $t => $p) {
			$table_permissions[$t]['access'] = $table_permissions[$t][0] = false;

			if($p['insert'] || $p['view'] || $p['edit'] || $p['delete']) {
				$table_permissions[$t]['access'] = $table_permissions[$t][0] = true;
			}
		}

		return $table_permissions[$tn];
	}

	#########################################################

	function get_sql_fields($table_name) {
		$sql_fields = [
			'jpd_de' => "`jpd_de`.`ID` as 'ID', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') as 'Waran', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `jpd_de`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', `jpd_de`.`sumber_permohonan` as 'sumber_permohonan', `jpd_de`.`NamaKontraktor` as 'NamaKontraktor', if(`jpd_de`.`TarikhSST`,date_format(`jpd_de`.`TarikhSST`,'%d/%m/%Y'),'') as 'TarikhSST', if(`jpd_de`.`TarikhSiapProjek`,date_format(`jpd_de`.`TarikhSiapProjek`,'%d/%m/%Y'),'') as 'TarikhSiapProjek', if(`jpd_de`.`TarikhSiapsebenar`,date_format(`jpd_de`.`TarikhSiapsebenar`,'%d/%m/%Y'),'') as 'TarikhSiapsebenar', `jpd_de`.`PanjangJalanM` as 'PanjangJalanM', `jpd_de`.`LebarM` as 'LebarM', IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') as 'skop', `jpd_de`.`gambar1` as 'gambar1', `jpd_de`.`Latitud` as 'Latitud', `jpd_de`.`Peta` as 'Peta', FORMAT(`jpd_de`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', `jpd_de`.`peruntukan_dipinda` as 'peruntukan_dipinda', FORMAT(`jpd_de`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`jpd_de`.`KKSVO`, 2) as 'KKSVO', `jpd_de`.`Perbelanjaan` as 'Perbelanjaan', `jpd_de`.`penjimatan` as 'penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `jpd_de`.`PenerimaManfaat` as 'PenerimaManfaat', `jpd_de`.`catatan` as 'catatan', `jpd_de`.`inden` as 'inden', `jpd_de`.`Baucer` as 'Baucer', `jpd_de`.`gambar2` as 'gambar2', `jpd_de`.`gambar3` as 'gambar3', `jpd_de`.`updated` as 'updated'",
			'pams_DE' => "`pams_DE`.`id` as 'id', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') as 'Waran', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `pams_DE`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', `pams_DE`.`sumber_permohonan` as 'sumber_permohonan', `pams_DE`.`NamaKontraktor` as 'NamaKontraktor', if(`pams_DE`.`TarikhTawaranSSTLantikan`,date_format(`pams_DE`.`TarikhTawaranSSTLantikan`,'%d/%m/%Y'),'') as 'TarikhTawaranSSTLantikan', if(`pams_DE`.`TarikhSiapProjek`,date_format(`pams_DE`.`TarikhSiapProjek`,'%d/%m/%Y'),'') as 'TarikhSiapProjek', `pams_DE`.`TarikhSiapSebenar` as 'TarikhSiapSebenar', `pams_DE`.`PanjangJalanM` as 'PanjangJalanM', `pams_DE`.`LebarM` as 'LebarM', `pams_DE`.`Longitud` as 'Longitud', FORMAT(`pams_DE`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', IF(    CHAR_LENGTH(`skop_pams1`.`skop_pams`), CONCAT_WS('',   `skop_pams1`.`skop_pams`), '') as 'skop', `pams_DE`.`gambar_projek` as 'gambar_projek', `pams_DE`.`Peta` as 'Peta', `pams_DE`.`peruntukan_dipinda` as 'peruntukan_dipinda', FORMAT(`pams_DE`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`pams_DE`.`KKSVO`, 2) as 'KKSVO', `pams_DE`.`Perbelanjaan` as 'Perbelanjaan', `pams_DE`.`Penjimatan` as 'Penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `pams_DE`.`PenerimaManfaat` as 'PenerimaManfaat', `pams_DE`.`catatan` as 'catatan', `pams_DE`.`inden` as 'inden', `pams_DE`.`Baucer` as 'Baucer', `pams_DE`.`gambar_projek_1` as 'gambar_projek_1', `pams_DE`.`gambar_projek_2` as 'gambar_projek_2', `pams_DE`.`updated` as 'updated'",
			'JL' => "`JL`.`id` as 'id', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `JL`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', `JL`.`NamaKontraktor` as 'NamaKontraktor', if(`JL`.`TarikhSST`,date_format(`JL`.`TarikhSST`,'%d/%m/%Y'),'') as 'TarikhSST', if(`JL`.`TarikhSiapProjek`,date_format(`JL`.`TarikhSiapProjek`,'%d/%m/%Y'),'') as 'TarikhSiapProjek', `JL`.`TarikhSiapSepenuhnya` as 'TarikhSiapSepenuhnya', `JL`.`PanjangJalanM` as 'PanjangJalanM', `JL`.`LebarM` as 'LebarM', IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') as 'skop', `JL`.`gambar_projek` as 'gambar_projek', `JL`.`Latitud` as 'Latitud', `JL`.`Peta` as 'Peta', FORMAT(`JL`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', `JL`.`peruntukan_dipinda` as 'peruntukan_dipinda', FORMAT(`JL`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`JL`.`KKSVO`, 2) as 'KKSVO', `JL`.`Perbelanjaan` as 'Perbelanjaan', `JL`.`Penjimatan` as 'Penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `JL`.`PenerimaManfaat` as 'PenerimaManfaat', `JL`.`sumber_permohonan` as 'sumber_permohonan', `JL`.`catatan` as 'catatan', `JL`.`inden` as 'inden', `JL`.`Baucer` as 'Baucer', `JL`.`gambar_projek_1` as 'gambar_projek_1', `JL`.`gambar_projek_2` as 'gambar_projek_2', `JL`.`updated` as 'updated'",
			'jpd_khas' => "`jpd_khas`.`ID` as 'ID', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') as 'Waran', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `jpd_khas`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', `jpd_khas`.`NamaKontraktor` as 'NamaKontraktor', if(`jpd_khas`.`TarikhSST`,date_format(`jpd_khas`.`TarikhSST`,'%d/%m/%Y'),'') as 'TarikhSST', if(`jpd_khas`.`TarikhSiapProjek`,date_format(`jpd_khas`.`TarikhSiapProjek`,'%d/%m/%Y'),'') as 'TarikhSiapProjek', `jpd_khas`.`TarikhSiapsebenar` as 'TarikhSiapsebenar', `jpd_khas`.`PanjangJalanM` as 'PanjangJalanM', `jpd_khas`.`LebarM` as 'LebarM', IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') as 'skop', `jpd_khas`.`gambar_projek` as 'gambar_projek', `jpd_khas`.`Latitud` as 'Latitud', `jpd_khas`.`Peta` as 'Peta', FORMAT(`jpd_khas`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', `jpd_khas`.`peruntukan_dipinda` as 'peruntukan_dipinda', FORMAT(`jpd_khas`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`jpd_khas`.`KKSVO`, 2) as 'KKSVO', `jpd_khas`.`Perbelanjaan` as 'Perbelanjaan', `jpd_khas`.`penjimatan` as 'penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `jpd_khas`.`PenerimaManfaat` as 'PenerimaManfaat', `jpd_khas`.`sumber_permohonan` as 'sumber_permohonan', `jpd_khas`.`catatan` as 'catatan', `jpd_khas`.`inden` as 'inden', `jpd_khas`.`Baucer` as 'Baucer', `jpd_khas`.`gambar_projek_1` as 'gambar_projek_1', `jpd_khas`.`gambar_projek_2` as 'gambar_projek_2', `jpd_khas`.`updated` as 'updated'",
			'pams_khas' => "`pams_khas`.`id` as 'id', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') as 'Waran', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `pams_khas`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', `pams_khas`.`NamaKontraktor` as 'NamaKontraktor', if(`pams_khas`.`TarikhSST`,date_format(`pams_khas`.`TarikhSST`,'%d/%m/%Y'),'') as 'TarikhSST', if(`pams_khas`.`TarikhSiapProjek`,date_format(`pams_khas`.`TarikhSiapProjek`,'%d/%m/%Y'),'') as 'TarikhSiapProjek', `pams_khas`.`TarikhSiapSepenuhnya` as 'TarikhSiapSepenuhnya', IF(    CHAR_LENGTH(`skop_pams1`.`skop_pams`), CONCAT_WS('',   `skop_pams1`.`skop_pams`), '') as 'skop', `pams_khas`.`gambar_projek` as 'gambar_projek', `pams_khas`.`Latitud` as 'Latitud', `pams_khas`.`Peta` as 'Peta', FORMAT(`pams_khas`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', FORMAT(`pams_khas`.`peruntukan_dipinda`, 2) as 'peruntukan_dipinda', FORMAT(`pams_khas`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`pams_khas`.`KKSVO`, 2) as 'KKSVO', `pams_khas`.`Perbelanjaan` as 'Perbelanjaan', `pams_khas`.`Penjimatan` as 'Penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `pams_khas`.`PenerimaManfaat` as 'PenerimaManfaat', `pams_khas`.`sumber_permohonan` as 'sumber_permohonan', `pams_khas`.`catatan` as 'catatan', `pams_khas`.`inden` as 'inden', `pams_khas`.`Baucer` as 'Baucer', `pams_khas`.`gambar_projek_1` as 'gambar_projek_1', `pams_khas`.`gambar_projek_2` as 'gambar_projek_2', `pams_khas`.`updated` as 'updated'",
			'jpd_noc' => "`jpd_noc`.`ID` as 'ID', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `jpd_noc`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `jpd_noc`.`NamaKontraktor` as 'NamaKontraktor', if(`jpd_noc`.`TarikhSST`,date_format(`jpd_noc`.`TarikhSST`,'%d/%m/%Y'),'') as 'TarikhSST', if(`jpd_noc`.`TarikhSiapProjek`,date_format(`jpd_noc`.`TarikhSiapProjek`,'%d/%m/%Y'),'') as 'TarikhSiapProjek', `jpd_noc`.`TarikhSiapSepenuhnya` as 'TarikhSiapSepenuhnya', `jpd_noc`.`PanjangJalanM` as 'PanjangJalanM', `jpd_noc`.`gambar_projek` as 'gambar_projek', `jpd_noc`.`LebarM` as 'LebarM', `jpd_noc`.`Latitud` as 'Latitud', `jpd_noc`.`Longitud` as 'Longitud', FORMAT(`jpd_noc`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', `jpd_noc`.`peruntukan_dipinda` as 'peruntukan_dipinda', FORMAT(`jpd_noc`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`jpd_noc`.`KKSVO`, 2) as 'KKSVO', `jpd_noc`.`Perbelanjaan` as 'Perbelanjaan', `jpd_noc`.`penjimatan` as 'penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', `jpd_noc`.`PenerimaManfaat` as 'PenerimaManfaat', `jpd_noc`.`sumber_permohonan` as 'sumber_permohonan', `jpd_noc`.`catatan` as 'catatan', `jpd_noc`.`inden` as 'inden', `jpd_noc`.`Baucer` as 'Baucer', `jpd_noc`.`gambar_projek_1` as 'gambar_projek_1', `jpd_noc`.`gambar_projek_2` as 'gambar_projek_2', `jpd_noc`.`updated` as 'updated'",
			'pams_noc' => "`pams_noc`.`id` as 'id', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `pams_noc`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `pams_noc`.`NamaKontraktor` as 'NamaKontraktor', if(`pams_noc`.`TarikhSST`,date_format(`pams_noc`.`TarikhSST`,'%d/%m/%Y'),'') as 'TarikhSST', if(`pams_noc`.`TarikhSiapProjek`,date_format(`pams_noc`.`TarikhSiapProjek`,'%d/%m/%Y'),'') as 'TarikhSiapProjek', `pams_noc`.`TarikhSiapSepenuhnya` as 'TarikhSiapSepenuhnya', `pams_noc`.`PanjangJalanM` as 'PanjangJalanM', `pams_noc`.`gambar_projek` as 'gambar_projek', `pams_noc`.`LebarM` as 'LebarM', `pams_noc`.`Latitud` as 'Latitud', `pams_noc`.`Longitud` as 'Longitud', FORMAT(`pams_noc`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', FORMAT(`pams_noc`.`peruntukan_dipinda`, 2) as 'peruntukan_dipinda', FORMAT(`pams_noc`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`pams_noc`.`KKSVO`, 2) as 'KKSVO', `pams_noc`.`Perbelanjaan` as 'Perbelanjaan', `pams_noc`.`Penjimatan` as 'Penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', `pams_noc`.`PenerimaManfaat` as 'PenerimaManfaat', `pams_noc`.`sumber_permohonan` as 'sumber_permohonan', `pams_noc`.`catatan` as 'catatan', `pams_noc`.`inden` as 'inden', `pams_noc`.`Baucer` as 'Baucer', `pams_noc`.`gambar_projek_1` as 'gambar_projek_1', `pams_noc`.`gambar_projek_2` as 'gambar_projek_2', `pams_noc`.`updated` as 'updated'",
			'balb' => "`balb`.`ID` as 'ID', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') as 'Waran', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `balb`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `balb`.`NamaKontraktor` as 'NamaKontraktor', `balb`.`TarikhSST` as 'TarikhSST', `balb`.`TarikhSiapProjek` as 'TarikhSiapProjek', `balb`.`TarikhSiapSepenuhnya` as 'TarikhSiapSepenuhnya', `balb`.`Panjang` as 'Panjang', `balb`.`gambar1` as 'gambar1', `balb`.`Latitud` as 'Latitud', `balb`.`Peta` as 'Peta', FORMAT(`balb`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', `balb`.`peruntukan_dipinda` as 'peruntukan_dipinda', FORMAT(`balb`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`balb`.`KKSVO`, 2) as 'KKSVO', `balb`.`Perbelanjaan` as 'Perbelanjaan', `balb`.`penjimatan` as 'penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', `balb`.`PenerimaManfaat` as 'PenerimaManfaat', `balb`.`sumber_permohonan` as 'sumber_permohonan', `balb`.`catatan` as 'catatan', `balb`.`inden` as 'inden', `balb`.`Baucer` as 'Baucer', `balb`.`gambar2` as 'gambar2', `balb`.`gambar3` as 'gambar3', `balb`.`updated` as 'updated'",
			'JALB' => "`JALB`.`id` as 'id', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', `JALB`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', `JALB`.`NamaKontraktor` as 'NamaKontraktor', if(`JALB`.`TarikhSST`,date_format(`JALB`.`TarikhSST`,'%d/%m/%Y'),'') as 'TarikhSST', if(`JALB`.`TarikhSiapSepenuhnya`,date_format(`JALB`.`TarikhSiapSepenuhnya`,'%d/%m/%Y'),'') as 'TarikhSiapSepenuhnya', `JALB`.`speck` as 'speck', `JALB`.`Panjang` as 'Panjang', `JALB`.`gambar1` as 'gambar1', `JALB`.`gambar2` as 'gambar2', `JALB`.`Latitud` as 'Latitud', `JALB`.`Peta` as 'Peta', FORMAT(`JALB`.`kos_siling`, 2) as 'kos_siling', FORMAT(`JALB`.`Kosprojek`, 2) as 'Kosprojek', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', `JALB`.`progress_jadual` as 'progress_jadual', `JALB`.`progress_sebenar` as 'progress_sebenar', `JALB`.`jadual` as 'jadual', `JALB`.`sumber_permohonan` as 'sumber_permohonan', `JALB`.`PenerimaManfaat` as 'PenerimaManfaat', `JALB`.`gambar3` as 'gambar3', `JALB`.`gambar4` as 'gambar4', `JALB`.`updated` as 'updated'",
			'BELB' => "`BELB`.`ID` as 'ID', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`waran1`.`sumber_waran`), CONCAT_WS('',   `waran1`.`sumber_waran`), '') as 'Waran', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `BELB`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `BELB`.`NamaKontraktor` as 'NamaKontraktor', `BELB`.`TarikhSST` as 'TarikhSST', `BELB`.`TarikhSiapProjek` as 'TarikhSiapProjek', `BELB`.`TarikhSiapSepenuhnya` as 'TarikhSiapSepenuhnya', `BELB`.`Panjang` as 'Panjang', `BELB`.`gambar1` as 'gambar1', `BELB`.`Latitud` as 'Latitud', `BELB`.`Peta` as 'Peta', FORMAT(`BELB`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', `BELB`.`peruntukan_dipinda` as 'peruntukan_dipinda', FORMAT(`BELB`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`BELB`.`KKSVO`, 2) as 'KKSVO', `BELB`.`Perbelanjaan` as 'Perbelanjaan', `BELB`.`penjimatan` as 'penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', `BELB`.`PenerimaManfaat` as 'PenerimaManfaat', `BELB`.`sumber_permohonan` as 'sumber_permohonan', `BELB`.`catatan` as 'catatan', `BELB`.`inden` as 'inden', `BELB`.`Baucer` as 'Baucer', `BELB`.`gambar2` as 'gambar2', `BELB`.`gambar3` as 'gambar3', `BELB`.`updated` as 'updated'",
			'pprt' => "`pprt`.`ID` as 'ID', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `pprt`.`Nama` as 'Nama', `pprt`.`IC` as 'IC', `pprt`.`alamat` as 'alamat', IF(    CHAR_LENGTH(`ekasih1`.`status_ekasih`), CONCAT_WS('',   `ekasih1`.`status_ekasih`), '') as 'ekasih', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', `pprt`.`NamaKontraktor` as 'NamaKontraktor', if(`pprt`.`TarikhTawaranSSTLantikan`,date_format(`pprt`.`TarikhTawaranSSTLantikan`,'%d/%m/%Y'),'') as 'TarikhTawaranSSTLantikan', if(`pprt`.`TarikhSiapProjek`,date_format(`pprt`.`TarikhSiapProjek`,'%d/%m/%Y'),'') as 'TarikhSiapProjek', `pprt`.`jenis_binaan` as 'jenis_binaan', `pprt`.`skop` as 'skop', `pprt`.`Peta` as 'Peta', FORMAT(`pprt`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', FORMAT(`pprt`.`Kosprojek`, 2) as 'Kosprojek', `pprt`.`Perbelanjaan` as 'Perbelanjaan', `pprt`.`penjimatan` as 'penjimatan', `pprt`.`Peratus_siap` as 'Peratus_siap', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', `pprt`.`sumber_permohonan` as 'sumber_permohonan', `pprt`.`catatan` as 'catatan', `pprt`.`gambar1` as 'gambar1', `pprt`.`gambar2` as 'gambar2', `pprt`.`gambar3` as 'gambar3'",
			'ljk' => "`ljk`.`id` as 'id', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'daerah', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'dun', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'parlimen', `ljk`.`kampung` as 'kampung', `ljk`.`no_tiang` as 'no_tiang', IF(    CHAR_LENGTH(`LJK_JENIS1`.`jenis_lampu`), CONCAT_WS('',   `LJK_JENIS1`.`jenis_lampu`), '') as 'jenis_lampu', `ljk`.`status_pemasangan` as 'status_pemasangan', `ljk`.`audit` as 'audit', `ljk`.`catatan` as 'catatan', `ljk`.`gambar` as 'gambar'",
			'pemohon_jpd' => "`pemohon_jpd`.`ID` as 'ID', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun', `pemohon_jpd`.`Nama_Projek` as 'Nama_Projek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', `pemohon_jpd`.`status_tanah` as 'status_tanah', `pemohon_jpd`.`PanjangJalanM` as 'PanjangJalanM', `pemohon_jpd`.`LebarM` as 'LebarM', IF(    CHAR_LENGTH(`skop_jpd1`.`skop_jpd`), CONCAT_WS('',   `skop_jpd1`.`skop_jpd`), '') as 'skop', `pemohon_jpd`.`gambar_projek` as 'gambar_projek', `pemohon_jpd`.`gambar_projek_1` as 'gambar_projek_1', `pemohon_jpd`.`sumber_mohon` as 'sumber_mohon', `pemohon_jpd`.`Peta` as 'Peta', FORMAT(`pemohon_jpd`.`anggaran_kos`, 2) as 'anggaran_kos', `pemohon_jpd`.`justifikasi` as 'justifikasi', `pemohon_jpd`.`PenerimaManfaat` as 'PenerimaManfaat', `pemohon_jpd`.`nama_mpkk_jpkkp` as 'nama_mpkk_jpkkp', `pemohon_jpd`.`no_tel_mpkk_jpkkp` as 'no_tel_mpkk_jpkkp', `pemohon_jpd`.`catatan` as 'catatan', `pemohon_jpd`.`status_permohonan` as 'status_permohonan', `pemohon_jpd`.`status_kelulusan` as 'status_kelulusan', `pemohon_jpd`.`sumber_peruntukan` as 'sumber_peruntukan', `pemohon_jpd`.`updated` as 'updated', `pemohon_jpd`.`gambar_projek2` as 'gambar_projek2', `pemohon_jpd`.`gambar_projek3` as 'gambar_projek3'",
			'pams_mohon' => "`pams_mohon`.`ID` as 'ID', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', `pams_mohon`.`Nama_Projek` as 'Nama_Projek', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', `pams_mohon`.`sumber_mohon` as 'sumber_mohon', `pams_mohon`.`status_tanah` as 'status_tanah', IF(    CHAR_LENGTH(`skop_pams1`.`skop_pams`), CONCAT_WS('',   `skop_pams1`.`skop_pams`), '') as 'skop', `pams_mohon`.`gambar_projek` as 'gambar_projek', `pams_mohon`.`gambar_projek_2` as 'gambar_projek_2', `pams_mohon`.`Peta` as 'Peta', FORMAT(`pams_mohon`.`anggaran_kos`, 2) as 'anggaran_kos', `pams_mohon`.`justifikasi` as 'justifikasi', `pams_mohon`.`PenerimaManfaat` as 'PenerimaManfaat', `pams_mohon`.`nama_mpkk_jpkkp` as 'nama_mpkk_jpkkp', `pams_mohon`.`no_tel_mpkk_jpkkp` as 'no_tel_mpkk_jpkkp', `pams_mohon`.`catatan` as 'catatan', `pams_mohon`.`status_permohonan` as 'status_permohonan', `pams_mohon`.`status_kelulusan` as 'status_kelulusan', `pams_mohon`.`sumber_peruntukan` as 'sumber_peruntukan', `pams_mohon`.`gambar_projek_3` as 'gambar_projek_3', `pams_mohon`.`gambar_projek_1` as 'gambar_projek_1', `pams_mohon`.`updated` as 'updated'",
			'pemohon_pprt' => "`pemohon_pprt`.`ID` as 'ID', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun', `pemohon_pprt`.`gambar_projek` as 'gambar_projek', `pemohon_pprt`.`gambar2` as 'gambar2', `pemohon_pprt`.`gambar3` as 'gambar3', `pemohon_pprt`.`Nama_pemohon` as 'Nama_pemohon', `pemohon_pprt`.`sumber_mohon` as 'sumber_mohon', `pemohon_pprt`.`status_tanah` as 'status_tanah', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', `pemohon_pprt`.`skop` as 'skop', `pemohon_pprt`.`Latitud` as 'Latitud', `pemohon_pprt`.`Longitud` as 'Longitud', FORMAT(`pemohon_pprt`.`anggaran_kos`, 2) as 'anggaran_kos', `pemohon_pprt`.`justifikasi` as 'justifikasi', `pemohon_pprt`.`PenerimaManfaat` as 'PenerimaManfaat', `pemohon_pprt`.`nama_mpkk_jpkkp` as 'nama_mpkk_jpkkp', `pemohon_pprt`.`no_tel_mpkk_jpkkp` as 'no_tel_mpkk_jpkkp', `pemohon_pprt`.`catatan` as 'catatan', `pemohon_pprt`.`status_permohonan` as 'status_permohonan', `pemohon_pprt`.`status_kelulusan` as 'status_kelulusan'",
			'negeri' => "`negeri`.`id` as 'id', `negeri`.`nama_negeri` as 'nama_negeri'",
			'daerah' => "`daerah`.`id` as 'id', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', `daerah`.`nama_daerah` as 'nama_daerah'",
			'Dun' => "`Dun`.`id` as 'id', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'daerah', `Dun`.`nama_dun` as 'nama_dun', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'parlimen'",
			'PARLIMEN' => "`PARLIMEN`.`id` as 'id', `PARLIMEN`.`nama_parlimen` as 'nama_parlimen', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'daerah', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri'",
			'kelulusan' => "`kelulusan`.`id` as 'id', `kelulusan`.`kelulusan_jawatankuasa` as 'kelulusan_jawatankuasa'",
			'status_pelaksanaan' => "`status_pelaksanaan`.`id` as 'id', `status_pelaksanaan`.`status_laksana` as 'status_laksana'",
			'status_kelulusan_jpd' => "`status_kelulusan_jpd`.`id` as 'id', IF(    CHAR_LENGTH(`pemohon_jpd1`.`Nama_Projek`) || CHAR_LENGTH(`pemohon_jpd1`.`anggaran_kos`), CONCAT_WS('',   `pemohon_jpd1`.`Nama_Projek`, '- RM', `pemohon_jpd1`.`anggaran_kos`), '') as 'pemohon', `status_kelulusan_jpd`.`kelulusan` as 'kelulusan', if(`status_kelulusan_jpd`.`tarikh_kelulusan`,date_format(`status_kelulusan_jpd`.`tarikh_kelulusan`,'%d/%m/%Y %h:%i %p'),'') as 'tarikh_kelulusan', `status_kelulusan_jpd`.`pelulus` as 'pelulus'",
			'status_kelulusan_pams' => "`status_kelulusan_pams`.`id` as 'id', IF(    CHAR_LENGTH(`pams_mohon1`.`Nama_Projek`) || CHAR_LENGTH(`pams_mohon1`.`anggaran_kos`), CONCAT_WS('',   `pams_mohon1`.`Nama_Projek`, '- RM', `pams_mohon1`.`anggaran_kos`), '') as 'pemohon', `status_kelulusan_pams`.`kelulusan` as 'kelulusan', if(`status_kelulusan_pams`.`tarikh_kelulusan`,date_format(`status_kelulusan_pams`.`tarikh_kelulusan`,'%d/%m/%Y %h:%i %p'),'') as 'tarikh_kelulusan', `status_kelulusan_pams`.`pelulus` as 'pelulus'",
			'status_kelulusan_pprt' => "`status_kelulusan_pprt`.`id` as 'id', IF(    CHAR_LENGTH(`pemohon_pprt1`.`Nama_pemohon`) || CHAR_LENGTH(`pemohon_pprt1`.`anggaran_kos`), CONCAT_WS('',   `pemohon_pprt1`.`Nama_pemohon`, '- RM', `pemohon_pprt1`.`anggaran_kos`), '') as 'pemohon', `status_kelulusan_pprt`.`kelulusan` as 'kelulusan', if(`status_kelulusan_pprt`.`tarikh_kelulusan`,date_format(`status_kelulusan_pprt`.`tarikh_kelulusan`,'%d/%m/%Y %h:%i %p'),'') as 'tarikh_kelulusan', `status_kelulusan_pprt`.`pelulus` as 'pelulus'",
			'tahun' => "`tahun`.`id` as 'id', `tahun`.`tahun` as 'tahun'",
			'penyelia_projek' => "`penyelia_projek`.`id` as 'id', `penyelia_projek`.`nama_penyelia` as 'nama_penyelia', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri'",
			'agensi_pelaksana' => "`agensi_pelaksana`.`id` as 'id', `agensi_pelaksana`.`pelaksana` as 'pelaksana', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri'",
			'agensi_bayar' => "`agensi_bayar`.`id` as 'id', `agensi_bayar`.`agensi` as 'agensi', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri'",
			'waran' => "`waran`.`id` as 'id', `waran`.`sumber_waran` as 'sumber_waran'",
			'jpd_de_REKOD' => "`jpd_de_REKOD`.`ID` as 'ID', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `jpd_de_REKOD`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `jpd_de_REKOD`.`NamaKontraktor` as 'NamaKontraktor', `jpd_de_REKOD`.`TarikhSST` as 'TarikhSST', `jpd_de_REKOD`.`TarikhSiapProjek` as 'TarikhSiapProjek', `jpd_de_REKOD`.`TarikhSiapSepenuhnya` as 'TarikhSiapSepenuhnya', `jpd_de_REKOD`.`PanjangJalanM` as 'PanjangJalanM', `jpd_de_REKOD`.`LebarM` as 'LebarM', `jpd_de_REKOD`.`Latitud` as 'Latitud', `jpd_de_REKOD`.`Longitud` as 'Longitud', FORMAT(`jpd_de_REKOD`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', `jpd_de_REKOD`.`peruntukan_dipinda` as 'peruntukan_dipinda', FORMAT(`jpd_de_REKOD`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`jpd_de_REKOD`.`KKSVO`, 2) as 'KKSVO', `jpd_de_REKOD`.`Perbelanjaan` as 'Perbelanjaan', `jpd_de_REKOD`.`penjimatan` as 'penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', `jpd_de_REKOD`.`PenerimaManfaat` as 'PenerimaManfaat', `jpd_de_REKOD`.`sumber_permohonan` as 'sumber_permohonan', `jpd_de_REKOD`.`catatan` as 'catatan', `jpd_de_REKOD`.`gambar1` as 'gambar1', `jpd_de_REKOD`.`gambar2` as 'gambar2', `jpd_de_REKOD`.`gambar3` as 'gambar3'",
			'pams_DE_REKOD' => "`pams_DE_REKOD`.`id` as 'id', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `pams_DE_REKOD`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `pams_DE_REKOD`.`NamaKontraktor` as 'NamaKontraktor', `pams_DE_REKOD`.`TarikhSST` as 'TarikhSST', `pams_DE_REKOD`.`TarikhSiapProjek` as 'TarikhSiapProjek', `pams_DE_REKOD`.`TarikhSiapSebenar` as 'TarikhSiapSebenar', `pams_DE_REKOD`.`PanjangJalanM` as 'PanjangJalanM', `pams_DE_REKOD`.`LebarM` as 'LebarM', `pams_DE_REKOD`.`Latitud` as 'Latitud', `pams_DE_REKOD`.`Longitud` as 'Longitud', FORMAT(`pams_DE_REKOD`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', `pams_DE_REKOD`.`peruntukan_dipinda` as 'peruntukan_dipinda', FORMAT(`pams_DE_REKOD`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`pams_DE_REKOD`.`KKSVO`, 2) as 'KKSVO', `pams_DE_REKOD`.`Perbelanjaan` as 'Perbelanjaan', `pams_DE_REKOD`.`Penjimatan` as 'Penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', `pams_DE_REKOD`.`PenerimaManfaat` as 'PenerimaManfaat', `pams_DE_REKOD`.`sumber_permohonan` as 'sumber_permohonan', `pams_DE_REKOD`.`catatan` as 'catatan', `pams_DE_REKOD`.`gambar_projek` as 'gambar_projek', `pams_DE_REKOD`.`gambar_projek_1` as 'gambar_projek_1', `pams_DE_REKOD`.`gambar_projek_2` as 'gambar_projek_2'",
			'jpd_test' => "`jpd_test`.`ID` as 'ID', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'tahun_laksana', IF(    CHAR_LENGTH(`kelulusan1`.`kelulusan_jawatankuasa`), CONCAT_WS('',   `kelulusan1`.`kelulusan_jawatankuasa`), '') as 'Kelulusan', `jpd_test`.`NamaProjek` as 'NamaProjek', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', IF(    CHAR_LENGTH(`daerah1`.`nama_daerah`), CONCAT_WS('',   `daerah1`.`nama_daerah`), '') as 'Daerah', IF(    CHAR_LENGTH(`PARLIMEN1`.`nama_parlimen`), CONCAT_WS('',   `PARLIMEN1`.`nama_parlimen`), '') as 'Parlimen', IF(    CHAR_LENGTH(`Dun1`.`nama_dun`), CONCAT_WS('',   `Dun1`.`nama_dun`), '') as 'DUN', IF(    CHAR_LENGTH(`agensi_pelaksana1`.`pelaksana`), CONCAT_WS('',   `agensi_pelaksana1`.`pelaksana`), '') as 'AgensiPelaksana', IF(    CHAR_LENGTH(`agensi_bayar1`.`agensi`), CONCAT_WS('',   `agensi_bayar1`.`agensi`), '') as 'agensi_pembayar', IF(    CHAR_LENGTH(`penyelia_projek1`.`nama_penyelia`), CONCAT_WS('',   `penyelia_projek1`.`nama_penyelia`), '') as 'penyelia_projek', `jpd_test`.`NamaKontraktor` as 'NamaKontraktor', `jpd_test`.`TarikhSST` as 'TarikhSST', `jpd_test`.`TarikhSiapProjek` as 'TarikhSiapProjek', `jpd_test`.`TarikhSiapSepenuhnya` as 'TarikhSiapSepenuhnya', `jpd_test`.`PanjangJalanM` as 'PanjangJalanM', `jpd_test`.`gambar1` as 'gambar1', `jpd_test`.`LebarM` as 'LebarM', `jpd_test`.`Latitud` as 'Latitud', `jpd_test`.`Longitud` as 'Longitud', FORMAT(`jpd_test`.`PeruntukanDiluluskan`, 2) as 'PeruntukanDiluluskan', `jpd_test`.`peruntukan_dipinda` as 'peruntukan_dipinda', FORMAT(`jpd_test`.`Kosprojek`, 2) as 'Kosprojek', FORMAT(`jpd_test`.`KKSVO`, 2) as 'KKSVO', `jpd_test`.`Perbelanjaan` as 'Perbelanjaan', `jpd_test`.`penjimatan` as 'penjimatan', IF(    CHAR_LENGTH(`status_pelaksanaan1`.`status_laksana`), CONCAT_WS('',   `status_pelaksanaan1`.`status_laksana`), '') as 'Status', `jpd_test`.`PenerimaManfaat` as 'PenerimaManfaat', `jpd_test`.`sumber_permohonan` as 'sumber_permohonan', `jpd_test`.`catatan` as 'catatan', `jpd_test`.`sumber_peruntukan` as 'sumber_peruntukan', `jpd_test`.`gambar2` as 'gambar2', `jpd_test`.`gambar3` as 'gambar3', `jpd_test`.`VIDEO` as 'VIDEO', `jpd_test`.`GIS` as 'GIS'",
			'skop_jpd' => "`skop_jpd`.`id` as 'id', `skop_jpd`.`skop_jpd` as 'skop_jpd'",
			'skop_pams' => "`skop_pams`.`id` as 'id', `skop_pams`.`skop_pams` as 'skop_pams'",
			'Syarikat' => "`Syarikat`.`id` as 'id', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', `Syarikat`.`nama_syarikat` as 'nama_syarikat', `Syarikat`.`Alamat` as 'Alamat', `Syarikat`.`no_ssm` as 'no_ssm', `Syarikat`.`no_cidb` as 'no_cidb', `Syarikat`.`lantik_kplb` as 'lantik_kplb', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'Tahun_lantik', if(`Syarikat`.`tarikh_dokumen`,date_format(`Syarikat`.`tarikh_dokumen`,'%d/%m/%Y'),'') as 'tarikh_dokumen', `Syarikat`.`tajuk_kerja` as 'tajuk_kerja', `Syarikat`.`kaedah_perolehan` as 'kaedah_perolehan', `Syarikat`.`kos_projek` as 'kos_projek', IF(    CHAR_LENGTH(`BLACKLIST1`.`disenaraihitamkan`) || CHAR_LENGTH(`BLACKLIST1`.`sebab`), CONCAT_WS('',   `BLACKLIST1`.`disenaraihitamkan`, '-', `BLACKLIST1`.`sebab`), '') as 'blacklist', `Syarikat`.`catatan` as 'catatan'",
			'Syarikat_baru' => "`Syarikat_baru`.`id` as 'id', IF(    CHAR_LENGTH(`tahun1`.`tahun`), CONCAT_WS('',   `tahun1`.`tahun`), '') as 'Tahun_daftar', IF(    CHAR_LENGTH(`negeri1`.`nama_negeri`), CONCAT_WS('',   `negeri1`.`nama_negeri`), '') as 'negeri', `Syarikat_baru`.`daerah` as 'daerah', `Syarikat_baru`.`nama_pemilik` as 'nama_pemilik', `Syarikat_baru`.`nama_syarikat` as 'nama_syarikat', `Syarikat_baru`.`Alamat` as 'Alamat', `Syarikat_baru`.`no_ssm` as 'no_ssm', `Syarikat_baru`.`no_cidb` as 'no_cidb', `Syarikat_baru`.`no_evendor` as 'no_evendor', `Syarikat_baru`.`email` as 'email'",
			'ekasih' => "`ekasih`.`id` as 'id', `ekasih`.`status_ekasih` as 'status_ekasih'",
			'BLACKLIST' => "`BLACKLIST`.`ID` as 'ID', `BLACKLIST`.`disenaraihitamkan` as 'disenaraihitamkan', `BLACKLIST`.`sebab` as 'sebab'",
			'LJK_JENIS' => "`LJK_JENIS`.`id` as 'id', `LJK_JENIS`.`jenis_lampu` as 'jenis_lampu'",
			'Laporan_N9_fiz' => "`Laporan_N9_fiz`.`id` as 'id', `Laporan_N9_fiz`.`program` as 'program', FORMAT(`Laporan_N9_fiz`.`peruntukan`, 2) as 'peruntukan', `Laporan_N9_fiz`.`bil_projek` as 'bil_projek', `Laporan_N9_fiz`.`bm` as 'bm', `Laporan_N9_fiz`.`Perolehan` as 'Perolehan', `Laporan_N9_fiz`.`dp` as 'dp', `Laporan_N9_fiz`.`sp` as 'sp', `Laporan_N9_fiz`.`link` as 'link'",
			'Kew_n9' => "`Kew_n9`.`ID` as 'ID', `Kew_n9`.`program` as 'program', `Kew_n9`.`bil_projek` as 'bil_projek', FORMAT(`Kew_n9`.`peruntukan`, 2) as 'peruntukan', FORMAT(`Kew_n9`.`belanja`, 2) as 'belanja', FORMAT(`Kew_n9`.`jimat`, 2) as 'jimat'",
			'Laporan_MLK_fiz' => "`Laporan_MLK_fiz`.`id` as 'id', `Laporan_MLK_fiz`.`program` as 'program', FORMAT(`Laporan_MLK_fiz`.`peruntukan`, 2) as 'peruntukan', `Laporan_MLK_fiz`.`bil_projek` as 'bil_projek', `Laporan_MLK_fiz`.`bm` as 'bm', `Laporan_MLK_fiz`.`Perolehan` as 'Perolehan', `Laporan_MLK_fiz`.`dp` as 'dp', `Laporan_MLK_fiz`.`sp` as 'sp', `Laporan_MLK_fiz`.`link` as 'link'",
			'Kew_MLK' => "`Kew_MLK`.`ID` as 'ID', `Kew_MLK`.`program` as 'program', `Kew_MLK`.`bil_projek` as 'bil_projek', FORMAT(`Kew_MLK`.`peruntukan`, 2) as 'peruntukan', FORMAT(`Kew_MLK`.`belanja`, 2) as 'belanja', FORMAT(`Kew_MLK`.`jimat`, 2) as 'jimat'",
		];

		if(isset($sql_fields[$table_name])) return $sql_fields[$table_name];

		return false;
	}

	#########################################################

	function get_sql_from($table_name, $skip_permissions = false, $skip_joins = false, $lower_permissions = false) {
		$sql_from = [
			'jpd_de' => "`jpd_de` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`jpd_de`.`tahun_laksana` LEFT JOIN `waran` as waran1 ON `waran1`.`id`=`jpd_de`.`Waran` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`jpd_de`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`jpd_de`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`jpd_de`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`jpd_de`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`jpd_de`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`jpd_de`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`jpd_de`.`agensi_pembayar` LEFT JOIN `skop_jpd` as skop_jpd1 ON `skop_jpd1`.`id`=`jpd_de`.`skop` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`jpd_de`.`Status` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`jpd_de`.`penyelia_projek` ",
			'pams_DE' => "`pams_DE` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pams_DE`.`tahun_laksana` LEFT JOIN `waran` as waran1 ON `waran1`.`id`=`pams_DE`.`Waran` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`pams_DE`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pams_DE`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pams_DE`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pams_DE`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pams_DE`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`pams_DE`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`pams_DE`.`agensi_pembayar` LEFT JOIN `skop_pams` as skop_pams1 ON `skop_pams1`.`id`=`pams_DE`.`skop` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`pams_DE`.`Status` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`pams_DE`.`penyelia_projek` ",
			'JL' => "`JL` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`JL`.`tahun_laksana` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`JL`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`JL`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`JL`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`JL`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`JL`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`JL`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`JL`.`agensi_pembayar` LEFT JOIN `skop_jpd` as skop_jpd1 ON `skop_jpd1`.`id`=`JL`.`skop` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`JL`.`Status` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`JL`.`penyelia_projek` ",
			'jpd_khas' => "`jpd_khas` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`jpd_khas`.`tahun_laksana` LEFT JOIN `waran` as waran1 ON `waran1`.`id`=`jpd_khas`.`Waran` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`jpd_khas`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`jpd_khas`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`jpd_khas`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`jpd_khas`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`jpd_khas`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`jpd_khas`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`jpd_khas`.`agensi_pembayar` LEFT JOIN `skop_jpd` as skop_jpd1 ON `skop_jpd1`.`id`=`jpd_khas`.`skop` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`jpd_khas`.`Status` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`jpd_khas`.`penyelia_projek` ",
			'pams_khas' => "`pams_khas` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pams_khas`.`tahun_laksana` LEFT JOIN `waran` as waran1 ON `waran1`.`id`=`pams_khas`.`Waran` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`pams_khas`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pams_khas`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pams_khas`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pams_khas`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pams_khas`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`pams_khas`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`pams_khas`.`agensi_pembayar` LEFT JOIN `skop_pams` as skop_pams1 ON `skop_pams1`.`id`=`pams_khas`.`skop` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`pams_khas`.`Status` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`pams_khas`.`penyelia_projek` ",
			'jpd_noc' => "`jpd_noc` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`jpd_noc`.`tahun_laksana` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`jpd_noc`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`jpd_noc`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`jpd_noc`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`jpd_noc`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`jpd_noc`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`jpd_noc`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`jpd_noc`.`agensi_pembayar` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`jpd_noc`.`penyelia_projek` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`jpd_noc`.`Status` ",
			'pams_noc' => "`pams_noc` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pams_noc`.`tahun_laksana` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`pams_noc`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pams_noc`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pams_noc`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pams_noc`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pams_noc`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`pams_noc`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`pams_noc`.`agensi_pembayar` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`pams_noc`.`penyelia_projek` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`pams_noc`.`Status` ",
			'balb' => "`balb` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`balb`.`tahun_laksana` LEFT JOIN `waran` as waran1 ON `waran1`.`id`=`balb`.`Waran` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`balb`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`balb`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`balb`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`balb`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`balb`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`balb`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`balb`.`agensi_pembayar` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`balb`.`penyelia_projek` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`balb`.`Status` ",
			'JALB' => "`JALB` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`JALB`.`tahun_laksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`JALB`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`JALB`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`JALB`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`JALB`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`JALB`.`AgensiPelaksana` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`JALB`.`Status` ",
			'BELB' => "`BELB` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`BELB`.`tahun_laksana` LEFT JOIN `waran` as waran1 ON `waran1`.`id`=`BELB`.`Waran` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`BELB`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`BELB`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`BELB`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`BELB`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`BELB`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`BELB`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`BELB`.`agensi_pembayar` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`BELB`.`penyelia_projek` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`BELB`.`Status` ",
			'pprt' => "`pprt` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pprt`.`tahun_laksana` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`pprt`.`Kelulusan` LEFT JOIN `ekasih` as ekasih1 ON `ekasih1`.`id`=`pprt`.`ekasih` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pprt`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pprt`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pprt`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pprt`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`pprt`.`AgensiPelaksana` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`pprt`.`Status` ",
			'ljk' => "`ljk` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`ljk`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`ljk`.`daerah` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`ljk`.`dun` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`ljk`.`parlimen` LEFT JOIN `LJK_JENIS` as LJK_JENIS1 ON `LJK_JENIS1`.`id`=`ljk`.`jenis_lampu` ",
			'pemohon_jpd' => "`pemohon_jpd` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pemohon_jpd`.`tahun` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pemohon_jpd`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pemohon_jpd`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pemohon_jpd`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pemohon_jpd`.`DUN` LEFT JOIN `skop_jpd` as skop_jpd1 ON `skop_jpd1`.`id`=`pemohon_jpd`.`skop` ",
			'pams_mohon' => "`pams_mohon` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pams_mohon`.`tahun` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pams_mohon`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pams_mohon`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pams_mohon`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pams_mohon`.`DUN` LEFT JOIN `skop_pams` as skop_pams1 ON `skop_pams1`.`id`=`pams_mohon`.`skop` ",
			'pemohon_pprt' => "`pemohon_pprt` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pemohon_pprt`.`tahun` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pemohon_pprt`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pemohon_pprt`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pemohon_pprt`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pemohon_pprt`.`DUN` ",
			'negeri' => "`negeri` ",
			'daerah' => "`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ",
			'Dun' => "`Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ",
			'PARLIMEN' => "`PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ",
			'kelulusan' => "`kelulusan` ",
			'status_pelaksanaan' => "`status_pelaksanaan` ",
			'status_kelulusan_jpd' => "`status_kelulusan_jpd` LEFT JOIN `pemohon_jpd` as pemohon_jpd1 ON `pemohon_jpd1`.`ID`=`status_kelulusan_jpd`.`pemohon` ",
			'status_kelulusan_pams' => "`status_kelulusan_pams` LEFT JOIN `pams_mohon` as pams_mohon1 ON `pams_mohon1`.`ID`=`status_kelulusan_pams`.`pemohon` ",
			'status_kelulusan_pprt' => "`status_kelulusan_pprt` LEFT JOIN `pemohon_pprt` as pemohon_pprt1 ON `pemohon_pprt1`.`ID`=`status_kelulusan_pprt`.`pemohon` ",
			'tahun' => "`tahun` ",
			'penyelia_projek' => "`penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ",
			'agensi_pelaksana' => "`agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ",
			'agensi_bayar' => "`agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ",
			'waran' => "`waran` ",
			'jpd_de_REKOD' => "`jpd_de_REKOD` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`jpd_de_REKOD`.`tahun_laksana` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`jpd_de_REKOD`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`jpd_de_REKOD`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`jpd_de_REKOD`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`jpd_de_REKOD`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`jpd_de_REKOD`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`jpd_de_REKOD`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`jpd_de_REKOD`.`agensi_pembayar` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`jpd_de_REKOD`.`penyelia_projek` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`jpd_de_REKOD`.`Status` ",
			'pams_DE_REKOD' => "`pams_DE_REKOD` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pams_DE_REKOD`.`tahun_laksana` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`pams_DE_REKOD`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pams_DE_REKOD`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pams_DE_REKOD`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pams_DE_REKOD`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pams_DE_REKOD`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`pams_DE_REKOD`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`pams_DE_REKOD`.`agensi_pembayar` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`pams_DE_REKOD`.`penyelia_projek` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`pams_DE_REKOD`.`Status` ",
			'jpd_test' => "`jpd_test` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`jpd_test`.`tahun_laksana` LEFT JOIN `kelulusan` as kelulusan1 ON `kelulusan1`.`id`=`jpd_test`.`Kelulusan` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`jpd_test`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`jpd_test`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`jpd_test`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`jpd_test`.`DUN` LEFT JOIN `agensi_pelaksana` as agensi_pelaksana1 ON `agensi_pelaksana1`.`id`=`jpd_test`.`AgensiPelaksana` LEFT JOIN `agensi_bayar` as agensi_bayar1 ON `agensi_bayar1`.`id`=`jpd_test`.`agensi_pembayar` LEFT JOIN `penyelia_projek` as penyelia_projek1 ON `penyelia_projek1`.`id`=`jpd_test`.`penyelia_projek` LEFT JOIN `status_pelaksanaan` as status_pelaksanaan1 ON `status_pelaksanaan1`.`id`=`jpd_test`.`Status` ",
			'skop_jpd' => "`skop_jpd` ",
			'skop_pams' => "`skop_pams` ",
			'Syarikat' => "`Syarikat` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`Syarikat`.`negeri` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`Syarikat`.`Tahun_lantik` LEFT JOIN `BLACKLIST` as BLACKLIST1 ON `BLACKLIST1`.`ID`=`Syarikat`.`blacklist` ",
			'Syarikat_baru' => "`Syarikat_baru` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`Syarikat_baru`.`Tahun_daftar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`Syarikat_baru`.`negeri` ",
			'ekasih' => "`ekasih` ",
			'BLACKLIST' => "`BLACKLIST` ",
			'LJK_JENIS' => "`LJK_JENIS` ",
			'Laporan_N9_fiz' => "`Laporan_N9_fiz` ",
			'Kew_n9' => "`Kew_n9` ",
			'Laporan_MLK_fiz' => "`Laporan_MLK_fiz` ",
			'Kew_MLK' => "`Kew_MLK` ",
		];

		$pkey = [
			'jpd_de' => 'ID',
			'pams_DE' => 'id',
			'JL' => 'id',
			'jpd_khas' => 'ID',
			'pams_khas' => 'id',
			'jpd_noc' => 'ID',
			'pams_noc' => 'id',
			'balb' => 'ID',
			'JALB' => 'id',
			'BELB' => 'ID',
			'pprt' => 'ID',
			'ljk' => 'id',
			'pemohon_jpd' => 'ID',
			'pams_mohon' => 'ID',
			'pemohon_pprt' => 'ID',
			'negeri' => 'id',
			'daerah' => 'id',
			'Dun' => 'id',
			'PARLIMEN' => 'id',
			'kelulusan' => 'id',
			'status_pelaksanaan' => 'id',
			'status_kelulusan_jpd' => 'id',
			'status_kelulusan_pams' => 'id',
			'status_kelulusan_pprt' => 'id',
			'tahun' => 'id',
			'penyelia_projek' => 'id',
			'agensi_pelaksana' => 'id',
			'agensi_bayar' => 'id',
			'waran' => 'id',
			'jpd_de_REKOD' => 'ID',
			'pams_DE_REKOD' => 'id',
			'jpd_test' => 'ID',
			'skop_jpd' => 'id',
			'skop_pams' => 'id',
			'Syarikat' => 'id',
			'Syarikat_baru' => 'id',
			'ekasih' => 'id',
			'BLACKLIST' => 'ID',
			'LJK_JENIS' => 'id',
			'Laporan_N9_fiz' => 'id',
			'Kew_n9' => 'ID',
			'Laporan_MLK_fiz' => 'id',
			'Kew_MLK' => 'ID',
		];

		if(!isset($sql_from[$table_name])) return false;

		$from = ($skip_joins ? "`{$table_name}`" : $sql_from[$table_name]);

		if($skip_permissions) return $from . ' WHERE 1=1';

		// mm: build the query based on current member's permissions
		// allowing lower permissions if $lower_permissions set to 'user' or 'group'
		$perm = getTablePermissions($table_name);
		if($perm['view'] == 1 || ($perm['view'] > 1 && $lower_permissions == 'user')) { // view owner only
			$from .= ", `membership_userrecords` WHERE `{$table_name}`.`{$pkey[$table_name]}`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='{$table_name}' AND LCASE(`membership_userrecords`.`memberID`)='" . getLoggedMemberID() . "'";
		} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $lower_permissions == 'group')) { // view group only
			$from .= ", `membership_userrecords` WHERE `{$table_name}`.`{$pkey[$table_name]}`=`membership_userrecords`.`pkValue` AND `membership_userrecords`.`tableName`='{$table_name}' AND `membership_userrecords`.`groupID`='" . getLoggedGroupID() . "'";
		} elseif($perm['view'] == 3) { // view all
			$from .= ' WHERE 1=1';
		} else { // view none
			return false;
		}

		return $from;
	}

	#########################################################

	function get_joined_record($table, $id, $skip_permissions = false) {
		$sql_fields = get_sql_fields($table);
		$sql_from = get_sql_from($table, $skip_permissions);

		if(!$sql_fields || !$sql_from) return false;

		$pk = getPKFieldName($table);
		if(!$pk) return false;

		$safe_id = makeSafe($id, false);
		$sql = "SELECT {$sql_fields} FROM {$sql_from} AND `{$table}`.`{$pk}`='{$safe_id}'";
		$eo['silentErrors'] = true;
		$res = sql($sql, $eo);
		if($row = db_fetch_assoc($res)) return $row;

		return false;
	}

	#########################################################

	function get_defaults($table) {
		/* array of tables and their fields, with default values (or empty), excluding automatic values */
		$defaults = [
			'jpd_de' => [
				'ID' => '',
				'tahun_laksana' => '',
				'Waran' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'sumber_permohonan' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapsebenar' => '',
				'PanjangJalanM' => '',
				'LebarM' => '',
				'skop' => '',
				'gambar1' => '',
				'Latitud' => '',
				'Peta' => '',
				'PeruntukanDiluluskan' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'penjimatan' => '',
				'Status' => '',
				'penyelia_projek' => '',
				'PenerimaManfaat' => '',
				'catatan' => '',
				'inden' => '',
				'Baucer' => '',
				'gambar2' => '',
				'gambar3' => '',
				'updated' => '',
			],
			'pams_DE' => [
				'id' => '',
				'tahun_laksana' => '',
				'Waran' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'sumber_permohonan' => '',
				'NamaKontraktor' => '',
				'TarikhTawaranSSTLantikan' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapSebenar' => '',
				'PanjangJalanM' => '',
				'LebarM' => '',
				'Longitud' => '',
				'PeruntukanDiluluskan' => '',
				'skop' => '',
				'gambar_projek' => '',
				'Peta' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'Penjimatan' => '',
				'Status' => '',
				'penyelia_projek' => '',
				'PenerimaManfaat' => '',
				'catatan' => '',
				'inden' => '',
				'Baucer' => '',
				'gambar_projek_1' => '',
				'gambar_projek_2' => '',
				'updated' => '',
			],
			'JL' => [
				'id' => '',
				'tahun_laksana' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapSepenuhnya' => '',
				'PanjangJalanM' => '',
				'LebarM' => '',
				'skop' => '',
				'gambar_projek' => '',
				'Latitud' => '',
				'Peta' => '',
				'PeruntukanDiluluskan' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'Penjimatan' => '',
				'Status' => '',
				'penyelia_projek' => '',
				'PenerimaManfaat' => '',
				'sumber_permohonan' => '',
				'catatan' => '',
				'inden' => '',
				'Baucer' => '',
				'gambar_projek_1' => '',
				'gambar_projek_2' => '',
				'updated' => '',
			],
			'jpd_khas' => [
				'ID' => '',
				'tahun_laksana' => '',
				'Waran' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapsebenar' => '',
				'PanjangJalanM' => '',
				'LebarM' => '',
				'skop' => '',
				'gambar_projek' => '',
				'Latitud' => '',
				'Peta' => '',
				'PeruntukanDiluluskan' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'penjimatan' => '',
				'Status' => '',
				'penyelia_projek' => '',
				'PenerimaManfaat' => '',
				'sumber_permohonan' => '',
				'catatan' => '',
				'inden' => '',
				'Baucer' => '',
				'gambar_projek_1' => '',
				'gambar_projek_2' => '',
				'updated' => '',
			],
			'pams_khas' => [
				'id' => '',
				'tahun_laksana' => '',
				'Waran' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapSepenuhnya' => '',
				'skop' => '',
				'gambar_projek' => '',
				'Latitud' => '',
				'Peta' => '',
				'PeruntukanDiluluskan' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'Penjimatan' => '',
				'Status' => '',
				'penyelia_projek' => '',
				'PenerimaManfaat' => '',
				'sumber_permohonan' => '',
				'catatan' => '',
				'inden' => '',
				'Baucer' => '',
				'gambar_projek_1' => '',
				'gambar_projek_2' => '',
				'updated' => '',
			],
			'jpd_noc' => [
				'ID' => '',
				'tahun_laksana' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'penyelia_projek' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapSepenuhnya' => '',
				'PanjangJalanM' => '',
				'gambar_projek' => '',
				'LebarM' => '',
				'Latitud' => '',
				'Longitud' => '',
				'PeruntukanDiluluskan' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'penjimatan' => '',
				'Status' => '',
				'PenerimaManfaat' => '',
				'sumber_permohonan' => '',
				'catatan' => '',
				'inden' => '',
				'Baucer' => '',
				'gambar_projek_1' => '',
				'gambar_projek_2' => '',
				'updated' => '',
			],
			'pams_noc' => [
				'id' => '',
				'tahun_laksana' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'penyelia_projek' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapSepenuhnya' => '',
				'PanjangJalanM' => '',
				'gambar_projek' => '',
				'LebarM' => '',
				'Latitud' => '',
				'Longitud' => '',
				'PeruntukanDiluluskan' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'Penjimatan' => '',
				'Status' => '',
				'PenerimaManfaat' => '',
				'sumber_permohonan' => '',
				'catatan' => '',
				'inden' => '',
				'Baucer' => '',
				'gambar_projek_1' => '',
				'gambar_projek_2' => '',
				'updated' => '',
			],
			'balb' => [
				'ID' => '',
				'tahun_laksana' => '',
				'Waran' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'penyelia_projek' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapSepenuhnya' => '',
				'Panjang' => '',
				'gambar1' => '',
				'Latitud' => '',
				'Peta' => '',
				'PeruntukanDiluluskan' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'penjimatan' => '',
				'Status' => '',
				'PenerimaManfaat' => '',
				'sumber_permohonan' => '',
				'catatan' => '',
				'inden' => '',
				'Baucer' => '',
				'gambar2' => '',
				'gambar3' => '',
				'updated' => '',
			],
			'JALB' => [
				'id' => '',
				'tahun_laksana' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapSepenuhnya' => '',
				'speck' => '',
				'Panjang' => '',
				'gambar1' => '',
				'gambar2' => '',
				'Latitud' => '',
				'Peta' => '',
				'kos_siling' => '',
				'Kosprojek' => '',
				'Status' => '',
				'progress_jadual' => '',
				'progress_sebenar' => '',
				'jadual' => '',
				'sumber_permohonan' => '',
				'PenerimaManfaat' => '',
				'gambar3' => '',
				'gambar4' => '',
				'updated' => '',
			],
			'BELB' => [
				'ID' => '',
				'tahun_laksana' => '',
				'Waran' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'penyelia_projek' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapSepenuhnya' => '',
				'Panjang' => '',
				'gambar1' => '',
				'Latitud' => '',
				'Peta' => '',
				'PeruntukanDiluluskan' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'penjimatan' => '',
				'Status' => '',
				'PenerimaManfaat' => '',
				'sumber_permohonan' => '',
				'catatan' => '',
				'inden' => '',
				'Baucer' => '',
				'gambar2' => '',
				'gambar3' => '',
				'updated' => '',
			],
			'pprt' => [
				'ID' => '',
				'tahun_laksana' => '',
				'Kelulusan' => '',
				'Nama' => '',
				'IC' => '',
				'alamat' => '',
				'ekasih' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'NamaKontraktor' => '',
				'TarikhTawaranSSTLantikan' => '',
				'TarikhSiapProjek' => '',
				'jenis_binaan' => '',
				'skop' => '',
				'Peta' => '',
				'PeruntukanDiluluskan' => '',
				'Kosprojek' => '',
				'Perbelanjaan' => '',
				'penjimatan' => '',
				'Peratus_siap' => '',
				'Status' => '',
				'sumber_permohonan' => '',
				'catatan' => '',
				'gambar1' => '',
				'gambar2' => '',
				'gambar3' => '',
			],
			'ljk' => [
				'id' => '',
				'negeri' => '',
				'daerah' => '',
				'dun' => '',
				'parlimen' => '',
				'kampung' => '',
				'no_tiang' => '',
				'jenis_lampu' => '',
				'status_pemasangan' => '',
				'audit' => '',
				'catatan' => '',
				'gambar' => '',
			],
			'pemohon_jpd' => [
				'ID' => '',
				'tahun' => '',
				'Nama_Projek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'status_tanah' => '',
				'PanjangJalanM' => '',
				'LebarM' => '',
				'skop' => '',
				'gambar_projek' => '',
				'gambar_projek_1' => '',
				'sumber_mohon' => '',
				'Peta' => '',
				'anggaran_kos' => '',
				'justifikasi' => '',
				'PenerimaManfaat' => '',
				'nama_mpkk_jpkkp' => '',
				'no_tel_mpkk_jpkkp' => '',
				'catatan' => '',
				'status_permohonan' => 'baru',
				'status_kelulusan' => '',
				'sumber_peruntukan' => '',
				'updated' => '',
				'gambar_projek2' => '',
				'gambar_projek3' => '',
			],
			'pams_mohon' => [
				'ID' => '',
				'tahun' => '',
				'negeri' => '',
				'Nama_Projek' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'sumber_mohon' => '',
				'status_tanah' => '',
				'skop' => '',
				'gambar_projek' => '',
				'gambar_projek_2' => '',
				'Peta' => '',
				'anggaran_kos' => '',
				'justifikasi' => '',
				'PenerimaManfaat' => '',
				'nama_mpkk_jpkkp' => '',
				'no_tel_mpkk_jpkkp' => '',
				'catatan' => '',
				'status_permohonan' => 'baru',
				'status_kelulusan' => '',
				'sumber_peruntukan' => '',
				'gambar_projek_3' => '',
				'gambar_projek_1' => '',
				'updated' => '',
			],
			'pemohon_pprt' => [
				'ID' => '',
				'tahun' => '',
				'gambar_projek' => '',
				'gambar2' => '',
				'gambar3' => '',
				'Nama_pemohon' => '',
				'sumber_mohon' => '',
				'status_tanah' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'skop' => '',
				'Latitud' => '',
				'Longitud' => '',
				'anggaran_kos' => '',
				'justifikasi' => '',
				'PenerimaManfaat' => '',
				'nama_mpkk_jpkkp' => '',
				'no_tel_mpkk_jpkkp' => '',
				'catatan' => '',
				'status_permohonan' => 'baru',
				'status_kelulusan' => '',
			],
			'negeri' => [
				'id' => '',
				'nama_negeri' => '',
			],
			'daerah' => [
				'id' => '',
				'negeri' => '',
				'nama_daerah' => '',
			],
			'Dun' => [
				'id' => '',
				'daerah' => '',
				'nama_dun' => '',
				'parlimen' => '',
			],
			'PARLIMEN' => [
				'id' => '',
				'nama_parlimen' => '',
				'daerah' => '',
				'negeri' => '',
			],
			'kelulusan' => [
				'id' => '',
				'kelulusan_jawatankuasa' => '',
			],
			'status_pelaksanaan' => [
				'id' => '',
				'status_laksana' => '',
			],
			'status_kelulusan_jpd' => [
				'id' => '',
				'pemohon' => '',
				'kelulusan' => '',
				'tarikh_kelulusan' => '',
				'pelulus' => '',
			],
			'status_kelulusan_pams' => [
				'id' => '',
				'pemohon' => '',
				'kelulusan' => '',
				'tarikh_kelulusan' => '',
				'pelulus' => '',
			],
			'status_kelulusan_pprt' => [
				'id' => '',
				'pemohon' => '',
				'kelulusan' => '',
				'tarikh_kelulusan' => '',
				'pelulus' => '',
			],
			'tahun' => [
				'id' => '',
				'tahun' => '',
			],
			'penyelia_projek' => [
				'id' => '',
				'nama_penyelia' => '',
				'negeri' => '',
			],
			'agensi_pelaksana' => [
				'id' => '',
				'pelaksana' => '',
				'negeri' => '',
			],
			'agensi_bayar' => [
				'id' => '',
				'agensi' => '',
				'negeri' => '',
			],
			'waran' => [
				'id' => '',
				'sumber_waran' => '',
			],
			'jpd_de_REKOD' => [
				'ID' => '',
				'tahun_laksana' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'penyelia_projek' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapSepenuhnya' => '',
				'PanjangJalanM' => '',
				'LebarM' => '',
				'Latitud' => '',
				'Longitud' => '',
				'PeruntukanDiluluskan' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'penjimatan' => '',
				'Status' => '',
				'PenerimaManfaat' => '',
				'sumber_permohonan' => '',
				'catatan' => '',
				'gambar1' => '',
				'gambar2' => '',
				'gambar3' => '',
			],
			'pams_DE_REKOD' => [
				'id' => '',
				'tahun_laksana' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'penyelia_projek' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapSebenar' => '',
				'PanjangJalanM' => '',
				'LebarM' => '',
				'Latitud' => '',
				'Longitud' => '',
				'PeruntukanDiluluskan' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'Penjimatan' => '',
				'Status' => '',
				'PenerimaManfaat' => '',
				'sumber_permohonan' => '',
				'catatan' => '',
				'gambar_projek' => '',
				'gambar_projek_1' => '',
				'gambar_projek_2' => '',
			],
			'jpd_test' => [
				'ID' => '',
				'tahun_laksana' => '',
				'Kelulusan' => '',
				'NamaProjek' => '',
				'negeri' => '',
				'Daerah' => '',
				'Parlimen' => '',
				'DUN' => '',
				'AgensiPelaksana' => '',
				'agensi_pembayar' => '',
				'penyelia_projek' => '',
				'NamaKontraktor' => '',
				'TarikhSST' => '',
				'TarikhSiapProjek' => '',
				'TarikhSiapSepenuhnya' => '',
				'PanjangJalanM' => '',
				'gambar1' => '',
				'LebarM' => '',
				'Latitud' => '',
				'Longitud' => '',
				'PeruntukanDiluluskan' => '',
				'peruntukan_dipinda' => '',
				'Kosprojek' => '',
				'KKSVO' => '',
				'Perbelanjaan' => '',
				'penjimatan' => '',
				'Status' => '',
				'PenerimaManfaat' => '',
				'sumber_permohonan' => '',
				'catatan' => '',
				'sumber_peruntukan' => '',
				'gambar2' => '',
				'gambar3' => '',
				'VIDEO' => '',
				'GIS' => '',
			],
			'skop_jpd' => [
				'id' => '',
				'skop_jpd' => '',
			],
			'skop_pams' => [
				'id' => '',
				'skop_pams' => '',
			],
			'Syarikat' => [
				'id' => '',
				'negeri' => '',
				'nama_syarikat' => '',
				'Alamat' => '',
				'no_ssm' => '',
				'no_cidb' => '',
				'lantik_kplb' => '',
				'Tahun_lantik' => '',
				'tarikh_dokumen' => '',
				'tajuk_kerja' => '',
				'kaedah_perolehan' => '',
				'kos_projek' => '',
				'blacklist' => '',
				'catatan' => '',
			],
			'Syarikat_baru' => [
				'id' => '',
				'Tahun_daftar' => '',
				'negeri' => '',
				'daerah' => '',
				'nama_pemilik' => '',
				'nama_syarikat' => '',
				'Alamat' => '',
				'no_ssm' => '',
				'no_cidb' => '',
				'no_evendor' => '',
				'email' => '',
			],
			'ekasih' => [
				'id' => '',
				'status_ekasih' => '',
			],
			'BLACKLIST' => [
				'ID' => '',
				'disenaraihitamkan' => '',
				'sebab' => '',
			],
			'LJK_JENIS' => [
				'id' => '',
				'jenis_lampu' => '',
			],
			'Laporan_N9_fiz' => [
				'id' => '',
				'program' => '',
				'peruntukan' => '',
				'bil_projek' => '',
				'bm' => '',
				'Perolehan' => '',
				'dp' => '',
				'sp' => '',
				'link' => '',
			],
			'Kew_n9' => [
				'ID' => '',
				'program' => '',
				'bil_projek' => '',
				'peruntukan' => '',
				'belanja' => '',
				'jimat' => '',
			],
			'Laporan_MLK_fiz' => [
				'id' => '',
				'program' => '',
				'peruntukan' => '',
				'bil_projek' => '',
				'bm' => '',
				'Perolehan' => '',
				'dp' => '',
				'sp' => '',
				'link' => '',
			],
			'Kew_MLK' => [
				'ID' => '',
				'program' => '',
				'bil_projek' => '',
				'peruntukan' => '',
				'belanja' => '',
				'jimat' => '',
			],
		];

		return isset($defaults[$table]) ? $defaults[$table] : [];
	}

	#########################################################

	function logInMember() {
		$redir = 'index.php';
		if($_POST['signIn'] != '') {
			if($_POST['username'] != '' && $_POST['password'] != '') {
				$username = makeSafe(strtolower($_POST['username']));
				$hash = sqlValue("select passMD5 from membership_users where lcase(memberID)='{$username}' and isApproved=1 and isBanned=0");
				$password = $_POST['password'];

				if(password_match($password, $hash)) {
					$_SESSION['memberID'] = $username;
					$_SESSION['memberGroupID'] = sqlValue("SELECT `groupID` FROM `membership_users` WHERE LCASE(`memberID`)='{$username}'");

					if($_POST['rememberMe'] == 1) {
						RememberMe::login($username);
					} else {
						RememberMe::delete();
					}

					// harden user's password hash
					password_harden($username, $password, $hash);

					// hook: login_ok
					if(function_exists('login_ok')) {
						$args = [];
						if(!$redir = login_ok(getMemberInfo(), $args)) {
							$redir = 'index.php';
						}
					}

					redirect($redir);
					exit;
				}
			}

			// hook: login_failed
			if(function_exists('login_failed')) {
				$args = [];
				login_failed([
					'username' => $_POST['username'],
					'password' => $_POST['password'],
					'IP' => $_SERVER['REMOTE_ADDR']
				], $args);
			}

			if(!headers_sent()) header('HTTP/1.0 403 Forbidden');
			redirect("index.php?loginFailed=1");
			exit;
		}

		/* do we have a JWT auth header? */
		jwt_check_login();

		if(!empty($_SESSION['memberID']) && !empty($_SESSION['memberGroupID'])) return;

		/* check if a rememberMe cookie exists and sign in user if so */
		if(RememberMe::check()) {
			$username = makeSafe(strtolower(RememberMe::user()));
			$_SESSION['memberID'] = $username;
			$_SESSION['memberGroupID'] = sqlValue("SELECT `groupID` FROM `membership_users` WHERE LCASE(`memberID`)='{$username}'");
		}
	}

	#########################################################

	function htmlUserBar() {
		global $Translation;
		if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '');

		$mi = getMemberInfo();
		$adminConfig = config('adminConfig');
		$home_page = (basename($_SERVER['PHP_SELF']) == 'index.php');
		ob_start();

		?>
		<nav class="navbar navbar-default navbar-fixed-top hidden-print" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- application title is obtained from the name besides the yellow database icon in AppGini, use underscores for spaces -->
				<a class="navbar-brand" href="<?php echo PREPEND_PATH; ?>index.php"><i class="glyphicon glyphicon-home"></i> pemantauan</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav"><?php echo ($home_page ? '' : NavMenus()); ?></ul>

				<?php if(userCanImport()){ ?>
					<ul class="nav navbar-nav">
						<a href="<?php echo PREPEND_PATH; ?>import-csv.php" class="btn btn-default navbar-btn hidden-xs btn-import-csv" title="<?php echo html_attr($Translation['import csv file']); ?>"><i class="glyphicon glyphicon-th"></i> <?php echo $Translation['import CSV']; ?></a>
						<a href="<?php echo PREPEND_PATH; ?>import-csv.php" class="btn btn-default navbar-btn visible-xs btn-lg btn-import-csv" title="<?php echo html_attr($Translation['import csv file']); ?>"><i class="glyphicon glyphicon-th"></i> <?php echo $Translation['import CSV']; ?></a>
					</ul>
				<?php } ?>

				<?php if(getLoggedAdmin() !== false) { ?>
					<ul class="nav navbar-nav">
						<a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger navbar-btn hidden-xs" title="<?php echo html_attr($Translation['admin area']); ?>"><i class="glyphicon glyphicon-cog"></i> <?php echo $Translation['admin area']; ?></a>
						<a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger navbar-btn visible-xs btn-lg" title="<?php echo html_attr($Translation['admin area']); ?>"><i class="glyphicon glyphicon-cog"></i> <?php echo $Translation['admin area']; ?></a>
					</ul>
				<?php } ?>

				<?php if(!$_GET['signIn'] && !$_GET['loginFailed']) { ?>
					<?php if(!$mi['username'] || $mi['username'] == $adminConfig['anonymousMember']) { ?>
						<p class="navbar-text navbar-right">&nbsp;</p>
						<a href="<?php echo PREPEND_PATH; ?>index.php?signIn=1" class="btn btn-success navbar-btn navbar-right"><?php echo $Translation['sign in']; ?></a>
						<p class="navbar-text navbar-right">
							<?php echo $Translation['not signed in']; ?>
						</p>
					<?php } else { ?>
						<ul class="nav navbar-nav navbar-right hidden-xs" style="min-width: 330px;">
							<a class="btn navbar-btn btn-default" href="<?php echo PREPEND_PATH; ?>index.php?signOut=1"><i class="glyphicon glyphicon-log-out"></i> <?php echo $Translation['sign out']; ?></a>

							<p class="navbar-text signed-in-as">
								<?php echo $Translation['signed as']; ?> <strong><a href="<?php echo PREPEND_PATH; ?>membership_profile.php" class="navbar-link username"><?php echo $mi['username']; ?></a></strong>
							</p>
						</ul>
						<ul class="nav navbar-nav visible-xs">
							<a class="btn navbar-btn btn-default btn-lg visible-xs" href="<?php echo PREPEND_PATH; ?>index.php?signOut=1"><i class="glyphicon glyphicon-log-out"></i> <?php echo $Translation['sign out']; ?></a>
							<p class="navbar-text text-center signed-in-as">
								<?php echo $Translation['signed as']; ?> <strong><a href="<?php echo PREPEND_PATH; ?>membership_profile.php" class="navbar-link username"><?php echo $mi['username']; ?></a></strong>
							</p>
						</ul>
						<script>
							/* periodically check if user is still signed in */
							setInterval(function() {
								$j.ajax({
									url: '<?php echo PREPEND_PATH; ?>ajax_check_login.php',
									success: function(username) {
										if(!username.length) window.location = '<?php echo PREPEND_PATH; ?>index.php?signIn=1';
									}
								});
							}, 60000);
						</script>
					<?php } ?>
				<?php } ?>

				<p class="navbar-text navbar-right help-shortcuts-launcher-container hidden-xs">
					<img
						class="help-shortcuts-launcher" 
						src="<?php echo PREPEND_PATH; ?>resources/images/keyboard.png" 
						title="<?php echo html_attr($Translation['keyboard shortcuts']); ?>">
				</p>
			</div>
		</nav>
		<?php

		$html = ob_get_contents();
		ob_end_clean();

		return $html;
	}

	#########################################################

	function showNotifications($msg = '', $class = '', $fadeout = true) {
		global $Translation;
		if($error_message = strip_tags($_REQUEST['error_message']))
			$error_message = '<div class="text-bold">' . $error_message . '</div>';

		if(!$msg) { // if no msg, use url to detect message to display
			if($_REQUEST['record-added-ok'] != '') {
				$msg = $Translation['new record saved'];
				$class = 'alert-success';
			} elseif($_REQUEST['record-added-error'] != '') {
				$msg = $Translation['Couldn\'t save the new record'] . $error_message;
				$class = 'alert-danger';
				$fadeout = false;
			} elseif($_REQUEST['record-updated-ok'] != '') {
				$msg = $Translation['record updated'];
				$class = 'alert-success';
			} elseif($_REQUEST['record-updated-error'] != '') {
				$msg = $Translation['Couldn\'t save changes to the record'] . $error_message;
				$class = 'alert-danger';
				$fadeout = false;
			} elseif($_REQUEST['record-deleted-ok'] != '') {
				$msg = $Translation['The record has been deleted successfully'];
				$class = 'alert-success';
			} elseif($_REQUEST['record-deleted-error'] != '') {
				$msg = $Translation['Couldn\'t delete this record'] . $error_message;
				$class = 'alert-danger';
				$fadeout = false;
			} else {
				return '';
			}
		}
		$id = 'notification-' . rand();

		ob_start();
		// notification template
		?>
		<div id="%%ID%%" class="alert alert-dismissable %%CLASS%%" style="opacity: 1; padding-top: 6px; padding-bottom: 6px; animation: fadeIn 1.5s ease-out;">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			%%MSG%%
		</div>
		<script>
			$j(function() {
				var autoDismiss = <?php echo $fadeout ? 'true' : 'false'; ?>,
					embedded = !$j('nav').length,
					messageDelay = 10, fadeDelay = 1.5;

				if(!autoDismiss) {
					if(embedded)
						$j('#%%ID%%').before('<div style="height: 2rem;"></div>');
					else
						$j('#%%ID%%').css({ margin: '0 0 1rem' });

					return;
				}

				// below code runs only in case of autoDismiss

				if(embedded)
					$j('#%%ID%%').css({ margin: '1rem 0 -1rem' });
				else
					$j('#%%ID%%').css({ margin: '-15px 0 -20px' });

				setTimeout(function() {
					$j('#%%ID%%').css({    animation: 'fadeOut ' + fadeDelay + 's ease-out' });
				}, messageDelay * 1000);

				setTimeout(function() {
					$j('#%%ID%%').css({    visibility: 'hidden' });
				}, (messageDelay + fadeDelay) * 1000);
			})
		</script>
		<style>
			@keyframes fadeIn {
				0%   { opacity: 0; }
				100% { opacity: 1; }
			}
			@keyframes fadeOut {
				0%   { opacity: 1; }
				100% { opacity: 0; }
			}
		</style>

		<?php
		$out = ob_get_clean();

		$out = str_replace('%%ID%%', $id, $out);
		$out = str_replace('%%MSG%%', $msg, $out);
		$out = str_replace('%%CLASS%%', $class, $out);

		return $out;
	}

	#########################################################

	function parseMySQLDate($date, $altDate) {
		// is $date valid?
		if(preg_match("/^\d{4}-\d{1,2}-\d{1,2}$/", trim($date))) {
			return trim($date);
		}

		if($date != '--' && preg_match("/^\d{4}-\d{1,2}-\d{1,2}$/", trim($altDate))) {
			return trim($altDate);
		}

		if($date != '--' && $altDate && intval($altDate)==$altDate) {
			return @date('Y-m-d', @time() + ($altDate >= 1 ? $altDate - 1 : $altDate) * 86400);
		}

		return '';
	}

	#########################################################

	function parseCode($code, $isInsert = true, $rawData = false) {
		if($isInsert) {
			$arrCodes = [
				'<%%creatorusername%%>' => $_SESSION['memberID'],
				'<%%creatorgroupid%%>' => $_SESSION['memberGroupID'],
				'<%%creatorip%%>' => $_SERVER['REMOTE_ADDR'],
				'<%%creatorgroup%%>' => sqlValue("SELECT `name` FROM `membership_groups` WHERE `groupID`='{$_SESSION['memberGroupID']}'"),

				'<%%creationdate%%>' => ($rawData ? @date('Y-m-d') : @date('j/n/Y')),
				'<%%creationtime%%>' => ($rawData ? @date('H:i:s') : @date('h:i:s a')),
				'<%%creationdatetime%%>' => ($rawData ? @date('Y-m-d H:i:s') : @date('j/n/Y h:i:s a')),
				'<%%creationtimestamp%%>' => ($rawData ? @date('Y-m-d H:i:s') : @time())
			];
		} else {
			$arrCodes = [
				'<%%editorusername%%>' => $_SESSION['memberID'],
				'<%%editorgroupid%%>' => $_SESSION['memberGroupID'],
				'<%%editorip%%>' => $_SERVER['REMOTE_ADDR'],
				'<%%editorgroup%%>' => sqlValue("SELECT `name` FROM `membership_groups` WHERE `groupID`='{$_SESSION['memberGroupID']}'"),

				'<%%editingdate%%>' => ($rawData ? @date('Y-m-d') : @date('j/n/Y')),
				'<%%editingtime%%>' => ($rawData ? @date('H:i:s') : @date('h:i:s a')),
				'<%%editingdatetime%%>' => ($rawData ? @date('Y-m-d H:i:s') : @date('j/n/Y h:i:s a')),
				'<%%editingtimestamp%%>' => ($rawData ? @date('Y-m-d H:i:s') : @time())
			];
		}

		$pc = str_ireplace(array_keys($arrCodes), array_values($arrCodes), $code);

		return $pc;
	}

	#########################################################

	function addFilter($index, $filterAnd, $filterField, $filterOperator, $filterValue) {
		// validate input
		if($index < 1 || $index > 80 || !is_int($index)) return false;
		if($filterAnd != 'or')   $filterAnd = 'and';
		$filterField = intval($filterField);

		/* backward compatibility */
		if(in_array($filterOperator, $GLOBALS['filter_operators'])) {
			$filterOperator = array_search($filterOperator, $GLOBALS['filter_operators']);
		}

		if(!in_array($filterOperator, array_keys($GLOBALS['filter_operators']))) {
			$filterOperator = 'like';
		}

		if(!$filterField) {
			$filterOperator = '';
			$filterValue = '';
		}

		$_REQUEST['FilterAnd'][$index] = $filterAnd;
		$_REQUEST['FilterField'][$index] = $filterField;
		$_REQUEST['FilterOperator'][$index] = $filterOperator;
		$_REQUEST['FilterValue'][$index] = $filterValue;

		return true;
	}

	#########################################################

	function clearFilters() {
		for($i=1; $i<=80; $i++) {
			addFilter($i, '', 0, '', '');
		}
	}

	#########################################################

	if(!function_exists('str_ireplace')) {
		function str_ireplace($search, $replace, $subject) {
			$ret=$subject;
			if(is_array($search)) {
				for($i=0; $i<count($search); $i++) {
					$ret=str_ireplace($search[$i], $replace[$i], $ret);
				}
			} else {
				$ret=preg_replace('/'.preg_quote($search, '/').'/i', $replace, $ret);
			}

			return $ret;
		} 
	} 

	#########################################################

	/**
	* Loads a given view from the templates folder, passing the given data to it
	* @param $view the name of a php file (without extension) to be loaded from the 'templates' folder
	* @param $the_data_to_pass_to_the_view (optional) associative array containing the data to pass to the view
	* @return the output of the parsed view as a string
	*/
	function loadView($view, $the_data_to_pass_to_the_view=false) {
		global $Translation;

		$view = dirname(__FILE__)."/templates/$view.php";
		if(!is_file($view)) return false;

		if(is_array($the_data_to_pass_to_the_view)) {
			foreach($the_data_to_pass_to_the_view as $k => $v)
				$$k = $v;
		}
		unset($the_data_to_pass_to_the_view, $k, $v);

		ob_start();
		@include($view);
		$out=ob_get_contents();
		ob_end_clean();

		return $out;
	}

	#########################################################

	/**
	* Loads a table template from the templates folder, passing the given data to it
	* @param $table_name the name of the table whose template is to be loaded from the 'templates' folder
	* @param $the_data_to_pass_to_the_table associative array containing the data to pass to the table template
	* @return the output of the parsed table template as a string
	*/
	function loadTable($table_name, $the_data_to_pass_to_the_table = []) {
		$dont_load_header = $the_data_to_pass_to_the_table['dont_load_header'];
		$dont_load_footer = $the_data_to_pass_to_the_table['dont_load_footer'];

		$header = $table = $footer = '';

		if(!$dont_load_header) {
			// try to load tablename-header
			if(!($header = loadView("{$table_name}-header", $the_data_to_pass_to_the_table))) {
				$header = loadView('table-common-header', $the_data_to_pass_to_the_table);
			}
		}

		$table = loadView($table_name, $the_data_to_pass_to_the_table);

		if(!$dont_load_footer) {
			// try to load tablename-footer
			if(!($footer = loadView("{$table_name}-footer", $the_data_to_pass_to_the_table))) {
				$footer = loadView('table-common-footer', $the_data_to_pass_to_the_table);
			}
		}

		return "{$header}{$table}{$footer}";
	}

	#########################################################

	function filterDropdownBy($filterable, $filterers, $parentFilterers, $parentPKField, $parentCaption, $parentTable, &$filterableCombo) {
		$filterersArray = explode(',', $filterers);
		$parentFilterersArray = explode(',', $parentFilterers);
		$parentFiltererList = '`' . implode('`, `', $parentFilterersArray) . '`';
		$res=sql("SELECT `$parentPKField`, $parentCaption, $parentFiltererList FROM `$parentTable` ORDER BY 2", $eo);
		$filterableData = [];
		while($row=db_fetch_row($res)) {
			$filterableData[$row[0]] = $row[1];
			$filtererIndex = 0;
			foreach($filterersArray as $filterer) {
				$filterableDataByFilterer[$filterer][$row[$filtererIndex + 2]][$row[0]] = $row[1];
				$filtererIndex++;
			}
			$row[0] = addslashes($row[0]);
			$row[1] = addslashes($row[1]);
			$jsonFilterableData .= "\"{$row[0]}\":\"{$row[1]}\",";
		}
		$jsonFilterableData .= '}';
		$jsonFilterableData = '{'.str_replace(',}', '}', $jsonFilterableData);     
		$filterJS = "\nvar {$filterable}_data = $jsonFilterableData;";

		foreach($filterersArray as $filterer) {
			if(is_array($filterableDataByFilterer[$filterer])) foreach($filterableDataByFilterer[$filterer] as $filtererItem => $filterableItem) {
				$jsonFilterableDataByFilterer[$filterer] .= '"'.addslashes($filtererItem).'":{';
				foreach($filterableItem as $filterableItemID => $filterableItemData) {
					$jsonFilterableDataByFilterer[$filterer] .= '"'.addslashes($filterableItemID).'":"'.addslashes($filterableItemData).'",';
				}
				$jsonFilterableDataByFilterer[$filterer] .= '},';
			}
			$jsonFilterableDataByFilterer[$filterer] .= '}';
			$jsonFilterableDataByFilterer[$filterer] = '{'.str_replace(',}', '}', $jsonFilterableDataByFilterer[$filterer]);

			$filterJS.="\n\n// code for filtering {$filterable} by {$filterer}\n";
			$filterJS.="\nvar {$filterable}_data_by_{$filterer} = {$jsonFilterableDataByFilterer[$filterer]}; ";
			$filterJS.="\nvar selected_{$filterable} = \$j('#{$filterable}').val();";
			$filterJS.="\nvar {$filterable}_change_by_{$filterer} = function() {";
			$filterJS.="\n\t$('{$filterable}').options.length=0;";
			$filterJS.="\n\t$('{$filterable}').options[0] = new Option();";
			$filterJS.="\n\tif(\$j('#{$filterer}').val()) {";
			$filterJS.="\n\t\tfor({$filterable}_item in {$filterable}_data_by_{$filterer}[\$j('#{$filterer}').val()]) {";
			$filterJS.="\n\t\t\t$('{$filterable}').options[$('{$filterable}').options.length] = new Option(";
			$filterJS.="\n\t\t\t\t{$filterable}_data_by_{$filterer}[\$j('#{$filterer}').val()][{$filterable}_item],";
			$filterJS.="\n\t\t\t\t{$filterable}_item,";
			$filterJS.="\n\t\t\t\t({$filterable}_item == selected_{$filterable} ? true : false),";
			$filterJS.="\n\t\t\t\t({$filterable}_item == selected_{$filterable} ? true : false)";
			$filterJS.="\n\t\t\t);";
			$filterJS.="\n\t\t}";
			$filterJS.="\n\t} else {";
			$filterJS.="\n\t\tfor({$filterable}_item in {$filterable}_data) {";
			$filterJS.="\n\t\t\t$('{$filterable}').options[$('{$filterable}').options.length] = new Option(";
			$filterJS.="\n\t\t\t\t{$filterable}_data[{$filterable}_item],";
			$filterJS.="\n\t\t\t\t{$filterable}_item,";
			$filterJS.="\n\t\t\t\t({$filterable}_item == selected_{$filterable} ? true : false),";
			$filterJS.="\n\t\t\t\t({$filterable}_item == selected_{$filterable} ? true : false)";
			$filterJS.="\n\t\t\t);";
			$filterJS.="\n\t\t}";
			$filterJS.="\n\t\tif(selected_{$filterable} && selected_{$filterable} == \$j('#{$filterable}').val()) {";
			$filterJS.="\n\t\t\tfor({$filterer}_item in {$filterable}_data_by_{$filterer}) {";
			$filterJS.="\n\t\t\t\tfor({$filterable}_item in {$filterable}_data_by_{$filterer}[{$filterer}_item]) {";
			$filterJS.="\n\t\t\t\t\tif({$filterable}_item == selected_{$filterable}) {";
			$filterJS.="\n\t\t\t\t\t\t$('{$filterer}').value = {$filterer}_item;";
			$filterJS.="\n\t\t\t\t\t\tbreak;";
			$filterJS.="\n\t\t\t\t\t}";
			$filterJS.="\n\t\t\t\t}";
			$filterJS.="\n\t\t\t\tif({$filterable}_item == selected_{$filterable}) break;";
			$filterJS.="\n\t\t\t}";
			$filterJS.="\n\t\t}";
			$filterJS.="\n\t}";
			$filterJS.="\n\t$('{$filterable}').highlight();";
			$filterJS.="\n};";
			$filterJS.="\n$('{$filterer}').observe('change', function() { window.setTimeout({$filterable}_change_by_{$filterer}, 25); });";
			$filterJS.="\n";
		}

		$filterableCombo = new Combo;
		$filterableCombo->ListType = 0;
		$filterableCombo->ListItem = array_slice(array_values($filterableData), 0, 10);
		$filterableCombo->ListData = array_slice(array_keys($filterableData), 0, 10);
		$filterableCombo->SelectName = $filterable;
		$filterableCombo->AllowNull = true;

		return $filterJS;
	}

	#########################################################
	function br2nl($text) {
		return  preg_replace('/\<br(\s*)?\/?\>/i', "\n", $text);
	}

	#########################################################

	if(!function_exists('htmlspecialchars_decode')) {
		function htmlspecialchars_decode($string, $quote_style = ENT_COMPAT) {
			return strtr($string, array_flip(get_html_translation_table(HTML_SPECIALCHARS, $quote_style)));
		}
	}

	#########################################################

	function entitiesToUTF8($input) {
		return preg_replace_callback('/(&#[0-9]+;)/', '_toUTF8', $input);
	}

	function _toUTF8($m) {
		if(function_exists('mb_convert_encoding')) {
			return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES");
		} else {
			return $m[1];
		}
	}

	#########################################################

	function func_get_args_byref() {
		if(!function_exists('debug_backtrace')) return false;

		$trace = debug_backtrace();
		return $trace[1]['args'];
	}

	#########################################################

	function permissions_sql($table, $level = 'all') {
		if(!in_array($level, ['user', 'group'])) { $level = 'all'; }
		$perm = getTablePermissions($table);
		$from = '';
		$where = '';
		$pk = getPKFieldName($table);

		if($perm['view'] == 1 || ($perm['view'] > 1 && $level == 'user')) { // view owner only
			$from = 'membership_userrecords';
			$where = "(`$table`.`$pk`=membership_userrecords.pkValue and membership_userrecords.tableName='$table' and lcase(membership_userrecords.memberID)='" . getLoggedMemberID() . "')";
		} elseif($perm['view'] == 2 || ($perm['view'] > 2 && $level == 'group')) { // view group only
			$from = 'membership_userrecords';
			$where = "(`$table`.`$pk`=membership_userrecords.pkValue and membership_userrecords.tableName='$table' and membership_userrecords.groupID='" . getLoggedGroupID() . "')";
		} elseif($perm['view'] == 3) { // view all
			// no further action
		} elseif($perm['view'] == 0) { // view none
			return false;
		}

		return ['where' => $where, 'from' => $from, 0 => $where, 1 => $from];
	}

	#########################################################

	function error_message($msg, $back_url = '', $full_page = true) {
		$curr_dir = dirname(__FILE__);
		global $Translation;

		ob_start();

		if($full_page) include($curr_dir . '/header.php');

		echo '<div class="panel panel-danger">';
			echo '<div class="panel-heading"><h3 class="panel-title">' . $Translation['error:'] . '</h3></div>';
			echo '<div class="panel-body"><p class="text-danger">' . $msg . '</p>';
			if($back_url !== false) { // explicitly passing false suppresses the back link completely
				echo '<div class="text-center">';
				if($back_url) {
					echo '<a href="' . $back_url . '" class="btn btn-danger btn-lg vspacer-lg"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['< back'] . '</a>';
				} else {
					echo '<a href="#" class="btn btn-danger btn-lg vspacer-lg" onclick="history.go(-1); return false;"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['< back'] . '</a>';
				}
				echo '</div>';
			}
			echo '</div>';
		echo '</div>';

		if($full_page) include($curr_dir . '/footer.php');

		return ob_get_clean();
	}

	#########################################################

	function toMySQLDate($formattedDate, $sep = datalist_date_separator, $ord = datalist_date_format) {
		// extract date elements
		$de=explode($sep, $formattedDate);
		$mySQLDate=intval($de[strpos($ord, 'Y')]).'-'.intval($de[strpos($ord, 'm')]).'-'.intval($de[strpos($ord, 'd')]);
		return $mySQLDate;
	}

	#########################################################

	function reIndex(&$arr) {
		$i=1;
		foreach($arr as $n=>$v) {
			$arr2[$i]=$n;
			$i++;
		}
		return $arr2;
	}

	#########################################################

	function get_embed($provider, $url, $max_width = '', $max_height = '', $retrieve = 'html') {
		global $Translation;
		if(!$url) return '';

		$providers = [
			'youtube' => ['oembed' => 'https://www.youtube.com/oembed?'],
			'googlemap' => ['oembed' => '', 'regex' => '/^http.*\.google\..*maps/i'],
		];

		if(!isset($providers[$provider])) {
			return '<div class="text-danger">' . $Translation['invalid provider'] . '</div>';
		}

		if(isset($providers[$provider]['regex']) && !preg_match($providers[$provider]['regex'], $url)) {
			return '<div class="text-danger">' . $Translation['invalid url'] . '</div>';
		}

		if($providers[$provider]['oembed']) {
			$oembed = $providers[$provider]['oembed'] . 'url=' . urlencode($url) . "&amp;maxwidth={$max_width}&amp;maxheight={$max_height}&amp;format=json";
			$data_json = request_cache($oembed);

			$data = json_decode($data_json, true);
			if($data === null) {
				/* an error was returned rather than a json string */
				if($retrieve == 'html') return "<div class=\"text-danger\">{$data_json}\n<!-- {$oembed} --></div>";
				return '';
			}

			return (isset($data[$retrieve]) ? $data[$retrieve] : $data['html']);
		}

		/* special cases (where there is no oEmbed provider) */
		if($provider == 'googlemap') return get_embed_googlemap($url, $max_width, $max_height, $retrieve);

		return '<div class="text-danger">Invalid provider!</div>';
	}

	#########################################################

	function get_embed_googlemap($url, $max_width = '', $max_height = '', $retrieve = 'html') {
		global $Translation;
		$url_parts = parse_url($url);
		$coords_regex = '/-?\d+(\.\d+)?[,+]-?\d+(\.\d+)?(,\d{1,2}z)?/'; /* https://stackoverflow.com/questions/2660201 */

		if(preg_match($coords_regex, $url_parts['path'] . '?' . $url_parts['query'], $m)) {
			list($lat, $long, $zoom) = explode(',', $m[0]);
			$zoom = intval($zoom);
			if(!$zoom) $zoom = 10; /* default zoom */
			if(!$max_height) $max_height = 360;
			if(!$max_width) $max_width = 480;

			$api_key = config('adminConfig')['googleAPIKey'];
			$embed_url = "https://www.google.com/maps/embed/v1/view?key={$api_key}&amp;center={$lat},{$long}&amp;zoom={$zoom}&amp;maptype=roadmap";
			$thumbnail_url = "https://maps.googleapis.com/maps/api/staticmap?key={$api_key}&amp;center={$lat},{$long}&amp;zoom={$zoom}&amp;maptype=roadmap&amp;size={$max_width}x{$max_height}";

			if($retrieve == 'html') {
				return "<iframe width=\"{$max_width}\" height=\"{$max_height}\" frameborder=\"0\" style=\"border:0\" src=\"{$embed_url}\"></iframe>";
			} else {
				return $thumbnail_url;
			}
		} else {
			return '<div class="text-danger">' . $Translation['cant retrieve coordinates from url'] . '</div>';
		}
	}

	#########################################################

	function request_cache($request, $force_fetch = false) {
		$max_cache_lifetime = 7 * 86400; /* max cache lifetime in seconds before refreshing from source */

		/* membership_cache table exists? if not, create it */
		static $cache_table_exists = false;
		if(!$cache_table_exists && !$force_fetch) {
			$te = sqlValue("show tables like 'membership_cache'");
			if(!$te) {
				if(!sql("CREATE TABLE `membership_cache` (`request` VARCHAR(100) NOT NULL, `request_ts` INT, `response` TEXT NOT NULL, PRIMARY KEY (`request`))", $eo)) {
					/* table can't be created, so force fetching request */
					return request_cache($request, true);
				}
			}
			$cache_table_exists = true;
		}

		/* retrieve response from cache if exists */
		if(!$force_fetch) {
			$res = sql("select response, request_ts from membership_cache where request='" . md5($request) . "'", $eo);
			if(!$row = db_fetch_array($res)) return request_cache($request, true);

			$response = $row[0];
			$response_ts = $row[1];
			if($response_ts < time() - $max_cache_lifetime) return request_cache($request, true);
		}

		/* if no response in cache, issue a request */
		if(!$response || $force_fetch) {
			$response = @file_get_contents($request);
			if($response === false) {
				$error = error_get_last();
				$error_message = preg_replace('/.*: (.*)/', '$1', $error['message']);
				return $error_message;
			} elseif($cache_table_exists) {
				/* store response in cache */
				$ts = time();
				sql("replace into membership_cache set request='" . md5($request) . "', request_ts='{$ts}', response='" . makeSafe($response, false) . "'", $eo);
			}
		}

		return $response;
	}

	#########################################################

	function check_record_permission($table, $id, $perm = 'view') {
		if($perm != 'edit' && $perm != 'delete') $perm = 'view';

		$perms = getTablePermissions($table);
		if(!$perms[$perm]) return false;

		$safe_id = makeSafe($id);
		$safe_table = makeSafe($table);

		if($perms[$perm] == 1) { // own records only
			$username = getLoggedMemberID();
			$owner = sqlValue("select memberID from membership_userrecords where tableName='{$safe_table}' and pkValue='{$safe_id}'");
			if($owner == $username) return true;
		} elseif($perms[$perm] == 2) { // group records
			$group_id = getLoggedGroupID();
			$owner_group_id = sqlValue("select groupID from membership_userrecords where tableName='{$safe_table}' and pkValue='{$safe_id}'");
			if($owner_group_id == $group_id) return true;
		} elseif($perms[$perm] == 3) { // all records
			return true;
		}

		return false;
	}

	#########################################################

	function NavMenus($options = []) {
		if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '');
		global $Translation;
		$prepend_path = PREPEND_PATH;

		/* default options */
		if(empty($options)) {
			$options = ['tabs' => 7];
		}

		$table_group_name = array_keys(get_table_groups()); /* 0 => group1, 1 => group2 .. */
		/* if only one group named 'None', set to translation of 'select a table' */
		if((count($table_group_name) == 1 && $table_group_name[0] == 'None') || count($table_group_name) < 1) $table_group_name[0] = $Translation['select a table'];
		$table_group_index = array_flip($table_group_name); /* group1 => 0, group2 => 1 .. */
		$menu = array_fill(0, count($table_group_name), '');

		$t = time();
		$arrTables = getTableList();
		if(is_array($arrTables)) {
			foreach($arrTables as $tn => $tc) {
				/* ---- list of tables where hide link in nav menu is set ---- */
				$tChkHL = array_search($tn, ['jpd_de','pams_DE','JL','jpd_khas','pams_khas','jpd_noc','pams_noc','balb','JALB','BELB','pprt','ljk','pemohon_jpd','pams_mohon','pemohon_pprt','negeri','daerah','Dun','PARLIMEN','kelulusan','status_pelaksanaan','status_kelulusan_jpd','status_kelulusan_pams','status_kelulusan_pprt','tahun','penyelia_projek','agensi_pelaksana','agensi_bayar','waran','jpd_de_REKOD','pams_DE_REKOD','jpd_test','skop_jpd','skop_pams','Syarikat','Syarikat_baru','ekasih','BLACKLIST','LJK_JENIS']);

				/* ---- list of tables where filter first is set ---- */
				$tChkFF = array_search($tn, []);
				if($tChkFF !== false && $tChkFF !== null) {
					$searchFirst = '&Filter_x=1';
				} else {
					$searchFirst = '';
				}

				/* when no groups defined, $table_group_index['None'] is NULL, so $menu_index is still set to 0 */
				$menu_index = intval($table_group_index[$tc[3]]);
				if(!$tChkHL && $tChkHL !== 0) $menu[$menu_index] .= "<li><a href=\"{$prepend_path}{$tn}_view.php?t={$t}{$searchFirst}\"><img src=\"{$prepend_path}" . ($tc[2] ? $tc[2] : 'blank.gif') . "\" height=\"32\"> {$tc[0]}</a></li>";
			}
		}

		// custom nav links, as defined in "hooks/links-navmenu.php" 
		global $navLinks;
		if(is_array($navLinks)) {
			$memberInfo = getMemberInfo();
			$links_added = [];
			foreach($navLinks as $link) {
				if(!isset($link['url']) || !isset($link['title'])) continue;
				if(getLoggedAdmin() !== false || @in_array($memberInfo['group'], $link['groups']) || @in_array('*', $link['groups'])) {
					$menu_index = intval($link['table_group']);
					if(!$links_added[$menu_index]) $menu[$menu_index] .= '<li class="divider"></li>';

					/* add prepend_path to custom links if they aren't absolute links */
					if(!preg_match('/^(http|\/\/)/i', $link['url'])) $link['url'] = $prepend_path . $link['url'];
					if(!preg_match('/^(http|\/\/)/i', $link['icon']) && $link['icon']) $link['icon'] = $prepend_path . $link['icon'];

					$menu[$menu_index] .= "<li><a href=\"{$link['url']}\"><img src=\"" . ($link['icon'] ? $link['icon'] : "{$prepend_path}blank.gif") . "\" height=\"32\"> {$link['title']}</a></li>";
					$links_added[$menu_index]++;
				}
			}
		}

		$menu_wrapper = '';
		for($i = 0; $i < count($menu); $i++) {
			$menu_wrapper .= <<<EOT
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{$table_group_name[$i]} <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu">{$menu[$i]}</ul>
				</li>
EOT;
		}

		return $menu_wrapper;
	}

	#########################################################

	function StyleSheet() {
		if(!defined('PREPEND_PATH')) define('PREPEND_PATH', '');
		$prepend_path = PREPEND_PATH;

		$css_links = <<<EOT

			<link rel="stylesheet" href="{$prepend_path}resources/initializr/css/slate.css">
			<link rel="stylesheet" href="{$prepend_path}resources/lightbox/css/lightbox.css" media="screen">
			<link rel="stylesheet" href="{$prepend_path}resources/select2/select2.css" media="screen">
			<link rel="stylesheet" href="{$prepend_path}resources/timepicker/bootstrap-timepicker.min.css" media="screen">
			<link rel="stylesheet" href="{$prepend_path}dynamic.css">
EOT;

		return $css_links;
	}

	#########################################################

	function PrepareUploadedFile($FieldName, $MaxSize, $FileTypes = 'jpg|jpeg|gif|png', $NoRename = false, $dir = '') {
		global $Translation;
		$f = $_FILES[$FieldName];
		if($f['error'] == 4 || !$f['name']) return '';

		$dir = getUploadDir($dir);

		/* get php.ini upload_max_filesize in bytes */
		$php_upload_size_limit = trim(ini_get('upload_max_filesize'));
		$last = strtolower($php_upload_size_limit[strlen($php_upload_size_limit) - 1]);
		switch($last) {
			case 'g':
				$php_upload_size_limit *= 1024;
			case 'm':
				$php_upload_size_limit *= 1024;
			case 'k':
				$php_upload_size_limit *= 1024;
		}

		$MaxSize = min($MaxSize, $php_upload_size_limit);

		if($f['size'] > $MaxSize || $f['error']) {
			echo error_message(str_replace(['<MaxSize>', '{MaxSize}'], intval($MaxSize / 1024), $Translation['file too large']));
			exit;
		}
		if(!preg_match('/\.(' . $FileTypes . ')$/i', $f['name'], $ft)) {
			echo error_message(str_replace(['<FileTypes>', '{FileTypes}'], str_replace('|', ', ', $FileTypes), $Translation['invalid file type']));
			exit;
		}

		$name = str_replace(' ', '_', $f['name']);
		if(!$NoRename) $name = substr(md5(microtime() . rand(0, 100000)), -17) . $ft[0];

		if(!file_exists($dir)) @mkdir($dir, 0777);

		if(!@move_uploaded_file($f['tmp_name'], $dir . $name)) {
			echo error_message("Couldn't save the uploaded file. Try chmoding the upload folder '{$dir}' to 777.");
			exit;
		}

		@chmod($dir . $name, 0666);
		return $name;
	}

	#########################################################

	function get_home_links($homeLinks, $default_classes, $tgroup = '') {
		if(!is_array($homeLinks) || !count($homeLinks)) return '';

		$memberInfo = getMemberInfo();

		ob_start();
		foreach($homeLinks as $link) {
			if(!isset($link['url']) || !isset($link['title'])) continue;
			if($tgroup != $link['table_group'] && $tgroup != '*') continue;

			/* fall-back classes if none defined */
			if(!$link['grid_column_classes']) $link['grid_column_classes'] = $default_classes['grid_column'];
			if(!$link['panel_classes']) $link['panel_classes'] = $default_classes['panel'];
			if(!$link['link_classes']) $link['link_classes'] = $default_classes['link'];

			if(getLoggedAdmin() !== false || @in_array($memberInfo['group'], $link['groups']) || @in_array('*', $link['groups'])) {
				?>
				<div class="col-xs-12 <?php echo $link['grid_column_classes']; ?>">
					<div class="panel <?php echo $link['panel_classes']; ?>">
						<div class="panel-body">
							<a class="btn btn-block btn-lg <?php echo $link['link_classes']; ?>" title="<?php echo preg_replace("/&amp;(#[0-9]+|[a-z]+);/i", "&$1;", html_attr(strip_tags($link['description']))); ?>" href="<?php echo $link['url']; ?>"><?php echo ($link['icon'] ? '<img src="' . $link['icon'] . '">' : ''); ?><strong><?php echo $link['title']; ?></strong></a>
							<div class="panel-body-description"><?php echo $link['description']; ?></div>
						</div>
					</div>
				</div>
				<?php
			}
		}

		$html = ob_get_contents();
		ob_end_clean();

		return $html;
	}

	#########################################################

	function quick_search_html($search_term, $label, $separate_dv = true) {
		global $Translation;

		$safe_search = html_attr($search_term);
		$safe_label = html_attr($label);
		$safe_clear_label = html_attr($Translation['Reset Filters']);

		if($separate_dv) {
			$reset_selection = "document.myform.SelectedID.value = '';";
		} else {
			$reset_selection = "document.myform.writeAttribute('novalidate', 'novalidate');";
		}
		$reset_selection .= ' document.myform.NoDV.value=1; return true;';

		$html = <<<EOT
		<div class="input-group" id="quick-search">
			<input type="text" id="SearchString" name="SearchString" value="{$safe_search}" class="form-control" placeholder="{$safe_label}">
			<span class="input-group-btn">
				<button name="Search_x" value="1" id="Search" type="submit" onClick="{$reset_selection}" class="btn btn-default" title="{$safe_label}"><i class="glyphicon glyphicon-search"></i></button>
				<button name="ClearQuickSearch" value="1" id="ClearQuickSearch" type="submit" onClick="\$j('#SearchString').val(''); {$reset_selection}" class="btn btn-default" title="{$safe_clear_label}"><i class="glyphicon glyphicon-remove-circle"></i></button>
			</span>
		</div>
EOT;
		return $html;
	}

	#########################################################

