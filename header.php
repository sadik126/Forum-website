<?php
session_start();

?>






<?php

echo  '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color: red; font-size: 30px;"><b>AGRI FORUM</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="contact.php" tabindex="-1" >Contact</a>
        </li>
      </ul>



      
      ';
      if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){

        echo' 

        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <p class="text-light my-0 mx-2">welcome  '.$_SESSION['username'].'</p>

        <button class="btn btn-outline-light ml-2" type="submit" ><a href="logout.php" style="color:cyan;text-decoration:none">Log out</a></button>
        </form>

        ';
       



        


}

else{


       echo' 

       <form class="form-inline my-3 my-lg-0">



        
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>


   
      
        <button class="btn btn-outline-danger mx-2 " type="submit"><a href="loginmodal.php" style="color:#ffcccb;text-decoration:none">Login</button>
        <button class="btn btn-outline-primary my-2 mx-3 " type="submit" ><a href="signupmodal.php" style="color:cyan;text-decoration:none">Sign up</a></button>
        </form>
        ';
          }
        
    



    echo'  
    </div>
  </div>
</nav>
';

//include 'loginmodal.php' ;
//include 'signupmodal.php' ;
?>
<!--  -->
<!-- <div class="row mx-0"> -->
  