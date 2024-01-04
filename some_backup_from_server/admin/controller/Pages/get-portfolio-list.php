<?php
session_start();
require_once("../../config/header.php");
header('Content-type: application/json');

require_once("../../config/dbconnect.php");
require_once("../../config/env.php");

$base_url = $APP_ENV == 'live' ? $APP_URL : $TEST_URL;

$aColumns = array('site_name', 'site_link', 'language', 'category', 'image');
$sIndexColumn = "id";
$sTable = "portfolio";
/*
  * Paging
  */
$sLimit = "";
if (isset($_POST['start']) && $_POST['length'] != '-1') {
    $sLimit = "LIMIT " . intval($_POST['start']) . ", " . intval($_POST['length']);
}
/*
  * Ordering
  */
$sOrder = "";
if (isset($_POST['order'])) {
    $sOrder = "ORDER BY ";
    for ($i = 0; $i < intval(count($_POST['order'])); $i++) {
        if ($_POST['columns'][$_POST['order'][$i]['column']]['orderable'] == "true") {
            $sOrder .= "`" . $aColumns[intval($_POST['order'][$i]['column'])] . "` " .
                ($_POST['order'][$i]['dir'] === 'asc' ? 'asc' : 'desc') . ", ";
        }
    }
    $sOrder = substr_replace($sOrder, "", -2);
    if ($sOrder == "ORDER BY") {
        $sOrder = "";
    }
}
/*
  * Filtering
  * NOTE this does not match the built-in DataTables filtering which does it
  * word by word on any field. It's possible to do here, but concerned about efficiency
  * on very large tables, and MySQL's regex functionality is very limited
  */
$sWhere = 'WHERE 1 ';
if (!empty($_POST['searchValue1'])) {
    $condition1 = '';
    if (!empty($_POST['searchValue1'])) {
        $condition1 .= ' AND type = "' . $_POST['searchValue1'] . '"';
    }

    $sWhere .= $condition1;
}

if (isset($_POST['search']['value']) && $_POST['search']['value'] != "") {
    $sWhere .= " AND (";
    for ($i = 0; $i < count($aColumns); $i++) {
        $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . $_POST['search']['value'] . "%' OR ";
    }
    $sWhere = substr_replace($sWhere, "", -3);
    $sWhere .= ')';
}

/* Individual column filtering */
for ($i = 0; $i < count($aColumns); $i++) {
    if (isset($_POST['bSearchable_' . $i]) && $_POST['bSearchable_' . $i] == "true" && $_POST['sSearch_' . $i] != '') {
        if ($sWhere == "") {
            $sWhere = "WHERE ";
        } else {
            $sWhere .= " AND ";
        }
        $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . $_POST['sSearch_' . $i] . "%' ";
    }
}

/*
  * SQL queries
  * Get data to display
  */
$sQuery = "SELECT SQL_CALC_FOUND_ROWS * FROM   $sTable $sWhere $sOrder $sLimit";
// echo $sQuery;exit;
$rResult = $con->query($sQuery) or die(mysqli_error($con));

/* Data set length after filtering */
$sQuery1 = "SELECT FOUND_ROWS() as totalrow";
$result = $con->query($sQuery1) or die(mysqli_error($con));
$totalRecords = mysqli_num_rows($result);
// $iFilteredTotal = $aResultFilterTotal[0]->totalrow;
/* Total data set length */
$sQuery2 = "SELECT COUNT(`" . $sIndexColumn . "`) as countindex FROM $sTable $sWhere";
$aResultTotal = $con->query($sQuery2) or die(mysqli_error($con));
$iTotal = $aResultTotal->fetch_assoc();
$iTotal = $iTotal['countindex'];

/*
  * Output
  */
$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => $iTotal,
    "recordsFiltered" => $iTotal,
    "data" => array()
);
// echo "<pre>";
// print_r($output);
// exit;

while ($aRow = $rResult->fetch_assoc()) {

    $row = array();
    $query = "SELECT * FROM category WHERE id='" . $aRow['category'] . "'";
    $result = $con->query($query) or die("PortfolioList ERROR: " . mysqli_error($con));
    if (mysqli_num_rows($result) > 0) {
        $category_record = $result->fetch_assoc();
        $category_name = $category_record['name'];
    } else {
        $category_name = '';
    }

    if (!empty($aRow['image'])) {
        $image = $base_url . $aRow['image'];
    } else {
        $image = $base_url . 'assets/images/no-image.png';
    }

    $row[] = $aRow['site_name'];
    $row[] = '<a href="' . $aRow['site_link'] . '" target="_blank">'.$aRow['site_link'].'</a>';
    $row[] = $aRow['language'];
    $row[] = $category_name;
    $row[] = '<a href="' . $image . '" target="_blank"><img alt="customer" src="' . $image . '" height="60" width="80"></a>';
    $row[] = '<div class="dropdown">
    <button class="btn btn-link btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item editData" href="javascript:void(0)" data-id="' . $aRow['id'] . '">Edit</a>
      <a class="dropdown-item deleteData" href="javascript:void(0)" data-id="' . $aRow['id'] . '">Delete</a>
    </div>
  </div>';

    $output['data'][] = $row;
}

echo json_encode($output);
exit;
