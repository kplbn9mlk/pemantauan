<?php
	$currDir = dirname(__FILE__);
	require("{$currDir}/incCommon.php");
	$GLOBALS['page_title'] = $Translation['rebuild thumbnails'];
	include("{$currDir}/incHeader.php");

	// image paths
	$p = [
		'jpd_de' => [
			'gambar1' => '../' . getUploadDir(''),
			'gambar2' => '../' . getUploadDir(''),
			'gambar3' => '../' . getUploadDir(''),
		],
		'pams_DE' => [
			'gambar_projek' => '../' . getUploadDir(''),
			'gambar_projek_1' => '../' . getUploadDir(''),
			'gambar_projek_2' => '../' . getUploadDir(''),
		],
		'JL' => [
			'gambar_projek' => '../' . getUploadDir(''),
			'gambar_projek_1' => '../' . getUploadDir(''),
			'gambar_projek_2' => '../' . getUploadDir(''),
		],
		'jpd_khas' => [
			'gambar_projek' => '../' . getUploadDir(''),
			'gambar_projek_1' => '../' . getUploadDir(''),
			'gambar_projek_2' => '../' . getUploadDir(''),
		],
		'pams_khas' => [
			'gambar_projek' => '../' . getUploadDir(''),
			'gambar_projek_1' => '../' . getUploadDir(''),
			'gambar_projek_2' => '../' . getUploadDir(''),
		],
		'jpd_noc' => [
			'gambar_projek' => '../' . getUploadDir(''),
			'gambar_projek_1' => '../' . getUploadDir(''),
			'gambar_projek_2' => '../' . getUploadDir(''),
		],
		'pams_noc' => [
			'gambar_projek' => '../' . getUploadDir(''),
			'gambar_projek_1' => '../' . getUploadDir(''),
			'gambar_projek_2' => '../' . getUploadDir(''),
		],
		'balb' => [
			'gambar1' => '../' . getUploadDir(''),
			'gambar2' => '../' . getUploadDir(''),
			'gambar3' => '../' . getUploadDir(''),
		],
		'JALB' => [
			'gambar1' => '../' . getUploadDir(''),
			'gambar2' => '../' . getUploadDir(''),
			'gambar3' => '../' . getUploadDir(''),
			'gambar4' => '../' . getUploadDir(''),
		],
		'BELB' => [
			'gambar1' => '../' . getUploadDir(''),
			'gambar2' => '../' . getUploadDir(''),
			'gambar3' => '../' . getUploadDir(''),
		],
		'pprt' => [
			'gambar1' => '../' . getUploadDir(''),
			'gambar2' => '../' . getUploadDir(''),
			'gambar3' => '../' . getUploadDir(''),
		],
		'pemohon_jpd' => [
			'gambar_projek' => '../' . getUploadDir(''),
			'gambar_projek_1' => '../' . getUploadDir(''),
			'gambar_projek2' => '../' . getUploadDir(''),
			'gambar_projek3' => '../' . getUploadDir(''),
		],
		'pams_mohon' => [
			'gambar_projek' => '../' . getUploadDir(''),
			'gambar_projek_2' => '../' . getUploadDir(''),
			'gambar_projek_3' => '../' . getUploadDir(''),
			'gambar_projek_1' => '../' . getUploadDir(''),
		],
		'pemohon_pprt' => [
			'gambar_projek' => '../' . getUploadDir(''),
			'gambar2' => '../' . getUploadDir(''),
			'gambar3' => '../' . getUploadDir(''),
		],
		'jpd_de_REKOD' => [
			'gambar1' => '../' . getUploadDir(''),
			'gambar2' => '../' . getUploadDir(''),
			'gambar3' => '../' . getUploadDir(''),
		],
		'pams_DE_REKOD' => [
			'gambar_projek' => '../' . getUploadDir(''),
			'gambar_projek_1' => '../' . getUploadDir(''),
			'gambar_projek_2' => '../' . getUploadDir(''),
		],
		'jpd_test' => [
			'gambar1' => '../' . getUploadDir(''),
			'gambar2' => '../' . getUploadDir(''),
			'gambar3' => '../' . getUploadDir(''),
		],
	];

	if(!count($p)) exit;

	// validate input
	$t = $_GET['table'];
	if(!in_array($t, array_keys($p))) {
		?>
		<div class="page-header"><h1><?php echo $Translation['rebuild thumbnails']; ?></h1></div>
		<form method="get" action="pageRebuildThumbnails.php" target="_blank">
			<?php echo $Translation['thumbnails utility']; ?><br><br>

			<b><?php echo $Translation['rebuild thumbnails of table'] ; ?></b> 
			<?php echo htmlSelect('table', array_keys($p), array_keys($p), ''); ?>
			<input type="submit" value="<?php echo $Translation['rebuild'] ; ?>">
		</form>


		<?php
		include("{$currDir}/incFooter.php");
		exit;
	}

	?>
	<div class="page-header"><h1><?php echo str_replace ( "<TABLENAME>" , $t , $Translation['rebuild thumbnails of table_name'] ); ?></h1></div>
	<?php echo $Translation['do not close page message'] ; ?><br><br>
	<div style="font-weight: bold; color: red; width:700px;" id="status"><?php echo $Translation['rebuild thumbnails status'] ; ?></div>
	<br>

	<div style="text-align:left; padding: 0 5px; width:700px; height:250px;overflow:auto; border: solid 1px green;">
	<?php
		foreach($p[$t] as $f=>$path) {
			$res=sql("select `$f` from `$t`", $eo);
			echo str_replace ( "<FIELD>" , $f , $Translation['building field thumbnails'] )."<br>";
			$tv = $dv = [];
			while($row=db_fetch_row($res)) {
				if($row[0]!='') {
					$tv[]=$row[0];
					$dv[]=$row[0];
				}
			}
			for($i=0; $i<count($tv); $i++) {
				if($i && !($i%4))  echo '<br style="clear: left;">';
				echo '<img src="../thumbnail.php?t='.$t.'&f='.$f.'&i='.$tv[$i].'&v=tv" align="left" style="margin: 10px 10px;"> ';
			}
			echo '<br style="clear: left;">';

			for($i=0; $i<count($dv); $i++) {
				if($i && !($i%4))  echo '<br style="clear: left;">';
				echo '<img src="../thumbnail.php?t='.$t.'&f='.$f.'&i='.$tv[$i].'&v=dv" align="left" style="margin: 10px 10px;"> ';
			}
			echo "<br style='clear: left;'>{$Translation['done']}<br><br>";
		}
	?>
	</div>

	<script>
		window.onload = function() {
			document.getElementById('status').innerHTML = "<?php echo $Translation['finished status'] ; ?>";
			document.getElementById('status').style.color = 'green';
			document.getElementById('status').style.fontSize = '25px';
			document.getElementById('status').style.backgroundColor = '#fff4cf';
		}
	</script>

<?php
	include("{$currDir}/incFooter.php");