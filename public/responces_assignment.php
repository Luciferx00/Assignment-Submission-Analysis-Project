<html>
 <head>
  <title>Submitted Assignment</title>
  <link rel="icon" type="image/png" href="images/icon.png" sizes="32x32">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
 </head>
 <body style=" background:  #EEE4B9;">
 <h3 style="font-size:30px;"><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 <u>Students Assignments</b></u></h3>
  <div class="container" >
   <br />
   <button style="text-decoration:none; font-size:18px; border-radius:5px; position:absolute; left:80%;" ><a href="export.php?export=true">Export to Excel</a></button>
   <br><br>
   <div class="panel panel-danger class">
    <div class="panel-heading">Student Assignments</div>
    <div class="panel-body">
     <div class="table-responsive" >
      <table id="sample_data" class="table table-bordered table-striped ">
       <thead>
        <tr>
         <th>ID</th>
         <th>Tile</th>
         <th>Student ID</th>
         <th>File Name</th>
         <th>Marks</th>
         <th>Sub Date</th>
         <th>Review</th>
        </tr>
       </thead>
       <tbody></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
  <br />
  <button style="text-decoration:none; font-size:18px; border-radius:5px; position:absolute; left:45%;"><a href="home.php">Back to Home</a></button>
 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

 var dataTable = $('#sample_data').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"fetch.php",
   type:"POST"
  }
 });

 $('#sample_data').on('draw.dt', function(){
  $('#sample_data').Tabledit({
   url:'action.php',
   dataType:'json',
   columns:{
    identifier : [0, 'id'],
    editable:[[1, 'title'], [2, 'student_id'], [3,'file_name'], [4, 'marks', '{"10":"10","9":"9","8":"8","7":"7","6":"6","5":"5","0":"0"}'],[5,'sub_date'],[6,'review']]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.id).remove();
     $('#sample_data').DataTable().ajax.reload();
    }
   }
  });
 });
  
}); 
</script>

