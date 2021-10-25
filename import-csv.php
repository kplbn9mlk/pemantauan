<?php
	define('PREPEND_PATH', '');
	$app_dir = dirname(__FILE__);
	include_once("{$app_dir}/lib.php");

	// accept a record as an assoc array, return transformed row ready to insert to table
	$transformFunctions = [
		'jpd_de' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'jpd_de', 'tahun_laksana');
			if(isset($data['Waran'])) $data['Waran'] = pkGivenLookupText($data['Waran'], 'jpd_de', 'Waran');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'jpd_de', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'jpd_de', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'jpd_de', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'jpd_de', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'jpd_de', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'jpd_de', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'jpd_de', 'agensi_pembayar');
			if(isset($data['TarikhSST'])) $data['TarikhSST'] = guessMySQLDateTime($data['TarikhSST']);
			if(isset($data['TarikhSiapProjek'])) $data['TarikhSiapProjek'] = guessMySQLDateTime($data['TarikhSiapProjek']);
			if(isset($data['TarikhSiapsebenar'])) $data['TarikhSiapsebenar'] = guessMySQLDateTime($data['TarikhSiapsebenar']);
			if(isset($data['skop'])) $data['skop'] = pkGivenLookupText($data['skop'], 'jpd_de', 'skop');
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'jpd_de', 'Status');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'jpd_de', 'penyelia_projek');

			return $data;
		},
		'pams_DE' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'pams_DE', 'tahun_laksana');
			if(isset($data['Waran'])) $data['Waran'] = pkGivenLookupText($data['Waran'], 'pams_DE', 'Waran');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'pams_DE', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'pams_DE', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'pams_DE', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'pams_DE', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'pams_DE', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'pams_DE', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'pams_DE', 'agensi_pembayar');
			if(isset($data['TarikhTawaranSSTLantikan'])) $data['TarikhTawaranSSTLantikan'] = guessMySQLDateTime($data['TarikhTawaranSSTLantikan']);
			if(isset($data['TarikhSiapProjek'])) $data['TarikhSiapProjek'] = guessMySQLDateTime($data['TarikhSiapProjek']);
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['skop'])) $data['skop'] = pkGivenLookupText($data['skop'], 'pams_DE', 'skop');
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'pams_DE', 'Status');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'pams_DE', 'penyelia_projek');

			return $data;
		},
		'JL' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'JL', 'tahun_laksana');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'JL', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'JL', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'JL', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'JL', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'JL', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'JL', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'JL', 'agensi_pembayar');
			if(isset($data['TarikhSST'])) $data['TarikhSST'] = guessMySQLDateTime($data['TarikhSST']);
			if(isset($data['TarikhSiapProjek'])) $data['TarikhSiapProjek'] = guessMySQLDateTime($data['TarikhSiapProjek']);
			if(isset($data['skop'])) $data['skop'] = pkGivenLookupText($data['skop'], 'JL', 'skop');
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'JL', 'Status');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'JL', 'penyelia_projek');

			return $data;
		},
		'jpd_khas' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'jpd_khas', 'tahun_laksana');
			if(isset($data['Waran'])) $data['Waran'] = pkGivenLookupText($data['Waran'], 'jpd_khas', 'Waran');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'jpd_khas', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'jpd_khas', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'jpd_khas', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'jpd_khas', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'jpd_khas', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'jpd_khas', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'jpd_khas', 'agensi_pembayar');
			if(isset($data['TarikhSST'])) $data['TarikhSST'] = guessMySQLDateTime($data['TarikhSST']);
			if(isset($data['TarikhSiapProjek'])) $data['TarikhSiapProjek'] = guessMySQLDateTime($data['TarikhSiapProjek']);
			if(isset($data['skop'])) $data['skop'] = pkGivenLookupText($data['skop'], 'jpd_khas', 'skop');
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'jpd_khas', 'Status');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'jpd_khas', 'penyelia_projek');

			return $data;
		},
		'pams_khas' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'pams_khas', 'tahun_laksana');
			if(isset($data['Waran'])) $data['Waran'] = pkGivenLookupText($data['Waran'], 'pams_khas', 'Waran');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'pams_khas', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'pams_khas', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'pams_khas', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'pams_khas', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'pams_khas', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'pams_khas', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'pams_khas', 'agensi_pembayar');
			if(isset($data['TarikhSST'])) $data['TarikhSST'] = guessMySQLDateTime($data['TarikhSST']);
			if(isset($data['TarikhSiapProjek'])) $data['TarikhSiapProjek'] = guessMySQLDateTime($data['TarikhSiapProjek']);
			if(isset($data['skop'])) $data['skop'] = pkGivenLookupText($data['skop'], 'pams_khas', 'skop');
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['peruntukan_dipinda'])) $data['peruntukan_dipinda'] = preg_replace('/[^\d\.]/', '', $data['peruntukan_dipinda']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'pams_khas', 'Status');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'pams_khas', 'penyelia_projek');

			return $data;
		},
		'jpd_noc' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'jpd_noc', 'tahun_laksana');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'jpd_noc', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'jpd_noc', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'jpd_noc', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'jpd_noc', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'jpd_noc', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'jpd_noc', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'jpd_noc', 'agensi_pembayar');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'jpd_noc', 'penyelia_projek');
			if(isset($data['TarikhSST'])) $data['TarikhSST'] = guessMySQLDateTime($data['TarikhSST']);
			if(isset($data['TarikhSiapProjek'])) $data['TarikhSiapProjek'] = guessMySQLDateTime($data['TarikhSiapProjek']);
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'jpd_noc', 'Status');

			return $data;
		},
		'pams_noc' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'pams_noc', 'tahun_laksana');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'pams_noc', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'pams_noc', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'pams_noc', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'pams_noc', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'pams_noc', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'pams_noc', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'pams_noc', 'agensi_pembayar');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'pams_noc', 'penyelia_projek');
			if(isset($data['TarikhSST'])) $data['TarikhSST'] = guessMySQLDateTime($data['TarikhSST']);
			if(isset($data['TarikhSiapProjek'])) $data['TarikhSiapProjek'] = guessMySQLDateTime($data['TarikhSiapProjek']);
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['peruntukan_dipinda'])) $data['peruntukan_dipinda'] = preg_replace('/[^\d\.]/', '', $data['peruntukan_dipinda']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'pams_noc', 'Status');

			return $data;
		},
		'balb' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'balb', 'tahun_laksana');
			if(isset($data['Waran'])) $data['Waran'] = pkGivenLookupText($data['Waran'], 'balb', 'Waran');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'balb', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'balb', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'balb', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'balb', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'balb', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'balb', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'balb', 'agensi_pembayar');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'balb', 'penyelia_projek');
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'balb', 'Status');

			return $data;
		},
		'JALB' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'JALB', 'tahun_laksana');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'JALB', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'JALB', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'JALB', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'JALB', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'JALB', 'AgensiPelaksana');
			if(isset($data['TarikhSST'])) $data['TarikhSST'] = guessMySQLDateTime($data['TarikhSST']);
			if(isset($data['TarikhSiapSepenuhnya'])) $data['TarikhSiapSepenuhnya'] = guessMySQLDateTime($data['TarikhSiapSepenuhnya']);
			if(isset($data['kos_siling'])) $data['kos_siling'] = preg_replace('/[^\d\.]/', '', $data['kos_siling']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'JALB', 'Status');

			return $data;
		},
		'BELB' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'BELB', 'tahun_laksana');
			if(isset($data['Waran'])) $data['Waran'] = pkGivenLookupText($data['Waran'], 'BELB', 'Waran');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'BELB', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'BELB', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'BELB', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'BELB', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'BELB', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'BELB', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'BELB', 'agensi_pembayar');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'BELB', 'penyelia_projek');
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'BELB', 'Status');

			return $data;
		},
		'pprt' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'pprt', 'tahun_laksana');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'pprt', 'Kelulusan');
			if(isset($data['ekasih'])) $data['ekasih'] = pkGivenLookupText($data['ekasih'], 'pprt', 'ekasih');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'pprt', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'pprt', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'pprt', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'pprt', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'pprt', 'AgensiPelaksana');
			if(isset($data['TarikhTawaranSSTLantikan'])) $data['TarikhTawaranSSTLantikan'] = guessMySQLDateTime($data['TarikhTawaranSSTLantikan']);
			if(isset($data['TarikhSiapProjek'])) $data['TarikhSiapProjek'] = guessMySQLDateTime($data['TarikhSiapProjek']);
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'pprt', 'Status');

			return $data;
		},
		'ljk' => function($data, $options = []) {
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'ljk', 'negeri');
			if(isset($data['daerah'])) $data['daerah'] = pkGivenLookupText($data['daerah'], 'ljk', 'daerah');
			if(isset($data['dun'])) $data['dun'] = pkGivenLookupText($data['dun'], 'ljk', 'dun');
			if(isset($data['parlimen'])) $data['parlimen'] = pkGivenLookupText($data['parlimen'], 'ljk', 'parlimen');
			if(isset($data['jenis_lampu'])) $data['jenis_lampu'] = pkGivenLookupText($data['jenis_lampu'], 'ljk', 'jenis_lampu');

			return $data;
		},
		'pemohon_jpd' => function($data, $options = []) {
			if(isset($data['tahun'])) $data['tahun'] = pkGivenLookupText($data['tahun'], 'pemohon_jpd', 'tahun');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'pemohon_jpd', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'pemohon_jpd', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'pemohon_jpd', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'pemohon_jpd', 'DUN');
			if(isset($data['skop'])) $data['skop'] = pkGivenLookupText($data['skop'], 'pemohon_jpd', 'skop');
			if(isset($data['anggaran_kos'])) $data['anggaran_kos'] = preg_replace('/[^\d\.]/', '', $data['anggaran_kos']);

			return $data;
		},
		'pams_mohon' => function($data, $options = []) {
			if(isset($data['tahun'])) $data['tahun'] = pkGivenLookupText($data['tahun'], 'pams_mohon', 'tahun');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'pams_mohon', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'pams_mohon', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'pams_mohon', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'pams_mohon', 'DUN');
			if(isset($data['skop'])) $data['skop'] = pkGivenLookupText($data['skop'], 'pams_mohon', 'skop');
			if(isset($data['anggaran_kos'])) $data['anggaran_kos'] = preg_replace('/[^\d\.]/', '', $data['anggaran_kos']);

			return $data;
		},
		'pemohon_pprt' => function($data, $options = []) {
			if(isset($data['tahun'])) $data['tahun'] = pkGivenLookupText($data['tahun'], 'pemohon_pprt', 'tahun');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'pemohon_pprt', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'pemohon_pprt', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'pemohon_pprt', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'pemohon_pprt', 'DUN');
			if(isset($data['anggaran_kos'])) $data['anggaran_kos'] = preg_replace('/[^\d\.]/', '', $data['anggaran_kos']);

			return $data;
		},
		'negeri' => function($data, $options = []) {

			return $data;
		},
		'daerah' => function($data, $options = []) {
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'daerah', 'negeri');

			return $data;
		},
		'Dun' => function($data, $options = []) {
			if(isset($data['daerah'])) $data['daerah'] = pkGivenLookupText($data['daerah'], 'Dun', 'daerah');
			if(isset($data['parlimen'])) $data['parlimen'] = pkGivenLookupText($data['parlimen'], 'Dun', 'parlimen');

			return $data;
		},
		'PARLIMEN' => function($data, $options = []) {
			if(isset($data['daerah'])) $data['daerah'] = pkGivenLookupText($data['daerah'], 'PARLIMEN', 'daerah');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'PARLIMEN', 'negeri');

			return $data;
		},
		'kelulusan' => function($data, $options = []) {

			return $data;
		},
		'status_pelaksanaan' => function($data, $options = []) {

			return $data;
		},
		'status_kelulusan_jpd' => function($data, $options = []) {
			if(isset($data['pemohon'])) $data['pemohon'] = pkGivenLookupText($data['pemohon'], 'status_kelulusan_jpd', 'pemohon');
			if(isset($data['tarikh_kelulusan'])) $data['tarikh_kelulusan'] = guessMySQLDateTime($data['tarikh_kelulusan']);

			return $data;
		},
		'status_kelulusan_pams' => function($data, $options = []) {
			if(isset($data['pemohon'])) $data['pemohon'] = pkGivenLookupText($data['pemohon'], 'status_kelulusan_pams', 'pemohon');
			if(isset($data['tarikh_kelulusan'])) $data['tarikh_kelulusan'] = guessMySQLDateTime($data['tarikh_kelulusan']);

			return $data;
		},
		'status_kelulusan_pprt' => function($data, $options = []) {
			if(isset($data['pemohon'])) $data['pemohon'] = pkGivenLookupText($data['pemohon'], 'status_kelulusan_pprt', 'pemohon');
			if(isset($data['tarikh_kelulusan'])) $data['tarikh_kelulusan'] = guessMySQLDateTime($data['tarikh_kelulusan']);

			return $data;
		},
		'tahun' => function($data, $options = []) {

			return $data;
		},
		'penyelia_projek' => function($data, $options = []) {
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'penyelia_projek', 'negeri');

			return $data;
		},
		'agensi_pelaksana' => function($data, $options = []) {
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'agensi_pelaksana', 'negeri');

			return $data;
		},
		'agensi_bayar' => function($data, $options = []) {
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'agensi_bayar', 'negeri');

			return $data;
		},
		'waran' => function($data, $options = []) {

			return $data;
		},
		'jpd_de_REKOD' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'jpd_de_REKOD', 'tahun_laksana');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'jpd_de_REKOD', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'jpd_de_REKOD', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'jpd_de_REKOD', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'jpd_de_REKOD', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'jpd_de_REKOD', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'jpd_de_REKOD', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'jpd_de_REKOD', 'agensi_pembayar');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'jpd_de_REKOD', 'penyelia_projek');
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'jpd_de_REKOD', 'Status');

			return $data;
		},
		'pams_DE_REKOD' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'pams_DE_REKOD', 'tahun_laksana');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'pams_DE_REKOD', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'pams_DE_REKOD', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'pams_DE_REKOD', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'pams_DE_REKOD', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'pams_DE_REKOD', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'pams_DE_REKOD', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'pams_DE_REKOD', 'agensi_pembayar');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'pams_DE_REKOD', 'penyelia_projek');
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'pams_DE_REKOD', 'Status');

			return $data;
		},
		'jpd_test' => function($data, $options = []) {
			if(isset($data['tahun_laksana'])) $data['tahun_laksana'] = pkGivenLookupText($data['tahun_laksana'], 'jpd_test', 'tahun_laksana');
			if(isset($data['Kelulusan'])) $data['Kelulusan'] = pkGivenLookupText($data['Kelulusan'], 'jpd_test', 'Kelulusan');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'jpd_test', 'negeri');
			if(isset($data['Daerah'])) $data['Daerah'] = pkGivenLookupText($data['Daerah'], 'jpd_test', 'Daerah');
			if(isset($data['Parlimen'])) $data['Parlimen'] = pkGivenLookupText($data['Parlimen'], 'jpd_test', 'Parlimen');
			if(isset($data['DUN'])) $data['DUN'] = pkGivenLookupText($data['DUN'], 'jpd_test', 'DUN');
			if(isset($data['AgensiPelaksana'])) $data['AgensiPelaksana'] = pkGivenLookupText($data['AgensiPelaksana'], 'jpd_test', 'AgensiPelaksana');
			if(isset($data['agensi_pembayar'])) $data['agensi_pembayar'] = pkGivenLookupText($data['agensi_pembayar'], 'jpd_test', 'agensi_pembayar');
			if(isset($data['penyelia_projek'])) $data['penyelia_projek'] = pkGivenLookupText($data['penyelia_projek'], 'jpd_test', 'penyelia_projek');
			if(isset($data['PeruntukanDiluluskan'])) $data['PeruntukanDiluluskan'] = preg_replace('/[^\d\.]/', '', $data['PeruntukanDiluluskan']);
			if(isset($data['Kosprojek'])) $data['Kosprojek'] = preg_replace('/[^\d\.]/', '', $data['Kosprojek']);
			if(isset($data['KKSVO'])) $data['KKSVO'] = preg_replace('/[^\d\.]/', '', $data['KKSVO']);
			if(isset($data['Status'])) $data['Status'] = pkGivenLookupText($data['Status'], 'jpd_test', 'Status');

			return $data;
		},
		'skop_jpd' => function($data, $options = []) {

			return $data;
		},
		'skop_pams' => function($data, $options = []) {

			return $data;
		},
		'Syarikat' => function($data, $options = []) {
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'Syarikat', 'negeri');
			if(isset($data['Tahun_lantik'])) $data['Tahun_lantik'] = pkGivenLookupText($data['Tahun_lantik'], 'Syarikat', 'Tahun_lantik');
			if(isset($data['tarikh_dokumen'])) $data['tarikh_dokumen'] = guessMySQLDateTime($data['tarikh_dokumen']);
			if(isset($data['blacklist'])) $data['blacklist'] = pkGivenLookupText($data['blacklist'], 'Syarikat', 'blacklist');

			return $data;
		},
		'Syarikat_baru' => function($data, $options = []) {
			if(isset($data['Tahun_daftar'])) $data['Tahun_daftar'] = pkGivenLookupText($data['Tahun_daftar'], 'Syarikat_baru', 'Tahun_daftar');
			if(isset($data['negeri'])) $data['negeri'] = pkGivenLookupText($data['negeri'], 'Syarikat_baru', 'negeri');

			return $data;
		},
		'ekasih' => function($data, $options = []) {

			return $data;
		},
		'BLACKLIST' => function($data, $options = []) {

			return $data;
		},
		'LJK_JENIS' => function($data, $options = []) {

			return $data;
		},
		'Laporan_N9_fiz' => function($data, $options = []) {
			if(isset($data['peruntukan'])) $data['peruntukan'] = preg_replace('/[^\d\.]/', '', $data['peruntukan']);

			return $data;
		},
		'Kew_n9' => function($data, $options = []) {
			if(isset($data['peruntukan'])) $data['peruntukan'] = preg_replace('/[^\d\.]/', '', $data['peruntukan']);
			if(isset($data['belanja'])) $data['belanja'] = preg_replace('/[^\d\.]/', '', $data['belanja']);
			if(isset($data['jimat'])) $data['jimat'] = preg_replace('/[^\d\.]/', '', $data['jimat']);

			return $data;
		},
		'Laporan_MLK_fiz' => function($data, $options = []) {
			if(isset($data['peruntukan'])) $data['peruntukan'] = preg_replace('/[^\d\.]/', '', $data['peruntukan']);

			return $data;
		},
		'Kew_MLK' => function($data, $options = []) {
			if(isset($data['peruntukan'])) $data['peruntukan'] = preg_replace('/[^\d\.]/', '', $data['peruntukan']);
			if(isset($data['belanja'])) $data['belanja'] = preg_replace('/[^\d\.]/', '', $data['belanja']);
			if(isset($data['jimat'])) $data['jimat'] = preg_replace('/[^\d\.]/', '', $data['jimat']);

			return $data;
		},
	];

	// accept a record as an assoc array, return a boolean indicating whether to import or skip record
	$filterFunctions = [
		'jpd_de' => function($data, $options = []) { return true; },
		'pams_DE' => function($data, $options = []) { return true; },
		'JL' => function($data, $options = []) { return true; },
		'jpd_khas' => function($data, $options = []) { return true; },
		'pams_khas' => function($data, $options = []) { return true; },
		'jpd_noc' => function($data, $options = []) { return true; },
		'pams_noc' => function($data, $options = []) { return true; },
		'balb' => function($data, $options = []) { return true; },
		'JALB' => function($data, $options = []) { return true; },
		'BELB' => function($data, $options = []) { return true; },
		'pprt' => function($data, $options = []) { return true; },
		'ljk' => function($data, $options = []) { return true; },
		'pemohon_jpd' => function($data, $options = []) { return true; },
		'pams_mohon' => function($data, $options = []) { return true; },
		'pemohon_pprt' => function($data, $options = []) { return true; },
		'negeri' => function($data, $options = []) { return true; },
		'daerah' => function($data, $options = []) { return true; },
		'Dun' => function($data, $options = []) { return true; },
		'PARLIMEN' => function($data, $options = []) { return true; },
		'kelulusan' => function($data, $options = []) { return true; },
		'status_pelaksanaan' => function($data, $options = []) { return true; },
		'status_kelulusan_jpd' => function($data, $options = []) { return true; },
		'status_kelulusan_pams' => function($data, $options = []) { return true; },
		'status_kelulusan_pprt' => function($data, $options = []) { return true; },
		'tahun' => function($data, $options = []) { return true; },
		'penyelia_projek' => function($data, $options = []) { return true; },
		'agensi_pelaksana' => function($data, $options = []) { return true; },
		'agensi_bayar' => function($data, $options = []) { return true; },
		'waran' => function($data, $options = []) { return true; },
		'jpd_de_REKOD' => function($data, $options = []) { return true; },
		'pams_DE_REKOD' => function($data, $options = []) { return true; },
		'jpd_test' => function($data, $options = []) { return true; },
		'skop_jpd' => function($data, $options = []) { return true; },
		'skop_pams' => function($data, $options = []) { return true; },
		'Syarikat' => function($data, $options = []) { return true; },
		'Syarikat_baru' => function($data, $options = []) { return true; },
		'ekasih' => function($data, $options = []) { return true; },
		'BLACKLIST' => function($data, $options = []) { return true; },
		'LJK_JENIS' => function($data, $options = []) { return true; },
		'Laporan_N9_fiz' => function($data, $options = []) { return true; },
		'Kew_n9' => function($data, $options = []) { return true; },
		'Laporan_MLK_fiz' => function($data, $options = []) { return true; },
		'Kew_MLK' => function($data, $options = []) { return true; },
	];

	/*
	Hook file for overwriting/amending $transformFunctions and $filterFunctions:
	hooks/import-csv.php
	If found, it's included below

	The way this works is by either completely overwriting any of the above 2 arrays,
	or, more commonly, overwriting a single function, for example:
		$transformFunctions['tablename'] = function($data, $options = []) {
			// new definition here
			// then you must return transformed data
			return $data;
		};

	Another scenario is transforming a specific field and leaving other fields to the default
	transformation. One possible way of doing this is to store the original transformation function
	in GLOBALS array, calling it inside the custom transformation function, then modifying the
	specific field:
		$GLOBALS['originalTransformationFunction'] = $transformFunctions['tablename'];
		$transformFunctions['tablename'] = function($data, $options = []) {
			$data = call_user_func_array($GLOBALS['originalTransformationFunction'], [$data, $options]);
			$data['fieldname'] = 'transformed value';
			return $data;
		};
	*/

	@include("{$app_dir}/hooks/import-csv.php");

	$ui = new CSVImportUI($transformFunctions, $filterFunctions);
