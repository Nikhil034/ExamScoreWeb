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

    <title>Professor Login Page</title>
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

    <input class="form-control" type="email" placeholder="Enter your email" name="pemail" aria-label="default input example" Required>

    <br>

    <input class="form-control" type="password" placeholder="Enter your password" name="ppass" aria-label="default input example" Required>


    <div class="d-grid gap-3">
        <br>

    <button type="submit" name="sbtn"  class="btn btn-info">Login</button>
      <a href="index.php" class="btn btn-danger">Back</a>

  
    </div>

    </form>
    
  </div>
</div>
 
   </div>


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>

<!-- Code for authenticate professor for give access to dashboard-->

<?php

session_start();
include 'connection.php';

if(isset($_POST['sbtn']))
{

  $eml=$_POST['pemail'];
  $psw=$_POST['ppass'];

  $query=mysqli_query($con,"select id from professor_tbl where Professor_email='$eml' and Professor_password='$psw'");

  $isAuth=mysqli_fetch_array($query);


  if($isAuth)
  {
    $_SESSION['AuthProfessor']=$eml;
    header("location:dashboard.php");
  }
   else
  {
     echo "<script>
          swal({
           title: 'Fail!',
           text: 'Plese check your email or password!',
           icon: 'error',
            });
          </script>";
  }

}



?>