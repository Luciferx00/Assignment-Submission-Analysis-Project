<?php
   session_start();//at the starting of every page to tell open session file populate session super global with the values stored in it
     $cur_page="Add Assignment";
     include_once("../includes/layouts/header.php");
     require_once("../includes/functions.php");
?>
 <?php 
 check_login();
 $connection=connectDB();
  checkConnectivity();
  ?>
  <?php
   if(isset($_POST['post_submit'])){
      $errors=array();
      if(isset($_POST['post_title']))//valiasting title
      is_valid($_POST['post_title'],'Post Title');
      if(isset($_POST['due_date']))//validating content 
      is_valid($_POST['due_date'],'Due Date');
       if(isset($_POST['post_content']))//validating content 
      is_valid($_POST['post_content'],'Post Content');

      if(empty($errors))
      {
         $error_flag=false;
         $query=" INSERT INTO posts (poster_id,post_title,poster_designation,post_content,assign_flag,due_date,file_name) ";
         $poster_id=$_SESSION['id'];
         $poster_designation=$_SESSION['designation'];
         $title=$_POST['post_title'];
         $due_date=$_POST['due_date'];
         $content=nl2br($_POST['post_content']);
         $file_name=$_POST['pdfFile'];
         $query.= "values ($poster_id,'$title','$poster_designation','$content',1,'$due_date','$file_name') ";
         $post_query_result=mysqli_query($connection,$query);
      }
      else
        $error_flag=true;
}
#code for tackling file upload
if(isset($_POST['post_submit']))//if upload is clicked
{
  if(isset($_FILES['file']['name']))
  {
    $file_name=$_FILES['file']['name'];
    $_POST['file_name']=$file_name;
    $file_temp_location_name=$_FILES['file']['tmp_name'];
    if(move_uploaded_file($file_temp_location_name, 'uploads/'.$file_name)){
      redirect_to('add_assignment.php?page_id='.$_GET['page_id'].'&submission=1');
     }
    else{
        redirect_to('add_assignment.php?page_id='.$_GET['page_id'].'&submission=0');  
    }
  }
}

  ?>
  <style type="text/css">
   span{
    font-style: italic;
    font-family: sans-serif;
    font-weight: bold;
    text-decoration: underline;
   }
   
  </style>
<div id="body">
 <div id="left_main"> <?php  navigation(); ?></div>
 <div id="center_main">
     <?php
    if(isset($_POST['post_submit'])){//we have to do this if submission is done 
     if($error_flag==true)
    {
      echo "<div id=\"validation_errors\" style='color:blue'>";
      echo "<ul>";
      echo"<h2>Please follow these rules for entries</h2>";
      foreach($errors as $value)
      {
       echo "<li>$value</li>"; 
      }
      echo "</ul>";
      echo "</div>";
   new_assignment_form();
    }
    else
    {
     confirm_query($post_query_result);//doing in center main because it prints
     redirect_to("home.php?assignment=1");
     }
   }
 else{//if no submission simple
    new_assignment_form();
  }
  
 ?>
    
</div>


   </div>
 <div id="right_main" >   
   <?php
      show_recent_posts();
   ?>
   <?php echo_space(25);?><a href="posts.php?page_id=1" style="color:burlywood ;font-size:20px">show all</a>
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
