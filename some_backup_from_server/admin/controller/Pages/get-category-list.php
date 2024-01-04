<?php
session_start();
require_once("../../config/header.php");
header('Content-type: application/json');

require_once("../../config/dbconnect.php");
require_once("../../config/env.php");

$base_url = $APP_ENV == 'live' ? $APP_URL : $TEST_URL;

$aColumns = array('name');
$sIndexColumn = "id";
$sTable = "category";
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

  $row[] = $aRow['name'];
  $row[] = '<i class="far fa-edit btn btn-info btn-sm editData" data-id="' . $aRow['id'] . '"></i> | <i class="fas fa-trash-alt btn btn-danger btn-sm deleteData" data-id="' . $aRow['id'] . '"></i>';
  // $row[] = '<div class="dropdown">
  //   <button class="btn btn-link btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  //   Action
  //   </button>
  //   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  //     <a class="dropdown-item editData" href="javascript:void(0)" data-id="' . $aRow['id'] . '">Edit</a>
  //     <a class="dropdown-item deleteData" href="javascript:void(0)" data-id="' . $aRow['id'] . '">Delete</a>
  //   </div>
  // </div>';
  $output['data'][] = $row;
}

echo json_encode($output);
exit;
