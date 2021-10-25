<?php
	$script_name = basename($_SERVER['PHP_SELF']);
	if($script_name == 'index.php' && isset($_GET['signIn'])){
		?>
		<style>
			body{
				background: url("images/SeriMenanti.jpg") no-repeat fixed center center / cover;
			}
		</style>
		<?php
	}
?>

<div class="navbar-fixed-bottom hidden-print alert alert-info">
	<?php print "Hari Ini ";
		print date("d/m/y l g:i:s a<br>", time());
    ?>
</div>

