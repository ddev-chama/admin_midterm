<?php 
session_start();
require("inc_db.php");
if($_SESSION["UserName"]==""){
	header( "location: index.html");
	exit(0);
}
$StaffCode=$_SESSION["UserName"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<table>
		<tr>
			<td colspan="2">ผู้ดูแลวิชา</td>
			<td>&#160;</td>
      <td><input type="text" size="55" name="StaffName" id="StaffName"></td>
		</tr>
	<tr>
		<td colspan="2">รหัสวิชา</td>
		<td>&#160;</td>
    <td><input type="text" size="55" name="CourseCode" id="CourseCode"></td>
	</tr>
	<tr>
		<td colspan="2">หมู่</td>
		<td>&#160;</td>
    <td><input type="text" size="55" name="SectionNo" id="SectionNo"></td>
	</tr>
	<tr hidden>
		<td><input type="text" size="55" name="StaffCode" id="StaffCode" value="<?php print($StaffCode)?>"></td>
		<td><input type="text" size="55" name="code" id="code" value=""></td>
	</tr>
	<tr>
		<td align="center"></td>
	</tr>

</table>
<br>
<div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
          <input type="submit"  id="btn_submit" class="btn btn-success" data="modal" value="บันทึก">
        </div>
</body>
</html>
<script>
//TOGGLE FORM
$("#StaffName").focusout(function() {
  var name = $("#StaffName").val();
  $.ajax({
  	url: 'auto_staffcode.php',
  	type: 'POST',
  	data: {name:name},
  	success:function(data) {
  		$('input#code').val(data);
  		//console.log(data);
  	}
  })
});
//SUBMIT FORM	
$("#btn_submit").click(function() {
  var code = $("#CourseCode").val();
  var codeInt = code.substring(0,8);
  var name = $('#StaffName').val();
  var sec = $("#SectionNo").val();
  var staff = $("#StaffCode").val();
  var staffcode = name.substring(0,6);
  $.ajax({
    url: 'insert_addstaffcode.php',
    type: 'POST',
    data: {codeInt:codeInt,sec:sec,staff:staff,staffcode:staffcode},
    success:function(data){
		alert(data);
    	 location.reload();
    }
  })  
});

$("#CourseCode").autocomplete( {
     source: 'auto_id.php'
});
$("#StaffName").autocomplete( {
     source: 'auto_staffname.php'
});

</script>
