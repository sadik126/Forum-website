<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>My forum</title>
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

    <h1>Search results for <?php echo $_GET['search']?></h1>

   <?php
    
    $con=mysqli_connect("localhost","root","","myforum");
    $query= $_GET["search"];
    $sql= "SELECT * FROM threads WHERE match (title,description) against('$query')";
    $result=mysqli_query($con,$sql);
    
    while($row=mysqli_fetch_assoc($result))
    {
      
      $name = $row['title'];
      $dis = $row['description'];
     
      echo '<div class="result">

         <h3 class="py-2"><a href="/catagories/jjps" class="text-dark">other problem</a></h3>

         </div>';
    }

   ?>
  <!--   <div class="result">

      <h3 class="py-2"><a href="/catagories/jjps" class="text-dark">other problem</a></h3>

  </div> -->


  </div>
   
    
 
 


    <!-- use loop for categories -->
 

  
   <?php

   include'footer.php';

   ?>

   

  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>