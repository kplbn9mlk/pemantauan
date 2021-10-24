<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'jpd_de';

		/* data for selected record, or defaults if none is selected */
		var data = {
			tahun_laksana: <?php echo json_encode(array('id' => $rdata['tahun_laksana'], 'value' => $rdata['tahun_laksana'], 'text' => $jdata['tahun_laksana'])); ?>,
			Waran: <?php echo json_encode(array('id' => $rdata['Waran'], 'value' => $rdata['Waran'], 'text' => $jdata['Waran'])); ?>,
			Kelulusan: <?php echo json_encode(array('id' => $rdata['Kelulusan'], 'value' => $rdata['Kelulusan'], 'text' => $jdata['Kelulusan'])); ?>,
			negeri: <?php echo json_encode(array('id' => $rdata['negeri'], 'value' => $rdata['negeri'], 'text' => $jdata['negeri'])); ?>,
			Daerah: <?php echo json_encode(array('id' => $rdata['Daerah'], 'value' => $rdata['Daerah'], 'text' => $jdata['Daerah'])); ?>,
			Parlimen: <?php echo json_encode(array('id' => $rdata['Parlimen'], 'value' => $rdata['Parlimen'], 'text' => $jdata['Parlimen'])); ?>,
			DUN: <?php echo json_encode(array('id' => $rdata['DUN'], 'value' => $rdata['DUN'], 'text' => $jdata['DUN'])); ?>,
			AgensiPelaksana: <?php echo json_encode(array('id' => $rdata['AgensiPelaksana'], 'value' => $rdata['AgensiPelaksana'], 'text' => $jdata['AgensiPelaksana'])); ?>,
			agensi_pembayar: <?php echo json_encode(array('id' => $rdata['agensi_pembayar'], 'value' => $rdata['agensi_pembayar'], 'text' => $jdata['agensi_pembayar'])); ?>,
			skop: <?php echo json_encode(array('id' => $rdata['skop'], 'value' => $rdata['skop'], 'text' => $jdata['skop'])); ?>,
			Status: <?php echo json_encode(array('id' => $rdata['Status'], 'value' => $rdata['Status'], 'text' => $jdata['Status'])); ?>,
			penyelia_projek: <?php echo json_encode(array('id' => $rdata['penyelia_projek'], 'value' => $rdata['penyelia_projek'], 'text' => $jdata['penyelia_projek'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for tahun_laksana */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'tahun_laksana' && d.id == data.tahun_laksana.id)
				return { results: [ data.tahun_laksana ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for Waran */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'Waran' && d.id == data.Waran.id)
				return { results: [ data.Waran ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for Kelulusan */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'Kelulusan' && d.id == data.Kelulusan.id)
				return { results: [ data.Kelulusan ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for negeri */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'negeri' && d.id == data.negeri.id)
				return { results: [ data.negeri ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for Daerah */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'Daerah' && d.id == data.Daerah.id)
				return { results: [ data.Daerah ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for Parlimen */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'Parlimen' && d.id == data.Parlimen.id)
				return { results: [ data.Parlimen ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for DUN */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'DUN' && d.id == data.DUN.id)
				return { results: [ data.DUN ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for AgensiPelaksana */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'AgensiPelaksana' && d.id == data.AgensiPelaksana.id)
				return { results: [ data.AgensiPelaksana ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for agensi_pembayar */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'agensi_pembayar' && d.id == data.agensi_pembayar.id)
				return { results: [ data.agensi_pembayar ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for skop */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'skop' && d.id == data.skop.id)
				return { results: [ data.skop ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for Status */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'Status' && d.id == data.Status.id)
				return { results: [ data.Status ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for penyelia_projek */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'penyelia_projek' && d.id == data.penyelia_projek.id)
				return { results: [ data.penyelia_projek ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

