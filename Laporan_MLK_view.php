<?php
// This script and data application were generated by AppGini 5.97
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include_once("{$currDir}/lib.php");
	@include_once("{$currDir}/hooks/Laporan_MLK.php");
	include_once("{$currDir}/Laporan_MLK_dml.php");

	// mm: can the current member access this page?
	$perm = getTablePermissions('Laporan_MLK');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'Laporan_MLK';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`Laporan_MLK`.`id`" => "id",
		"`Laporan_MLK`.`program`" => "program",
		"FORMAT(`Laporan_MLK`.`peruntukan`, 2)" => "peruntukan",
		"`Laporan_MLK`.`bil_projek`" => "bil_projek",
		"`Laporan_MLK`.`bm`" => "bm",
		"`Laporan_MLK`.`Perolehan`" => "Perolehan",
		"`Laporan_MLK`.`dp`" => "dp",
		"`Laporan_MLK`.`sp`" => "sp",
		"`Laporan_MLK`.`link`" => "link",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`Laporan_MLK`.`id`',
		2 => 2,
		3 => '`Laporan_MLK`.`peruntukan`',
		4 => '`Laporan_MLK`.`bil_projek`',
		5 => '`Laporan_MLK`.`bm`',
		6 => '`Laporan_MLK`.`Perolehan`',
		7 => '`Laporan_MLK`.`dp`',
		8 => '`Laporan_MLK`.`sp`',
		9 => 9,
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`Laporan_MLK`.`id`" => "id",
		"`Laporan_MLK`.`program`" => "program",
		"FORMAT(`Laporan_MLK`.`peruntukan`, 2)" => "peruntukan",
		"`Laporan_MLK`.`bil_projek`" => "bil_projek",
		"`Laporan_MLK`.`bm`" => "bm",
		"`Laporan_MLK`.`Perolehan`" => "Perolehan",
		"`Laporan_MLK`.`dp`" => "dp",
		"`Laporan_MLK`.`sp`" => "sp",
		"`Laporan_MLK`.`link`" => "link",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`Laporan_MLK`.`id`" => "ID",
		"`Laporan_MLK`.`program`" => "Program",
		"`Laporan_MLK`.`peruntukan`" => "Peruntukan Diluluskan",
		"`Laporan_MLK`.`bil_projek`" => "Bil Projek",
		"`Laporan_MLK`.`bm`" => "Belum Mula",
		"`Laporan_MLK`.`Perolehan`" => "Perolehan",
		"`Laporan_MLK`.`dp`" => "Dalam Perlaksanaan",
		"`Laporan_MLK`.`sp`" => "Siap Perlaksanaan",
		"`Laporan_MLK`.`link`" => "Senarai",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`Laporan_MLK`.`id`" => "id",
		"`Laporan_MLK`.`program`" => "program",
		"FORMAT(`Laporan_MLK`.`peruntukan`, 2)" => "peruntukan",
		"`Laporan_MLK`.`bil_projek`" => "bil_projek",
		"`Laporan_MLK`.`bm`" => "bm",
		"`Laporan_MLK`.`Perolehan`" => "Perolehan",
		"`Laporan_MLK`.`dp`" => "dp",
		"`Laporan_MLK`.`sp`" => "sp",
		"`Laporan_MLK`.`link`" => "link",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = [];

	$x->QueryFrom = "`Laporan_MLK` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm['view'] == 0 ? 1 : 0);
	$x->AllowDelete = $perm['delete'];
	$x->AllowMassDelete = (getLoggedAdmin() !== false);
	$x->AllowInsert = $perm['insert'];
	$x->AllowUpdate = $perm['edit'];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = (getLoggedAdmin() !== false);
	$x->AllowSavingFilters = (getLoggedAdmin() !== false);
	$x->AllowSorting = (getLoggedAdmin() !== false);
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 0;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'Laporan_MLK_view.php';
	$x->RedirectAfterInsert = 'Laporan_MLK_view.php?SelectedID=#ID#';
	$x->TableTitle = 'KPLB MELAKA';
	$x->TableIcon = 'resources/table_icons/report_edit.png';
	$x->PrimaryKey = '`Laporan_MLK`.`id`';

	$x->ColWidth = [150, 150, 150, 150, 150, 150, 150, 150, 150, ];
	$x->ColCaption = ['ID', 'Program', 'Peruntukan Diluluskan', 'Bil Projek', 'Belum Mula', 'Perolehan', 'Dalam Perlaksanaan', 'Siap Perlaksanaan', 'Senarai', ];
	$x->ColFieldName = ['id', 'program', 'peruntukan', 'bil_projek', 'bm', 'Perolehan', 'dp', 'sp', 'link', ];
	$x->ColNumber  = [1, 2, 3, 4, 5, 6, 7, 8, 9, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/Laporan_MLK_templateTV.html';
	$x->SelectedTemplate = 'templates/Laporan_MLK_templateTVS.html';
	$x->TemplateDV = 'templates/Laporan_MLK_templateDV.html';
	$x->TemplateDVP = 'templates/Laporan_MLK_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: Laporan_MLK_init
	$render = true;
	if(function_exists('Laporan_MLK_init')) {
		$args = [];
		$render = Laporan_MLK_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// column sums
	if(strpos($x->HTML, '<!-- tv data below -->')) {
		// if printing multi-selection TV, calculate the sum only for the selected records
		if(isset($_REQUEST['Print_x']) && is_array($_REQUEST['record_selector'])) {
			$QueryWhere = '';
			foreach($_REQUEST['record_selector'] as $id) {   // get selected records
				if($id != '') $QueryWhere .= "'" . makeSafe($id) . "',";
			}
			if($QueryWhere != '') {
				$QueryWhere = 'where `Laporan_MLK`.`id` in ('.substr($QueryWhere, 0, -1).')';
			} else { // if no selected records, write the where clause to return an empty result
				$QueryWhere = 'where 1=0';
			}
		} else {
			$QueryWhere = $x->QueryWhere;
		}

		$sumQuery = "SELECT FORMAT(SUM(`Laporan_MLK`.`peruntukan`), 2), SUM(`Laporan_MLK`.`bil_projek`), SUM(`Laporan_MLK`.`bm`), SUM(`Laporan_MLK`.`Perolehan`), SUM(`Laporan_MLK`.`dp`), SUM(`Laporan_MLK`.`sp`) FROM {$x->QueryFrom} {$QueryWhere}";
		$res = sql($sumQuery, $eo);
		if($row = db_fetch_row($res)) {
			$sumRow = '<tr class="success sum">';
			if(!isset($_REQUEST['Print_x'])) $sumRow .= '<th class="text-center sum">&sum;</th>';
			$sumRow .= '<td class="Laporan_MLK-id sum"></td>';
			$sumRow .= '<td class="Laporan_MLK-program sum"></td>';
			$sumRow .= "<td class=\"Laporan_MLK-peruntukan text-center sum\">{$row[0]}</td>";
			$sumRow .= "<td class=\"Laporan_MLK-bil_projek text-center sum\">{$row[1]}</td>";
			$sumRow .= "<td class=\"Laporan_MLK-bm text-center sum\">{$row[2]}</td>";
			$sumRow .= "<td class=\"Laporan_MLK-Perolehan text-center sum\">{$row[3]}</td>";
			$sumRow .= "<td class=\"Laporan_MLK-dp text-center sum\">{$row[4]}</td>";
			$sumRow .= "<td class=\"Laporan_MLK-sp text-center sum\">{$row[5]}</td>";
			$sumRow .= '<td class="Laporan_MLK-link sum"></td>';
			$sumRow .= '</tr>';

			$x->HTML = str_replace('<!-- tv data below -->', '', $x->HTML);
			$x->HTML = str_replace('<!-- tv data above -->', $sumRow, $x->HTML);
		}
	}

	// hook: Laporan_MLK_header
	$headerCode = '';
	if(function_exists('Laporan_MLK_header')) {
		$args = [];
		$headerCode = Laporan_MLK_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once("{$currDir}/header.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/header.php");
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: Laporan_MLK_footer
	$footerCode = '';
	if(function_exists('Laporan_MLK_footer')) {
		$args = [];
		$footerCode = Laporan_MLK_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once("{$currDir}/footer.php"); 
	} else {
		ob_start();
		include_once("{$currDir}/footer.php");
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
