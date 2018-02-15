<?php
require 'inc_db.php'; 
$codeInt = $_POST["codeInt"];
$staff = $_POST["staff"];
$sec = $_POST["sec"];
$staffcode = $_POST["staffcode"];

$sql = " INSERT INTO kuse_course_sections(CourseCode,SectionNo,CreateBy,UpdateBy,StaffCode) ";
$sql.= " VALUES ('".$codeInt."','".$sec."','".$staff."','".$staff."','".$staffcode."')";  
//print($sql);
 if(mysql_query($sql))  
 {  
      echo 'เพิ่มข้อมูลสำเร็จ';  
 }
?>