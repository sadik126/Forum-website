




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
   $id=$_GET['catagory'];

   $showAlert=false;

   $method=$_SERVER['REQUEST_METHOD'];
   if($method=='POST'){
    //INSERT INTO DATABASE

    $th_title=$_POST['title'];
    $th_desc=$_POST['desc'];

    $th_title = str_replace("<", "&lt;", $th_title);
    $th_title = str_replace(">", "&gt;", $th_title);

    $th_desc = str_replace("<", "&lt;", $th_desc);
    $th_desc = str_replace(">", "&gt;", $th_desc);

    $sno=$_POST['id'];

    $sql= "INSERT INTO `threads` ( `title`, `description`, `user`, `cat_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$sno', '$id', current_timestamp())";
    $result=mysqli_query($con,$sql);
    $showAlert=true;
    if($showAlert)
    {
      echo '<div class="alert alert-success" role="alert">
  Successfully added your question. please wait for other response.
</div>';
    }
   }

   ?>


   <?php

    $id=$_GET['catagory'];

    
    $con=mysqli_connect("localhost","root","","myforum");
    $sql= "SELECT * FROM `categories` WHERE id = '$id' ";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result))
    {

      $name = $row['name'];
      $dis = $row['discription'];

    }
   ?>

   <!-- slider -->
   



<!--  category container starts  -->
    <div class="container my-4">

      <div class="jumbotron">
          <h1 class="display-4"> Welcome to <?php echo $name ; ?>!</h1>
          <p class="lead"><?php echo $dis ; ?></p>
          <hr class="my-4">
          <p>No Spam / Advertising / Self-promote in the forums. ...
             Do not post copyright-infringing material. ...
             Do not post ???offensive??? posts, links or images. ...
             Do not cross post questions. ...
             Do not PM users asking for help. ...
             Remain respectful of other members at all times.
           </p>
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
          </p>
      </div>
      
   </div>
   
  
   <?php 
     $loggedin = " ";
    if(!empty($_SESSION['loggedin']) && $_SESSION['loggedin']== true ){
     
     echo ' <div class="container">
      
      <h1 class="py-2" id="ques">Ask a Question</h1>

      <form action='. $_SERVER["REQUEST_URI"].' method="post">
      <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" required="1" class="form-control" id="title" name="title" aria-describedby="emailHelp">
      <small id="emailHelp" class="form-text text-muted">Make a short title.</small>
      </div>

      <div class="form-group">
      <label for="exampleFormControlTextarea1">describe your problem</label>
      <textarea class="form-control" required="1" id="desc" name="desc" rows="3"></textarea>
      <input type="hidden" name="id" id="id" value="'. $_SESSION['username'] .'">
      </div>
      <button type="submit" class="btn btn-dark">Submit</button>
      </form>
    
      </div>';

     }
      else

      {
       echo '<div class="container">
        <h1 class="py-2" id="ques">Ask a Question</h1>
        <p class="lead"> You are not logged in.please login to start your question</p>
        </div>';
      }

?>



    <div class="container mb-5">

      <h1 class="py-2" id="ques">Browse Question</h1>

    <?php

    $id=$_GET['catagory'];
    //$id = isset($_GET['id']) ? $_GET['id'] : '';
    
    $con=mysqli_connect("localhost","root","","myforum");
    $sql= "SELECT * FROM `threads` WHERE cat_id = '$id'";
    $result=mysqli_query($con,$sql);
    $noResult = true;
    while($row=mysqli_fetch_assoc($result))
    {
      $noResult = false;
      $title = $row['title'];
      $desc = $row['description'];
      $id = $row['id'];
      $time = $row['timestamp'];
      $user = $row['user'];
      $sql2 = "SELECT username FROM `users` WHERE id='$user'";
      $result2=mysqli_query($con,$sql2);
      $row2 =mysqli_fetch_assoc($result2);


   

     echo '<div class="media my-3">
      <img class="mr-3" src="img/user.png" width="54px;" alt="Generic placeholder image">
      <div class="media-body">
      <P class="font-weight-bold my-0"> Asked by '.$row['user'].' at '.$time.'</p>
      <h5 class="mt-0"><a href="threadlist.php?thread='.$id.'" style="text-decoration:none;color:red;">'.$title.'</a></h5>
       '.$desc.'
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

 
   