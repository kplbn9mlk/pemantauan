<?php
	/* Include Requeried files */
	define("PREPEND_PATH", "../");
	$hooks_dir = dirname(__FILE__);
	include("{$hooks_dir}/../defaultLang.php");
	include("{$hooks_dir}/../language.php");
	include("{$hooks_dir}/../lib.php");
	include("{$hooks_dir}/language-summary-reports.php");
	include("{$hooks_dir}/SummaryReport.php");
	@header("Content-Type: text/html; charset=" . datalist_db_encoding);
 	
	$x = new StdClass;
	$x->TableTitle = "BIL PROJEK BY PARLIMEN";
	include_once("{$hooks_dir}/../header.php");
	
	$filterable_fields = array (
		0 => 'ID',
		1 => 'tahun_laksana',
		2 => 'Kelulusan',
		3 => 'Nama',
		4 => 'IC',
		5 => 'alamat',
		6 => 'ekasih',
		7 => 'negeri',
		8 => 'Daerah',
		9 => 'Parlimen',
		10 => 'DUN',
		11 => 'AgensiPelaksana',
		12 => 'NamaKontraktor',
		13 => 'TarikhTawaranSSTLantikan',
		14 => 'TarikhSiapProjek',
		15 => 'jenis_binaan',
		16 => 'skop',
		17 => 'Peta',
		18 => 'PeruntukanDiluluskan',
		19 => 'Kosprojek',
		20 => 'Perbelanjaan',
		21 => 'penjimatan',
		22 => 'Peratus_siap',
		23 => 'Status',
		24 => 'sumber_permohonan',
		25 => 'catatan',
	);


	$config_array = array(
		'reportHash' => 'hjqjjpyu11utgod2f533',
		'request' => $_REQUEST,
		'groups_array' => $groups_array,
		'override_permissions' => false,
		'title' => 'BIL PROJEK BY PARLIMEN',
		'custom_where' => '',
		'table' => 'pprt',
		'label' => 'Parlimen',
		'group_function' => 'count',
		'label_title' => 'Parlimen',
		'value_title' => 'Count of PPRT',
		'thousands_separator' => ',',
		'decimal_point' => '.',

		// show data table section?
		'data_table_section' => 1,

		// max number of data points to show on charts
		'chart_data_points' => 20,
		
		// barchart options
		'barchart_section' => 0,
		'barchart_options' => array(
			// see https://gionkunz.github.io/chartist-js/api-documentation.html#chartistbar-declaration-defaultoptions
			'axisX' => array(
				'offset' => 30,
				'position' => 'end',
				'labelOffset' => array('x' => 0, 'y' => 0),
				'showLabel' => true,
				'showGrid' => true,
				'scaleMinSpace' => 30,
				'onlyInteger' => false
			),
			'axisY' => array(
				'offset' => 40,
				'position' => 'start',
				'labelOffset' => array('x' => 0, 'y' => 0),
				'showLabel' => true,
				'showGrid' => true,
				'scaleMinSpace' => 20,
				'onlyInteger' => false
			),
			// 'width' => false,
			// 'height' => false,
			// 'high' => false,
			// 'low' => false,
			'referenceValue' => 0,
			'chartPadding' => array('top' => 15, 'right' => 15, 'bottom' => 5, 'left' => 10),
			'seriesBarDistance' => 15,
			'stackBars' => false,
			'stackMode' => 'accumulate',
			'horizontalBars' => false,
			'distributeSeries' => false,
			'reverseData' => false,
			'showGridBackground' => false,
			'classNames' => array(
				'chart' => 'ct-chart-bar',
				'horizontalBars' => 'ct-horizontal-bars',
				'label' => 'ct-label',
				'labelGroup' => 'ct-labels',
				'series' => 'ct-series',
				'bar' => 'ct-bar',
				'grid' => 'ct-grid',
				'gridGroup' => 'ct-grids',
				'gridBackground' => 'ct-grid-background',
				'vertical' => 'ct-vertical',
				'horizontal' => 'ct-horizontal',
				'start' => 'ct-start',
				'end' => 'ct-end'
			)
		),

		// piechart options
		'piechart_section' => 0,
		'piechart_options' => array(
			// see https://gionkunz.github.io/chartist-js/api-documentation.html#chartistpie-declaration-defaultoptions
			// 'width' => false,
			// 'height' => false,
			'chartPadding' => 5,
			'classNames' => array(
				'chartPie' => 'ct-chart-pie',
				'chartDonut' => 'ct-chart-donut',
				'series' => 'ct-series',
				'slicePie' => 'ct-slice-pie',
				'sliceDonut' => 'ct-slice-donut',
				'sliceDonutSolid' => 'ct-slice-donut-solid',
				'label' => 'ct-label'
			),
			'startAngle' => 0,
			// 'total' => false,
			'donut' => false,
			'donutSolid' => false,
			'donutWidth' => 60,
			'showLabel' => true,
			'labelOffset' => '50',
			'labelPosition' => 'center',
			'labelDirection' => 'neutral',
			'reverseData' => false,
			'ignoreEmptyValues' => true
		),
		'piechart_classes' => 'ct-square',

		'date_format' => 'd/m/Y',
		'date_separator' => '/',
		'jsmoment_date_format' => 'DD/MM/YYYY',
		'label_field_index' => 10,
		'filterable_fields' => $filterable_fields,
		'look_up_table' => 'PARLIMEN'
	);
	$report = new SummaryReport($config_array);
	echo $report->render();

	include_once("{$hooks_dir}/../footer.php");
