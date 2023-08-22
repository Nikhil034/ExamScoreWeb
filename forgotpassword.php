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

    <title>Forgot Password Page</title>
  </head>
  <body class="gradient-background">
 
  
  <div class="container">

   <br>

  <div class="card">
  <div class="card-header">
  
  </div>
  <div class="card-body" style="text-align:center;">

    <img src="password.jpeg" style="width:40%;height:auto;position:center"><img>

    <form method="post">

    <input class="form-control" type="email" placeholder="Enter your registered email" aria-label="default input example" name="seml" Required>

    <br>

    <input class="form-control" type="number" placeholder="Enter your registered prn" aria-label="default input example" name="sprn" Required>

    <br>

    <input class="form-control" type="password" placeholder="Chnage password" aria-label="default input example" name="cpass" Required>


    <div class="d-grid gap-3">
        <br>

    <button type="submit" name="sbtn"  class="btn btn-success">Submit</button>
    <a href="Student.php" class="btn btn-danger">Cancel</a>
  
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
  $prn=$_POST['sprn'];
  $psw=$_POST['cpass'];
  $shahpassword=sha1($psw);
  $query0=mysqli_query($con,"select Student_name from student_tbl where Student_email='$eml' and Student_prn='$prn'");
  $IsValidEmail=mysqli_fetch_array($query0);

  if($IsValidEmail)
  {
     $update=mysqli_query($con,"update student_tbl set Student_password='$shahpassword' where Student_prn='$prn'");

     if($update)
     {

       echo "<script>
          swal({
           title: 'Success!',
           text: 'Password change succesfully!!',
           icon: 'success',
            });
          </script>";

     }
  }
  else
  {

    echo "<script>
          swal({
           title: 'Fail!',
           text: 'EMAIL OR PRN NOT FOUND!',
           icon: 'error',
            });
          </script>";

  }
  


}

?>