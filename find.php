




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
 <style >
    .container{
      min-height: 70vh;
    }
  </style>

<body>

   <?php
   include'db_connect.php';
 ?>
 <?php
   include'header.php';
 ?>


  <div class="container my-3">

    <h1 class="text-center">Search results for "<?php echo $_GET['search']?>"</h1>

   <?php
     $noResult= true;
    $con=mysqli_connect("localhost","root","","myforum");
    $query= $_GET["search"];
    $sql= "SELECT * FROM `threads` WHERE match (title,description) against('$query')";
    $result=mysqli_query($con,$sql);
    
    while($row=mysqli_fetch_assoc($result))
    {
     
      $name = $row['title'];
      $dis = $row['description'];
      $id = $row['id'];
      $noResult=false;
     
      echo '<div class="result">

         <h3 class="py-2"><a href="threadlist.php?thread='.$id.'" class="text-dark">'.$name.'</a></h3>
         <p>'.$dis.'</p>
         </div>';
    }


   if($noResult){
  echo'<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-6">No result found</h1>
    <p class="lead"><b>type the valid keywords</b>.</p>
  </div>
</div>';
 }




   ?>


  <!--   <div class="result">

      <h3 class="py-2"><a href="/catagories/jjps" class="text-dark">other problem</a></h3>

  </div> -->


  </div>





   <?php

   include'footer.php';

   ?>

   

  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>