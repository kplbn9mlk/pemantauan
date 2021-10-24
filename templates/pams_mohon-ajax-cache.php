<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'pams_mohon';

		/* data for selected record, or defaults if none is selected */
		var data = {
			tahun: <?php echo json_encode(array('id' => $rdata['tahun'], 'value' => $rdata['tahun'], 'text' => $jdata['tahun'])); ?>,
			negeri: <?php echo json_encode(array('id' => $rdata['negeri'], 'value' => $rdata['negeri'], 'text' => $jdata['negeri'])); ?>,
			Daerah: <?php echo json_encode(array('id' => $rdata['Daerah'], 'value' => $rdata['Daerah'], 'text' => $jdata['Daerah'])); ?>,
			Parlimen: <?php echo json_encode(array('id' => $rdata['Parlimen'], 'value' => $rdata['Parlimen'], 'text' => $jdata['Parlimen'])); ?>,
			DUN: <?php echo json_encode(array('id' => $rdata['DUN'], 'value' => $rdata['DUN'], 'text' => $jdata['DUN'])); ?>,
			skop: <?php echo json_encode(array('id' => $rdata['skop'], 'value' => $rdata['skop'], 'text' => $jdata['skop'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for tahun */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'tahun' && d.id == data.tahun.id)
				return { results: [ data.tahun ], more: false, elapsed: 0.01 };
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

		/* saved value for skop */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'skop' && d.id == data.skop.id)
				return { results: [ data.skop ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

