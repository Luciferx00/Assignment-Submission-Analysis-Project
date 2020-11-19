<?php

//fetch.php

include('database_connection.php');

$column = array("id", "title", "student_id", "file_name","marks","sub_date","review");

$query = "SELECT * FROM assignments ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE title LIKE "%'.$_POST["search"]["value"].'%" 
 OR student_id LIKE "%'.$_POST["search"]["value"].'%" 
 OR marks LIKE "%'.$_POST["search"]["value"].'%"
 OR file_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR sub_date LIKE "%'.$_POST["search"]["value"].'%" 
 OR review LIKE "%'.$_POST["search"]["value"].'%"  
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['title'];
 $sub_array[] = $row['student_id'];
 $sub_array[] = $row['file_name'];
 $sub_array[] = $row['marks'];
 $sub_array[] = $row['sub_date'];
 $sub_array[] = $row['review'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM assignments";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>

