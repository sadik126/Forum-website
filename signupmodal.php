
<!DOCTYPE html>
<html>
<head>
  <title>sign up</title>
  
  
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
  
</head>
<body>
<?php include 'header.php' ?>

 <?php 

if($_SERVER["REQUEST_METHOD"]=="POST")
{

 
  include'db_connect.php';
  $name=$_POST["name"];
  $email=$_POST["email"];
  $username=$_POST["username"];
  $dateofbirth=$_POST["date"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  
  $gender=$_POST["gender"];
  
  $showAlert =false;
  $showerror = false;
   $showerror1 = false;
   



  $existSql = "select * from users where username = '$username'";

  $result = mysqli_query($con,$existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0){
    $showerror1= true;
  }
  else{
  

   if(($password==$cpassword) )
  {

    $sql="insert into users(name,email,username,dateofbirth,password,gender) value ('$name','$email','$username','$dateofbirth','$password','$gender')";
    $result = mysqli_query($con,$sql);

    if($result)
    {
      $showAlert =  true;
      
    }
  }
  else
  {
    $showerror = true;
  

    }

  }

}
  


  
?>
  <?php
  if(!empty($showAlert))
{
echo'<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Your account has been created</p>
  <hr>
  <p class="mb-0">You can log in now.</p>
</div>';
}
if(!empty($showerror))
{
echo'<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Sorry!</h4>
  <p>Password did not matched  or fill the all items</p>
  <hr>
  <p class="mb-0">Please try again.</p>
</div>';
}

if(!empty($showerror1))
{
echo'<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Sorry!</h4>
  <p> username already exists</p>
  <hr>
  <p class="mb-0">Please try again.</p>
</div>';
}





?>










  
  

  




   



  
  
  

    <h1 align="center" style="font-family: 'Zen Dots', cursive;">WELCOME TO REGESTRATION</h1>



  
  
  
  <form method="POST" action="" >
    <fieldset>
    <legend align="center" style="font-size: 2.0em; font-family: 'Zen Dots', cursive;">Fill Up the Form Carefully</legend>

   
    
    <table cellpadding="3" width="50%" bgcolor="white" align="center"cellspacing="15">
    <tr id="name">
      <td>NAME</td>
      <td>
        <input type="text" maxlength="11" name="name" size="30"  style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="email">
      <td>EMAIL</td>
      <td>
        <input type="text" name="email" size="30" style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>


    <tr id="username">
      <td>USERNAME</td>
      <td>
        <input type="text" maxlength="20" name="username" size="30"style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="date">
      <td>DATE OF BIRTH</td>
      <td>
        <input type="Date" name="date" size="30" min="1953-01-01" max="1999-01-01" style="border-radius: 7px;padding: 2px 60px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>


    <tr id="password">
      <td>PASSWORD</td>
      <td>
        <input type="text" name="password" size="30" style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr> 


    <tr id="cpassword">
      <td>CONFIRM PASSWORD</td>
      <td>
        <input type="text" name="cpassword" size="30" style="border-radius: 7px;"><b><span style="color: red;" class="formerror"></span></b>
      </td>
    </tr>

    <tr id="gender">
      <td>GENDER</td>
      <td><input type="radio" name="gender" value="Male" size="30" >Male
      <input type="radio" name="gender" value="Female" size="30" >Female
      <input type="radio" name="gender" value="Other" size="30" >Other
       
    </td>
    </tr>

    
  

    
        <tr>
          <td></td>
          <td><input style="background-color: red;color: white;padding: 10px 28px; font-size: 16px; border-radius:15px;font-family: 'Zen Dots', cursive; " type="Submit" name="submit" value="SIGN UP"></td>
        </tr>
      
  </table>



  
    


    

        
    
    

        
    
</fieldset>

</form>



  
 


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> 
    




  

  

</body>

</html>
<br>
<?php include 'footer.php' ?>