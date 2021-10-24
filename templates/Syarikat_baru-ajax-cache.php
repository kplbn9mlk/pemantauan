<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'Syarikat_baru';

		/* data for selected record, or defaults if none is selected */
		var data = {
			Tahun_daftar: <?php echo json_encode(array('id' => $rdata['Tahun_daftar'], 'value' => $rdata['Tahun_daftar'], 'text' => $jdata['Tahun_daftar'])); ?>,
			negeri: <?php echo json_encode(array('id' => $rdata['negeri'], 'value' => $rdata['negeri'], 'text' => $jdata['negeri'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for Tahun_daftar */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'Tahun_daftar' && d.id == data.Tahun_daftar.id)
				return { results: [ data.Tahun_daftar ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for negeri */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'negeri' && d.id == data.negeri.id)
				return { results: [ data.negeri ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

