<?php
	$currDir = dirname(__FILE__);
	include_once("$currDir/lib.php");

	// upload paths
	$p = [
		'jpd_de' => [
			'gambar1' => getUploadDir(''),
			'inden' => getUploadDir(''),
			'Baucer' => getUploadDir(''),
			'gambar2' => getUploadDir(''),
			'gambar3' => getUploadDir(''),
			'primary key' => 'ID'
		],
		'pams_DE' => [
			'gambar_projek' => getUploadDir(''),
			'inden' => getUploadDir(''),
			'Baucer' => getUploadDir(''),
			'gambar_projek_1' => getUploadDir(''),
			'gambar_projek_2' => getUploadDir(''),
			'primary key' => 'id'
		],
		'JL' => [
			'gambar_projek' => getUploadDir(''),
			'inden' => getUploadDir(''),
			'Baucer' => getUploadDir(''),
			'gambar_projek_1' => getUploadDir(''),
			'gambar_projek_2' => getUploadDir(''),
			'primary key' => 'id'
		],
		'jpd_khas' => [
			'gambar_projek' => getUploadDir(''),
			'inden' => getUploadDir(''),
			'Baucer' => getUploadDir(''),
			'gambar_projek_1' => getUploadDir(''),
			'gambar_projek_2' => getUploadDir(''),
			'primary key' => 'ID'
		],
		'pams_khas' => [
			'gambar_projek' => getUploadDir(''),
			'inden' => getUploadDir(''),
			'Baucer' => getUploadDir(''),
			'gambar_projek_1' => getUploadDir(''),
			'gambar_projek_2' => getUploadDir(''),
			'primary key' => 'id'
		],
		'jpd_noc' => [
			'gambar_projek' => getUploadDir(''),
			'inden' => getUploadDir(''),
			'Baucer' => getUploadDir(''),
			'gambar_projek_1' => getUploadDir(''),
			'gambar_projek_2' => getUploadDir(''),
			'primary key' => 'ID'
		],
		'pams_noc' => [
			'gambar_projek' => getUploadDir(''),
			'inden' => getUploadDir(''),
			'Baucer' => getUploadDir(''),
			'gambar_projek_1' => getUploadDir(''),
			'gambar_projek_2' => getUploadDir(''),
			'primary key' => 'id'
		],
		'balb' => [
			'gambar1' => getUploadDir(''),
			'inden' => getUploadDir(''),
			'Baucer' => getUploadDir(''),
			'gambar2' => getUploadDir(''),
			'gambar3' => getUploadDir(''),
			'primary key' => 'ID'
		],
		'JALB' => [
			'gambar1' => getUploadDir(''),
			'gambar2' => getUploadDir(''),
			'gambar3' => getUploadDir(''),
			'gambar4' => getUploadDir(''),
			'primary key' => 'id'
		],
		'BELB' => [
			'gambar1' => getUploadDir(''),
			'inden' => getUploadDir(''),
			'Baucer' => getUploadDir(''),
			'gambar2' => getUploadDir(''),
			'gambar3' => getUploadDir(''),
			'primary key' => 'ID'
		],
		'pprt' => [
			'gambar1' => getUploadDir(''),
			'gambar2' => getUploadDir(''),
			'gambar3' => getUploadDir(''),
			'primary key' => 'ID'
		],
		'ljk' => [
			'gambar' => getUploadDir(''),
			'primary key' => 'id'
		],
		'pemohon_jpd' => [
			'gambar_projek' => getUploadDir(''),
			'gambar_projek_1' => getUploadDir(''),
			'gambar_projek2' => getUploadDir(''),
			'gambar_projek3' => getUploadDir(''),
			'primary key' => 'ID'
		],
		'pams_mohon' => [
			'gambar_projek' => getUploadDir(''),
			'gambar_projek_2' => getUploadDir(''),
			'gambar_projek_3' => getUploadDir(''),
			'gambar_projek_1' => getUploadDir(''),
			'primary key' => 'ID'
		],
		'pemohon_pprt' => [
			'gambar_projek' => getUploadDir(''),
			'gambar2' => getUploadDir(''),
			'gambar3' => getUploadDir(''),
			'primary key' => 'ID'
		],
		'jpd_de_REKOD' => [
			'gambar1' => getUploadDir(''),
			'gambar2' => getUploadDir(''),
			'gambar3' => getUploadDir(''),
			'primary key' => 'ID'
		],
		'pams_DE_REKOD' => [
			'gambar_projek' => getUploadDir(''),
			'gambar_projek_1' => getUploadDir(''),
			'gambar_projek_2' => getUploadDir(''),
			'primary key' => 'id'
		],
		'jpd_test' => [
			'gambar1' => getUploadDir(''),
			'gambar2' => getUploadDir(''),
			'gambar3' => getUploadDir(''),
			'primary key' => 'ID'
		],
		'Laporan_N9_fiz' => [
			'link' => '',
			'primary key' => 'id'
		],
		'Laporan_MLK_fiz' => [
			'link' => '',
			'primary key' => 'id'
		],
	];

	if(!count($p)) getLink();

	// default links
	$dL = [
	];

	// receive user input
	$t = $_GET['t']; // table name
	$f = $_GET['f']; // field name
	$i = makeSafe($_GET['i']); // id

	// validate input
	if(!in_array($t, array_keys($p))) getLink();
	if(!in_array($f, array_keys($p[$t])) || $f == 'primary key') getLink();
	if(!$i && !$dL[$t][$f]) getLink();

	// user has view access to the requested table?
	if(!check_record_permission($t, $_GET['i'])) getLink();

	// send default link if no id provided, e.g. new record
	if(!$i) {
		$path = $p[$t][$f];
		if(preg_match('/^(http|ftp)/i', $dL[$t][$f])) $path = '';
		@header("Location: {$path}{$dL[$t][$f]}");
		exit;
	}

	getLink($t, $f, $p[$t]['primary key'], $i, $p[$t][$f]);

	function getLink($table = '', $linkField = '', $pk = '', $id = '', $path = '') {
		if(!$id || !$table || !$linkField || !$pk) // default link to return
			exit;

		if(preg_match('/^Lookup: (.*?)::(.*?)::(.*?)$/', $path, $m)) {
			$linkID = makeSafe(sqlValue("SELECT `$linkField` FROM `$table` WHERE `$pk`='$id'"));
			$link = sqlValue("SELECT `{$m[3]}` FROM `{$m[1]}` WHERE `{$m[2]}`='$linkID'");
		} else {
			$link = sqlValue("SELECT `$linkField` FROM `$table` WHERE `$pk`='$id'");
		}

		if(!$link) exit;

		if(preg_match('/^(http|ftp)/i', $link)) {    // if the link points to an external url, don't prepend path
			$path = '';
		} elseif(!is_file(dirname(__FILE__) . "/{$path}{$link}")) {    // if the file doesn't exist in the given path, try to find it without the path
			$path = '';
		}

		@header("Location: $path$link");
		exit;
	}