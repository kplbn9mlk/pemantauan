<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'ljk';

		/* data for selected record, or defaults if none is selected */
		var data = {
			negeri: <?php echo json_encode(array('id' => $rdata['negeri'], 'value' => $rdata['negeri'], 'text' => $jdata['negeri'])); ?>,
			daerah: <?php echo json_encode(array('id' => $rdata['daerah'], 'value' => $rdata['daerah'], 'text' => $jdata['daerah'])); ?>,
			dun: <?php echo json_encode(array('id' => $rdata['dun'], 'value' => $rdata['dun'], 'text' => $jdata['dun'])); ?>,
			parlimen: <?php echo json_encode(array('id' => $rdata['parlimen'], 'value' => $rdata['parlimen'], 'text' => $jdata['parlimen'])); ?>,
			jenis_lampu: <?php echo json_encode(array('id' => $rdata['jenis_lampu'], 'value' => $rdata['jenis_lampu'], 'text' => $jdata['jenis_lampu'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for negeri */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'negeri' && d.id == data.negeri.id)
				return { results: [ data.negeri ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for daerah */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'daerah' && d.id == data.daerah.id)
				return { results: [ data.daerah ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for dun */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'dun' && d.id == data.dun.id)
				return { results: [ data.dun ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for parlimen */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'parlimen' && d.id == data.parlimen.id)
				return { results: [ data.parlimen ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for jenis_lampu */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'jenis_lampu' && d.id == data.jenis_lampu.id)
				return { results: [ data.jenis_lampu ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

