<?php 
require 'inc_db.php';
$searchTerm = $_GET['term'];
$coDe = $_GET['code'];
  
    //get matched data from skills table
    $query = "SELECT * FROM staffs WHERE StaffName LIKE '%".$searchTerm."%' OR StaffCode LIKE '%".$searchTerm."%' ORDER BY StaffName ASC";
   $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        $data1[] = $row['StaffCode']."  ". $row['StaffName'] ;
        
    }
    
   //return json data
echo json_encode($data1);
?>
