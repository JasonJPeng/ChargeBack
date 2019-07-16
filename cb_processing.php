<?php
session_start();
$arrPost = $_SESSION["POST"];
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nexxgate";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//  $searchTerms = [
//      "first_6" => "",
//      "last_4"  => "",
//      "final_amount"  => "",
//      "orderid" => "",
//      "id"      => "" 
//  ];

$tableName = "transactions";
 
// The sequence is important
// datatable header 
 $selectColumns = [
    "created", "id", "mid", "orderid", "cardfullname", "amount", "final_amount", "first_6", "last_4"
 ];    

// SQL: SELECT FROM 

$strSelect = join(", ", $selectColumns);
 $searchTerms = [];
 
 foreach($arrPost as $key=>$value) {
     $term = trim($value, " ");
     if ($term) {
         if (substr($key, 0, 6) === "_LIKE_") {
             array_push($searchTerms, substr($key, 6) . " LIKE " . " '%$term%' " );
         } else {
           array_push($searchTerms, $key . " = " . $term );
         }
     } 
 }
//  print_r($searchTerms);
 $strWhere = join(" and ", $searchTerms); 
 $strSql = "select $strSelect from $tableName where $strWhere";
 $result = $conn->query($strSql);
 
 $arrObjs = [];
 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
        $obj = []; 
        foreach ($selectColumns as $value) {
           array_push($obj, $row[$value]);
        }
        array_push($arrObjs, $obj); 
     }
 } else {
    //  $arrObjs = [];
 }

 $outObj = [
    "draw" => 1,
    "recordsTotal" => sizeof($arrObjs),
    "recordsFiltered" => sizeof($arrObjs),
    "data" => $arrObjs
 ];

 echo json_encode($outObj);

$conn->close();

?>
 


 








