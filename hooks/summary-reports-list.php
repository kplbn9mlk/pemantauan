<?php
	define("PREPEND_PATH", "../");
	$hooks_dir = dirname(__FILE__);
	include("{$hooks_dir}/../defaultLang.php");
	include("{$hooks_dir}/../language.php");
	include("{$hooks_dir}/language-summary-reports.php");
	include("{$hooks_dir}/../lib.php");

	$x = new StdClass;
	$x->TableTitle = "Summary Reports";
	include_once("{$hooks_dir}/../header.php");
	$user_data = getMemberInfo();
	$user_group = strtolower($user_data["group"]);
	?>

	<div class="page-header"><h1>
		<img src="summary_reports-logo-md.png" style="height: 1em; vertical-align: text-top;">
		Summary Reports
	</h1></div>
	
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">JPD DE</div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_de-0.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> KELULUSAN PERUNTUKAN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_de-1.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> KELULUSAN BIL PROJEK							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_de-2.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK BY PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_de-3.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERUNTUKAN BY PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_de-4.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> STATUS PROJEK							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_de-5.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERBELANJAAN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_de-6.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PANJANG JALAN SIAP							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_de-7.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> Baki Peruntukan							</a>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">PAMS DE</div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_DE-0.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> KELULUSAN PERUNTUKAN PAMS							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_DE-1.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> KELULUSAN BILANGAN PROJEK							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_DE-2.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK MENGIKUT PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_DE-3.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERUNTUKAN BY PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_DE-4.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> STATUS PELAKSANAAN PROJEK							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_DE-5.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERBELANJAAN TERKINI							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_DE-6.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERBELANJAAN							</a>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">J.LADANG DE</div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-JL-0.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> KELULUSAN PERUNTUKAN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-JL-1.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> KELULUSAN BIL PROJEK							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-JL-2.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK MENGIKUT PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-JL-3.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERUNTUKAN BY PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-JL-4.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> STATUS PELAKSANAAN PROJEK							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-JL-5.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERBELANJAAN TERKINI							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-JL-6.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PANJANG JALAN SIAP							</a>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">JPD KHAS</div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_khas-0.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERUNTUKAN JPD KHAS							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_khas-1.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK JPD KHAS							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_khas-2.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK MENGIKUT PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_khas-3.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERUNTUKAN BY PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_khas-4.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> STATUS PERLAKSANAAN PROJEK							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_khas-5.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERBELANJAAN TERKINI							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-jpd_khas-6.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PANJANG JALAN SIAP							</a>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">PAMS KHAS </div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_khas-0.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> KELULUSAN PERUNTUKAN PAMS KHAS							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_khas-1.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> KELULUSAN BIL PROJEK PAMS KHAS							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_khas-2.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK MENGIKUT PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_khas-3.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERUNTUKAN BY PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_khas-4.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> STATUS PERLAKSANAAN PROJEK							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pams_khas-5.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERBELANJAAN TERKINI							</a>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">JPD NOC</div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">PAMS NOC</div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">BEKALAN AIR</div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-balb-0.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK DILULUSKAN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-balb-1.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERUNTUKAN DILULUSKAN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-balb-2.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK BY PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-balb-3.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERUNTUKAN BY PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-balb-4.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> STATUS PROJEK							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-balb-5.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERBELANJAAN							</a>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">JALAN LUAR BANDAR</div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-JALB-0.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK DILULUSKAN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-JALB-1.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> PERUNTUKAN DILULUSKAN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-JALB-2.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> STATUS PROJEK							</a>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">PPRT</div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pprt-0.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL KELULUSAN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pprt-1.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK BY PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-pprt-2.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> STATUS PROJEK							</a>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">LJK FASA 10</div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-ljk-0.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK DILULUSKAN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-ljk-1.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> BIL PROJEK BY PARLIMEN							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-ljk-2.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> JENIS LJK							</a>
						</div>
							<div class ="col-xs-12 col-md-4 col-lg-4">
							<a href ="summary-reports-ljk-3.php" class="btn btn-success all-groups btn-block btn-lg vspacer-lg summary-reports" style="padding-top: 1em; padding-bottom: 1em;">
								<i class ="glyphicon glyphicon-th"></i> STATUS PROJEK							</a>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="text-center text-bold" style="font-size: 1.5em; line-height: 2em;">MOHON JPD</div>
			</div>
			<div class="panel-body">
				<div class="panel-body-description">
					<div class="row">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		 
	<script>

		var user_group= <?php echo json_encode($user_group) ?>  ;

		$j(function(){ 
			$j( ".panel a" ).not('.'+user_group).not('.all-groups').parent().remove();
			$j('.panel').each(function(){
				if($j(this).find('a').length == 0){
					$j(this).remove();
				}
 
			}) 
		})

	</script>
	

<?php include_once("$hooks_dir/../footer.php"); ?>