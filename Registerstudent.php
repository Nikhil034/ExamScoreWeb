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
    <title>Student Register Page</title>
  </head>
  <body class="gradient-background">
 
  
  <div class="container">

   <br>

  <div class="card">
    
  <div class="card-header">
  * Fill your details carefully   
  </div>
  <div class="card-body">

  <form method="post">

  <label>*PRN</label>
  <input class="form-control" type="number" placeholder="8022XXXXX" aria-label="default input example" name="sprn" Required>

  <br>
  <label>*NAME</label>
  <input class="form-control" type="text" placeholder="NAMEXXXX" aria-label="default input example" name="sname" Required>

  <br>

  <label>*GENDER</label>
<select class="form-select" aria-label="Default select example" name="ssgender" Required>
  <option selected>Select</option>
  <option value="MALE">MALE</option>
  <option value="FEMALE">FEMALE</option>
  <option value="OTHERS">OTHERS</option>
</select>


  <br>
  <label>*EMAIL</label>
  <input class="form-control" type="email" placeholder="abc@gmail.com" aria-label="default input example" name="semail" Required>

 <br>
 <label>*PASSWORD</label>
 <input class="form-control" type="password" placeholder="*******" aria-label="default input example" name="spass" Required>

<br>
<label>*STREAM</label>
<select class="form-select" aria-label="Default select example" name="sstrem" Required>
  <option selected>Select</option>
  <option value="MCA">MCA</option>
  <option value="BE">BE</option>
</select>

<br>


<label>*YEAR</label>
<select class="form-select" aria-label="Default select example" name="syear" Required>
  <option selected>Select</option>
  <option value="1">1ST YEAR</option>
  <option value="2">2ND YEAR</option>
  <option value="3">3ND YEAR</option>
  <option value="4">4ND YEAR</option>
</select>

<br>
 <label>*CONTACT</label>
 <input class="form-control" type="number" placeholder="98941XXXXX" aria-label="default input example" name="snumber" Required>

 <br>
 <label>*ADDRESS</label>
 <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="sadd" Required></textarea>

 <br>
  <div class="d-grid gap-3">
        <br>

    <button type="submit" name="sbtn"  class="btn btn-info">Register</button>

    <a href="Student.php" class="btn btn-danger">Back</a>
  
    </div>



    </form>
    
  </div>
</div>
 
   </div>


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>



<!-- Php code for insert record of student in our table -->


<?php

if(isset($_POST['sbtn']))
{

  
  include 'connection.php';

  $prn=$_POST['sprn'];
  $name=$_POST['sname'];
  $gender=$_POST['ssgender'];
  $eml=$_POST['semail'];
  $pass=$_POST['spass'];
  $stream=$_POST['sstrem'];
  $year=$_POST['syear'];
  $phno=$_POST['snumber'];
  $add=$_POST['sadd'];

  $query=mysqli_query($con,"insert into student_tbl(Student_prn,Student_name,Student_gender,Student_email,Student_password,Student_stream,Student_year,Student_contact,Student_address,Isthere)values('$prn','$name','$gender','$eml','$pass','$stream','$year','$phno','$add',1)");


  if($query)
  {
    echo "<script>
          swal({
           title: 'Success!',
           text: 'Register succesfully,thank you!',
           icon: 'success',
            });
          </script>";
  }
  else
  {
    echo "<script>
          swal({
           title: 'Failure!',
           text: 'Something went wrong,try again!',
           icon: 'error',
            });
          </script>";
  }

  
}

?>