<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5 = @file_get_contents(dirname(__FILE__) . '/setup.md5');
	$thisMD5 = md5(@file_get_contents(dirname(__FILE__) . '/updateDB.php'));

	// check if setup already run
	if($thisMD5 != $prevMD5) {
		// $silent is set if this file is included from setup.php
		if(!isset($silent)) $silent = true;

		// set up tables
		setupTable(
			'jpd_de', " 
			CREATE TABLE IF NOT EXISTS `jpd_de` ( 
				`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Waran` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` DATE NULL,
				`TarikhSiapProjek` DATE NULL,
				`TarikhSiapsebenar` DATE NULL,
				`PanjangJalanM` BIGINT NULL,
				`LebarM` INT NULL,
				`skop` INT UNSIGNED NULL,
				`gambar1` VARCHAR(40) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Peta` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` DECIMAL(10,2) NULL,
				`peruntukan_dipinda` INT NULL,
				`Kosprojek` DECIMAL(10,2) NULL,
				`KKSVO` DECIMAL(10,2) NULL,
				`Perbelanjaan` DECIMAL(10,2) NULL,
				`penjimatan` DECIMAL(10,2) NULL,
				`Status` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`inden` VARCHAR(40) NULL,
				`Baucer` VARCHAR(40) NULL,
				`gambar2` VARCHAR(40) NULL,
				`gambar3` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('jpd_de', ['tahun_laksana','Waran','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','skop','Status','penyelia_projek',]);

		setupTable(
			'pams_DE', " 
			CREATE TABLE IF NOT EXISTS `pams_DE` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Waran` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhTawaranSSTLantikan` DATE NULL,
				`TarikhSiapProjek` DATE NULL,
				`TarikhSiapSebenar` VARCHAR(255) NULL,
				`PanjangJalanM` VARCHAR(255) NULL,
				`LebarM` VARCHAR(255) NULL,
				`Longitud` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` DECIMAL(10,2) NULL,
				`skop` INT UNSIGNED NULL,
				`gambar_projek` VARCHAR(40) NULL,
				`Peta` VARCHAR(255) NULL,
				`peruntukan_dipinda` INT NULL,
				`Kosprojek` DECIMAL(10,2) NULL,
				`KKSVO` DECIMAL(10,2) NULL,
				`Perbelanjaan` DECIMAL(10,2) NULL,
				`Penjimatan` DECIMAL(10,2) NULL,
				`Status` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`inden` VARCHAR(40) NULL,
				`Baucer` VARCHAR(40) NULL,
				`gambar_projek_1` VARCHAR(40) NULL,
				`gambar_projek_2` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('pams_DE', ['tahun_laksana','Waran','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','skop','Status','penyelia_projek',]);

		setupTable(
			'JL', " 
			CREATE TABLE IF NOT EXISTS `JL` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` DATE NULL,
				`TarikhSiapProjek` DATE NULL,
				`TarikhSiapSepenuhnya` VARCHAR(255) NULL,
				`PanjangJalanM` BIGINT NULL,
				`LebarM` BIGINT NULL,
				`skop` INT UNSIGNED NULL,
				`gambar_projek` VARCHAR(40) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Peta` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` INT NULL,
				`peruntukan_dipinda` INT NULL,
				`Kosprojek` INT NULL,
				`KKSVO` INT NULL,
				`Perbelanjaan` DECIMAL(10,2) NULL,
				`Penjimatan` DECIMAL(10,2) NULL,
				`Status` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`inden` VARCHAR(40) NULL,
				`Baucer` VARCHAR(40) NULL,
				`gambar_projek_1` VARCHAR(40) NULL,
				`gambar_projek_2` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('JL', ['tahun_laksana','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','skop','Status','penyelia_projek',]);

		setupTable(
			'jpd_khas', " 
			CREATE TABLE IF NOT EXISTS `jpd_khas` ( 
				`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Waran` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` DATE NULL,
				`TarikhSiapProjek` DATE NULL,
				`TarikhSiapsebenar` VARCHAR(255) NULL,
				`PanjangJalanM` BIGINT NULL,
				`LebarM` VARCHAR(255) NULL,
				`skop` INT UNSIGNED NULL,
				`gambar_projek` VARCHAR(40) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Peta` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` DECIMAL(10,2) NULL,
				`peruntukan_dipinda` INT NULL,
				`Kosprojek` DECIMAL(10,2) NULL,
				`KKSVO` DECIMAL(10,2) NULL,
				`Perbelanjaan` DECIMAL(10,2) NULL,
				`penjimatan` DECIMAL(10,2) NULL,
				`Status` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`inden` VARCHAR(40) NULL,
				`Baucer` VARCHAR(40) NULL,
				`gambar_projek_1` VARCHAR(40) NULL,
				`gambar_projek_2` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('jpd_khas', ['tahun_laksana','Waran','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','skop','Status','penyelia_projek',]);

		setupTable(
			'pams_khas', " 
			CREATE TABLE IF NOT EXISTS `pams_khas` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Waran` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` DATE NULL,
				`TarikhSiapProjek` DATE NULL,
				`TarikhSiapSepenuhnya` VARCHAR(255) NULL,
				`skop` INT UNSIGNED NULL,
				`gambar_projek` VARCHAR(40) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Peta` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` DECIMAL(10,2) NULL,
				`peruntukan_dipinda` DECIMAL(10,2) NULL,
				`Kosprojek` DECIMAL(10,2) NULL,
				`KKSVO` DECIMAL(10,2) NULL,
				`Perbelanjaan` DECIMAL(10,2) NULL,
				`Penjimatan` DECIMAL(10,2) NULL,
				`Status` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`inden` VARCHAR(40) NULL,
				`Baucer` VARCHAR(40) NULL,
				`gambar_projek_1` VARCHAR(40) NULL,
				`gambar_projek_2` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('pams_khas', ['tahun_laksana','Waran','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','skop','Status','penyelia_projek',]);

		setupTable(
			'jpd_noc', " 
			CREATE TABLE IF NOT EXISTS `jpd_noc` ( 
				`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` DATE NULL,
				`TarikhSiapProjek` DATE NULL,
				`TarikhSiapSepenuhnya` VARCHAR(255) NULL,
				`PanjangJalanM` VARCHAR(255) NULL,
				`gambar_projek` VARCHAR(40) NULL,
				`LebarM` VARCHAR(255) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Longitud` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` DECIMAL(10,2) NULL,
				`peruntukan_dipinda` INT NULL,
				`Kosprojek` DECIMAL(10,2) NULL,
				`KKSVO` DECIMAL(10,2) NULL,
				`Perbelanjaan` DECIMAL(10,2) NULL,
				`penjimatan` INT NULL,
				`Status` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`inden` VARCHAR(40) NULL,
				`Baucer` VARCHAR(40) NULL,
				`gambar_projek_1` VARCHAR(40) NULL,
				`gambar_projek_2` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('jpd_noc', ['tahun_laksana','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','penyelia_projek','Status',]);

		setupTable(
			'pams_noc', " 
			CREATE TABLE IF NOT EXISTS `pams_noc` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` DATE NULL,
				`TarikhSiapProjek` DATE NULL,
				`TarikhSiapSepenuhnya` VARCHAR(255) NULL,
				`PanjangJalanM` VARCHAR(255) NULL,
				`gambar_projek` VARCHAR(40) NULL,
				`LebarM` VARCHAR(255) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Longitud` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` INT NULL,
				`peruntukan_dipinda` INT NULL,
				`Kosprojek` INT NULL,
				`KKSVO` INT NULL,
				`Perbelanjaan` INT NULL,
				`Penjimatan` INT NULL,
				`Status` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`inden` VARCHAR(40) NULL,
				`Baucer` VARCHAR(40) NULL,
				`gambar_projek_1` VARCHAR(40) NULL,
				`gambar_projek_2` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('pams_noc', ['tahun_laksana','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','penyelia_projek','Status',]);

		setupTable(
			'balb', " 
			CREATE TABLE IF NOT EXISTS `balb` ( 
				`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Waran` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` VARCHAR(255) NULL,
				`TarikhSiapProjek` VARCHAR(255) NULL,
				`TarikhSiapSepenuhnya` VARCHAR(255) NULL,
				`Panjang` VARCHAR(255) NULL,
				`gambar1` VARCHAR(40) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Peta` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` DECIMAL(10,2) NULL,
				`peruntukan_dipinda` INT NULL,
				`Kosprojek` DECIMAL(10,2) NULL,
				`KKSVO` DECIMAL(10,2) NULL,
				`Perbelanjaan` DECIMAL(10,2) NULL,
				`penjimatan` INT NULL,
				`Status` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`inden` VARCHAR(40) NULL,
				`Baucer` VARCHAR(40) NULL,
				`gambar2` VARCHAR(40) NULL,
				`gambar3` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('balb', ['tahun_laksana','Waran','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','penyelia_projek','Status',]);

		setupTable(
			'JALB', " 
			CREATE TABLE IF NOT EXISTS `JALB` ( 
				`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`tahun_laksana` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` DATE NULL,
				`TarikhSiapSepenuhnya` DATE NULL,
				`speck` TEXT NULL,
				`Panjang` VARCHAR(255) NULL,
				`gambar1` VARCHAR(40) NULL,
				`gambar2` VARCHAR(40) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Peta` VARCHAR(255) NULL,
				`kos_siling` INT NULL,
				`Kosprojek` DECIMAL(10,2) NULL,
				`Status` INT UNSIGNED NULL,
				`progress_jadual` INT NULL,
				`progress_sebenar` INT NULL,
				`jadual` INT NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`gambar3` VARCHAR(40) NULL,
				`gambar4` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('JALB', ['tahun_laksana','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','Status',]);

		setupTable(
			'BELB', " 
			CREATE TABLE IF NOT EXISTS `BELB` ( 
				`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Waran` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` VARCHAR(255) NULL,
				`TarikhSiapProjek` VARCHAR(255) NULL,
				`TarikhSiapSepenuhnya` VARCHAR(255) NULL,
				`Panjang` VARCHAR(255) NULL,
				`gambar1` VARCHAR(40) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Peta` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` DECIMAL(10,2) NULL,
				`peruntukan_dipinda` INT NULL,
				`Kosprojek` DECIMAL(10,2) NULL,
				`KKSVO` DECIMAL(10,2) NULL,
				`Perbelanjaan` DECIMAL(10,2) NULL,
				`penjimatan` INT NULL,
				`Status` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`inden` VARCHAR(40) NULL,
				`Baucer` VARCHAR(40) NULL,
				`gambar2` VARCHAR(40) NULL,
				`gambar3` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('BELB', ['tahun_laksana','Waran','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','penyelia_projek','Status',]);

		setupTable(
			'pprt', " 
			CREATE TABLE IF NOT EXISTS `pprt` ( 
				`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`Nama` VARCHAR(40) NULL,
				`IC` VARCHAR(40) NULL,
				`alamat` TEXT NULL,
				`ekasih` INT UNSIGNED NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhTawaranSSTLantikan` DATE NULL,
				`TarikhSiapProjek` DATE NULL,
				`jenis_binaan` VARCHAR(40) NULL,
				`skop` VARCHAR(255) NULL,
				`Peta` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` DECIMAL(10,2) NULL,
				`Kosprojek` DECIMAL(10,2) NULL,
				`Perbelanjaan` DECIMAL(10,2) NULL,
				`penjimatan` INT NULL,
				`Peratus_siap` VARCHAR(40) NULL,
				`Status` INT UNSIGNED NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`gambar1` VARCHAR(40) NULL,
				`gambar2` VARCHAR(40) NULL,
				`gambar3` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('pprt', ['tahun_laksana','Kelulusan','ekasih','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','Status',]);

		setupTable(
			'ljk', " 
			CREATE TABLE IF NOT EXISTS `ljk` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`negeri` INT UNSIGNED NULL,
				`daerah` INT UNSIGNED NULL,
				`dun` INT UNSIGNED NULL,
				`parlimen` INT UNSIGNED NULL,
				`kampung` VARCHAR(100) NULL,
				`no_tiang` VARCHAR(40) NULL,
				`jenis_lampu` INT UNSIGNED NULL,
				`status_pemasangan` VARCHAR(40) NULL,
				`audit` VARCHAR(40) NULL,
				`catatan` VARCHAR(100) NULL,
				`gambar` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('ljk', ['negeri','daerah','dun','parlimen','jenis_lampu',]);

		setupTable(
			'pemohon_jpd', " 
			CREATE TABLE IF NOT EXISTS `pemohon_jpd` ( 
				`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`tahun` INT UNSIGNED NULL,
				`Nama_Projek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`status_tanah` VARCHAR(40) NULL,
				`PanjangJalanM` VARCHAR(255) NULL,
				`LebarM` VARCHAR(255) NULL,
				`skop` INT UNSIGNED NULL,
				`gambar_projek` VARCHAR(40) NULL,
				`gambar_projek_1` VARCHAR(40) NULL,
				`sumber_mohon` VARCHAR(40) NULL,
				`Peta` VARCHAR(255) NULL,
				`anggaran_kos` DECIMAL(10,2) NULL,
				`justifikasi` TEXT NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`nama_mpkk_jpkkp` VARCHAR(40) NULL,
				`no_tel_mpkk_jpkkp` TEXT NULL,
				`catatan` TEXT NULL,
				`status_permohonan` VARCHAR(40) NULL DEFAULT 'baru',
				`status_kelulusan` INT UNSIGNED NULL,
				`sumber_peruntukan` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL,
				`gambar_projek2` VARCHAR(40) NULL,
				`gambar_projek3` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('pemohon_jpd', ['tahun','negeri','Daerah','Parlimen','DUN','skop',]);

		setupTable(
			'pams_mohon', " 
			CREATE TABLE IF NOT EXISTS `pams_mohon` ( 
				`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`tahun` INT UNSIGNED NULL,
				`negeri` INT UNSIGNED NULL,
				`Nama_Projek` TEXT NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`sumber_mohon` VARCHAR(40) NULL,
				`status_tanah` VARCHAR(40) NULL,
				`skop` INT UNSIGNED NULL,
				`gambar_projek` VARCHAR(40) NULL,
				`gambar_projek_2` VARCHAR(40) NULL,
				`Peta` VARCHAR(255) NULL,
				`anggaran_kos` DECIMAL(10,2) NULL,
				`justifikasi` TEXT NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`nama_mpkk_jpkkp` VARCHAR(40) NULL,
				`no_tel_mpkk_jpkkp` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`status_permohonan` VARCHAR(40) NULL DEFAULT 'baru',
				`status_kelulusan` INT UNSIGNED NULL,
				`sumber_peruntukan` VARCHAR(40) NULL,
				`gambar_projek_3` VARCHAR(40) NULL,
				`gambar_projek_1` VARCHAR(40) NULL,
				`updated` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('pams_mohon', ['tahun','negeri','Daerah','Parlimen','DUN','skop',]);

		setupTable(
			'pemohon_pprt', " 
			CREATE TABLE IF NOT EXISTS `pemohon_pprt` ( 
				`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`tahun` INT UNSIGNED NULL,
				`gambar_projek` VARCHAR(40) NULL,
				`gambar2` VARCHAR(40) NULL,
				`gambar3` VARCHAR(40) NULL,
				`Nama_pemohon` TEXT NULL,
				`sumber_mohon` VARCHAR(40) NULL,
				`status_tanah` VARCHAR(40) NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`skop` VARCHAR(255) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Longitud` VARCHAR(255) NULL,
				`anggaran_kos` DECIMAL(10,2) NULL,
				`justifikasi` TEXT NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`nama_mpkk_jpkkp` VARCHAR(40) NULL,
				`no_tel_mpkk_jpkkp` TEXT NULL,
				`catatan` TEXT NULL,
				`status_permohonan` VARCHAR(40) NULL DEFAULT 'baru',
				`status_kelulusan` INT UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('pemohon_pprt', ['tahun','negeri','Daerah','Parlimen','DUN',]);

		setupTable(
			'negeri', " 
			CREATE TABLE IF NOT EXISTS `negeri` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`nama_negeri` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'daerah', " 
			CREATE TABLE IF NOT EXISTS `daerah` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`negeri` INT UNSIGNED NULL,
				`nama_daerah` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('daerah', ['negeri',]);

		setupTable(
			'Dun', " 
			CREATE TABLE IF NOT EXISTS `Dun` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`daerah` INT UNSIGNED NULL,
				`nama_dun` VARCHAR(40) NULL,
				`parlimen` INT UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('Dun', ['daerah','parlimen',]);

		setupTable(
			'PARLIMEN', " 
			CREATE TABLE IF NOT EXISTS `PARLIMEN` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`nama_parlimen` VARCHAR(40) NULL,
				`daerah` INT UNSIGNED NULL,
				`negeri` INT UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('PARLIMEN', ['daerah','negeri',]);

		setupTable(
			'kelulusan', " 
			CREATE TABLE IF NOT EXISTS `kelulusan` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`kelulusan_jawatankuasa` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'status_pelaksanaan', " 
			CREATE TABLE IF NOT EXISTS `status_pelaksanaan` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`status_laksana` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'status_kelulusan_jpd', " 
			CREATE TABLE IF NOT EXISTS `status_kelulusan_jpd` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`pemohon` INT(10) UNSIGNED NULL,
				`kelulusan` VARCHAR(40) NULL,
				`tarikh_kelulusan` DATETIME NULL,
				`pelulus` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('status_kelulusan_jpd', ['pemohon',]);

		setupTable(
			'status_kelulusan_pams', " 
			CREATE TABLE IF NOT EXISTS `status_kelulusan_pams` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`pemohon` INT(10) UNSIGNED NULL,
				`kelulusan` VARCHAR(40) NULL,
				`tarikh_kelulusan` DATETIME NULL,
				`pelulus` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('status_kelulusan_pams', ['pemohon',]);

		setupTable(
			'status_kelulusan_pprt', " 
			CREATE TABLE IF NOT EXISTS `status_kelulusan_pprt` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`pemohon` INT(10) UNSIGNED NULL,
				`kelulusan` VARCHAR(40) NULL,
				`tarikh_kelulusan` DATETIME NULL,
				`pelulus` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('status_kelulusan_pprt', ['pemohon',]);

		setupTable(
			'tahun', " 
			CREATE TABLE IF NOT EXISTS `tahun` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`tahun` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'penyelia_projek', " 
			CREATE TABLE IF NOT EXISTS `penyelia_projek` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`nama_penyelia` VARCHAR(40) NULL,
				`negeri` INT UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('penyelia_projek', ['negeri',]);

		setupTable(
			'agensi_pelaksana', " 
			CREATE TABLE IF NOT EXISTS `agensi_pelaksana` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`pelaksana` VARCHAR(40) NULL,
				`negeri` INT UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('agensi_pelaksana', ['negeri',]);

		setupTable(
			'agensi_bayar', " 
			CREATE TABLE IF NOT EXISTS `agensi_bayar` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`agensi` VARCHAR(40) NULL,
				`negeri` INT UNSIGNED NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('agensi_bayar', ['negeri',]);

		setupTable(
			'waran', " 
			CREATE TABLE IF NOT EXISTS `waran` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`sumber_waran` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'jpd_de_REKOD', " 
			CREATE TABLE IF NOT EXISTS `jpd_de_REKOD` ( 
				`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` VARCHAR(255) NULL,
				`TarikhSiapProjek` VARCHAR(255) NULL,
				`TarikhSiapSepenuhnya` VARCHAR(255) NULL,
				`PanjangJalanM` VARCHAR(255) NULL,
				`LebarM` VARCHAR(255) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Longitud` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` DECIMAL(10,2) NULL,
				`peruntukan_dipinda` INT NULL,
				`Kosprojek` DECIMAL(10,2) NULL,
				`KKSVO` DECIMAL(10,2) NULL,
				`Perbelanjaan` DECIMAL(10,2) NULL,
				`penjimatan` INT NULL,
				`Status` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`gambar1` VARCHAR(40) NULL,
				`gambar2` VARCHAR(40) NULL,
				`gambar3` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('jpd_de_REKOD', ['tahun_laksana','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','penyelia_projek','Status',]);

		setupTable(
			'pams_DE_REKOD', " 
			CREATE TABLE IF NOT EXISTS `pams_DE_REKOD` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` VARCHAR(255) NULL,
				`TarikhSiapProjek` VARCHAR(255) NULL,
				`TarikhSiapSebenar` VARCHAR(255) NULL,
				`PanjangJalanM` VARCHAR(255) NULL,
				`LebarM` VARCHAR(255) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Longitud` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` INT NULL,
				`peruntukan_dipinda` INT NULL,
				`Kosprojek` INT NULL,
				`KKSVO` DECIMAL(10,2) NULL,
				`Perbelanjaan` INT NULL,
				`Penjimatan` INT NULL,
				`Status` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`gambar_projek` VARCHAR(40) NULL,
				`gambar_projek_1` VARCHAR(40) NULL,
				`gambar_projek_2` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('pams_DE_REKOD', ['tahun_laksana','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','penyelia_projek','Status',]);

		setupTable(
			'jpd_test', " 
			CREATE TABLE IF NOT EXISTS `jpd_test` ( 
				`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`tahun_laksana` INT UNSIGNED NULL,
				`Kelulusan` INT UNSIGNED NULL,
				`NamaProjek` TEXT NULL,
				`negeri` INT UNSIGNED NULL,
				`Daerah` INT UNSIGNED NULL,
				`Parlimen` INT UNSIGNED NULL,
				`DUN` INT UNSIGNED NULL,
				`AgensiPelaksana` INT UNSIGNED NULL,
				`agensi_pembayar` INT UNSIGNED NULL,
				`penyelia_projek` INT UNSIGNED NULL,
				`NamaKontraktor` VARCHAR(255) NULL,
				`TarikhSST` VARCHAR(255) NULL,
				`TarikhSiapProjek` VARCHAR(255) NULL,
				`TarikhSiapSepenuhnya` VARCHAR(255) NULL,
				`PanjangJalanM` VARCHAR(255) NULL,
				`gambar1` VARCHAR(40) NULL,
				`LebarM` VARCHAR(255) NULL,
				`Latitud` VARCHAR(255) NULL,
				`Longitud` VARCHAR(255) NULL,
				`PeruntukanDiluluskan` DECIMAL(10,2) NULL,
				`peruntukan_dipinda` INT NULL,
				`Kosprojek` DECIMAL(10,2) NULL,
				`KKSVO` DECIMAL(10,2) NULL,
				`Perbelanjaan` DECIMAL(10,2) NULL,
				`penjimatan` INT NULL,
				`Status` INT UNSIGNED NULL,
				`PenerimaManfaat` VARCHAR(40) NULL,
				`sumber_permohonan` VARCHAR(40) NULL,
				`catatan` TEXT NULL,
				`sumber_peruntukan` VARCHAR(40) NULL,
				`gambar2` VARCHAR(40) NULL,
				`gambar3` VARCHAR(40) NULL,
				`VIDEO` VARCHAR(100) NULL,
				`GIS` VARCHAR(255) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('jpd_test', ['tahun_laksana','Kelulusan','negeri','Daerah','Parlimen','DUN','AgensiPelaksana','agensi_pembayar','penyelia_projek','Status',]);

		setupTable(
			'skop_jpd', " 
			CREATE TABLE IF NOT EXISTS `skop_jpd` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`skop_jpd` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'skop_pams', " 
			CREATE TABLE IF NOT EXISTS `skop_pams` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`skop_pams` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'Syarikat', " 
			CREATE TABLE IF NOT EXISTS `Syarikat` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`negeri` INT UNSIGNED NULL,
				`nama_syarikat` VARCHAR(100) NULL,
				`Alamat` VARCHAR(200) NULL,
				`no_ssm` VARCHAR(40) NULL,
				`no_cidb` VARCHAR(40) NULL,
				`lantik_kplb` VARCHAR(40) NULL,
				`Tahun_lantik` INT UNSIGNED NULL,
				`tarikh_dokumen` DATE NULL,
				`tajuk_kerja` VARCHAR(200) NULL,
				`kaedah_perolehan` VARCHAR(40) NULL,
				`kos_projek` VARCHAR(40) NULL,
				`blacklist` INT UNSIGNED NULL,
				`catatan` TEXT NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('Syarikat', ['negeri','Tahun_lantik','blacklist',]);

		setupTable(
			'Syarikat_baru', " 
			CREATE TABLE IF NOT EXISTS `Syarikat_baru` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`Tahun_daftar` INT UNSIGNED NULL,
				`negeri` INT UNSIGNED NULL,
				`daerah` VARCHAR(40) NULL,
				`nama_pemilik` VARCHAR(40) NULL,
				`nama_syarikat` VARCHAR(100) NULL,
				`Alamat` VARCHAR(200) NULL,
				`no_ssm` VARCHAR(40) NULL,
				`no_cidb` VARCHAR(40) NULL,
				`no_evendor` VARCHAR(40) NULL,
				`email` VARCHAR(80) NULL
			) CHARSET utf8",
			$silent
		);
		setupIndexes('Syarikat_baru', ['Tahun_daftar','negeri',]);

		setupTable(
			'ekasih', " 
			CREATE TABLE IF NOT EXISTS `ekasih` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`status_ekasih` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'BLACKLIST', " 
			CREATE TABLE IF NOT EXISTS `BLACKLIST` ( 
				`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`disenaraihitamkan` VARCHAR(40) NULL,
				`sebab` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'LJK_JENIS', " 
			CREATE TABLE IF NOT EXISTS `LJK_JENIS` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`jenis_lampu` VARCHAR(40) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'Laporan_N9_fiz', " 
			CREATE TABLE IF NOT EXISTS `Laporan_N9_fiz` ( 
				`id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`program` VARCHAR(100) NULL,
				`peruntukan` INT NULL,
				`bil_projek` INT NULL,
				`bm` INT NULL,
				`Perolehan` INT NULL,
				`dp` INT NULL,
				`sp` INT NULL,
				`link` VARCHAR(100) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'Kew_n9', " 
			CREATE TABLE IF NOT EXISTS `Kew_n9` ( 
				`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`program` VARCHAR(100) NULL,
				`bil_projek` INT NULL,
				`peruntukan` DECIMAL(10,2) NULL,
				`belanja` DECIMAL(10,2) NULL,
				`jimat` DECIMAL(10,2) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'Laporan_MLK_fiz', " 
			CREATE TABLE IF NOT EXISTS `Laporan_MLK_fiz` ( 
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`id`),
				`program` VARCHAR(100) NULL,
				`peruntukan` INT NULL,
				`bil_projek` INT NULL,
				`bm` INT NULL,
				`Perolehan` INT NULL,
				`dp` INT NULL,
				`sp` INT NULL,
				`link` VARCHAR(100) NULL
			) CHARSET utf8",
			$silent
		);

		setupTable(
			'Kew_MLK', " 
			CREATE TABLE IF NOT EXISTS `Kew_MLK` ( 
				`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`ID`),
				`program` VARCHAR(100) NULL,
				`bil_projek` INT NULL,
				`peruntukan` DECIMAL(10,2) NULL,
				`belanja` DECIMAL(10,2) NULL,
				`jimat` DECIMAL(10,2) NULL
			) CHARSET utf8",
			$silent
		);



		// save MD5
		@file_put_contents(dirname(__FILE__) . '/setup.md5', $thisMD5);
	}


	function setupIndexes($tableName, $arrFields) {
		if(!is_array($arrFields) || !count($arrFields)) return false;

		foreach($arrFields as $fieldName) {
			if(!$res = @db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")) continue;
			if(!$row = @db_fetch_assoc($res)) continue;
			if($row['Key']) continue;

			@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
		}
	}


	function setupTable($tableName, $createSQL = '', $silent = true, $arrAlter = '') {
		global $Translation;
		$oldTableName = '';
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)) {
			$matches = [];
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/i", $arrAlter[0], $matches)) {
				$oldTableName = $matches[1];
			}
		}

		if($res = @db_query("SELECT COUNT(1) FROM `$tableName`")) { // table already exists
			if($row = @db_fetch_array($res)) {
				echo str_replace(['<TableName>', '<NumRecords>'], [$tableName, $row[0]], $Translation['table exists']);
				if(is_array($arrAlter)) {
					echo '<br>';
					foreach($arrAlter as $alter) {
						if($alter != '') {
							echo "$alter ... ";
							if(!@db_query($alter)) {
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							} else {
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				} else {
					echo $Translation['table uptodate'];
				}
			} else {
				echo str_replace('<TableName>', $tableName, $Translation['couldnt count']);
			}
		} else { // given tableName doesn't exist

			if($oldTableName != '') { // if we have a table rename query
				if($ro = @db_query("SELECT COUNT(1) FROM `$oldTableName`")) { // if old table exists, rename it.
					$renameQuery = array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)) {
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					} else {
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				} else { // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			} else { // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)) {
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				} else {
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo '</div>';

		$out = ob_get_clean();
		if(!$silent) echo $out;
	}
