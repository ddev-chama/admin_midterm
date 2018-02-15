<?php
require 'inc_db.php'; 
$CourseSectionID = $_GET["id"];
// DELETE FROM kuse_course_sections where CourseSectionID = ""
$sql = " DELETE FROM kuse_course_sections where CourseSectionID = '$CourseSectionID' ";
//print($sql);
 if(mysql_query($sql))  
 {  
      echo 'ลบข้อมูลสำเร็จ';  
      header("Location:admin_addstaffcode.php");
 }

?>