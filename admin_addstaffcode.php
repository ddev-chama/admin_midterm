<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>kuse-admin</title>
 <script src="js/jquery.min.js"></script>
      <link rel="stylesheet" href="css/jquery-ui.css">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <link href="css/bootstrap.min.css" rel="stylesheet" />  
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">จัดการผู้ดูแลหมู่เรียน</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="รหัสวิชา ชื่อวิชา หมู่เรียน ผู้ดูแลวิชา" class="form-control" />
    </div><br>
    <div class="selector"><a href="#"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">เพิ่มหมู่เรียน</button></a></div>
   </div>
   <div id="process_data"></div>
   <br>
   <div id="result"></div>
    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="header-modal">Modal Header</h4>
        </div>
          <!--Show result Form Data-->
          <div class="modal-body" id="ResultModal"></div>
        
      </div>
      
    </div>
  </div>
  </div>
 </body>
</html>

<script>

$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch_staffcode.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
    
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
 

 function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"update_staffcode.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  

                    $('#process_data').html(data).show().fadeOut(1900);  
                }  
           });  
      }
      //old
      $(document).on('blur', '.StaffName', function(){  
           var id = $(this).data("id1");  
           var StaffName = $(this).text();  
           edit_data(id,StaffName, "StaffName");  
           console.log(StaffName);
      });    
});
      //new
        $(document).on('dblclick', '.StaffName', function() {
          $(this).attr('contentEditable',true);
          $(this).attr('style',  'background-color:#FCFFA9');
          //console.log(this.id);
        });
        $(document).on('focusout', '.StaffName', function() {
          $(this).attr('contentEditable',false);
          $(this).attr('style',  'background-color:#FFFFFF');
        });

  $(".selector").click(function() {
      $("#ResultModal").load("form_addstaffcode.php");
      $('#header-modal').text('เพิ่มหมู่เรียน');
  });
</script>
