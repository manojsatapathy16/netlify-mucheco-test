<?php
session_start();
require_once("../../config/header.php");
header('Content-type: application/json');

require_once("../../config/dbconnect.php");
require_once("../../config/env.php");

$base_url = $APP_ENV == 'live' ? $APP_URL : $TEST_URL;

$aColumns = array('site_name', 'site_work', 'description', 'requirements', 'challenges', 'solutions', 'result');
$sIndexColumn = "id";
$sTable = "casestudy_table";
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
// echo "<pre>";print_r($output);exit;

while ($aRow = $rResult->fetch_assoc()) {

  $row = array();

  $card_image = !empty($aRow['card_image']) ? $base_url . $aRow['card_image'] : '';
  $banner_image = !empty($aRow['banner_image']) ? $base_url . $aRow['banner_image'] : '';
  $result_image = json_decode($aRow['result_image']);
  $result_images = !empty($result_image) ? '<button class="btn btn-link editResultImage" data-id="' . $aRow['id'] . '">' . count($result_image) . '</button>' : '-N/A-';

  $row[] = $aRow['site_name'];
  $row[] = $aRow['site_work'];
  $row[] = (strlen($aRow['description']) > 50) ? substr($aRow['description'], 0, 50) . '...' : $aRow['description'];
  $row[] = (strlen($aRow['requirements']) > 50) ? substr($aRow['requirements'], 0, 50) . '...' : $aRow['requirements'];
  $row[] = (strlen($aRow['challenges']) > 50) ? substr($aRow['challenges'], 0, 50) . '...' : $aRow['challenges'];
  $row[] = (strlen($aRow['solutions']) > 50) ? substr($aRow['solutions'], 0, 50) . '...' : $aRow['solutions'];
  $row[] = (strlen($aRow['result']) > 50) ? substr($aRow['result'], 0, 50) . '...' : $aRow['result'];
  $row[] = '<a href="' . $card_image . '" target="_blank"><img alt="card image" src="' . $card_image . '" height="60" width="80"></a>';
  $row[] = '<a href="' . $banner_image . '" target="_blank"><img alt="banner image" src="' . $banner_image . '" height="60" width="120"></a>';
  $row[] = $result_images;
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
