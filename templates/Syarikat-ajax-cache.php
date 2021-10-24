<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function() {
		var tn = 'Syarikat';

		/* data for selected record, or defaults if none is selected */
		var data = {
			negeri: <?php echo json_encode(array('id' => $rdata['negeri'], 'value' => $rdata['negeri'], 'text' => $jdata['negeri'])); ?>,
			Tahun_lantik: <?php echo json_encode(array('id' => $rdata['Tahun_lantik'], 'value' => $rdata['Tahun_lantik'], 'text' => $jdata['Tahun_lantik'])); ?>,
			blacklist: <?php echo json_encode(array('id' => $rdata['blacklist'], 'value' => $rdata['blacklist'], 'text' => $jdata['blacklist'])); ?>
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

		/* saved value for Tahun_lantik */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'Tahun_lantik' && d.id == data.Tahun_lantik.id)
				return { results: [ data.Tahun_lantik ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for blacklist */
		cache.addCheck(function(u, d) {
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'blacklist' && d.id == data.blacklist.id)
				return { results: [ data.blacklist ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

