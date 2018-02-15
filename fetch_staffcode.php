<?php

//fetch.php
require 'inc_db.php';
$output = '';
if(!empty($_POST["query"]))
{
 $search = mysql_real_escape_string( $_POST["query"]);
 $query = "
  SELECT  st.StaffCode,st.StaffName, c.CourseCode, c.CourseName,s.SectionNo,s.CourseSectionID
  FROM kuse_course_sections s
  INNER JOIN kuse_courses c ON s.CourseCode = c.CourseCode
  INNER JOIN staffs st ON s.StaffCode = st.StaffCode
  WHERE c.CourseCode LIKE '%".$search."%'
  OR c.CourseName LIKE '%".$search."%'
  OR s.StaffCode  LIKE '%".$search."%'
  OR st.StaffName  LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT  st.StaffCode,st.StaffName, c.CourseCode, c.CourseName,s.SectionNo
  FROM kuse_course_sections s
  INNER JOIN kuse_courses c ON s.CourseCode = c.CourseCode
  INNER JOIN staffs st ON s.StaffCode = st.StaffCode
  order by c.CourseName ASC 
 ";
}
$result = mysql_query($query);
//print($query);
if(mysql_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>รหัสวิชา</th>
     <th>ชื่อวิชา</th>
     <th>หมู่เรียน</th>
     <th>ผู้ดูแลวิชา</th>
    </tr>
 ';
 while($row = mysql_fetch_array($result))
 {
  if (!isset($row["SectionNo"])) {
      $row["SectionNo"] = '';
    }
  $output .= '
   <tr>
    <td>'.$row["CourseCode"].'</td>
    <td>'.$row["CourseName"].'</td>
    <td>'.$row["SectionNo"].'</td>
    <td class="StaffName" name="'.$row["StaffCode"].'" data-id1="'.$row["StaffCode"].'" >'.$row["StaffName"].'</td>
    <td><a href="delete_addstaffcode.php?id='.$row["CourseSectionID"].'"><button type="button" class="btn delete btn-danger">ลบ</button></a></td>
   </tr>
  '
  ;
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
?>

<script>
// auto complete
  $(".StaffName").autocomplete( {
     source: "auto_staffname.php"
});


//delete-button
$(".delete").click(function() {
  var check = confirm("ต้องการลบข้อมูลหรือไม่?");
  if(check == false){return false;}

});
//End
</script>