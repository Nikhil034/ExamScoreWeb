<style>

.gradient-background {
  height: 600px;
   background: linear-gradient(62deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
     animation: gradient 15s ease infinite; 
      background-size: 400% 400%;
  
}
@-webkit-keyframes gradient{
  0% {
    background-position: 0 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
     background-position: 0% 50%;
  }
}
@keyframes gradient{
  0% {
    background-position: 0 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
     background-position: 0% 50%;
  }
}

</style>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Student Login Page</title>
  </head>
  <body class="gradient-background">
 
  
  <div class="container">

   <br>

  <div class="card">
  <div class="card-header">
  
  </div>
  <div class="card-body" style="text-align:center;">

    <img src="195.jpg" style="width:40%;height:auto;position:center"><img>

    <form method="post">

    <input class="form-control" type="email" placeholder="Enter your email" aria-label="default input example" name="seml" Required>

    <br>

    <input class="form-control" type="password" placeholder="Enter your password" aria-label="default input example" name="spass" Required>


    <div class="d-grid gap-3">
        <br>

    <button type="submit" name="sbtn"  class="btn btn-info">Login</button>

    <a href="Registerstudent.php" class="btn btn-warning">Not Yet Register</a>

    <a href="forgotpassword.php" class="btn btn-outline-danger">Forgot password ?</a>
  
    </div>

    </form>
    
  </div>
</div>
 
   </div>


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>


<!-- This is code for authenticate student for dashboard-->

<?php

include "connection.php";
session_start();

if(isset($_POST['sbtn']))
{

  $eml=$_POST['seml'];
  $psw=$_POST['spass'];
  $query0=mysqli_query($con,"select Student_email from student_tbl where Student_email='$eml'");
  $IsValidEmail=mysqli_fetch_array($query0);

  if($IsValidEmail)
  {
      $query1=mysqli_query($con,"select Student_password from student_tbl where Student_email='$eml'");
      $isValidPassword=mysqli_fetch_array($query1);

       
      $storedHashedPassword = $isValidPassword[0];  
      $userInputPassword = $psw;
      $hashedInputPassword = sha1($userInputPassword);

      if ($hashedInputPassword === $storedHashedPassword)
      {
            
          $_SESSION['AuthStudent']=$eml;
          header("location:dashboard.php");
          
      }
      else
      {

        echo "<script>
          swal({
           title: 'Fail!',
           text: 'Incorrect Password!',
           icon: 'error',
            });
          </script>";
               
      }
  }
  else
  {

    echo "<script>
          swal({
           title: 'Fail!',
           text: 'Incorrect email!',
           icon: 'error',
            });
          </script>";

  }
  


}

?>