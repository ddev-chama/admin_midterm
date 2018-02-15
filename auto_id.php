<?php 
require 'inc_db.php';
$searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = "SELECT * FROM kuse_courses WHERE CourseCode LIKE '%".$searchTerm."%' ORDER BY CourseCode ASC";
   $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        $data[] = $row['CourseCode']."  ".$row['CourseName'];
    }
    
    //return json data
    echo json_encode($data);
?>