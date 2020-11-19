<?php

//action.php

include('database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':title'  => $_POST['title'],
  ':student_id'  => $_POST['student_id'],
  ':file_name'  => $_POST['file_name'],
  ':marks'   => $_POST['marks'],
  ':sub_date'   => $_POST['sub_date'],
  ':review'   => $_POST['review'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE assignments
 SET title = :title, 
 student_id = :student_id, 
 file_name =:file_name,
 marks = :marks,
 sub_date = :sub_date,
 review = :review
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM assignments 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>
