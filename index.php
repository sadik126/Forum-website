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
  <body>
    
   <?php
   include'db_connect.php';
   ?>
   <?php
   include'header.php';
   ?>

   

   <!-- slider -->
   <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.unsplash.com/photo-1563201515-adbe35c669c5?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTN8fGFncmljdWx0dXJlfGVufDB8fDB8&ixlib=rb-1.2.1&w=1000&q=80/240x70" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://images.unsplash.com/photo-1586771107445-d3ca888129ff?ixid=MXwxMjA3fDB8MHxzZWFyY2h8M3x8YWdyaWN1bHR1cmV8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&w=1000&q=80/240x70" class="d-block w-100" alt="...">
    </div>


    <div class="carousel-item">
      <img src="https://www.acdivoca.org/wp-content/uploads/2019/08/Agriculture-Bangladesh.jpg/240x70" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



<!--  category container starts  -->
    <div class="container my-4">

    <h3 class="text-center my-4">Welcome to AGRI FORUM catagories</h3>

   <div class="row my-4">  

   <!-- fetch all categories -->
    <?php
    $con=mysqli_connect("localhost","root","","myforum");
    $sql= "SELECT * FROM `categories` LIMIT 3";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result))
    {

    $cat=$row['name'];
    $dis=$row['discription'];
    $img=$row['image'];
    $id=$row['id'];

    echo '<div class="col-md-4 my-2">

      <div class="card " style="width: 18rem;">
  <img src = "'.$img.'" class="card-img-top" alt="...">
  <div class="card-body">
    <h4 class="card-title"><a href="threads.php?catagory='.$id.'" style="text-decoration:none;color:red;">'.$cat.'</a></h4>
    <p class="card-text">'.substr($dis,0,90).'...</p>
    <a href="threads.php?catagory='.$id.'" class="btn btn-success" >Get this item</a>
  </div>
</div>
      
    </div>';

}
?>
     
   </div>
     
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