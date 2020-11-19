<?php

//select.php

include('database_connection.php');

$query = "SELECT id,title,student_id,file_name,marks,sub_date,review FROM assignments ORDER BY title";

$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }

 echo json_encode($data);
}

?>