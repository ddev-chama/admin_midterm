<?php 
require 'inc_db.php';
$searchTerm = $_POST["code"];
    
    //get matched data from skills table
    $query = "SELECT * FROM kuse_courses WHERE CourseCode = ".$searchTerm." ";
   $result = mysql_query($query);
    while ($row = mysql_fetch_array($result)) {
        $data[] = $row['CourseName'];
    }
    
    //return json data
    echo json_encode($data);
?>