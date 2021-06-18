<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation</title>
    <link rel="stylesheet" type="text/css" href="regestration.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">

</head>
<body>

<?php include 'header.php' ?>

<?php 

$login = false;
$showerror = false;

if($_SERVER["REQUEST_METHOD"]=="POST"){

 
  include'db_connect.php';
 
  $username=$_POST["username"];
  
  $password=$_POST["password"];
 
 
  

  

    $sql="select * from users where username='$username'and password='$password'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);

    if($num > 0){

      $login =  true;
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['id'] = $num['id'];
      $_SESSION['username']= $username;
      header("location:index.php");

      
    }
  
  else
  {
    

    $showerror = "please try again";
  
  }
}
  
?>
  <?php
  if($login)
{
echo'<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>You are logged in</p>
  <hr>
  
</div>';
}
if(!empty($showerror))
{
echo'<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Sorry!</h4>
  <p>Invalid login system</p>
  <hr>
  <p class="mb-0">Please try again.</p>
</div>';
}

   
    if($login)   
  {  
   if(!empty($_POST["remember"]))   
   {  
    setcookie ("member_login",$username,time()+ (10 * 365 * 24 * 60 * 60));  
    setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    $_SESSION["username"] = $username;
   }  
   else  
   {  
    if(isset($_COOKIE["member_login"]))   
    {  
     setcookie ("member_login","");  
    }  
    if(isset($_COOKIE["member_password"]))   
    {  
     setcookie ("member_password","");  
    }  
   }  
   header("location:index.php"); 
  }  
  





?>



  
  <h1 style="text-align:center">Login Here</h1>
  
  <form method="POST" action="" name="myform" >
    <fieldset>
    <legend align="center" style="font-size: 2.0em">Welcome to Login</legend>

   <table cellpadding="2" width="40%"  align="center"cellspacing="10">
    <tr id="username">
      <td><b>USERNAME</b></td>
      <td>
        <input type="text" id="username" name="username" size="30" style="border-radius: 6px;"  value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
        <b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="password">
      <td><b>PASSWORD</b></td>
      <td>
        <input type="text" id="password" name="password" size="30" style="border-radius: 6px;" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>">
        <b><span style="color: red;" class="formerror"></span></b>
      </td>

    </tr>

     <tr>
       <td>
         <div class="form-group">  
     <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />  
     <label for="remember-me">Remember me</label>  
    </div> 
        
       </td>
     </tr>
      
     

   
       <tr>
          <td></td>
          <td><input style="background-color: red;color: white;padding: 10px 50px; font-size: 16px; border-radius:15px; font-family: 'Ubuntu Mono', monospace; font-size:20px; " type="Submit" name="submit" value="Login"></td>
        </tr>

        

       
  </table>

  

       <div  align="center">

    
    <span class="psw" > <a style="text-decoration: none;" href="forgetpass.php"> <span style="color: #ff0000; padding: 5px 5px;">Forgot password?</span></a></span>
   </div>


        
    
</fieldset>
</form>
<br>



<?php include 'footer.php' ?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> 
</body>
</html>