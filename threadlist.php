 
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
   include'header.php';
   
   ?>

   <?php
   include'db_connect.php';
   ?>

   

 <?php
//    $id=$_GET['thread'];

//    $showAlert=false;

//    $method=$_SERVER['REQUEST_METHOD'];
//    if($method=='POST'){
//     //INSERT INTO DATABASE

//     $th_title=$_POST['title'];
//     $th_desc=$_POST['desc'];

//     $sql= "INSERT INTO `threads` ( `title`, `description`, `user`, `cat_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '0', '$id', current_timestamp())";
//     $result=mysqli_query($con,$sql);
//     $showAlert=true;
//     if($showAlert)
//     {
//       echo '<div class="alert alert-success" role="alert">
//   Successfully added your question. please wait for other response.
// </div>';
//     }
//    }

   ?> 
 




    <?php

    $id=$_GET['thread'];
    
    $con=mysqli_connect("localhost","root","","myforum");
    $sql= "SELECT * FROM `threads` WHERE id = '$id' ";
    $result=mysqli_query($con,$sql);
    $noResult = true;
    while($row=mysqli_fetch_assoc($result))
    {
      $noResult = false;
      $name = $row['title'];
      $dis = $row['description'];

    }

     if($noResult){
  echo'<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-6">No result found</h1>
    <p class="lead"><b>Be the first person to ask questions</b>.</p>
  </div>
</div>';
 }
   ?>



       <?php
    $id=$_GET['thread'];

   $showAlert=false;

   $method=$_SERVER['REQUEST_METHOD'];
   if($method=='POST'){
    //INSERT INTO comment DATABASE

    $comment=$_POST['comment'];
    //$th_desc=$_POST['desc'];

    $sql= "INSERT INTO `comments` ( `content`, `comment_by`, `thread_id`, `comment_time`) VALUES ( '$comment', '0', '$id', current_timestamp());";
    $result=mysqli_query($con,$sql);
    $showAlert=true;
    if($showAlert)
    {
      echo '<div class="alert alert-success" role="alert">
  Successfully added your comment.
</div>';
    }
   }

   ?>






  




















    <!--  <?php
//    $id=$_GET['thread'];

//    $showAlert=false;

//    $method=$_SERVER['REQUEST_METHOD'];
//    if($method=='POST'){
//     //INSERT INTO DATABASE

//     $th_title=$_POST['title'];
//     $th_desc=$_POST['desc'];

//     $sql= "INSERT INTO `threads` ( `title`, `description`, `user`, `cat_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '0', '$id', current_timestamp())";
//     $result=mysqli_query($con,$sql);
//     $showAlert=true;
//     if($showAlert)
//     {
//       echo '<div class="alert alert-success" role="alert">
//   Successfully added your question. please wait for other response.
// </div>';
//     }
//    }

   ?> -->

   <!-- slider -->
   



<!--  category container starts  -->
    <div class="container my-4">

      <div class="jumbotron">
          <h1 class="display-4">  <?php echo $name ; ?>!</h1>
          <!-- <p class="lead"><?php echo $dis ; ?></p> -->
          <hr class="my-4">
          <p>No Spam / Advertising / Self-promote in the forums. ...
             Do not post copyright-infringing material. ...
             Do not post “offensive” posts, links or images. ...
             Do not cross post questions. ...
             Do not PM users asking for help. ...
             Remain respectful of other members at all times.
           </p>
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
          </p>
      </div>
     
   </div>





   <div class="container">
      
      <h1 class="py-2" id="comment">Post a comment</h1>

<form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
  

    <div class="form-group">
    <label for="exampleFormControlTextarea1">Type your comment</label>
    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-warning">Post comment</button>
</form>
    
</div>

  



<div class="container">

      <h1 class="py-2" id="comment">Comments</h1>

       <?php

    $id=$_GET['thread'];
    
    $con=mysqli_connect("localhost","root","","myforum");
    $sql= "SELECT * FROM `comments` WHERE thread_id = '$id' ";
    $result=mysqli_query($con,$sql);
    $noResult = true;
    while($row=mysqli_fetch_assoc($result))
    {
      $noResult = false;
      $thread = $row['thread_id'];
      $content = $row['content'];
      $id = $row['id'];
      $time = $row['comment_time'];

   

     echo '<div class="media my-3">
      <img class="mr-3" src="img/user.png" width="54px;" alt="Generic placeholder image">
      <div class="media-body">
      <p class="font-weight-bold my-0">Sadik at '.$time.'</p>
       '.$content.'
     </div>';

 }

 //echo var_dump($noResult);
 if($noResult){
  echo'<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-6">No result found</h1>
    <p class="lead"><b>Be the first person to ask questions</b>.</p>
  </div>
</div>';
 }
   ?>

   

  

      
    </div>


  
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