<?php
   session_start();
    $cur_page="Contact Us"; 
     include_once("../includes/layouts/header.php");
     require_once("../includes/functions.php");
      $connection=connectDB();
     checkConnectivity();
 ?>
<div id="body">
  <div id="left_main">
  <br/>
    <?php echo navigation()?>

  </div>
  <div id="center_main">
   <h2 style="padding-left:350px; font-size:32px">  About Us </h2>
   <p style="padding-left:50px; font-size:22px;">This is a project titled Assignment Submission Analysis.<br>
   This project is successfully developed by Apurva Kumar Gupta(1CR18CS028) and Ankur Tikoo(1CR18CS024)of 5th sem 
   from the department of Computer Science and Engineering,CMRIT
   under the watchful guidance of <br>Mrs Poonam V Tijare (Assistant Professor CSE,CMRIT).<p>
    </div>
    <div id="right_main">
      <?php right_main(); ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
