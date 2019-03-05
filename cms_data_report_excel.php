<?php
ob_end_clean();
//header("Content-Type: text/html; charset=utf-8");
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");    
header("Content-Disposition: attachment; filename=Active Customer Detail.xls");  
header("Pragma: no-cache");
header("Expires: 0");

include 'db/dbconnect.php';
//require_once 'Excel/reader.php';

/*************     ******************/
// excel date value is MS Excel timestamp
// for windows version
// $unixTimestamp = ($excelTimestamp - 25569) * 86400;

// for mac version
// $unixTimestamp = ($excelTimestamp - 24107) * 86400;

// echo date('d-M-Y', $unixTimestamp);
/*************     ******************/

// assign row 1 header


echo "Customer ID\tCustomer Name\tEmail Address\tAddress\tPhone Number\n";
$queryac = "SELECT DISTINCT tborder.uid, tbuser.* FROM TBORDER JOIN TBUSER ON tbuser.id = tborder.uid WHERE tborder.odate >= DATE_ADD(NOW(), INTERVAL -3 MONTH)";
$resultac = mysqli_query($connect, $queryac);

while($rowac = mysqli_fetch_array($resultac)){
  echo  $rowac['id'];
  echo "\t";
  echo  $rowac['uname'];
  echo "\t";
  echo  $rowac['uemail'];
  echo "\t";
  echo  $rowac['uaddress'];
  echo "\t";
  echo  $rowac['uphone'];
  echo "\t\n";
}

echo "\n";

?>