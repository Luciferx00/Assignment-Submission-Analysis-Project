<?php

//multiple_update.php

include('database_connection.php');

if(isset($_POST['hidden_id']))
{
 $marks = $_POST['marks'];
 $review = $_POST['review'];
 $id = $_POST['hidden_id'];
 for($count = 0; $count < count($id); $count++)
 {
  $data = array(
   ':marks' => $marks[$count],
   ':review'   => $review[$count],
   ':id'   => $id[$count]

  );
  $query = "
  UPDATE assignments 
  SET marks = :marks,review =:review 
  WHERE id = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>
