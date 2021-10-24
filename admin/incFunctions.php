<?php
	########################################################################
	/*
	~~~~~~ LIST OF FUNCTIONS ~~~~~~
		set_headers() -- sets HTTP headers (encoding, same-origin frame policy, .. etc)
		getTableList() -- returns an associative array of all tables in this application in the format tableName=>tableCaption
		getThumbnailSpecs($tableName, $fieldName, $view) -- returns an associative array specifying the width, height and identifier of the thumbnail file.
		createThumbnail($img, $specs) -- $specs is an array as returned by getThumbnailSpecs(). Returns true on success, false on failure.
		makeSafe($string)
		checkPermissionVal($pvn)
		sql($statement, $o)
		sqlValue($statement)
		getLoggedAdmin()
		checkUser($username, $password)
		logOutUser()
		getPKFieldName($tn)
		getCSVData($tn, $pkValue, $stripTag=true)
		errorMsg($msg)
		redirect($URL, $absolute=FALSE)
		htmlRadioGroup($name, $arrValue, $arrCaption, $selectedValue, $selClass="", $class="", $separator="<br>")
		htmlSelect($name, $arrValue, $arrCaption, $selectedValue, $class="", $selectedClass="")
		htmlSQLSelect($name, $sql, $selectedValue, $class="", $selectedClass="")
		isEmail($email) -- returns $email if valid or false otherwise.
		notifyMemberApproval($memberID) -- send an email to member acknowledging his approval by admin, returns false if no mail is sent
		setupMembership() -- check if membership tables exist or not. If not, create them.
		thisOr($this_val, $or) -- return $this_val if it has a value, or $or if not.
		getUploadedFile($FieldName, $MaxSize=0, $FileTypes='csv|txt', $NoRename=false, $dir='')
		toBytes($val)
		convertLegacyOptions($CSVList)
		getValueGivenCaption($query, $caption)
		time24($t) -- return time in 24h format
		time12($t) -- return time in 12h format
		application_url($page) -- return absolute URL of provided page
		is_ajax() -- return true if this is an ajax request, false otherwise
		array_trim($arr) -- recursively trim provided value/array
		is_allowed_username($username, $exception = false) -- returns username if valid and unique, or false otherwise (if exception is provided and same as username, no uniqueness check is performed)
		csrf_token($validate) -- csrf-proof a form
		get_plugins() -- scans for installed plugins and returns them in an array ('name', 'title', 'icon' or 'glyphicon', 'admin_path')
		maintenance_mode($new_status = '') -- retrieves (and optionally sets) maintenance mode status
		html_attr($str) -- prepare $str to be placed inside an HTML attribute
		html_attr_tags_ok($str) -- same as html_attr, but allowing HTML tags
		Notification() -- class for providing a standardized html notifications functionality
		sendmail($mail) -- sends an email using PHPMailer as specified in the assoc array $mail( ['to', 'name', 'subject', 'message', 'debug'] ) and returns true on success or an error message on failure
		safe_html($str, $noBr = false) -- sanitize HTML strings, and apply nl2br() to non-HTML ones (unless optional 2nd param is passed as true)
		get_tables_info($skip_authentication = false) -- retrieves table properties as a 2D assoc array ['table_name' => ['prop1' => 'val', ..], ..]
		getLoggedMemberID() -- returns memberID of logged member. If no login, returns anonymous memberID
		getLoggedGroupID() -- returns groupID of logged member, or anonymous groupID
		getMemberInfo() -- returns an array containing the currently signed-in member's info
		get_group_id($user = '') -- returns groupID of given user, or current one if empty
		prepare_sql_set($set_array, $glue = ', ') -- Prepares data for a SET or WHERE clause, to be used in an INSERT/UPDATE query
		insert($tn, $set_array) -- Inserts a record specified by $set_array to the given table $tn
		update($tn, $set_array, $where_array) -- Updates a record identified by $where_array to date specified by $set_array in the given table $tn
		set_record_owner($tn, $pk, $user) -- Set/update the owner of given record
		app_datetime_format($destination = 'php', $datetime = 'd') -- get date/time format string for use with one of these: 'php' (see date function), 'mysql', 'moment'. $datetime: 'd' = date, 't' = time, 'dt' = both
		mysql_datetime($app_datetime) -- converts $app_datetime to mysql-formatted datetime, 'yyyy-mm-dd H:i:s', or empty string on error
		app_datetime($mysql_datetime, $datetime = 'd') -- converts $mysql_datetime to app-formatted datetime (if 2nd param is 'dt'), or empty string on error
		to_utf8($str) -- converts string from app-configured encoding to utf8
		from_utf8($str) -- converts string from utf8 to app-configured encoding
		membership_table_functions() -- returns a list of update_membership_* functions
		configure_anonymous_group() -- sets up anonymous group and guest user if necessary
		configure_admin_group() -- sets up admins group and super admin user if necessary
		get_table_keys($tn) -- returns keys (indexes) of given table
		get_table_fields($tn) -- returns fields spec for given table
		update_membership_{tn}() -- sets up membership table tn and its indexes if necessary
		test($subject, $test) -- perform a test and return results
		invoke_method($object, $methodName, $param_array) -- invoke a private/protected method of a given object
		invoke_static_method($class, $methodName, $param_array) -- invoke a private/protected method of a given class statically
		get_parent_tables($tn) -- returns parents of given table: ['parent table' => [main lookup fields in child], ..]
		backtick_keys_once($data) -- wraps keys of given array with backticks ` if not already wrapped. Useful for use with fieldnames passed to update() and insert()
		calculated_fields() -- returns calculated fields config array: [table => [field => query, ..], ..]
		update_calc_fields($table, $id, $formulas, $mi = false) -- updates record of given $id in given $table according to given $formulas on behalf of user specified in given info array (or current user if false)
		latest_jquery() -- detects and returns the name of the latest jQuery file found in resources/jquery/js
		existing_value($tn, $fn, $id, $cache = true) -- returns (cached) value of field $fn of record having $id in table $tn. Set $cache to false to bypass caching.
		checkAppRequirements() -- if PHP doesn't meet app requirements, outputs error and exits
		getRecord($table, $id) -- return the record having a PK of $id from $table as an associative array, falsy value on error/not found
		guessMySQLDateTime($dt) -- if $dt is not already a mysql date/datetime, use mysql_datetime() to convert then return mysql date/datetime. Returns false if $dt invalid or couldn't be detected.
		pkGivenLookupText($val, $tn, $lookupField, $falseIfNotFound) -- returns corresponding PK value for given $val which is the textual lookup value for given $lookupField in given $tn table. If $val has no corresponding PK value, $val is returned as-is, unless $falseIfNotFound is set to true, in which case false is returned.
		userCanImport() -- returns true if user (or his group) can import CSV files (through the permission set in the group page in the admin area).
		bgStyleToClass($html) -- replaces bg color 'style' attr with a class to prevent style loss on xss cleanup.
		assocArrFilter($arr, $func) -- filters provided array using provided callback function. The callback receives 2 params ($key, $value) and should return a boolean.
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	*/
	########################################################################
	function set_headers() {
		@header('Content-Type: text/html; charset=' . datalist_db_encoding);
		@header('X-Frame-Options: SAMEORIGIN'); // prevent iframing by other sites to prevent clickjacking
	}
	########################################################################
	function get_tables_info($skip_authentication = false) {
		static $all_tables = [], $accessible_tables = [];

		/* return cached results, if found */
		if(($skip_authentication || getLoggedAdmin()) && count($all_tables)) return $all_tables;
		if(!$skip_authentication && count($accessible_tables)) return $accessible_tables;

		/* table groups */
		$tg = array(
			'LAPORAN PROJEK',
			'PEMANTAUAN',
			'PERMOHONAN',
			'DATABASE',
			'KELULUSAN'
		);

		$all_tables = array(
			/* ['table_name' => [table props assoc array] */   
				'jpd_de' => array(
					'Caption' => 'JPD DE',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'pams_DE' => array(
					'Caption' => 'PAMS DE',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/house.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'JL' => array(
					'Caption' => 'JPL DE',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/house.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'jpd_khas' => array(
					'Caption' => 'JPD KHAS',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'pams_khas' => array(
					'Caption' => 'PAMS KHAS ',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/house.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'jpd_noc' => array(
					'Caption' => 'JPD NOC',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'pams_noc' => array(
					'Caption' => 'PAMS NOC',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/house.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'balb' => array(
					'Caption' => 'BEKALAN AIR',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'JALB' => array(
					'Caption' => 'JALB',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'BELB' => array(
					'Caption' => 'BELB',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'pprt' => array(
					'Caption' => 'PPRT',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car.png',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'ljk' => array(
					'Caption' => 'LJK FASA 10',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[1],
					'homepageShowCount' => 1
				),
				'pemohon_jpd' => array(
					'Caption' => 'MOHON JPD',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car_add.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'pams_mohon' => array(
					'Caption' => 'MOHON PAMS',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car_add.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'pemohon_pprt' => array(
					'Caption' => 'MOHON PPRT',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car_add.png',
					'group' => $tg[2],
					'homepageShowCount' => 1
				),
				'negeri' => array(
					'Caption' => 'Negeri',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'daerah' => array(
					'Caption' => 'Daerah',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'Dun' => array(
					'Caption' => 'Dun',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'PARLIMEN' => array(
					'Caption' => 'PARLIMEN',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'kelulusan' => array(
					'Caption' => 'Kelulusan',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'status_pelaksanaan' => array(
					'Caption' => 'Status pelaksanaan',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'status_kelulusan_jpd' => array(
					'Caption' => 'Kelulusan JPD',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'status_kelulusan_pams' => array(
					'Caption' => 'Kelulusan PAMS',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'status_kelulusan_pprt' => array(
					'Caption' => 'Kelulusan PPRT',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[4],
					'homepageShowCount' => 1
				),
				'tahun' => array(
					'Caption' => 'Tahun',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'penyelia_projek' => array(
					'Caption' => 'Penyelia projek',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'agensi_pelaksana' => array(
					'Caption' => 'Agensi pelaksana',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'agensi_bayar' => array(
					'Caption' => 'Agensi bayar',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'waran' => array(
					'Caption' => 'Waran',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'jpd_de_REKOD' => array(
					'Caption' => 'REKOD JPD DE',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'pams_DE_REKOD' => array(
					'Caption' => 'REKOD PAMS DE',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/house.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'jpd_test' => array(
					'Caption' => 'JPD test',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/car.png',
					'group' => $tg[3],
					'homepageShowCount' => 1
				),
				'skop_jpd' => array(
					'Caption' => 'Skop jpd',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'skop_pams' => array(
					'Caption' => 'Skop pams',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'Syarikat' => array(
					'Caption' => 'Syarikat Berjaya',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'Syarikat_baru' => array(
					'Caption' => 'Syarikat Berdaftar',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'ekasih' => array(
					'Caption' => 'Ekasih',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'BLACKLIST' => array(
					'Caption' => 'BLACKLIST',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'LJK_JENIS' => array(
					'Caption' => 'LJK JENIS',
					'Description' => '',
					'tableIcon' => 'table.gif',
					'group' => $tg[3],
					'homepageShowCount' => 0
				),
				'Laporan_N9' => array(
					'Caption' => 'KPLB N.SEMBILAN',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/report_edit.png',
					'group' => $tg[0],
					'homepageShowCount' => 0
				),
				'Laporan_MLK' => array(
					'Caption' => 'KPLB MELAKA',
					'Description' => '',
					'tableIcon' => 'resources/table_icons/report_edit.png',
					'group' => $tg[0],
					'homepageShowCount' => 0
				),
		);

		if($skip_authentication || getLoggedAdmin()) return $all_tables;

		foreach($all_tables as $tn => $ti) {
			$arrPerm = getTablePermissions($tn);
			if($arrPerm['access']) $accessible_tables[$tn] = $ti;
		}

		return $accessible_tables;
	}
	#########################################################
	if(!function_exists('getTableList')) {
		function getTableList($skip_authentication = false) {
			$arrTables = array(
				'jpd_de' => 'JPD DE',
				'pams_DE' => 'PAMS DE',
				'JL' => 'JPL DE',
				'jpd_khas' => 'JPD KHAS',
				'pams_khas' => 'PAMS KHAS ',
				'jpd_noc' => 'JPD NOC',
				'pams_noc' => 'PAMS NOC',
				'balb' => 'BEKALAN AIR',
				'JALB' => 'JALB',
				'BELB' => 'BELB',
				'pprt' => 'PPRT',
				'ljk' => 'LJK FASA 10',
				'pemohon_jpd' => 'MOHON JPD',
				'pams_mohon' => 'MOHON PAMS',
				'pemohon_pprt' => 'MOHON PPRT',
				'negeri' => 'Negeri',
				'daerah' => 'Daerah',
				'Dun' => 'Dun',
				'PARLIMEN' => 'PARLIMEN',
				'kelulusan' => 'Kelulusan',
				'status_pelaksanaan' => 'Status pelaksanaan',
				'status_kelulusan_jpd' => 'Kelulusan JPD',
				'status_kelulusan_pams' => 'Kelulusan PAMS',
				'status_kelulusan_pprt' => 'Kelulusan PPRT',
				'tahun' => 'Tahun',
				'penyelia_projek' => 'Penyelia projek',
				'agensi_pelaksana' => 'Agensi pelaksana',
				'agensi_bayar' => 'Agensi bayar',
				'waran' => 'Waran',
				'jpd_de_REKOD' => 'REKOD JPD DE',
				'pams_DE_REKOD' => 'REKOD PAMS DE',
				'jpd_test' => 'JPD test',
				'skop_jpd' => 'Skop jpd',
				'skop_pams' => 'Skop pams',
				'Syarikat' => 'Syarikat Berjaya',
				'Syarikat_baru' => 'Syarikat Berdaftar',
				'ekasih' => 'Ekasih',
				'BLACKLIST' => 'BLACKLIST',
				'LJK_JENIS' => 'LJK JENIS',
				'Laporan_N9' => 'KPLB N.SEMBILAN',
				'Laporan_MLK' => 'KPLB MELAKA',
			);

			return $arrTables;
		}
	}
	########################################################################
	function getThumbnailSpecs($tableName, $fieldName, $view) {
		if($tableName=='jpd_de' && $fieldName=='gambar1' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='jpd_de' && $fieldName=='gambar1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_de' && $fieldName=='gambar2' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='jpd_de' && $fieldName=='gambar2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_de' && $fieldName=='gambar3' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='jpd_de' && $fieldName=='gambar3' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pams_DE' && $fieldName=='gambar_projek' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='pams_DE' && $fieldName=='gambar_projek' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pams_DE' && $fieldName=='gambar_projek_1' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='pams_DE' && $fieldName=='gambar_projek_1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pams_DE' && $fieldName=='gambar_projek_2' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='pams_DE' && $fieldName=='gambar_projek_2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='JL' && $fieldName=='gambar_projek' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='JL' && $fieldName=='gambar_projek' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='JL' && $fieldName=='gambar_projek_1' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='JL' && $fieldName=='gambar_projek_1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='JL' && $fieldName=='gambar_projek_2' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='JL' && $fieldName=='gambar_projek_2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_khas' && $fieldName=='gambar_projek' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='jpd_khas' && $fieldName=='gambar_projek' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_khas' && $fieldName=='gambar_projek_1' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='jpd_khas' && $fieldName=='gambar_projek_1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_khas' && $fieldName=='gambar_projek_2' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='jpd_khas' && $fieldName=='gambar_projek_2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pams_khas' && $fieldName=='gambar_projek' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='pams_khas' && $fieldName=='gambar_projek' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pams_khas' && $fieldName=='gambar_projek_1' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='pams_khas' && $fieldName=='gambar_projek_1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pams_khas' && $fieldName=='gambar_projek_2' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='pams_khas' && $fieldName=='gambar_projek_2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_noc' && $fieldName=='gambar_projek' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='jpd_noc' && $fieldName=='gambar_projek' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_noc' && $fieldName=='gambar_projek_1' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='jpd_noc' && $fieldName=='gambar_projek_1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_noc' && $fieldName=='gambar_projek_2' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='jpd_noc' && $fieldName=='gambar_projek_2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pams_noc' && $fieldName=='gambar_projek' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pams_noc' && $fieldName=='gambar_projek' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pams_noc' && $fieldName=='gambar_projek_1' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pams_noc' && $fieldName=='gambar_projek_1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pams_noc' && $fieldName=='gambar_projek_2' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pams_noc' && $fieldName=='gambar_projek_2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='balb' && $fieldName=='gambar1' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='balb' && $fieldName=='gambar1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='balb' && $fieldName=='gambar2' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='balb' && $fieldName=='gambar2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='balb' && $fieldName=='gambar3' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='balb' && $fieldName=='gambar3' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='JALB' && $fieldName=='gambar1' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='JALB' && $fieldName=='gambar1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='JALB' && $fieldName=='gambar2' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='JALB' && $fieldName=='gambar2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='JALB' && $fieldName=='gambar3' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='JALB' && $fieldName=='gambar3' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='JALB' && $fieldName=='gambar4' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='JALB' && $fieldName=='gambar4' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='BELB' && $fieldName=='gambar1' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='BELB' && $fieldName=='gambar1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='BELB' && $fieldName=='gambar2' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='BELB' && $fieldName=='gambar2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='BELB' && $fieldName=='gambar3' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='BELB' && $fieldName=='gambar3' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pprt' && $fieldName=='gambar1' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pprt' && $fieldName=='gambar2' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pprt' && $fieldName=='gambar3' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pemohon_jpd' && $fieldName=='gambar_projek' && $view=='tv')
			return array('width'=>500, 'height'=>500, 'identifier'=>'_tv');
		elseif($tableName=='pemohon_jpd' && $fieldName=='gambar_projek' && $view=='dv')
			return array('width'=>1000, 'height'=>1000, 'identifier'=>'_dv');
		elseif($tableName=='pemohon_jpd' && $fieldName=='gambar_projek_1' && $view=='tv')
			return array('width'=>500, 'height'=>500, 'identifier'=>'_tv');
		elseif($tableName=='pemohon_jpd' && $fieldName=='gambar_projek_1' && $view=='dv')
			return array('width'=>500, 'height'=>500, 'identifier'=>'_dv');
		elseif($tableName=='pemohon_jpd' && $fieldName=='gambar_projek2' && $view=='tv')
			return array('width'=>500, 'height'=>500, 'identifier'=>'_tv');
		elseif($tableName=='pemohon_jpd' && $fieldName=='gambar_projek2' && $view=='dv')
			return array('width'=>500, 'height'=>500, 'identifier'=>'_dv');
		elseif($tableName=='pemohon_jpd' && $fieldName=='gambar_projek3' && $view=='tv')
			return array('width'=>500, 'height'=>500, 'identifier'=>'_tv');
		elseif($tableName=='pemohon_jpd' && $fieldName=='gambar_projek3' && $view=='dv')
			return array('width'=>500, 'height'=>500, 'identifier'=>'_dv');
		elseif($tableName=='pams_mohon' && $fieldName=='gambar_projek' && $view=='tv')
			return array('width'=>300, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='pams_mohon' && $fieldName=='gambar_projek' && $view=='dv')
			return array('width'=>500, 'height'=>500, 'identifier'=>'_dv');
		elseif($tableName=='pams_mohon' && $fieldName=='gambar_projek_2' && $view=='tv')
			return array('width'=>300, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='pams_mohon' && $fieldName=='gambar_projek_2' && $view=='dv')
			return array('width'=>500, 'height'=>500, 'identifier'=>'_dv');
		elseif($tableName=='pams_mohon' && $fieldName=='gambar_projek_3' && $view=='tv')
			return array('width'=>300, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='pams_mohon' && $fieldName=='gambar_projek_3' && $view=='dv')
			return array('width'=>500, 'height'=>500, 'identifier'=>'_dv');
		elseif($tableName=='pams_mohon' && $fieldName=='gambar_projek_1' && $view=='tv')
			return array('width'=>300, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='pams_mohon' && $fieldName=='gambar_projek_1' && $view=='dv')
			return array('width'=>500, 'height'=>500, 'identifier'=>'_dv');
		elseif($tableName=='pemohon_pprt' && $fieldName=='gambar_projek' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pemohon_pprt' && $fieldName=='gambar_projek' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pemohon_pprt' && $fieldName=='gambar2' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pemohon_pprt' && $fieldName=='gambar2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pemohon_pprt' && $fieldName=='gambar3' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pemohon_pprt' && $fieldName=='gambar3' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_de_REKOD' && $fieldName=='gambar1' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='jpd_de_REKOD' && $fieldName=='gambar2' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='jpd_de_REKOD' && $fieldName=='gambar3' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pams_DE_REKOD' && $fieldName=='gambar_projek' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pams_DE_REKOD' && $fieldName=='gambar_projek' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pams_DE_REKOD' && $fieldName=='gambar_projek_1' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pams_DE_REKOD' && $fieldName=='gambar_projek_1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='pams_DE_REKOD' && $fieldName=='gambar_projek_2' && $view=='tv')
			return array('width'=>50, 'height'=>50, 'identifier'=>'_tv');
		elseif($tableName=='pams_DE_REKOD' && $fieldName=='gambar_projek_2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_test' && $fieldName=='gambar1' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='jpd_test' && $fieldName=='gambar1' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_test' && $fieldName=='gambar2' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='jpd_test' && $fieldName=='gambar2' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		elseif($tableName=='jpd_test' && $fieldName=='gambar3' && $view=='tv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_tv');
		elseif($tableName=='jpd_test' && $fieldName=='gambar3' && $view=='dv')
			return array('width'=>250, 'height'=>250, 'identifier'=>'_dv');
		return FALSE;
	}
	########################################################################
	function createThumbnail($img, $specs) {
		$w = $specs['width'];
		$h = $specs['height'];
		$id = $specs['identifier'];
		$path = dirname($img);

		// image doesn't exist or inaccessible?
		if(!$size = @getimagesize($img)) return false;

		// calculate thumbnail size to maintain aspect ratio
		$ow = $size[0]; // original image width
		$oh = $size[1]; // original image height
		$twbh = $h / $oh * $ow; // calculated thumbnail width based on given height
		$thbw = $w / $ow * $oh; // calculated thumbnail height based on given width
		if($w && $h) {
			if($twbh > $w) $h = $thbw;
			if($thbw > $h) $w = $twbh;
		} elseif($w) {
			$h = $thbw;
		} elseif($h) {
			$w = $twbh;
		} else {
			return false;
		}

		// dir not writeable?
		if(!is_writable($path)) return false;

		// GD lib not loaded?
		if(!function_exists('gd_info')) return false;
		$gd = gd_info();

		// GD lib older than 2.0?
		preg_match('/\d/', $gd['GD Version'], $gdm);
		if($gdm[0] < 2) return false;

		// get file extension
		preg_match('/\.[a-zA-Z]{3,4}$/U', $img, $matches);
		$ext = strtolower($matches[0]);

		// check if supplied image is supported and specify actions based on file type
		if($ext == '.gif') {
			if(!$gd['GIF Create Support']) return false;
			$thumbFunc = 'imagegif';
		} elseif($ext == '.png') {
			if(!$gd['PNG Support'])  return false;
			$thumbFunc = 'imagepng';
		} elseif($ext == '.jpg' || $ext == '.jpe' || $ext == '.jpeg') {
			if(!$gd['JPG Support'] && !$gd['JPEG Support'])  return false;
			$thumbFunc = 'imagejpeg';
		} else {
			return false;
		}

		// determine thumbnail file name
		$ext = $matches[0];
		$thumb = substr($img, 0, -5) . str_replace($ext, $id . $ext, substr($img, -5));

		// if the original image smaller than thumb, then just copy it to thumb
		if($h > $oh && $w > $ow) {
			return (@copy($img, $thumb) ? true : false);
		}

		// get image data
		if(!$imgData = imagecreatefromstring(implode('', file($img)))) return false;

		// finally, create thumbnail
		$thumbData = imagecreatetruecolor($w, $h);

		//preserve transparency of png and gif images
		if($thumbFunc == 'imagepng') {
			if(($clr = @imagecolorallocate($thumbData, 0, 0, 0)) != -1) {
				@imagecolortransparent($thumbData, $clr);
				@imagealphablending($thumbData, false);
				@imagesavealpha($thumbData, true);
			}
		} elseif($thumbFunc == 'imagegif') {
			@imagealphablending($thumbData, false);
			$transIndex = imagecolortransparent($imgData);
			if($transIndex >= 0) {
				$transClr = imagecolorsforindex($imgData, $transIndex);
				$transIndex = imagecolorallocatealpha($thumbData, $transClr['red'], $transClr['green'], $transClr['blue'], 127);
				imagefill($thumbData, 0, 0, $transIndex);
			}
		}

		// resize original image into thumbnail
		if(!imagecopyresampled($thumbData, $imgData, 0, 0 , 0, 0, $w, $h, $ow, $oh)) return false;
		unset($imgData);

		// gif transparency
		if($thumbFunc == 'imagegif' && $transIndex >= 0) {
			imagecolortransparent($thumbData, $transIndex);
			for($y = 0; $y < $h; ++$y)
				for($x = 0; $x < $w; ++$x)
					if(((imagecolorat($thumbData, $x, $y) >> 24) & 0x7F) >= 100) imagesetpixel($thumbData, $x, $y, $transIndex);
			imagetruecolortopalette($thumbData, true, 255);
			imagesavealpha($thumbData, false);
		}

		if(!$thumbFunc($thumbData, $thumb)) return false;
		unset($thumbData);

		return true;
	}
	########################################################################
	function makeSafe($string, $is_gpc = true) {
		static $cached = []; /* str => escaped_str */

		if(!strlen($string)) return '';

		if(!db_link()) sql("SELECT 1+1", $eo);

		// if this is a previously escaped string, return from cached
		// checking both keys and values
		if(isset($cached[$string])) return $cached[$string];
		$key = array_search($string, $cached);
		if($key !== false) return $string; // already an escaped string

		$cached[$string] = db_escape($string);
		return $cached[$string];
	}
	########################################################################
	function checkPermissionVal($pvn) {
		// fn to make sure the value in the given POST variable is 0, 1, 2 or 3
		// if the value is invalid, it default to 0
		$pvn=intval($_POST[$pvn]);
		if($pvn!=1 && $pvn!=2 && $pvn!=3) {
			return 0;
		} else {
			return $pvn;
		}
	}
	########################################################################
	function dieErrorPage($error) {
		global $Translation;

		$header = (defined('ADMIN_AREA') ? __DIR__ . '/incHeader.php' : __DIR__ . '/../header.php');
		$footer = (defined('ADMIN_AREA') ? __DIR__ . '/incFooter.php' : __DIR__ . '/../footer.php');

		ob_start();

		@include_once($header);
		echo Notification::placeholder();
		echo Notification::show([
			'message' => $error,
			'class' => 'danger',
			'dismiss_seconds' => 7200
		]);
		@include_once($footer);

		echo ob_get_clean();
		exit;
	}
	########################################################################
	function openDBConnection(&$o) {
		static $connected = false, $db_link;

		$dbServer = config('dbServer');
		$dbUsername = config('dbUsername');
		$dbPassword = config('dbPassword');
		$dbDatabase = config('dbDatabase');

		if($connected) return $db_link;

		/****** Check that MySQL module is enabled ******/
		if(!extension_loaded('mysql') && !extension_loaded('mysqli')) {
			$o['error'] = 'PHP is not configured to connect to MySQL on this machine. Please see <a href="https://www.php.net/manual/en/ref.mysql.php">this page</a> for help on how to configure MySQL.';
			if($o['silentErrors']) return false;

			dieErrorPage($o['error']);
		}

		/****** Connect to MySQL ******/
		if(!($db_link = @db_connect($dbServer, $dbUsername, $dbPassword))) {
			$o['error'] = db_error($db_link, true);
			if($o['silentErrors']) return false;

			dieErrorPage($o['error']);
		}

		/****** Select DB ********/
		if(!db_select_db($dbDatabase, $db_link)) {
			$o['error'] = db_error($db_link);
			if($o['silentErrors']) return false;

			dieErrorPage($o['error']);
		}

		$connected = true;
		return $db_link;
	}
	########################################################################
	function sql($statement, &$o) {

		/*
			Supported options that can be passed in $o options array (as array keys):
			'silentErrors': If true, errors will be returned in $o['error'] rather than displaying them on screen and exiting.
			'noSlowQueryLog': don't log slow query if true
			'noErrorQueryLog': don't log error query if true
		*/

		global $Translation;

		$db_link = openDBConnection($o);

		/*
		 if openDBConnection() fails, it would abort execution unless 'silentErrors' is true,
		 in which case, we should return false from sql() without further action since
		 $o['error'] would be already set by openDBConnection()
		*/
		if(!$db_link) return false;

		$t0 = microtime(true);

		if(!$result = @db_query($statement, $db_link)) {
			if(!stristr($statement, "show columns")) {
				// retrieve error codes
				$errorNum = db_errno($db_link);
				$o['error'] = htmlspecialchars(db_error($db_link));

				if(empty($o['noErrorQueryLog']))
					logErrorQuery($statement, $o['error']);

				if(getLoggedAdmin())
					$o['error'] .= "<pre class=\"ltr\">{$Translation['query:']}\n" . htmlspecialchars($statement) . "</pre><p><i class=\"text-right\">{$Translation['admin-only info']}</i></p><p>{$Translation['try rebuild fields']}</p>";

				if($o['silentErrors']) return false;

				dieErrorPage($o['error']);
			}
		}

		/* log slow queries that take more than 1 sec */
		$t1 = microtime(true);
		if($t1 - $t0 > 1.0 && empty($o['noSlowQueryLog']))
			logSlowQuery($statement, $t1 - $t0);

		return $result;
	}
	########################################################################
	function logSlowQuery($statement, $duration) {
		if(!createQueryLogTable()) return;

		$o = [
			'silentErrors' => true,
			'noSlowQueryLog' => true,
			'noErrorQueryLog' => true
		];
		$statement = makeSafe($statement);
		$duration = floatval($duration);
		$memberID = makeSafe(getLoggedMemberID());
		$uri = makeSafe($_SERVER['REQUEST_URI']);

		sql("INSERT INTO `appgini_query_log` SET
			`statement`='$statement',
			`duration`=$duration,
			`memberID`='$memberID',
			`uri`='$uri'
		", $o);
	}
	########################################################################
	function logErrorQuery($statement, $error) {
		if(!createQueryLogTable()) return;

		$o = [
			'silentErrors' => true,
			'noSlowQueryLog' => true,
			'noErrorQueryLog' => true
		];
		$statement = makeSafe($statement);
		$error = makeSafe($error);
		$memberID = makeSafe(getLoggedMemberID());
		$uri = makeSafe($_SERVER['REQUEST_URI']);

		sql("INSERT INTO `appgini_query_log` SET
			`statement`='$statement',
			`error`='$error',
			`memberID`='$memberID',
			`uri`='$uri'
		", $o);
	}

	########################################################################
	function createQueryLogTable() {
		static $created = false;
		if($created) return true;

		$o = [
			'silentErrors' => true,
			'noSlowQueryLog' => true,
			'noErrorQueryLog' => true
		];

		sql("CREATE TABLE IF NOT EXISTS `appgini_query_log` (
			`datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			`statement` LONGTEXT,
			`duration` DECIMAL(10,2) UNSIGNED DEFAULT 0.0,
			`error` TEXT,
			`memberID` VARCHAR(200),
			`uri` VARCHAR(200)
		) CHARSET " . mysql_charset, $o);

		// check if table created
		//$o2 = $o;
		//$o2['error'] = '';
		//sql("SELECT COUNT(1) FROM 'appgini_query_log'", $o2);

		//$created = empty($o2['error']);

		$created = true;
		return $created;
	}

	########################################################################
	function sqlValue($statement, &$error = NULL) {
		// executes a statement that retreives a single data value and returns the value retrieved
		$eo = ['silentErrors' => true];
		if(!$res = sql($statement, $eo)) { $error = $eo['error']; return false; }
		if(!$row = db_fetch_row($res)) return false;
		return $row[0];
	}
	########################################################################
	function getLoggedAdmin() {
		// checks session variables to see whether the admin is logged or not
		// if not, it returns false
		// if logged, it returns the user id

		$adminConfig = config('adminConfig');
		if(empty($_SESSION['memberID'])) return false;
		if($_SESSION['memberID'] == $adminConfig['adminUsername']) {
			$_SESSION['adminUsername'] = $_SESSION['memberID'];
			return $_SESSION['adminUsername'];
		}

		unset($_SESSION['adminUsername']);
		return false;
	}
	########################################################################
	function checkUser($username, $password) {
		// checks given username and password for validity
		// if valid, registers the username in a session and returns true
		// else, returns false and destroys session

		$adminConfig = config('adminConfig');
		if($username != $adminConfig['adminUsername'] || !password_match($password, $adminConfig['adminPassword'])) {
			return false;
		}

		$_SESSION['adminUsername'] = $username;
		$_SESSION['memberGroupID'] = sqlValue("select groupID from membership_users where memberID='" . makeSafe($username) ."'");
		$_SESSION['memberID'] = $username;
		return true;
	}
	########################################################################
	function initSession() {
		$sh = @ini_get('session.save_handler');

		$options = [
			'name' => 'pemantauan',
			'save_handler' => stripos($sh, 'memcache') === false ? 'files' : $sh,
			'serialize_handler' => 'php',
			'cookie_lifetime' => '0',
			'cookie_path' => '/' . trim(config('appURI'), '/'),
			'cookie_httponly' => '1',
			'use_strict_mode' => '1',
			'use_cookies' => '1',
			'use_only_cookies' => '1',
			'cache_limiter' => $_SERVER['REQUEST_METHOD'] == 'POST' ? 'private' : 'nocache',
			'cache_expire' => '2',
		];

		// hook: session_options(), if defined, $options is passed to it by reference
		// to override default session behavior.
		// should be defined in hooks/bootstrap.php
		if(function_exists('session_options')) session_options($options);

		// check sessions config
		$noPathCheck = true; // set to false for debugging session issues
		$arrPath = explode(';', ini_get('session.save_path'));
		$save_path = $arrPath[count($arrPath) - 1];
		if(!$noPathCheck && !is_dir($save_path)) die('Invalid session.save_path in php.ini');

		if(session_id()) { session_write_close(); }

		foreach($options as $key => $value)
			@ini_set("session.{$key}", $value);

		session_start();
	}
	########################################################################
	function jwt_key() {
		$config_file = dirname(__FILE__) . '/../config.php';
		if(!is_file($config_file)) return false;
		return md5_file($config_file);
	}
	########################################################################
	function jwt_token($user = false) {
		if($user === false) $user = $_SESSION['memberID'];
		$key = jwt_key();
		if($key === false) return false;
		return JWT::encode(array('user' => $user), $key);
	}
	########################################################################
	function jwt_header() {
		/* adapted from https://stackoverflow.com/a/40582472/1945185 */
		$auth_header = null;
		if(isset($_SERVER['Authorization'])) {
			$auth_header = trim($_SERVER['Authorization']);
		} elseif(isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
			$auth_header = trim($_SERVER['HTTP_AUTHORIZATION']);
		} elseif(isset($_SERVER['HTTP_X_AUTHORIZATION'])) { //hack if all else fails
			$auth_header = trim($_SERVER['HTTP_X_AUTHORIZATION']);
		} elseif(function_exists('apache_request_headers')) {
			$rh = apache_request_headers();
			// Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
			$rh = array_combine(array_map('ucwords', array_keys($rh)), array_values($rh));
			if(isset($rh['Authorization'])) {
				$auth_header = trim($rh['Authorization']);
			} elseif(isset($rh['X-Authorization'])) {
				$auth_header = trim($rh['X-Authorization']);
			}
		}

		if(!empty($auth_header)) {
			if(preg_match('/Bearer\s(\S+)/', $auth_header, $matches)) return $matches[1];
		}

		return null;
	}
	########################################################################
	function jwt_check_login() {
		// do we have an Authorization Bearer header?
		$token = jwt_header();
		if(!$token) return false;

		$key = jwt_key();
		if($key === false) return false;

		$error = '';
		$payload = JWT::decode($token, $key, $error);
		if(empty($payload['user'])) return false;

		$_SESSION['memberID'] = $payload['user'];
		$safe_user = makeSafe($payload['user']);
		$_SESSION['memberGroupID'] = sqlValue(
			"SELECT `groupID` FROM `membership_users` WHERE `memberID`='{$safe_user}'" 
		);

		// for API calls that just trigger an action and then close connection, 
		// we need to continue running
		@ignore_user_abort(true);
		@set_time_limit(120);

		return true;
	}
	########################################################################
	function curl_insert_handler($table, $data) {
		if(!function_exists('curl_init')) return false;
		$ch = curl_init();

		$payload = $data;
		$payload['insert_x'] = 1;

		$url = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . config('host') . '/' . application_uri("{$table}_view.php");
		$token = jwt_token();
		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => http_build_query($payload),
			CURLOPT_HTTPHEADER => array(
				"User-Agent: {$_SERVER['HTTP_USER_AGENT']}",
				"Accept: {$_SERVER['HTTP_ACCEPT']}",
				"Authorization: Bearer " . $token,
				"X-Authorization: Bearer " . $token,
			),
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_RETURNTRANSFER => true,

			/* this is a localhost request so need to verify SSL */
			CURLOPT_SSL_VERIFYPEER => false,

			// the following option allows sending request and then 
			// closing the connection without waiting for response
			// see https://stackoverflow.com/a/10895361/1945185
			CURLOPT_TIMEOUT => 8,
		);

		if(defined('CURLOPT_TCP_FASTOPEN')) $options[CURLOPT_TCP_FASTOPEN] = true;
		if(defined('CURLOPT_SAFE_UPLOAD'))
			$options[CURLOPT_SAFE_UPLOAD] = function_exists('curl_file_create');

		// this is safe to use as we're sending a local request
		if(defined('CURLOPT_UNRESTRICTED_AUTH')) $options[CURLOPT_UNRESTRICTED_AUTH] = 1;

		curl_setopt_array($ch, $options);

		return $ch;
	}
########################################################################
	function curl_batch($handlers) {
		if(!function_exists('curl_init')) return false;
		if(!is_array($handlers)) return false;
		if(!count($handlers)) return false;

		$mh = curl_multi_init();
		if(function_exists('curl_multi_setopt')) {
			curl_multi_setopt($mh, CURLMOPT_PIPELINING, 1);
			curl_multi_setopt($mh, CURLMOPT_MAXCONNECTS, min(20, count($handlers)));
		}

		foreach($handlers as $ch) {
			@curl_multi_add_handle($mh, $ch);
		}

		$active = false;
		do {
			@curl_multi_exec($mh, $active);
			usleep(2000);
		} while($active > 0);
	}
	########################################################################
	function logOutUser() {
		RememberMe::logout();
	}
	########################################################################
	function getPKFieldName($tn) {
		// get pk field name of given table
		static $pk = [];
		if(isset($pk[$tn])) return $pk[$tn];

		$stn = makeSafe($tn, false);
		$eo = ['silentErrors' => true];
		if(!$res = sql("SHOW FIELDS FROM `$stn`", $eo)) return $pk[$tn] = false;

		while($row = db_fetch_assoc($res))
			if($row['Key'] == 'PRI') return $pk[$tn] = $row['Field'];

		return $pk[$tn] = false;
	}
	########################################################################
	function getCSVData($tn, $pkValue, $stripTags=true) {
		// get pk field name for given table
		if(!$pkField=getPKFieldName($tn)) {
			return "";
		}

		// get a concat string to produce a csv list of field values for given table record
		if(!$res=sql("show fields from `$tn`", $eo)) {
			return "";
		}
		while($row=db_fetch_assoc($res)) {
			$csvFieldList.="`{$row['Field']}`,";
		}
		$csvFieldList=substr($csvFieldList, 0, -1);

		$csvData=sqlValue("select CONCAT_WS(', ', $csvFieldList) from `$tn` where `$pkField`='" . makeSafe($pkValue, false) . "'");

		return ($stripTags ? strip_tags($csvData) : $csvData);
	}
	########################################################################
	function errorMsg($msg) {
		echo "<div class=\"alert alert-danger\">{$msg}</div>";
	}
	########################################################################
	function redirect($url, $absolute = false) {
		$fullURL = ($absolute ? $url : application_url($url));
		if(!headers_sent()) header("Location: {$fullURL}");

		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;url={$fullURL}\">";
		echo "<br><br><a href=\"{$fullURL}\">Click here</a> if you aren't automatically redirected.";
		exit;
	}
	########################################################################
	function htmlRadioGroup($name, $arrValue, $arrCaption, $selectedValue, $selClass = 'text-primary', $class = '', $separator = '<br>') {
		if(!is_array($arrValue)) return '';

		ob_start();
		?>
		<div class="radio %%CLASS%%"><label>
			<input type="radio" name="%%NAME%%" id="%%ID%%" value="%%VALUE%%" %%CHECKED%%> %%LABEL%%
		</label></div>
		<?php
		$template = ob_get_contents();
		ob_end_clean();

		$out = '';
		for($i = 0; $i < count($arrValue); $i++) {
			$replacements = array(
				'%%CLASS%%' => html_attr($arrValue[$i] == $selectedValue ? $selClass :$class),
				'%%NAME%%' => html_attr($name),
				'%%ID%%' => html_attr($name . $i),
				'%%VALUE%%' => html_attr($arrValue[$i]),
				'%%LABEL%%' => $arrCaption[$i],
				'%%CHECKED%%' => ($arrValue[$i]==$selectedValue ? " checked" : "")
			);
			$out .= str_replace(array_keys($replacements), array_values($replacements), $template);
		}

		return $out;
	}
	########################################################################
	function htmlSelect($name, $arrValue, $arrCaption, $selectedValue, $class = '', $selectedClass = '') {
		if($selectedClass == '') {
			$selectedClass=$class;
		}
		if(is_array($arrValue)) {
			$out="<select name=\"$name\" id=\"$name\">";
			for($i = 0; $i < count($arrValue); $i++) {
				$out .= '<option value="' . $arrValue[$i] . '"' . ($arrValue[$i] == $selectedValue ? " selected class=\"$class\"" : " class=\"$selectedClass\"") . '>' . $arrCaption[$i] . '</option>';
			}
			$out .= '</select>';
		}
		return $out;
	}
	########################################################################
	function htmlSQLSelect($name, $sql, $selectedValue, $class = '', $selectedClass = '') {
		$arrVal[] = '';
		$arrCap[] = '';
		if($res = sql($sql, $eo)) {
			while($row = db_fetch_row($res)) {
				$arrVal[] = $row[0];
				$arrCap[] = $row[1];
			}
			return htmlSelect($name, $arrVal, $arrCap, $selectedValue, $class, $selectedClass);
		} else {
			return "";
		}
	}
	########################################################################
	function bootstrapSelect($name, $arrValue, $arrCaption, $selectedValue, $class = '', $selectedClass = '') {
		if($selectedClass == '') $selectedClass = $class;

		$out = "<select class=\"form-control\" name=\"{$name}\" id=\"{$name}\">";
		if(is_array($arrValue)) {
			for($i = 0; $i < count($arrValue); $i++) {
				$selected = "class=\"{$class}\"";
				if($arrValue[$i] == $selectedValue) $selected = "selected class=\"{$selectedClass}\"";
				$out .= "<option value=\"{$arrValue[$i]}\" {$selected}>{$arrCaption[$i]}</option>";
			}
		}
		$out .= '</select>';

		return $out;
	}
	########################################################################
	function bootstrapSQLSelect($name, $sql, $selectedValue, $class = '', $selectedClass = '') {
		$arrVal[] = '';
		$arrCap[] = '';
		if($res = sql($sql, $eo)) {
			while($row = db_fetch_row($res)) {
				$arrVal[] = $row[0];
				$arrCap[] = $row[1];
			}
			return bootstrapSelect($name, $arrVal, $arrCap, $selectedValue, $class, $selectedClass);
		}

		return '';
	}
	########################################################################
	function isEmail($email) {
		return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
	}
	########################################################################
	function notifyMemberApproval($memberID) {
		$adminConfig = config('adminConfig');
		$memberID = strtolower($memberID);

		$email = sqlValue("select email from membership_users where lcase(memberID)='{$memberID}'");

		return sendmail(array(
			'to' => $email,
			'name' => $memberID,
			'subject' => $adminConfig['approvalSubject'],
			'message' => nl2br($adminConfig['approvalMessage'])
		));
	}
	########################################################################
	function setupMembership() {
		// run once per session, but force proceeding if not all mem tables created
		$res = sql("show tables like 'membership_%'", $eo);
		$num_mem_tables = db_num_rows($res);
		$mem_update_fn = membership_table_functions();
		if(isset($_SESSION['setupMembership']) && $num_mem_tables >= count($mem_update_fn)) return;

		/* abort if current page is one of the following exceptions */
		if(in_array(basename($_SERVER['PHP_SELF']), array(
			'pageEditMember.php', 
			'membership_passwordReset.php', 
			'membership_profile.php', 
			'membership_signup.php', 
			'pageChangeMemberStatus.php', 
			'pageDeleteGroup.php', 
			'pageDeleteMember.php', 
			'pageEditGroup.php', 
			'pageEditMemberPermissions.php', 
			'pageRebuildFields.php', 
			'pageSettings.php',
			'ajax_check_login.php'
		))) return;

		// call each update_membership function
		foreach($mem_update_fn as $mem_fn) {
			$mem_fn();
		}

		configure_anonymous_group();
		configure_admin_group();

		$_SESSION['setupMembership'] = time();
	}
	########################################################################
	function membership_table_functions() {
		// returns a list of update_membership_* functions
		$arr = get_defined_functions();
		return array_filter($arr['user'], function($f) {
			return (strpos($f, 'update_membership_') !== false);
		});
	}
	########################################################################
	function configure_anonymous_group() {
		$eo = ['silentErrors' => true];

		$adminConfig = config('adminConfig');
		$today = @date('Y-m-d');

		$anon_group_safe = makeSafe($adminConfig['anonymousGroup']);
		$anon_user = strtolower($adminConfig['anonymousMember']);
		$anon_user_safe = makeSafe($anon_user);

		/* create anonymous group if not there and get its ID */
		$same_fields = "`allowSignup`=0, `needsApproval`=0";
		sql("INSERT INTO `membership_groups` SET 
				`name`='{$anon_group_safe}', {$same_fields}, 
				`description`='Anonymous group created automatically on {$today}'
			ON DUPLICATE KEY UPDATE {$same_fields}", 
		$eo);

		$anon_group_id = sqlValue("SELECT `groupID` FROM `membership_groups` WHERE `name`='{$anon_group_safe}'");
		if(!$anon_group_id) return;

		/* create guest user if not there or if guest name in config differs from that in db */
		$anon_user_db = sqlValue("SELECT LCASE(`memberID`) FROM `membership_users` 
			WHERE `groupID`='{$anon_group_id}'");
		if(!$anon_user_db || $anon_user_db != $anon_user) {
			sql("DELETE FROM `membership_users` WHERE `groupID`='{$anon_group_id}'", $eo);
			sql("INSERT INTO `membership_users` SET 
			`memberID`='{$anon_user_safe}', 
				`signUpDate`='{$today}', 
				`groupID`='{$anon_group_id}', 
				`isBanned`=0, 
				`isApproved`=1, 
				`comments`='Anonymous member created automatically on {$today}'", 
			$eo);
		}
	}
	########################################################################
	function configure_admin_group() {
		$eo = ['silentErrors' => true];

		$adminConfig = config('adminConfig');
		$today = @date('Y-m-d');
		$admin_group_safe = 'Admins';
		$admin_user_safe = makeSafe(strtolower($adminConfig['adminUsername']));
		$admin_hash_safe = makeSafe($adminConfig['adminPassword']);
		$admin_email_safe = makeSafe($adminConfig['senderEmail']);

		/* create admin group if not there and get its ID */
		$same_fields = "`allowSignup`=0, `needsApproval`=1";
		sql("INSERT INTO `membership_groups` SET 
				`name`='{$admin_group_safe}', {$same_fields}, 
				`description`='Admin group created automatically on {$today}'
			ON DUPLICATE KEY UPDATE {$same_fields}", 
		$eo);
		$admin_group_id = sqlValue("SELECT `groupID` FROM `membership_groups` WHERE `name`='{$admin_group_safe}'");
		if(!$admin_group_id) return;

		/* create super-admin user if not there (if exists, query would abort with suppressed error) */
		sql("INSERT INTO `membership_users` SET 
			`memberID`='{$admin_user_safe}', 
			`passMD5`='{$admin_hash_safe}', 
			`email`='{$admin_email_safe}', 
			`signUpDate`='{$today}', 
			`groupID`='{$admin_group_id}', 
			`isBanned`=0, 
			`isApproved`=1, 
			`comments`='Admin member created automatically on {$today}'", 
		$eo);

		/* insert/update admin group permissions to allow full access to all tables */
		$tables = getTableList(true);
		foreach($tables as $tn => $ignore) {
			$same_fields = '`allowInsert`=1,`allowView`=3,`allowEdit`=3,`allowDelete`=3';
			sql("INSERT INTO `membership_grouppermissions` SET
					`groupID`='{$admin_group_id}',
					`tableName`='{$tn}',
					{$same_fields}
				ON DUPLICATE KEY UPDATE {$same_fields}",
			$eo);
		}
	}
	########################################################################
	function get_table_keys($tn) {
		$keys = [];
		$res = sql("SHOW KEYS FROM `{$tn}`", $eo);
		while($row = db_fetch_assoc($res))
			$keys[$row['Key_name']][$row['Seq_in_index']] = $row;

		return $keys;
	}
	########################################################################
	function get_table_fields($tn = null) {
		static $schema = null;
		if($schema === null) {
			/* application schema as created in AppGini */
			$schema = [
				'jpd_de' => [
					'ID' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Waran' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "DATE NULL"],
					'TarikhSiapProjek' => ['appgini' => "DATE NULL"],
					'TarikhSiapsebenar' => ['appgini' => "DATE NULL"],
					'PanjangJalanM' => ['appgini' => "BIGINT NULL"],
					'LebarM' => ['appgini' => "INT NULL"],
					'skop' => ['appgini' => "INT UNSIGNED NULL"],
					'gambar1' => ['appgini' => "VARCHAR(40) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Peta' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'peruntukan_dipinda' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "DECIMAL(10,2) NULL"],
					'KKSVO' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Perbelanjaan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'penjimatan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'inden' => ['appgini' => "VARCHAR(40) NULL"],
					'Baucer' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar2' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar3' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'pams_DE' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Waran' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhTawaranSSTLantikan' => ['appgini' => "DATE NULL"],
					'TarikhSiapProjek' => ['appgini' => "DATE NULL"],
					'TarikhSiapSebenar' => ['appgini' => "VARCHAR(255) NULL"],
					'PanjangJalanM' => ['appgini' => "VARCHAR(255) NULL"],
					'LebarM' => ['appgini' => "VARCHAR(255) NULL"],
					'Longitud' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'skop' => ['appgini' => "INT UNSIGNED NULL"],
					'gambar_projek' => ['appgini' => "VARCHAR(40) NULL"],
					'Peta' => ['appgini' => "VARCHAR(255) NULL"],
					'peruntukan_dipinda' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "DECIMAL(10,2) NULL"],
					'KKSVO' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Perbelanjaan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Penjimatan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'inden' => ['appgini' => "VARCHAR(40) NULL"],
					'Baucer' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_1' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_2' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'JL' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "DATE NULL"],
					'TarikhSiapProjek' => ['appgini' => "DATE NULL"],
					'TarikhSiapSepenuhnya' => ['appgini' => "VARCHAR(255) NULL"],
					'PanjangJalanM' => ['appgini' => "BIGINT NULL"],
					'LebarM' => ['appgini' => "BIGINT NULL"],
					'skop' => ['appgini' => "INT UNSIGNED NULL"],
					'gambar_projek' => ['appgini' => "VARCHAR(40) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Peta' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "INT NULL"],
					'peruntukan_dipinda' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "INT NULL"],
					'KKSVO' => ['appgini' => "INT NULL"],
					'Perbelanjaan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Penjimatan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'inden' => ['appgini' => "VARCHAR(40) NULL"],
					'Baucer' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_1' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_2' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'jpd_khas' => [
					'ID' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Waran' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "DATE NULL"],
					'TarikhSiapProjek' => ['appgini' => "DATE NULL"],
					'TarikhSiapsebenar' => ['appgini' => "VARCHAR(255) NULL"],
					'PanjangJalanM' => ['appgini' => "BIGINT NULL"],
					'LebarM' => ['appgini' => "VARCHAR(255) NULL"],
					'skop' => ['appgini' => "INT UNSIGNED NULL"],
					'gambar_projek' => ['appgini' => "VARCHAR(40) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Peta' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'peruntukan_dipinda' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "DECIMAL(10,2) NULL"],
					'KKSVO' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Perbelanjaan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'penjimatan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'inden' => ['appgini' => "VARCHAR(40) NULL"],
					'Baucer' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_1' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_2' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'pams_khas' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Waran' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "DATE NULL"],
					'TarikhSiapProjek' => ['appgini' => "DATE NULL"],
					'TarikhSiapSepenuhnya' => ['appgini' => "VARCHAR(255) NULL"],
					'skop' => ['appgini' => "INT UNSIGNED NULL"],
					'gambar_projek' => ['appgini' => "VARCHAR(40) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Peta' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'peruntukan_dipinda' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Kosprojek' => ['appgini' => "DECIMAL(10,2) NULL"],
					'KKSVO' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Perbelanjaan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Penjimatan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'inden' => ['appgini' => "VARCHAR(40) NULL"],
					'Baucer' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_1' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_2' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'jpd_noc' => [
					'ID' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "DATE NULL"],
					'TarikhSiapProjek' => ['appgini' => "DATE NULL"],
					'TarikhSiapSepenuhnya' => ['appgini' => "VARCHAR(255) NULL"],
					'PanjangJalanM' => ['appgini' => "VARCHAR(255) NULL"],
					'gambar_projek' => ['appgini' => "VARCHAR(40) NULL"],
					'LebarM' => ['appgini' => "VARCHAR(255) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Longitud' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'peruntukan_dipinda' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "DECIMAL(10,2) NULL"],
					'KKSVO' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Perbelanjaan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'penjimatan' => ['appgini' => "INT NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'inden' => ['appgini' => "VARCHAR(40) NULL"],
					'Baucer' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_1' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_2' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'pams_noc' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "DATE NULL"],
					'TarikhSiapProjek' => ['appgini' => "DATE NULL"],
					'TarikhSiapSepenuhnya' => ['appgini' => "VARCHAR(255) NULL"],
					'PanjangJalanM' => ['appgini' => "VARCHAR(255) NULL"],
					'gambar_projek' => ['appgini' => "VARCHAR(40) NULL"],
					'LebarM' => ['appgini' => "VARCHAR(255) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Longitud' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "INT NULL"],
					'peruntukan_dipinda' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "INT NULL"],
					'KKSVO' => ['appgini' => "INT NULL"],
					'Perbelanjaan' => ['appgini' => "INT NULL"],
					'Penjimatan' => ['appgini' => "INT NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'inden' => ['appgini' => "VARCHAR(40) NULL"],
					'Baucer' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_1' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_2' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'balb' => [
					'ID' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Waran' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSiapProjek' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSiapSepenuhnya' => ['appgini' => "VARCHAR(255) NULL"],
					'Panjang' => ['appgini' => "VARCHAR(255) NULL"],
					'gambar1' => ['appgini' => "VARCHAR(40) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Peta' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'peruntukan_dipinda' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "DECIMAL(10,2) NULL"],
					'KKSVO' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Perbelanjaan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'penjimatan' => ['appgini' => "INT NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'inden' => ['appgini' => "VARCHAR(40) NULL"],
					'Baucer' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar2' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar3' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'JALB' => [
					'id' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "DATE NULL"],
					'TarikhSiapSepenuhnya' => ['appgini' => "DATE NULL"],
					'speck' => ['appgini' => "TEXT NULL"],
					'Panjang' => ['appgini' => "VARCHAR(255) NULL"],
					'gambar1' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar2' => ['appgini' => "VARCHAR(40) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Peta' => ['appgini' => "VARCHAR(255) NULL"],
					'kos_siling' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'progress_jadual' => ['appgini' => "INT NULL"],
					'progress_sebenar' => ['appgini' => "INT NULL"],
					'jadual' => ['appgini' => "INT NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar3' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar4' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'BELB' => [
					'ID' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Waran' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSiapProjek' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSiapSepenuhnya' => ['appgini' => "VARCHAR(255) NULL"],
					'Panjang' => ['appgini' => "VARCHAR(255) NULL"],
					'gambar1' => ['appgini' => "VARCHAR(40) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Peta' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'peruntukan_dipinda' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "DECIMAL(10,2) NULL"],
					'KKSVO' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Perbelanjaan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'penjimatan' => ['appgini' => "INT NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'inden' => ['appgini' => "VARCHAR(40) NULL"],
					'Baucer' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar2' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar3' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'pprt' => [
					'ID' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'Nama' => ['appgini' => "VARCHAR(40) NULL"],
					'IC' => ['appgini' => "VARCHAR(40) NULL"],
					'alamat' => ['appgini' => "TEXT NULL"],
					'ekasih' => ['appgini' => "INT UNSIGNED NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhTawaranSSTLantikan' => ['appgini' => "DATE NULL"],
					'TarikhSiapProjek' => ['appgini' => "DATE NULL"],
					'jenis_binaan' => ['appgini' => "VARCHAR(40) NULL"],
					'skop' => ['appgini' => "VARCHAR(255) NULL"],
					'Peta' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Kosprojek' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Perbelanjaan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'penjimatan' => ['appgini' => "INT NULL"],
					'Peratus_siap' => ['appgini' => "VARCHAR(40) NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'gambar1' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar2' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar3' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'ljk' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'dun' => ['appgini' => "INT UNSIGNED NULL"],
					'parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'kampung' => ['appgini' => "VARCHAR(100) NULL"],
					'no_tiang' => ['appgini' => "VARCHAR(40) NULL"],
					'jenis_lampu' => ['appgini' => "INT UNSIGNED NULL"],
					'status_pemasangan' => ['appgini' => "VARCHAR(40) NULL"],
					'audit' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "VARCHAR(100) NULL"],
					'gambar' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'pemohon_jpd' => [
					'ID' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun' => ['appgini' => "INT UNSIGNED NULL"],
					'Nama_Projek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'status_tanah' => ['appgini' => "VARCHAR(40) NULL"],
					'PanjangJalanM' => ['appgini' => "VARCHAR(255) NULL"],
					'LebarM' => ['appgini' => "VARCHAR(255) NULL"],
					'skop' => ['appgini' => "INT UNSIGNED NULL"],
					'gambar_projek' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_1' => ['appgini' => "VARCHAR(40) NULL"],
					'sumber_mohon' => ['appgini' => "VARCHAR(40) NULL"],
					'Peta' => ['appgini' => "VARCHAR(255) NULL"],
					'anggaran_kos' => ['appgini' => "DECIMAL(10,2) NULL"],
					'justifikasi' => ['appgini' => "TEXT NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'nama_mpkk_jpkkp' => ['appgini' => "VARCHAR(40) NULL"],
					'no_tel_mpkk_jpkkp' => ['appgini' => "TEXT NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'status_permohonan' => ['appgini' => "VARCHAR(40) NULL DEFAULT 'baru'"],
					'status_kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'sumber_peruntukan' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek2' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek3' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'pams_mohon' => [
					'ID' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun' => ['appgini' => "INT UNSIGNED NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Nama_Projek' => ['appgini' => "TEXT NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'sumber_mohon' => ['appgini' => "VARCHAR(40) NULL"],
					'status_tanah' => ['appgini' => "VARCHAR(40) NULL"],
					'skop' => ['appgini' => "INT UNSIGNED NULL"],
					'gambar_projek' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_2' => ['appgini' => "VARCHAR(40) NULL"],
					'Peta' => ['appgini' => "VARCHAR(255) NULL"],
					'anggaran_kos' => ['appgini' => "DECIMAL(10,2) NULL"],
					'justifikasi' => ['appgini' => "TEXT NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'nama_mpkk_jpkkp' => ['appgini' => "VARCHAR(40) NULL"],
					'no_tel_mpkk_jpkkp' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'status_permohonan' => ['appgini' => "VARCHAR(40) NULL DEFAULT 'baru'"],
					'status_kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'sumber_peruntukan' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_3' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_1' => ['appgini' => "VARCHAR(40) NULL"],
					'updated' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'pemohon_pprt' => [
					'ID' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun' => ['appgini' => "INT UNSIGNED NULL"],
					'gambar_projek' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar2' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar3' => ['appgini' => "VARCHAR(40) NULL"],
					'Nama_pemohon' => ['appgini' => "TEXT NULL"],
					'sumber_mohon' => ['appgini' => "VARCHAR(40) NULL"],
					'status_tanah' => ['appgini' => "VARCHAR(40) NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'skop' => ['appgini' => "VARCHAR(255) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Longitud' => ['appgini' => "VARCHAR(255) NULL"],
					'anggaran_kos' => ['appgini' => "DECIMAL(10,2) NULL"],
					'justifikasi' => ['appgini' => "TEXT NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'nama_mpkk_jpkkp' => ['appgini' => "VARCHAR(40) NULL"],
					'no_tel_mpkk_jpkkp' => ['appgini' => "TEXT NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'status_permohonan' => ['appgini' => "VARCHAR(40) NULL DEFAULT 'baru'"],
					'status_kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
				],
				'negeri' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'nama_negeri' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'daerah' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'nama_daerah' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'Dun' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'nama_dun' => ['appgini' => "VARCHAR(40) NULL"],
					'parlimen' => ['appgini' => "INT UNSIGNED NULL"],
				],
				'PARLIMEN' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'nama_parlimen' => ['appgini' => "VARCHAR(40) NULL"],
					'daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
				],
				'kelulusan' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'kelulusan_jawatankuasa' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'status_pelaksanaan' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'status_laksana' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'status_kelulusan_jpd' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'pemohon' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'kelulusan' => ['appgini' => "VARCHAR(40) NULL"],
					'tarikh_kelulusan' => ['appgini' => "DATETIME NULL"],
					'pelulus' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'status_kelulusan_pams' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'pemohon' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'kelulusan' => ['appgini' => "VARCHAR(40) NULL"],
					'tarikh_kelulusan' => ['appgini' => "DATETIME NULL"],
					'pelulus' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'status_kelulusan_pprt' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'pemohon' => ['appgini' => "INT(10) UNSIGNED NULL"],
					'kelulusan' => ['appgini' => "VARCHAR(40) NULL"],
					'tarikh_kelulusan' => ['appgini' => "DATETIME NULL"],
					'pelulus' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'tahun' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'penyelia_projek' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'nama_penyelia' => ['appgini' => "VARCHAR(40) NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
				],
				'agensi_pelaksana' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'pelaksana' => ['appgini' => "VARCHAR(40) NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
				],
				'agensi_bayar' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'agensi' => ['appgini' => "VARCHAR(40) NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
				],
				'waran' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'sumber_waran' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'jpd_de_REKOD' => [
					'ID' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSiapProjek' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSiapSepenuhnya' => ['appgini' => "VARCHAR(255) NULL"],
					'PanjangJalanM' => ['appgini' => "VARCHAR(255) NULL"],
					'LebarM' => ['appgini' => "VARCHAR(255) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Longitud' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'peruntukan_dipinda' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "DECIMAL(10,2) NULL"],
					'KKSVO' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Perbelanjaan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'penjimatan' => ['appgini' => "INT NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'gambar1' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar2' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar3' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'pams_DE_REKOD' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSiapProjek' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSiapSebenar' => ['appgini' => "VARCHAR(255) NULL"],
					'PanjangJalanM' => ['appgini' => "VARCHAR(255) NULL"],
					'LebarM' => ['appgini' => "VARCHAR(255) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Longitud' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "INT NULL"],
					'peruntukan_dipinda' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "INT NULL"],
					'KKSVO' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Perbelanjaan' => ['appgini' => "INT NULL"],
					'Penjimatan' => ['appgini' => "INT NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'gambar_projek' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_1' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar_projek_2' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'jpd_test' => [
					'ID' => ['appgini' => "INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'tahun_laksana' => ['appgini' => "INT UNSIGNED NULL"],
					'Kelulusan' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaProjek' => ['appgini' => "TEXT NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'Daerah' => ['appgini' => "INT UNSIGNED NULL"],
					'Parlimen' => ['appgini' => "INT UNSIGNED NULL"],
					'DUN' => ['appgini' => "INT UNSIGNED NULL"],
					'AgensiPelaksana' => ['appgini' => "INT UNSIGNED NULL"],
					'agensi_pembayar' => ['appgini' => "INT UNSIGNED NULL"],
					'penyelia_projek' => ['appgini' => "INT UNSIGNED NULL"],
					'NamaKontraktor' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSST' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSiapProjek' => ['appgini' => "VARCHAR(255) NULL"],
					'TarikhSiapSepenuhnya' => ['appgini' => "VARCHAR(255) NULL"],
					'PanjangJalanM' => ['appgini' => "VARCHAR(255) NULL"],
					'gambar1' => ['appgini' => "VARCHAR(40) NULL"],
					'LebarM' => ['appgini' => "VARCHAR(255) NULL"],
					'Latitud' => ['appgini' => "VARCHAR(255) NULL"],
					'Longitud' => ['appgini' => "VARCHAR(255) NULL"],
					'PeruntukanDiluluskan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'peruntukan_dipinda' => ['appgini' => "INT NULL"],
					'Kosprojek' => ['appgini' => "DECIMAL(10,2) NULL"],
					'KKSVO' => ['appgini' => "DECIMAL(10,2) NULL"],
					'Perbelanjaan' => ['appgini' => "DECIMAL(10,2) NULL"],
					'penjimatan' => ['appgini' => "INT NULL"],
					'Status' => ['appgini' => "INT UNSIGNED NULL"],
					'PenerimaManfaat' => ['appgini' => "VARCHAR(40) NULL"],
					'sumber_permohonan' => ['appgini' => "VARCHAR(40) NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
					'sumber_peruntukan' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar2' => ['appgini' => "VARCHAR(40) NULL"],
					'gambar3' => ['appgini' => "VARCHAR(40) NULL"],
					'VIDEO' => ['appgini' => "VARCHAR(100) NULL"],
					'GIS' => ['appgini' => "VARCHAR(255) NULL"],
				],
				'skop_jpd' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'skop_jpd' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'skop_pams' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'skop_pams' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'Syarikat' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'nama_syarikat' => ['appgini' => "VARCHAR(100) NULL"],
					'Alamat' => ['appgini' => "VARCHAR(200) NULL"],
					'no_ssm' => ['appgini' => "VARCHAR(40) NULL"],
					'no_cidb' => ['appgini' => "VARCHAR(40) NULL"],
					'lantik_kplb' => ['appgini' => "VARCHAR(40) NULL"],
					'Tahun_lantik' => ['appgini' => "INT UNSIGNED NULL"],
					'tarikh_dokumen' => ['appgini' => "DATE NULL"],
					'tajuk_kerja' => ['appgini' => "VARCHAR(200) NULL"],
					'kaedah_perolehan' => ['appgini' => "VARCHAR(40) NULL"],
					'kos_projek' => ['appgini' => "VARCHAR(40) NULL"],
					'blacklist' => ['appgini' => "INT UNSIGNED NULL"],
					'catatan' => ['appgini' => "TEXT NULL"],
				],
				'Syarikat_baru' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'Tahun_daftar' => ['appgini' => "INT UNSIGNED NULL"],
					'negeri' => ['appgini' => "INT UNSIGNED NULL"],
					'daerah' => ['appgini' => "VARCHAR(40) NULL"],
					'nama_pemilik' => ['appgini' => "VARCHAR(40) NULL"],
					'nama_syarikat' => ['appgini' => "VARCHAR(100) NULL"],
					'Alamat' => ['appgini' => "VARCHAR(200) NULL"],
					'no_ssm' => ['appgini' => "VARCHAR(40) NULL"],
					'no_cidb' => ['appgini' => "VARCHAR(40) NULL"],
					'no_evendor' => ['appgini' => "VARCHAR(40) NULL"],
					'email' => ['appgini' => "VARCHAR(80) NULL"],
				],
				'ekasih' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'status_ekasih' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'BLACKLIST' => [
					'ID' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'disenaraihitamkan' => ['appgini' => "VARCHAR(40) NULL"],
					'sebab' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'LJK_JENIS' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'jenis_lampu' => ['appgini' => "VARCHAR(40) NULL"],
				],
				'Laporan_N9' => [
					'id' => ['appgini' => "TINYINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'program' => ['appgini' => "VARCHAR(100) NULL"],
					'peruntukan' => ['appgini' => "INT NULL"],
					'bil_projek' => ['appgini' => "INT NULL"],
					'bm' => ['appgini' => "INT NULL"],
					'Perolehan' => ['appgini' => "INT NULL"],
					'dp' => ['appgini' => "INT NULL"],
					'sp' => ['appgini' => "INT NULL"],
					'link' => ['appgini' => "VARCHAR(100) NULL"],
				],
				'Laporan_MLK' => [
					'id' => ['appgini' => "INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT"],
					'program' => ['appgini' => "VARCHAR(100) NULL"],
					'peruntukan' => ['appgini' => "INT NULL"],
					'bil_projek' => ['appgini' => "INT NULL"],
					'bm' => ['appgini' => "INT NULL"],
					'Perolehan' => ['appgini' => "INT NULL"],
					'dp' => ['appgini' => "INT NULL"],
					'sp' => ['appgini' => "INT NULL"],
					'link' => ['appgini' => "VARCHAR(100) NULL"],
				],
			];
		}

		if($tn === null) return $schema;

		return isset($schema[$tn]) ? $schema[$tn] : [];
	}
	########################################################################
	function update_membership_groups() {
		$tn = 'membership_groups';
		$eo = ['silentErrors' => true];

		sql(
			"CREATE TABLE IF NOT EXISTS `{$tn}` (
				`groupID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`name` varchar(100) NOT NULL,
				`description` TEXT,
				`allowSignup` TINYINT,
				`needsApproval` TINYINT,
				`allowCSVImport` TINYINT NOT NULL DEFAULT '0',
				PRIMARY KEY (`groupID`)
			) CHARSET " . mysql_charset,
		$eo);

		sql("ALTER TABLE `{$tn}` CHANGE COLUMN `name` `name` VARCHAR(100) NOT NULL", $eo);
		sql("ALTER TABLE `{$tn}` ADD UNIQUE INDEX `name` (`name`)", $eo);
		sql("ALTER TABLE `{$tn}` ADD COLUMN `allowCSVImport` TINYINT NOT NULL DEFAULT '0'", $eo);
	}
	########################################################################
	function update_membership_users() {
		$tn = 'membership_users';
		$eo = ['silentErrors' => true];

		sql(
			"CREATE TABLE IF NOT EXISTS `{$tn}` (
				`memberID` VARCHAR(100) NOT NULL, 
				`passMD5` VARCHAR(255), 
				`email` VARCHAR(100), 
				`signupDate` DATE, 
				`groupID` INT UNSIGNED, 
				`isBanned` TINYINT, 
				`isApproved` TINYINT, 
				`custom1` TEXT, 
				`custom2` TEXT, 
				`custom3` TEXT, 
				`custom4` TEXT, 
				`comments` TEXT, 
				`pass_reset_key` VARCHAR(100),
				`pass_reset_expiry` INT UNSIGNED,
				`allowCSVImport` TINYINT NOT NULL DEFAULT '0', 
				PRIMARY KEY (`memberID`),
				INDEX `groupID` (`groupID`)
			) CHARSET " . mysql_charset,
		$eo);

		sql("ALTER TABLE `{$tn}` ADD COLUMN `pass_reset_key` VARCHAR(100)", $eo);
		sql("ALTER TABLE `{$tn}` ADD COLUMN `pass_reset_expiry` INT UNSIGNED", $eo);
		sql("ALTER TABLE `{$tn}` CHANGE COLUMN `passMD5` `passMD5` VARCHAR(255)", $eo);
		sql("ALTER TABLE `{$tn}` CHANGE COLUMN `memberID` `memberID` VARCHAR(100) NOT NULL", $eo);
		sql("ALTER TABLE `{$tn}` ADD INDEX `groupID` (`groupID`)", $eo);
		sql("ALTER TABLE `{$tn}` ADD COLUMN `flags` TEXT", $eo);
		sql("ALTER TABLE `{$tn}` ADD COLUMN `allowCSVImport` TINYINT NOT NULL DEFAULT '0'", $eo);
	}
	########################################################################
	function update_membership_userrecords() {
		$tn = 'membership_userrecords';
		$eo = ['silentErrors' => true];

		sql(
			"CREATE TABLE IF NOT EXISTS `{$tn}` (
				`recID` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, 
				`tableName` VARCHAR(100), 
				`pkValue` VARCHAR(255), 
				`memberID` VARCHAR(100), 
				`dateAdded` BIGINT UNSIGNED, 
				`dateUpdated` BIGINT UNSIGNED, 
				`groupID` INT UNSIGNED, 
				PRIMARY KEY (`recID`),
				UNIQUE INDEX `tableName_pkValue` (`tableName`, `pkValue`(150)),
				INDEX `pkValue` (`pkValue`),
				INDEX `tableName` (`tableName`),
				INDEX `memberID` (`memberID`),
				INDEX `groupID` (`groupID`)
			) CHARSET " . mysql_charset,
		$eo);

		sql("ALTER TABLE `{$tn}` ADD UNIQUE INDEX `tableName_pkValue` (`tableName`, `pkValue`(150))", $eo);
		sql("ALTER TABLE `{$tn}` ADD INDEX `pkValue` (`pkValue`)", $eo);
		sql("ALTER TABLE `{$tn}` ADD INDEX `tableName` (`tableName`)", $eo);
		sql("ALTER TABLE `{$tn}` ADD INDEX `memberID` (`memberID`)", $eo);
		sql("ALTER TABLE `{$tn}` ADD INDEX `groupID` (`groupID`)", $eo);
		sql("ALTER TABLE `{$tn}` CHANGE COLUMN `memberID` `memberID` VARCHAR(100)", $eo);
	}
	########################################################################
	function update_membership_grouppermissions() {
		$tn = 'membership_grouppermissions';
		$eo = ['silentErrors' => true];

		sql(
			"CREATE TABLE IF NOT EXISTS `{$tn}` (
				`permissionID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`groupID` INT UNSIGNED,
				`tableName` VARCHAR(100),
				`allowInsert` TINYINT NOT NULL DEFAULT '0',
				`allowView` TINYINT NOT NULL DEFAULT '0',
				`allowEdit` TINYINT NOT NULL DEFAULT '0',
				`allowDelete` TINYINT NOT NULL DEFAULT '0',
				PRIMARY KEY (`permissionID`)
			) CHARSET " . mysql_charset,
		$eo);

		sql("ALTER TABLE `{$tn}` ADD UNIQUE INDEX `groupID_tableName` (`groupID`, `tableName`)", $eo);
	}
	########################################################################
	function update_membership_userpermissions() {
		$tn = 'membership_userpermissions';
		$eo = ['silentErrors' => true];

		sql(
			"CREATE TABLE IF NOT EXISTS `{$tn}` (
				`permissionID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`memberID` VARCHAR(100) NOT NULL,
				`tableName` VARCHAR(100),
				`allowInsert` TINYINT NOT NULL DEFAULT '0',
				`allowView` TINYINT NOT NULL DEFAULT '0',
				`allowEdit` TINYINT NOT NULL DEFAULT '0',
				`allowDelete` TINYINT NOT NULL DEFAULT '0',
				PRIMARY KEY (`permissionID`)
			) CHARSET " . mysql_charset,
		$eo);

		sql("ALTER TABLE `{$tn}` CHANGE COLUMN `memberID` `memberID` VARCHAR(100) NOT NULL", $eo);
		sql("ALTER TABLE `{$tn}` ADD UNIQUE INDEX `memberID_tableName` (`memberID`, `tableName`)", $eo);
	}
	########################################################################
	function update_membership_usersessions() {
		$tn = 'membership_usersessions';
		$eo = ['silentErrors' => true];

		sql(
			"CREATE TABLE IF NOT EXISTS `membership_usersessions` (
				`memberID` VARCHAR(100) NOT NULL,
				`token` VARCHAR(100) NOT NULL,
				`agent` VARCHAR(100) NOT NULL,
				`expiry_ts` INT(10) UNSIGNED NOT NULL,
				UNIQUE INDEX `memberID_token_agent` (`memberID`, `token`, `agent`),
				INDEX `memberID` (`memberID`),
				INDEX `expiry_ts` (`expiry_ts`)
			) CHARSET " . mysql_charset,
		$eo);
	}
	########################################################################
	function thisOr($this_val, $or = '&nbsp;') {
		return ($this_val != '' ? $this_val : $or);
	}
	########################################################################
	function getUploadedFile($FieldName, $MaxSize=0, $FileTypes='csv|txt', $NoRename=false, $dir='') {
		$currDir=dirname(__FILE__);
		if(is_array($_FILES)) {
			$f = $_FILES[$FieldName];
		} else {
			return 'Your php settings don\'t allow file uploads.';
		}

		if(!$MaxSize) {
			$MaxSize=toBytes(ini_get('upload_max_filesize'));
		}

		if(!is_dir("$currDir/csv")) {
			@mkdir("$currDir/csv");
		}

		$dir=(is_dir($dir) && is_writable($dir) ? $dir : "$currDir/csv/");

		if($f['error']!=4 && $f['name']!='') {
			if($f['size']>$MaxSize || $f['error']) {
				return 'File size exceeds maximum allowed of '.intval($MaxSize / 1024).'KB';
			}
			if(!preg_match('/\.('.$FileTypes.')$/i', $f['name'], $ft)) {
				return 'File type not allowed. Only these file types are allowed: '.str_replace('|', ', ', $FileTypes);
			}

			if($NoRename) {
				$n  = str_replace(' ', '_', $f['name']);
			} else {
				$n  = microtime();
				$n  = str_replace(' ', '_', $n);
				$n  = str_replace('0.', '', $n);
				$n .= $ft[0];
			}

			if(!@move_uploaded_file($f['tmp_name'], $dir . $n)) {
				return 'Couldn\'t save the uploaded file. Try chmoding the upload folder "'.$dir.'" to 777.';
			} else {
				@chmod($dir.$n, 0666);
				return $dir.$n;
			}
		}
		return 'An error occured while uploading the file. Please try again.';
	}
	########################################################################
	function toBytes($val) {
		$val = trim($val);
		$last = strtolower($val[strlen($val)-1]);
		switch($last) {
			 // The 'G' modifier is available since PHP 5.1.0
			 case 'g':
					$val *= 1024;
			 case 'm':
					$val *= 1024;
			 case 'k':
					$val *= 1024;
		}

		return $val;
	}
	########################################################################
	function convertLegacyOptions($CSVList) {
		$CSVList=str_replace(';;;', ';||', $CSVList);
		$CSVList=str_replace(';;', '||', $CSVList);
		return trim($CSVList, '|');
	}
	########################################################################
	function getValueGivenCaption($query, $caption) {
		if(!preg_match('/select\s+(.*?)\s*,\s*(.*?)\s+from\s+(.*?)\s+order by.*/i', $query, $m)) {
			if(!preg_match('/select\s+(.*?)\s*,\s*(.*?)\s+from\s+(.*)/i', $query, $m)) {
				return '';
			}
		}

		// get where clause if present
		if(preg_match('/\s+from\s+(.*?)\s+where\s+(.*?)\s+order by.*/i', $query, $mw)) {
			$where = "where ({$mw[2]}) AND";
			$m[3] = $mw[1];
		} else {
			$where = 'where';
		}

		$caption = makeSafe($caption);
		return sqlValue("SELECT {$m[1]} FROM {$m[3]} {$where} {$m[2]}='{$caption}'");
	}
	########################################################################
	function time24($t = false) {
		if($t === false) $t = date('Y-m-d H:i:s'); // time now if $t not passed
		elseif(!$t) return ''; // empty string if $t empty
		return date('H:i:s', strtotime($t));
	}
	########################################################################
	function time12($t = false) {
		if($t === false) $t = date('Y-m-d H:i:s'); // time now if $t not passed
		elseif(!$t) return ''; // empty string if $t empty
		return date('h:i:s A', strtotime($t));
	}
	########################################################################
	function normalize_path($path) {
		// Adapted from https://developer.wordpress.org/reference/functions/wp_normalize_path/

		// Standardise all paths to use /
		$path = str_replace('\\', '/', $path);

		// Replace multiple slashes down to a singular, allowing for network shares having two slashes.
		$path = preg_replace('|(?<=.)/+|', '/', $path);

		// Windows paths should uppercase the drive letter
		if(':' === substr($path, 1, 1)) {
			$path = ucfirst($path);
		}

		return $path;
	}
	########################################################################
	function application_url($page = '', $s = false) {
		if($s === false) $s = $_SERVER;
		$ssl = (!empty($s['HTTPS']) && strtolower($s['HTTPS']) != 'off');
		$http = ($ssl ? 'https:' : 'http:');
		$port = $s['SERVER_PORT'];
		$port = ($port == '80' || $port == '443' || !$port) ? '' : ':' . $port;
		// HTTP_HOST already includes server port if not standard, but SERVER_NAME doesn't
		$host = (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : $s['SERVER_NAME'] . $port);

		$uri = config('appURI');
		if(!$uri) $uri = '/';

		// uri must begin and end with /, but not be '//'
		if($uri != '/' && $uri[0] != '/') $uri = "/{$uri}";
		if($uri != '/' && $uri[strlen($uri) - 1] != '/') $uri = "{$uri}/";

		return "{$http}//{$host}{$uri}{$page}";
	}
	########################################################################
	function application_uri($page = '') {
		$url = application_url($page);
		return trim(parse_url($url, PHP_URL_PATH), '/');
	}
	########################################################################
	function is_ajax() {
		return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	}
	########################################################################
	function array_trim($arr) {
		if(!is_array($arr)) return trim($arr);
		return array_map('array_trim', $arr);
	}
	########################################################################
	function is_allowed_username($username, $exception = false) {
		$username = trim(strtolower($username));
		if(!preg_match('/^[a-z0-9][a-z0-9 _.@]{3,100}$/', $username) || preg_match('/(@@|  |\.\.|___)/', $username)) return false;

		if($username == $exception) return $username;

		if(sqlValue("select count(1) from membership_users where lcase(memberID)='{$username}'")) return false;
		return $username;
	}
	########################################################################
	/*
		if called without parameters, looks for a non-expired token in the user's session (or creates one if
		none found) and returns html code to insert into the form to be protected.

		if set to true, validates token sent in $_REQUEST against that stored in the session
		and returns true if valid or false if invalid, absent or expired.

		usage:
			1. in a new form that needs csrf proofing: echo csrf_token();
			   >> in case of ajax requests and similar, retrieve token directly
			      by calling csrf_token(false, true);
			2. when validating a submitted form: if(!csrf_token(true)) { reject_submission_somehow(); }
	*/
	function csrf_token($validate = false, $token_only = false) {
		$token_age = 60 * 60;
		/* retrieve token from session */
		$csrf_token = (isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : false);
		$csrf_token_expiry = (isset($_SESSION['csrf_token_expiry']) ? $_SESSION['csrf_token_expiry'] : false);

		if(!$validate) {
			/* create a new token if necessary */
			if($csrf_token_expiry < time() || !$csrf_token) {
				$csrf_token = md5(uniqid(rand(), true));
				$csrf_token_expiry = time() + $token_age;
				$_SESSION['csrf_token'] = $csrf_token;
				$_SESSION['csrf_token_expiry'] = $csrf_token_expiry;
			}

			if($token_only) return $csrf_token;
			return '<input type="hidden" id="csrf_token" name="csrf_token" value="' . $csrf_token . '">';
		}

		/* validate submitted token */
		$user_token = (isset($_REQUEST['csrf_token']) ? $_REQUEST['csrf_token'] : false);
		if($csrf_token_expiry < time() || !$user_token || $user_token != $csrf_token) {
			return false;
		}

		return true;
	}
	########################################################################
	function get_plugins() {
		$plugins = [];
		$plugins_path = dirname(__FILE__) . '/../plugins/';

		if(!is_dir($plugins_path)) return $plugins;

		$pd = dir($plugins_path);
		while(false !== ($plugin = $pd->read())) {
			if(!is_dir($plugins_path . $plugin) || in_array($plugin, array('projects', 'plugins-resources', '.', '..'))) continue;

			$info_file = "{$plugins_path}{$plugin}/plugin-info.json";
			if(!is_file($info_file)) continue;

			$plugins[] = json_decode(file_get_contents($info_file), true);
			$plugins[count($plugins) - 1]['admin_path'] = "../plugins/{$plugin}";
		}
		$pd->close();

		return $plugins;
	}
	########################################################################
	function maintenance_mode($new_status = '') {
		$maintenance_file = dirname(__FILE__) . '/.maintenance';

		if($new_status === true) {
			/* turn on maintenance mode */
			@touch($maintenance_file);
		} elseif($new_status === false) {
			/* turn off maintenance mode */
			@unlink($maintenance_file);
		}

		/* return current maintenance mode status */
		return is_file($maintenance_file);
	}
	########################################################################
	function handle_maintenance($echo = false) {
		if(!maintenance_mode()) return;

		global $Translation;
		$adminConfig = config('adminConfig');

		$admin = getLoggedAdmin();
		if($admin) {
			return ($echo ? '<div class="alert alert-danger" style="margin: 5em auto -5em;"><b>' . $Translation['maintenance mode admin notification'] . '</b></div>' : '');
		}

		if(!$echo) exit;

		exit('<div class="alert alert-danger" style="margin-top: 5em; font-size: 2em;"><i class="glyphicon glyphicon-exclamation-sign"></i> ' . $adminConfig['maintenance_mode_message'] . '</div>');
	}
	#########################################################
	function html_attr($str) {
		if(version_compare(PHP_VERSION, '5.2.3') >= 0) return htmlspecialchars($str, ENT_QUOTES, datalist_db_encoding, false);
		return htmlspecialchars($str, ENT_QUOTES, datalist_db_encoding);
	}
	#########################################################
	function html_attr_tags_ok($str) {
		// use this instead of html_attr() if you don't want html tags to be escaped
		$new_str = html_attr($str);
		return str_replace(array('&lt;', '&gt;'), array('<', '>'), $new_str);
	}
	#########################################################
	class Notification{
		/*
			Usage:
			* in the main document, initiate notifications support using this PHP code:
				echo Notification::placeholder();

			* whenever you want to show a notifcation, use this PHP code:
				echo Notification::show(array(
					'message' => 'Notification text to display',
					'class' => 'danger', // or other bootstrap state cues, 'default' if not provided
					'dismiss_seconds' => 5, // optional auto-dismiss after x seconds
					'dismiss_days' => 7, // optional dismiss for x days if closed by user -- must provide an id
					'id' => 'xyz' // optional string to identify the notification -- must use for 'dismiss_days' to work
				));
		*/
		protected static $placeholder_id; /* to force a single notifcation placeholder */

		protected function __construct() {} /* to prevent initialization */

		public static function placeholder() {
			if(self::$placeholder_id) return ''; // output placeholder code only once

			self::$placeholder_id = 'notifcation-placeholder-' . rand(10000000, 99999999);

			ob_start();
			?>

			<div class="notifcation-placeholder" id="<?php echo self::$placeholder_id; ?>"></div>
			<script>
				$j(function() {
					if(window.show_notification != undefined) return;

					window.show_notification = function(options) {
						var dismiss_class = '';
						var dismiss_icon = '';
						var cookie_name = 'hide_notification_' + options.id;
						var notif_id = 'notifcation-' + Math.ceil(Math.random() * 1000000);

						/* apply provided notficiation id if unique in page */
						if(options.id != undefined) {
							if(!$j('#' + options.id).length) notif_id = options.id;
						}

						/* notifcation should be hidden? */
						if(localStorage.getItem(cookie_name) != undefined) return;

						/* notification should be dismissable? */
						if(options.dismiss_seconds > 0 || options.dismiss_days > 0) {
							dismiss_class = ' alert-dismissible';
							dismiss_icon = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
						}

						/* remove old dismissed notficiations */
						$j('.alert-dismissible.invisible').remove();

						/* append notification to notifications container */
						$j(
							'<div class="alert alert-' + options['class'] + dismiss_class + '" id="' + notif_id + '">' + 
								dismiss_icon +
								options.message + 
							'</div>'
						).appendTo('#<?php echo self::$placeholder_id; ?>');

						var this_notif = $j('#' + notif_id);

						/* dismiss after x seconds if requested */
						if(options.dismiss_seconds > 0) {
							setTimeout(function() { this_notif.addClass('invisible'); }, options.dismiss_seconds * 1000);
						}

						/* dismiss for x days if requested and user dismisses it */
						if(options.dismiss_days > 0) {
							var ex_days = options.dismiss_days;
							this_notif.on('closed.bs.alert', function() {
								/* set a cookie not to show this alert for ex_days */
								localStorage.setItem(cookie_name, '1');
							});
						}
					}
				})
			</script>

			<?php
			$html = ob_get_contents();
			ob_end_clean();

			return $html;            
		}

		protected static function default_options(&$options) {
			if(!isset($options['message'])) $options['message'] = 'Notification::show() called without a message!';

			if(!isset($options['class'])) $options['class'] = 'default';

			if(!isset($options['dismiss_seconds']) || isset($options['dismiss_days'])) $options['dismiss_seconds'] = 0;

			if(!isset($options['dismiss_days'])) $options['dismiss_days'] = 0;
			if(!isset($options['id'])) {
				$options['id'] = 0;
				$options['dismiss_days'] = 0;
			}
		}

		/**
		 *  @brief Notification::show($options) displays a notification
		 *  
		 *  @param $options assoc array
		 *  
		 *  @return html code for displaying the notifcation
		 */
		public static function show($options = []) {
			self::default_options($options);

			ob_start();
			?>
			<script>
				$j(function() {
					show_notification(<?php echo json_encode($options); ?>);
				})
			</script>
			<?php
			$html = ob_get_contents();
			ob_end_clean();

			return $html;
		}
	}
	#########################################################
	function addMailRecipients(&$pm, $recipients, $type = 'to') {
		if(empty($recipients)) return;

		switch(strtolower($type)) {
			case 'cc':
				$func = [$pm, 'addCC'];
				break;
			case 'bcc':
				$func = [$pm, 'addBCC'];
				break;
			case 'to':
				$func = [$pm, 'addAddress'];
				break;
		}

		// if recipients is a str, arrayify it!
		if(is_string($recipients)) $recipients = [[$recipients]];
		if(!is_array($recipients)) return;

		// if recipients is an array, loop thru and add emails/names
		foreach ($recipients as $rcpt) {
			// if rcpt is string, add as email
			if(is_string($rcpt) && isEmail($rcpt))
				call_user_func_array($func, [$rcpt]);

			// else if rcpt is array [email, name], or just [email]
			elseif(is_array($rcpt) && isEmail($rcpt[0]))
				call_user_func_array($func, [$rcpt[0], empty($rcpt[1]) ? '' : $rcpt[1]]);
		}
	}
	#########################################################
	function sendmail($mail) {
		if(empty($mail['to'])) return 'No recipient defined';

		// convert legacy 'to' and 'name' to new format [[to, name]]
		if(is_string($mail['to']))
			$mail['to'] = [
				[
					$mail['to'], 
					empty($mail['name']) ? '' : $mail['name']
				]
			];

		if(!isEmail($mail['to'][0][0])) return 'Invalid recipient email';

		$cfg = config('adminConfig');
		$smtp = ($cfg['mail_function'] == 'smtp');

		if(!class_exists('PHPMailer', false)) {
			$curr_dir = dirname(__FILE__);
			include_once("{$curr_dir}/../resources/PHPMailer/class.phpmailer.php");
			if($smtp) include_once("{$curr_dir}/../resources/PHPMailer/class.smtp.php");
		}

		$pm = new PHPMailer;
		$pm->CharSet = datalist_db_encoding;

		if($smtp) {
			$pm->isSMTP();
			$pm->SMTPDebug = isset($mail['debug']) ? min(4, max(0, intval($mail['debug']))) : 0;
			$pm->Debugoutput = 'html';
			$pm->Host = $cfg['smtp_server'];
			$pm->Port = $cfg['smtp_port'];
			$pm->SMTPAuth = true;
			$pm->SMTPSecure = $cfg['smtp_encryption'];
			$pm->Username = $cfg['smtp_user'];
			$pm->Password = $cfg['smtp_pass'];
		}

		$pm->setFrom($cfg['senderEmail'], $cfg['senderName']);
		$pm->Subject = isset($mail['subject']) ? $mail['subject'] : '';

		// handle recipients
		addMailRecipients($pm, $mail['to']);
		if(!empty($mail['cc'])) addMailRecipients($pm, $mail['cc'], 'cc');
		if(!empty($mail['bcc'])) addMailRecipients($pm, $mail['bcc'], 'bcc');

		/* if message already contains html tags, don't apply nl2br */
		$mail['message'] = isset($mail['message']) ? $mail['message'] : '';
		if($mail['message'] == strip_tags($mail['message']))
			$mail['message'] = nl2br($mail['message']);

		$pm->msgHTML($mail['message'], realpath("{$curr_dir}/.."));

		/*
		 * pass 'tag' as-is if provided in $mail .. 
		 * this is useful for passing any desired values to sendmail_handler
		 */
		if(!empty($mail['tag'])) $pm->tag = $mail['tag'];

		/* if sendmail_handler(&$pm) is defined (in hooks/__global.php) */
		if(function_exists('sendmail_handler')) sendmail_handler($pm);

		if(!$pm->send()) return $pm->ErrorInfo;

		return true;
	}
	#########################################################
	function safe_html($str, $noBr = false) {
		/* if $str has no HTML tags, apply nl2br */
		if($str == strip_tags($str)) return $noBr ? $str : nl2br($str);

		$hc = new CI_Input(datalist_db_encoding);
		return $hc->xss_clean(bgStyleToClass($str));
	}
	#########################################################
	function getLoggedGroupID() {
		if($_SESSION['memberGroupID'] != '') {
			return $_SESSION['memberGroupID'];
		} else {
			if(!setAnonymousAccess()) return false;
			return getLoggedGroupID();
		}
	}
	#########################################################
	function getLoggedMemberID() {
		if($_SESSION['memberID']!='') {
			return strtolower($_SESSION['memberID']);
		} else {
			if(!setAnonymousAccess()) return false;
			return getLoggedMemberID();
		}
	}
	#########################################################
	function setAnonymousAccess() {
		$adminConfig = config('adminConfig');
		$anon_group_safe = addslashes($adminConfig['anonymousGroup']);
		$anon_user_safe = strtolower(addslashes($adminConfig['anonymousMember']));

		$eo = ['silentErrors' => true];

		$res = sql("select groupID from membership_groups where name='{$anon_group_safe}'", $eo);
		if(!$res) { return false; }
		$row = db_fetch_array($res); $anonGroupID = $row[0];

		$_SESSION['memberGroupID'] = ($anonGroupID ? $anonGroupID : 0);

		$res = sql("select lcase(memberID) from membership_users where lcase(memberID)='{$anon_user_safe}' and groupID='{$anonGroupID}'", $eo);
		if(!$res) { return false; }
		$row = db_fetch_array($res); $anonMemberID = $row[0];

		$_SESSION['memberID'] = ($anonMemberID ? $anonMemberID : 0);

		return true;
	}
	#########################################################
	function getMemberInfo($memberID = '') {
		static $member_info = [];

		if(!$memberID) {
			$memberID = getLoggedMemberID();
		}

		// return cached results, if present
		if(isset($member_info[$memberID])) return $member_info[$memberID];

		$adminConfig = config('adminConfig');
		$mi = [];

		if($memberID) {
			$res = sql("select * from membership_users where memberID='" . makeSafe($memberID) . "'", $eo);
			if($row = db_fetch_assoc($res)) {
				$mi = array(
					'username' => $memberID,
					'groupID' => $row['groupID'],
					'group' => sqlValue("select name from membership_groups where groupID='{$row['groupID']}'"),
					'admin' => ($adminConfig['adminUsername'] == $memberID ? true : false),
					'email' => $row['email'],
					'custom' => array(
						$row['custom1'], 
						$row['custom2'], 
						$row['custom3'], 
						$row['custom4']
					),
					'banned' => ($row['isBanned'] ? true : false),
					'approved' => ($row['isApproved'] ? true : false),
					'signupDate' => @date('n/j/Y', @strtotime($row['signupDate'])),
					'comments' => $row['comments'],
					'IP' => $_SERVER['REMOTE_ADDR']
				);

				// cache results
				$member_info[$memberID] = $mi;
			}
		}

		return $mi;
	}
	#########################################################
	function get_group_id($user = '') {
		$mi = getMemberInfo($user);
		return $mi['groupID'];
	}
	#########################################################
	/**
	 *  @brief Prepares data for a SET or WHERE clause, to be used in an INSERT/UPDATE query
	 *  
	 *  @param [in] $set_array Assoc array of field names => values
	 *  @param [in] $glue optional glue. Set to ' AND ' or ' OR ' if preparing a WHERE clause
	 *  @return SET string
	 */
	function prepare_sql_set($set_array, $glue = ', ') {
		$fnvs = [];
		foreach($set_array as $fn => $fv) {
			if($fv === null) { $fnvs[] = "{$fn}=NULL"; continue; }

			$sfv = makeSafe($fv);
			$fnvs[] = "{$fn}='{$sfv}'";
		}
		return implode($glue, $fnvs);
	}
	#########################################################
	/**
	 *  @brief Inserts a record to the database
	 *  
	 *  @param [in] $tn table name where the record would be inserted
	 *  @param [in] $set_array Assoc array of field names => values to be inserted
	 *  @param [out] $error optional string containing error message if insert fails
	 *  @return boolean indicating success/failure
	 */
	function insert($tn, $set_array, &$error = '') {
		$set = prepare_sql_set($set_array);
		if(!$set) return false;

		$eo = ['silentErrors' => true];
		$res = sql("INSERT INTO `{$tn}` SET {$set}", $eo);
		if($res) return true;

		$error = $eo['error'];
		return false;
	}
	#########################################################
	/**
	 *  @brief Updates a record in the database
	 *  
	 *  @param [in] $tn table name where the record would be updated
	 *  @param [in] $set_array Assoc array of field names => values to be updated
	 *  @param [in] $where_array Assoc array of field names => values used to build the WHERE clause
	 *  @param [out] $error optional string containing error message if insert fails
	 *  @return boolean indicating success/failure
	 */
	function update($tn, $set_array, $where_array, &$error = '') {
		$set = prepare_sql_set($set_array);
		if(!$set) return false;

		$where = prepare_sql_set($where_array, ' AND ');
		if(!$where) $where = '1=1';

		$eo = ['silentErrors' => true];
		$res = sql("UPDATE `{$tn}` SET {$set} WHERE {$where}", $eo);
		if($res) return true;

		$error = $eo['error'];
		return false;
	}
	#########################################################
	/**
	 *  @brief Set/update the owner of given record
	 *  
	 *  @param [in] $tn name of table
	 *  @param [in] $pk primary key value
	 *  @param [in] $user username to set as owner. If not provided (or false), update dateUpdated only
	 *  @return boolean indicating success/failure
	 */
	function set_record_owner($tn, $pk, $user = false) {
		$fields = [
			'memberID' => strtolower($user),
			'dateUpdated' => time(),
			'groupID' => get_group_id($user)
		];

		// don't update user if false
		if($user === false) unset($fields['memberID'], $fields['groupID']);

		$where_array = ['tableName' => $tn, 'pkValue' => $pk];
		$where = prepare_sql_set($where_array, ' AND ');
		if(!$where) return false;

		/* do we have an existing ownership record? */
		$res = sql("SELECT * FROM `membership_userrecords` WHERE {$where}", $eo);
		if($row = db_fetch_assoc($res)) {
			if($row['memberID'] == $user) return true; // owner already set to $user

			/* update owner and/or dateUpdated */
			$res = update('membership_userrecords', backtick_keys_once($fields), $where_array);
			return ($res ? true : false);
		}

		/* add new ownership record */
		$fields = array_merge($fields, $where_array, ['dateAdded' => time()]);
		$res = insert('membership_userrecords', backtick_keys_once($fields));
		return ($res ? true : false);
	}
	#########################################################
	/**
	 *  @brief get date/time format string for use in different cases.
	 *  
	 *  @param [in] $destination string, one of these: 'php' (see date function), 'mysql', 'moment'
	 *  @param [in] $datetime string, one of these: 'd' = date, 't' = time, 'dt' = both
	 *  @return string
	 */
	function app_datetime_format($destination = 'php', $datetime = 'd') {
		switch(strtolower($destination)) {
			case 'mysql':
				$date = '%d/%m/%Y';
				$time = '%h:%i:%s %p';
				break;
			case 'moment':
				$date = 'DD/MM/YYYY';
				$time = 'hh:mm:ss A';
				break;
			default: // php
				$date = 'd/m/Y';
				$time = 'h:i:s A';
		}

		$datetime = strtolower($datetime);
		if($datetime == 'dt' || $datetime == 'td') return "{$date} {$time}";
		if($datetime == 't') return $time;
		return $date;
	}
	#########################################################
	/**
	 *  @brief perform a test and return results
	 *  
	 *  @param [in] $subject string used as title of test
	 *  @param [in] $test callable function containing the test to be performed, should return true on success, false or a log string on error
	 *  @return test result
	 */
	function test($subject, $test) {
		ob_start();
		$result = $test();
		if($result === true) {
			echo "<div class=\"alert alert-success vspacer-sm\" style=\"padding: 0.2em;\"><i class=\"glyphicon glyphicon-ok hspacer-lg\"></i> {$subject}</div>";
			return ob_get_clean();
		}

		$log = '';
		if($result !== false) $log = "<pre style=\"margin-left: 2em; padding: 0.2em;\">{$result}</pre>";
		echo "<div class=\"alert alert-danger vspacer-sm\" style=\"padding: 0.2em;\"><i class=\"glyphicon glyphicon-remove hspacer-lg\"></i> <span class=\"text-bold\">{$subject}</span>{$log}</div>";
		return ob_get_clean();
	}
	#########################################################
	/**
	 *  @brief invoke a method of an object -- useful to call private/protected methods
	 *  
	 *  @param [in] $object instance of object containing the method
	 *  @param [in] $methodName string name of method to invoke
	 *  @param [in] $parameters array of parameters to pass to the method
	 *  @return the returned value from the invoked method
	 */
	function invoke_method(&$object, $methodName, array $parameters = []) {
		$reflection = new ReflectionClass(get_class($object));
		$method = $reflection->getMethod($methodName);
		$method->setAccessible(true);

		return $method->invokeArgs($object, $parameters);
	}
	#########################################################
	/**
	 *  @brief retrieve the value of a property of an object -- useful to retrieve private/protected props
	 *  
	 *  @param [in] $object instance of object containing the method
	 *  @param [in] $propName string name of property to retrieve
	 *  @return the returned value of the given property, or null if property doesn't exist
	 */
	function get_property(&$object, $propName) {
		$reflection = new ReflectionClass(get_class($object));
		try {
			$prop = $reflection->getProperty($propName);
		} catch(Exception $e) {
			return null;
		}

		$prop->setAccessible(true);

		return $prop->getValue($object);
	}

	#########################################################
	/**
	 *  @brief invoke a method of a static class -- useful to call private/protected methods
	 *  
	 *  @param [in] $class string name of the class containing the method
	 *  @param [in] $methodName string name of method to invoke
	 *  @param [in] $parameters array of parameters to pass to the method
	 *  @return the returned value from the invoked method
	 */
	function invoke_static_method($class, $methodName, array $parameters = []) {
		$reflection = new ReflectionClass($class);
		$method = $reflection->getMethod($methodName);
		$method->setAccessible(true);

		return $method->invokeArgs(null, $parameters);
	}
	#########################################################
	/**
	 *  @param [in] $app_datetime string, a datetime formatted in app-specific format
	 *  @return string, mysql-formatted datetime, 'yyyy-mm-dd H:i:s', or empty string on error
	 */
	function mysql_datetime($app_datetime, $date_format = null, $time_format = null) {
		$app_datetime = trim($app_datetime);

		if($date_format === null) $date_format = app_datetime_format('php', 'd');
		$date_separator = $date_format[1];
		if($time_format === null) $time_format = app_datetime_format('php', 't');
		$time24 = (strpos($time_format, 'H') !== false); // true if $time_format is 24hr rather than 12

		$date_regex = str_replace(
			array('Y', 'm', 'd', '/', '.'),
			array('([0-9]{4})', '(1[012]|0?[1-9])', '([12][0-9]|3[01]|0?[1-9])', '\/', '\.'),
			$date_format
		);

		$time_regex = str_replace(
			array('H', 'h', ':i', ':s'),
			array(
				'(1[0-9]|2[0-3]|0?[0-9])', 
				'(1[012]|0?[0-9])', 
				'(:([1-5][0-9]|0?[0-9]))', 
				'(:([1-5][0-9]|0?[0-9]))?'
			),
			$time_format
		);
		if(stripos($time_regex, ' a'))
			$time_regex = str_replace(array(' a', ' A'), '\s*(am|pm|a|p)?', $time_regex);
		else
			$time_regex = str_replace(array('a', 'A'), '\s*(am|pm|a|p)?', $time_regex);

		// extract date and time
		$time = '';
		$mat = [];
		$regex = "/^({$date_regex})(\s+{$time_regex})?$/i";
		$valid_dt = preg_match($regex, $app_datetime, $mat);
		if(!$valid_dt || count($mat) < 5) return ''; // invlaid datetime
		// if we have a time, get it and change 'a' or 'p' at the end to 'am'/'pm'
		if(count($mat) >= 8) $time = preg_replace('/(a|p)$/i', '$1m', trim($mat[5]));

		// extract date elements from regex match, given 1st 2 items are full string and full date
		$date_order = str_replace($date_separator, '', $date_format);
		$day = $mat[stripos($date_order, 'd') + 2];
		$month = $mat[stripos($date_order, 'm') + 2];
		$year = $mat[stripos($date_order, 'y') + 2];

		// convert time to 24hr format if necessary
		if($time && !$time24) $time = date('H:i:s', strtotime("2000-01-01 {$time}"));

		$mysql_datetime = trim("{$year}-{$month}-{$day} {$time}");

		// strtotime handles dates between 1902 and 2037 only
		// so we need another test date for dates outside this range ...
		$test = $mysql_datetime;
		if($year < 1902 || $year > 2037) $test = str_replace($year, '2000', $mysql_datetime);

		return (strtotime($test) ? $mysql_datetime : '');
	}
	#########################################################
	/**
	 *  @param [in] $mysql_datetime string, Mysql-formatted datetime
	 *  @param [in] $datetime string, one of these: 'd' = date, 't' = time, 'dt' = both
	 *  @return string, app-formatted datetime, or empty string on error
	 *  
	 *  @details works for formatting date, time and datetime, based on 2nd param
	 */  
	function app_datetime($mysql_datetime, $datetime = 'd') {
		$pyear = $myear = substr($mysql_datetime, 0, 4);

		// if date is 0 (0000-00-00) return empty string
		if(!$mysql_datetime || substr($mysql_datetime, 0, 10) == '0000-00-00') return '';

		// strtotime handles dates between 1902 and 2037 only
		// so we need a temp date for dates outside this range ...
		if($myear < 1902 || $myear > 2037) $pyear = 2000;
		$mysql_datetime = str_replace($myear, $pyear, $mysql_datetime);

		$ts = strtotime($mysql_datetime);
		if(!$ts) return '';

		$pdate = date(app_datetime_format('php', $datetime), $ts);
		return str_replace($pyear, $myear, $pdate);
	}
	#########################################################
	/**
	 *  @brief converts string from app-configured encoding to utf8
	 *  
	 *  @param [in] $str string to convert to utf8
	 *  @return utf8-encoded string
	 *  
	 *  @details if the constant 'datalist_db_encoding' is not defined, original string is returned
	 */
	function to_utf8($str) {
		if(!defined('datalist_db_encoding')) return $str;
		if(datalist_db_encoding == 'UTF-8') return $str;
		return iconv(datalist_db_encoding, 'UTF-8', $str);
	}
	#########################################################
	/**
	 *  @brief converts string from utf8 to app-configured encoding
	 *  
	 *  @param [in] $str string to convert from utf8
	 *  @return utf8-decoded string
	 *  
	 *  @details if the constant 'datalist_db_encoding' is not defined, original string is returned
	 */
	function from_utf8($str) {
		if(!defined('datalist_db_encoding')) return $str;
		if(datalist_db_encoding == 'UTF-8') return $str;
		return iconv('UTF-8', datalist_db_encoding, $str);
	}
	#########################################################
	function get_parent_tables($table) {
		/* parents array:
		 * 'child table' => [parents], ...
		 *         where parents array:
		 *             'parent table' => [main lookup fields in child]
		 */
		$parents = [
			'jpd_de' => [
				'tahun' => ['tahun_laksana'],
				'waran' => ['Waran'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'skop_jpd' => ['skop'],
				'status_pelaksanaan' => ['Status'],
				'penyelia_projek' => ['penyelia_projek'],
			],
			'pams_DE' => [
				'tahun' => ['tahun_laksana'],
				'waran' => ['Waran'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'skop_pams' => ['skop'],
				'status_pelaksanaan' => ['Status'],
				'penyelia_projek' => ['penyelia_projek'],
			],
			'JL' => [
				'tahun' => ['tahun_laksana'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'skop_jpd' => ['skop'],
				'status_pelaksanaan' => ['Status'],
				'penyelia_projek' => ['penyelia_projek'],
			],
			'jpd_khas' => [
				'tahun' => ['tahun_laksana'],
				'waran' => ['Waran'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'skop_jpd' => ['skop'],
				'status_pelaksanaan' => ['Status'],
				'penyelia_projek' => ['penyelia_projek'],
			],
			'pams_khas' => [
				'tahun' => ['tahun_laksana'],
				'waran' => ['Waran'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'skop_pams' => ['skop'],
				'status_pelaksanaan' => ['Status'],
				'penyelia_projek' => ['penyelia_projek'],
			],
			'jpd_noc' => [
				'tahun' => ['tahun_laksana'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'penyelia_projek' => ['penyelia_projek'],
				'status_pelaksanaan' => ['Status'],
			],
			'pams_noc' => [
				'tahun' => ['tahun_laksana'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'penyelia_projek' => ['penyelia_projek'],
				'status_pelaksanaan' => ['Status'],
			],
			'balb' => [
				'tahun' => ['tahun_laksana'],
				'waran' => ['Waran'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'penyelia_projek' => ['penyelia_projek'],
				'status_pelaksanaan' => ['Status'],
			],
			'JALB' => [
				'tahun' => ['tahun_laksana'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'status_pelaksanaan' => ['Status'],
			],
			'BELB' => [
				'tahun' => ['tahun_laksana'],
				'waran' => ['Waran'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'penyelia_projek' => ['penyelia_projek'],
				'status_pelaksanaan' => ['Status'],
			],
			'pprt' => [
				'tahun' => ['tahun_laksana'],
				'kelulusan' => ['Kelulusan'],
				'ekasih' => ['ekasih'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'status_pelaksanaan' => ['Status'],
			],
			'ljk' => [
				'negeri' => ['negeri'],
				'daerah' => ['daerah'],
				'Dun' => ['dun'],
				'PARLIMEN' => ['parlimen'],
				'LJK_JENIS' => ['jenis_lampu'],
			],
			'pemohon_jpd' => [
				'tahun' => ['tahun'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'skop_jpd' => ['skop'],
			],
			'pams_mohon' => [
				'tahun' => ['tahun'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'skop_pams' => ['skop'],
			],
			'pemohon_pprt' => [
				'tahun' => ['tahun'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
			],
			'daerah' => [
				'negeri' => ['negeri'],
			],
			'Dun' => [
				'daerah' => ['daerah'],
				'PARLIMEN' => ['parlimen'],
			],
			'PARLIMEN' => [
				'daerah' => ['daerah'],
				'negeri' => ['negeri'],
			],
			'status_kelulusan_jpd' => [
				'pemohon_jpd' => ['pemohon'],
			],
			'status_kelulusan_pams' => [
				'pams_mohon' => ['pemohon'],
			],
			'status_kelulusan_pprt' => [
				'pemohon_pprt' => ['pemohon'],
			],
			'penyelia_projek' => [
				'negeri' => ['negeri'],
			],
			'agensi_pelaksana' => [
				'negeri' => ['negeri'],
			],
			'agensi_bayar' => [
				'negeri' => ['negeri'],
			],
			'jpd_de_REKOD' => [
				'tahun' => ['tahun_laksana'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'penyelia_projek' => ['penyelia_projek'],
				'status_pelaksanaan' => ['Status'],
			],
			'pams_DE_REKOD' => [
				'tahun' => ['tahun_laksana'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'penyelia_projek' => ['penyelia_projek'],
				'status_pelaksanaan' => ['Status'],
			],
			'jpd_test' => [
				'tahun' => ['tahun_laksana'],
				'kelulusan' => ['Kelulusan'],
				'negeri' => ['negeri'],
				'daerah' => ['Daerah'],
				'PARLIMEN' => ['Parlimen'],
				'Dun' => ['DUN'],
				'agensi_pelaksana' => ['AgensiPelaksana'],
				'agensi_bayar' => ['agensi_pembayar'],
				'penyelia_projek' => ['penyelia_projek'],
				'status_pelaksanaan' => ['Status'],
			],
			'Syarikat' => [
				'negeri' => ['negeri'],
				'tahun' => ['Tahun_lantik'],
				'BLACKLIST' => ['blacklist'],
			],
			'Syarikat_baru' => [
				'tahun' => ['Tahun_daftar'],
				'negeri' => ['negeri'],
			],
		];

		return isset($parents[$table]) ? $parents[$table] : [];
	}
	#########################################################
	function backtick_keys_once($arr_data) {
		return array_combine(
			/* add backticks to keys */
			array_map(
				function($e) { return '`' . trim($e, '`') . '`'; }, 
				array_keys($arr_data)
			), 
			/* and combine with values */
			array_values($arr_data)
		);
	}
	#########################################################
	function calculated_fields() {
		/*
		 * calculated fields configuration array, $calc:
		 *         table => [calculated fields], ..
		 *         where calculated fields:
		 *             field => query, ...
		 */
		return array(
			'jpd_de' => array(
				'Perbelanjaan' => 'SELECT `jpd_de`.`Kosprojek`+`jpd_de`.`KKSVO` FROM `jpd_de` WHERE `jpd_de`.`id` = %ID%


',
				'penjimatan' => 'SELECT `jpd_de`.`PeruntukanDiluluskan`- `jpd_de`.`Kosprojek`-`jpd_de`.`KKSVO` FROM `jpd_de` WHERE `jpd_de`.`id` = %ID% 
',
			),
			'pams_DE' => array(
				'Perbelanjaan' => 'SELECT `pams_DE`.`Kosprojek`+`pams_DE`.`KKSVO` FROM `pams_DE` WHERE `pams_DE`.`id` = %ID%
',
				'Penjimatan' => 'SELECT `pams_DE`.`PeruntukanDiluluskan`-`pams_DE`.`Kosprojek`-`pams_DE`.`KKSVO` FROM `pams_DE` WHERE `pams_DE`.`id` = %ID% 
',
			),
			'JL' => array(
				'Perbelanjaan' => 'SELECT `JL`.`Kosprojek`+`JL`.`KKSVO` FROM `JL` WHERE `JL`.`id` = %ID%
',
				'Penjimatan' => 'SELECT `JL`.`PeruntukanDiluluskan`-`JL`.`Kosprojek`-`JL`.`KKSVO` FROM `JL` WHERE `JL`.`id` = %ID% 
',
			),
			'jpd_khas' => array(
				'Perbelanjaan' => 'SELECT `jpd_khas`.`Kosprojek`+`jpd_khas`.`KKSVO` FROM `jpd_khas` WHERE `jpd_khas`.`id` = %ID%
',
				'penjimatan' => 'SELECT `jpd_khas`.`PeruntukanDiluluskan`- `jpd_khas`.`Kosprojek`-`jpd_khas`.`KKSVO` FROM `jpd_khas` WHERE `jpd_khas`.`id` = %ID% 
',
			),
			'pams_khas' => array(
				'Perbelanjaan' => 'SELECT `pams_khas`.`Kosprojek`+`pams_khas`.`KKSVO` FROM `pams_khas` WHERE `pams_khas`.`id` = %ID%

',
				'Penjimatan' => 'SELECT `pams_khas`.`PeruntukanDiluluskan`-`pams_khas`.`Kosprojek`-`pams_khas`.`KKSVO` FROM `pams_khas` WHERE `pams_khas`.`id` = %ID%

',
			),
			'jpd_noc' => array(
				'Perbelanjaan' => 'SELECT `jpd_noc`.`Kosprojek`+`jpd_noc`.`KKSVO` FROM `jpd_noc` WHERE `jpd_noc`.`id` = %ID%


',
				'penjimatan' => 'SELECT `jpd_noc`.`PeruntukanDiluluskan`- `jpd_noc`.`Kosprojek`-`jpd_noc`.`KKSVO` FROM `jpd_noc` WHERE `jpd_noc`.`id` = %ID% 
',
			),
			'pams_noc' => array(
				'Perbelanjaan' => 'SELECT `pams_noc`.`Kosprojek`+`pams_noc`.`KKSVO` FROM `pams_noc` WHERE `pams_noc`.`id` = %ID%

',
				'Penjimatan' => 'SELECT `pams_noc`.`PeruntukanDiluluskan`-`pams_noc`.`Kosprojek`-`pams_noc`.`KKSVO` FROM `pams_noc` WHERE `pams_noc`.`id` = %ID%

',
			),
			'balb' => array(
				'Perbelanjaan' => 'SELECT `balb`.`Kosprojek`+`balb`.`KKSVO` FROM `balb` WHERE `balb`.`id` = %ID%


',
				'penjimatan' => 'SELECT `balb`.`PeruntukanDiluluskan`- `balb`.`Kosprojek`-`balb`.`KKSVO` FROM `balb` WHERE `balb`.`id` = %ID% 
',
			),
			'JALB' => array(
				'jadual' => 'SELECT `JALB`.`progress_sebenar`-`JALB`.`progress_jadual` FROM `JALB` WHERE `JALB`.`id` = %ID%',
			),
			'BELB' => array(
				'Perbelanjaan' => 'SELECT `balb`.`Kosprojek`+`balb`.`KKSVO` FROM `balb` WHERE `balb`.`id` = %ID%


',
				'penjimatan' => 'SELECT `balb`.`PeruntukanDiluluskan`- `balb`.`Kosprojek`-`balb`.`KKSVO` FROM `balb` WHERE `balb`.`id` = %ID% 
',
			),
			'pprt' => array(
				'Perbelanjaan' => 'SELECT `pprt`.`Kosprojek` FROM `pprt` WHERE `pprt`.`id` = %ID%


',
				'penjimatan' => 'SELECT `pprt`.`PeruntukanDiluluskan`- `pprt`.`Kosprojek` FROM `pprt` WHERE `pprt`.`id` = %ID% 
',
			),
			'ljk' => array(
			),
			'pemohon_jpd' => array(
				'status_kelulusan' => 'SELECT status_kelulusan_jpd.kelulusan FROM status_kelulusan_jpd
WHERE status_kelulusan_jpd.pemohon = %ID%',
			),
			'pams_mohon' => array(
				'status_kelulusan' => 'SELECT status_kelulusan_pams.kelulusan FROM status_kelulusan_pams
WHERE status_kelulusan_pams.pemohon = %ID%',
			),
			'pemohon_pprt' => array(
				'status_kelulusan' => 'SELECT status_kelulusan_pprt.kelulusan FROM status_kelulusan_pprt
WHERE status_kelulusan_pprt.pemohon = %ID%',
			),
			'negeri' => array(
			),
			'daerah' => array(
			),
			'Dun' => array(
			),
			'PARLIMEN' => array(
			),
			'kelulusan' => array(
			),
			'status_pelaksanaan' => array(
			),
			'status_kelulusan_jpd' => array(
			),
			'status_kelulusan_pams' => array(
			),
			'status_kelulusan_pprt' => array(
			),
			'tahun' => array(
			),
			'penyelia_projek' => array(
			),
			'agensi_pelaksana' => array(
			),
			'agensi_bayar' => array(
			),
			'waran' => array(
			),
			'jpd_de_REKOD' => array(
				'Perbelanjaan' => 'SELECT `jpd_de`.`Kosprojek`+`jpd_de`.`KKSVO` FROM `jpd_de` WHERE `jpd_de`.`id` = %ID%


',
				'penjimatan' => 'SELECT `jpd_de`.`PeruntukanDiluluskan`- `jpd_de`.`Kosprojek`-`jpd_de`.`KKSVO` FROM `jpd_de` WHERE `jpd_de`.`id` = %ID% 
',
			),
			'pams_DE_REKOD' => array(
				'Perbelanjaan' => 'SELECT `pams_DE`.`Kosprojek`+`pams_DE`.`KKSVO` FROM `pams_DE` WHERE `pams_DE`.`id` = %ID%
',
				'Penjimatan' => 'SELECT `pams_DE`.`PeruntukanDiluluskan`-`pams_DE`.`Kosprojek`-`pams_DE`.`KKSVO` FROM `pams_DE` WHERE `pams_DE`.`id` = %ID% 
',
			),
			'jpd_test' => array(
				'Perbelanjaan' => 'SELECT `jpd_de`.`Kosprojek`+`jpd_de`.`KKSVO` FROM `jpd_de` WHERE `jpd_de`.`id` = %ID%


',
				'penjimatan' => 'SELECT `jpd_de`.`PeruntukanDiluluskan`- `jpd_de`.`Kosprojek`-`jpd_de`.`KKSVO` FROM `jpd_de` WHERE `jpd_de`.`id` = %ID% 
',
			),
			'skop_jpd' => array(
			),
			'skop_pams' => array(
			),
			'Syarikat' => array(
			),
			'Syarikat_baru' => array(
			),
			'ekasih' => array(
			),
			'BLACKLIST' => array(
			),
			'LJK_JENIS' => array(
			),
			'Laporan_N9' => array(
			),
			'Laporan_MLK' => array(
			),
		);
	}
	#########################################################
	function update_calc_fields($table, $id, $formulas, $mi = false) {
		if($mi === false) $mi = getMemberInfo();
		$pk = getPKFieldName($table);
		$safe_id = makeSafe($id);
		$eo = ['silentErrors' => true];
		$caluclations_made = [];
		$replace = array(
			'%ID%' => $safe_id,
			'%USERNAME%' => makeSafe($mi['username']),
			'%GROUPID%' => makeSafe($mi['groupID']),
			'%GROUP%' => makeSafe($mi['group']),
			'%TABLENAME%' => makeSafe($table),
			'%PKFIELD%' => makeSafe($pk),
		);

		foreach($formulas as $field => $query) {
			// for queries that include unicode entities, replace them with actual unicode characters
			if(preg_match('/&#\d{2,5};/', $query)) $query = entitiesToUTF8($query);

			$query = str_replace(array_keys($replace), array_values($replace), $query);
			$calc_value = sqlValue($query);
			if($calc_value  === false) continue;

			// update calculated field
			$safe_calc_value = makeSafe($calc_value);
			$update_query = "UPDATE `{$table}` SET `{$field}`='{$safe_calc_value}' " .
				"WHERE `{$pk}`='{$safe_id}'";
			$res = sql($update_query, $eo);
			if($res) $caluclations_made[] = array(
				'table' => $table,
				'id' => $id,
				'field' => $field,
				'value' => $calc_value
			);
		}

		return $caluclations_made;
	}
	#########################################################
	function latest_jquery() {
		$jquery_dir = dirname(__FILE__) . '/../resources/jquery/js';

		$files = scandir($jquery_dir, SCANDIR_SORT_DESCENDING);
		foreach($files as $entry) {
			if(preg_match('/^jquery[-0-9\.]*\.min\.js$/i', $entry))
				return $entry;
		}

		return '';
	}
	#########################################################
	function existing_value($tn, $fn, $id, $cache = true) {
		/* cache results in records[tablename][id] */
		static $record = [];

		if($cache && !empty($record[$tn][$id])) return $record[$tn][$id][$fn];
		if(!$pk = getPKFieldName($tn)) return false;

		$sid = makeSafe($id);
		$eo = ['silentErrors' => true];
		$res = sql("SELECT * FROM `{$tn}` WHERE `{$pk}`='{$sid}'", $eo);
		$record[$tn][$id] = db_fetch_assoc($res);

		return $record[$tn][$id][$fn];
	}
	#########################################################
	function checkAppRequirements() {
		global $Translation;

		$reqErrors = [];
		$minPHP = '5.6.0';

		if(version_compare(PHP_VERSION, $minPHP) == -1)
			$reqErrors[] = str_replace(
				['<PHP_VERSION>', '<minPHP>'], 
				[PHP_VERSION, $minPHP], 
				$Translation['old php version']
			);

		if(!function_exists('mysqli_connect'))
			$reqErrors[] = str_replace('<EXTENSION>', 'mysqli', $Translation['extension not enabled']);

		if(!function_exists('mb_convert_encoding'))
			$reqErrors[] = str_replace('<EXTENSION>', 'mbstring', $Translation['extension not enabled']);

		// end of checks

		if(!count($reqErrors)) return;

		exit(
			'<div style="padding: 3em; font-size: 1.5em; color: #A94442; line-height: 150%; font-family: arial; text-rendering: optimizelegibility; text-shadow: 0px 0px 1px;">' .
				'<ul><li>' .
				implode('</li><li>', $reqErrors) .
				'</li><ul>' .
			'</div>'
		);
	}
	#########################################################
	function getRecord($table, $id) {
		// get PK fieldname
		if(!$pk = getPKFieldName($table)) return false;

		$safeId = makeSafe($id);
		$eo = ['silentErrors' => true];
		$res = sql("SELECT * FROM `{$table}` WHERE `{$pk}`='{$safeId}'", $eo);
		return db_fetch_assoc($res);
	}
	#########################################################
	function guessMySQLDateTime($dt) {
		// extract date and time, assuming a space separator
		list($date, $time, $ampm) = preg_split('/\s+/', trim($dt));

		// if date is not already in mysql format, try mysql_datetime
		if(!(preg_match('/^[0-9]{4}-(0?[1-9]|1[0-2])-([1-2][0-9]|30|31|0?[1-9])$/', $date) && strtotime($date)))
			if(!$date = mysql_datetime($date)) return false;

		// if time 
		if($t = time12(trim("$time $ampm")))
			$time = time24($t);
		elseif($t = time24($time))
			$time = $t;
		else
			$time = '';

		return trim("$date $time");
	}
	#########################################################
	function lookupQuery($tn, $lookupField) {
		/* 
			This is the query accessible from the 'Advanced' window under the 'Lookup field' tab in AppGini.
			For auto-fill lookups, this is the same as the query of the main lookup field, except the second
			column is replaced by the caption of the auto-fill lookup field.
		*/
		$lookupQuery = [
			'jpd_de' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Waran' => 'SELECT `waran`.`id`, `waran`.`sumber_waran` FROM `waran` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'skop' => 'SELECT `skop_jpd`.`id`, `skop_jpd`.`skop_jpd` FROM `skop_jpd` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
			],
			'pams_DE' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Waran' => 'SELECT `waran`.`id`, `waran`.`sumber_waran` FROM `waran` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'skop' => 'SELECT `skop_pams`.`id`, `skop_pams`.`skop_pams` FROM `skop_pams` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
			],
			'JL' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'skop' => 'SELECT `skop_jpd`.`id`, `skop_jpd`.`skop_jpd` FROM `skop_jpd` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
			],
			'jpd_khas' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Waran' => 'SELECT `waran`.`id`, `waran`.`sumber_waran` FROM `waran` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'skop' => 'SELECT `skop_jpd`.`id`, `skop_jpd`.`skop_jpd` FROM `skop_jpd` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
			],
			'pams_khas' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Waran' => 'SELECT `waran`.`id`, `waran`.`sumber_waran` FROM `waran` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'skop' => 'SELECT `skop_pams`.`id`, `skop_pams`.`skop_pams` FROM `skop_pams` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
			],
			'jpd_noc' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
			],
			'pams_noc' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
			],
			'balb' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Waran' => 'SELECT `waran`.`id`, `waran`.`sumber_waran` FROM `waran` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
			],
			'JALB' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
			],
			'BELB' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Waran' => 'SELECT `waran`.`id`, `waran`.`sumber_waran` FROM `waran` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
			],
			'pprt' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'ekasih' => 'SELECT `ekasih`.`id`, `ekasih`.`status_ekasih` FROM `ekasih` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
			],
			'ljk' => [
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'dun' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'jenis_lampu' => 'SELECT `LJK_JENIS`.`id`, `LJK_JENIS`.`jenis_lampu` FROM `LJK_JENIS` ORDER BY 2',
			],
			'pemohon_jpd' => [
				'tahun' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'skop' => 'SELECT `skop_jpd`.`id`, `skop_jpd`.`skop_jpd` FROM `skop_jpd` ORDER BY 2',
			],
			'pams_mohon' => [
				'tahun' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'skop' => 'SELECT `skop_pams`.`id`, `skop_pams`.`skop_pams` FROM `skop_pams` ORDER BY 2',
			],
			'pemohon_pprt' => [
				'tahun' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
			],
			'negeri' => [
			],
			'daerah' => [
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
			],
			'Dun' => [
				'daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
			],
			'PARLIMEN' => [
				'daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
			],
			'kelulusan' => [
			],
			'status_pelaksanaan' => [
			],
			'status_kelulusan_jpd' => [
				'pemohon' => 'SELECT `pemohon_jpd`.`ID`, `pemohon_jpd`.`Nama_Projek` FROM `pemohon_jpd` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pemohon_jpd`.`tahun` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pemohon_jpd`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pemohon_jpd`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pemohon_jpd`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pemohon_jpd`.`DUN` WHERE pemohon_jpd.status_permohonan = \'baru\' ORDER BY 2',
			],
			'status_kelulusan_pams' => [
				'pemohon' => 'SELECT `pams_mohon`.`ID`, `pams_mohon`.`Nama_Projek` FROM `pams_mohon` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pams_mohon`.`tahun` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pams_mohon`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pams_mohon`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pams_mohon`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pams_mohon`.`DUN` WHERE pams_mohon.status_permohonan = \'baru\' ORDER BY 2',
			],
			'status_kelulusan_pprt' => [
				'pemohon' => 'SELECT `pemohon_pprt`.`ID`, IF(CHAR_LENGTH(`pemohon_pprt`.`Nama_pemohon`) || CHAR_LENGTH(`pemohon_pprt`.`anggaran_kos`), CONCAT_WS(\'\', `pemohon_pprt`.`Nama_pemohon`, \'- RM\', `pemohon_pprt`.`anggaran_kos`), \'\') FROM `pemohon_pprt` LEFT JOIN `tahun` as tahun1 ON `tahun1`.`id`=`pemohon_pprt`.`tahun` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`pemohon_pprt`.`negeri` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`pemohon_pprt`.`Daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`pemohon_pprt`.`Parlimen` LEFT JOIN `Dun` as Dun1 ON `Dun1`.`id`=`pemohon_pprt`.`DUN` WHERE pemohon_pprt.status_permohonan = \'baru\' ORDER BY 2',
			],
			'tahun' => [
			],
			'penyelia_projek' => [
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
			],
			'agensi_pelaksana' => [
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
			],
			'agensi_bayar' => [
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
			],
			'waran' => [
			],
			'jpd_de_REKOD' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
			],
			'pams_DE_REKOD' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
			],
			'jpd_test' => [
				'tahun_laksana' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'Kelulusan' => 'SELECT `kelulusan`.`id`, `kelulusan`.`kelulusan_jawatankuasa` FROM `kelulusan` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Daerah' => 'SELECT `daerah`.`id`, `daerah`.`nama_daerah` FROM `daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`daerah`.`negeri` ORDER BY 2',
				'Parlimen' => 'SELECT `PARLIMEN`.`id`, `PARLIMEN`.`nama_parlimen` FROM `PARLIMEN` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`PARLIMEN`.`daerah` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`PARLIMEN`.`negeri` ORDER BY 2',
				'DUN' => 'SELECT `Dun`.`id`, `Dun`.`nama_dun` FROM `Dun` LEFT JOIN `daerah` as daerah1 ON `daerah1`.`id`=`Dun`.`daerah` LEFT JOIN `PARLIMEN` as PARLIMEN1 ON `PARLIMEN1`.`id`=`Dun`.`parlimen` ORDER BY 2',
				'AgensiPelaksana' => 'SELECT `agensi_pelaksana`.`id`, `agensi_pelaksana`.`pelaksana` FROM `agensi_pelaksana` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_pelaksana`.`negeri` ORDER BY 2',
				'agensi_pembayar' => 'SELECT `agensi_bayar`.`id`, `agensi_bayar`.`agensi` FROM `agensi_bayar` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`agensi_bayar`.`negeri` ORDER BY 2',
				'penyelia_projek' => 'SELECT `penyelia_projek`.`id`, `penyelia_projek`.`nama_penyelia` FROM `penyelia_projek` LEFT JOIN `negeri` as negeri1 ON `negeri1`.`id`=`penyelia_projek`.`negeri` ORDER BY 2',
				'Status' => 'SELECT `status_pelaksanaan`.`id`, `status_pelaksanaan`.`status_laksana` FROM `status_pelaksanaan` ORDER BY 2',
			],
			'skop_jpd' => [
			],
			'skop_pams' => [
			],
			'Syarikat' => [
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
				'Tahun_lantik' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'blacklist' => 'SELECT `BLACKLIST`.`ID`, IF(CHAR_LENGTH(`BLACKLIST`.`disenaraihitamkan`) || CHAR_LENGTH(`BLACKLIST`.`sebab`), CONCAT_WS(\'\', `BLACKLIST`.`disenaraihitamkan`, \'-\', `BLACKLIST`.`sebab`), \'\') FROM `BLACKLIST` ORDER BY 2',
			],
			'Syarikat_baru' => [
				'Tahun_daftar' => 'SELECT `tahun`.`id`, `tahun`.`tahun` FROM `tahun` ORDER BY 2',
				'negeri' => 'SELECT `negeri`.`id`, `negeri`.`nama_negeri` FROM `negeri` ORDER BY 2',
			],
			'ekasih' => [
			],
			'BLACKLIST' => [
			],
			'LJK_JENIS' => [
			],
			'Laporan_N9' => [
			],
			'Laporan_MLK' => [
			],
		];

		return $lookupQuery[$tn][$lookupField];
	}

	#########################################################
	function pkGivenLookupText($val, $tn, $lookupField, $falseIfNotFound = false) {
		static $cache = [];
		if(isset($cache[$tn][$lookupField][$val])) return $cache[$tn][$lookupField][$val];

		if(!$lookupQuery = lookupQuery($tn, $lookupField)) {
			$cache[$tn][$lookupField][$val] = false;
			return false;
		}

		$m = [];

		// quit if query can't be parsed
		if(!preg_match('/select\s+(.*?),\s+(.*?)\s+from\s+(.*)/i', $lookupQuery, $m)) {
			$cache[$tn][$lookupField][$val] = false;
			return false;
		}

		list($all, $pkField, $lookupField, $from) = $m;
		$from = preg_replace('/\s+order\s+by.*$/i', '', $from);
		if(!$lookupField || !$from) {
			$cache[$tn][$lookupField][$val] = false;
			return false;
		}

		// append WHERE if not already there
		if(!preg_match('/\s+where\s+/i', $from)) $from .= ' WHERE 1=1 AND';

		$safeVal = makeSafe($val);
		$id = sqlValue("SELECT {$pkField} FROM {$from} {$lookupField}='{$safeVal}'");
		if($id !== false) {
			$cache[$tn][$lookupField][$val] = $id;
			return $id;
		}

		// no corresponding PK value found
		if($falseIfNotFound) {
			$cache[$tn][$lookupField][$val] = false;
			return false;
		} else {
			$cache[$tn][$lookupField][$val] = $val;
			return $val;
		}
	}
	#########################################################
	function userCanImport() {
		$mi = getMemberInfo();
		$safeUser = makeSafe($mi['username']);
		$groupID = intval($mi['groupID']);

		// admins can always import
		if($mi['group'] == 'Admins') return true;

		// anonymous users can never import
		if($mi['group'] == config('adminConfig')['anonymousGroup']) return false;

		// specific user can import?
		if(sqlValue("SELECT COUNT(1) FROM `membership_users` WHERE `memberID`='{$safeUser}' AND `allowCSVImport`='1'")) return true;

		// user's group can import?
		if(sqlValue("SELECT COUNT(1) FROM `membership_groups` WHERE `groupID`='{$groupID}' AND `allowCSVImport`='1'")) return true;

		return false;
	}
	#########################################################
	function parseTemplate($template) {
		if(trim($template) == '') return $template;

		global $Translation;
		foreach($Translation as $symbol => $trans)
			$template = str_replace("<%%TRANSLATION($symbol)%%>", $trans, $template);

		// Correct <MaxSize> and <FileTypes> to prevent invalid HTML
		$template = str_replace(['<MaxSize>', '<FileTypes>'], ['{MaxSize}', '{FileTypes}'], $template);
		$template = str_replace('<%%BASE_UPLOAD_PATH%%>', getUploadDir(''), $template);

		return $template;
	}
	#########################################################
	function getUploadDir($dir) {
		if($dir == '') $dir = config('adminConfig')['baseUploadPath'];

		return rtrim($dir, '\\/') . '/';
	}
	#########################################################
	function bgStyleToClass($html) {
		return preg_replace(
			'/ style="background-color: rgb\((\d+), (\d+), (\d+)\);"/',
			' class="nicedit-bg" data-nicedit_r="$1" data-nicedit_g="$2" data-nicedit_b="$3"',
			$html
		);
	}
	#########################################################
	function assocArrFilter($arr, $func) {
		if(!is_array($arr) || !count($arr)) return $arr;
		if(!is_callable($func)) return false;

		$filtered = [];
		foreach ($arr as $key => $value)
			if(call_user_func_array($func, [$key, $value]) === true)
				$filtered[$key] = $value;

		return $filtered;
	}
