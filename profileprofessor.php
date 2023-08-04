<?php

session_start();

include 'connection.php';

$emlpf=$_SESSION['AuthProfessor'];

$query=mysqli_query($con,"select * from professor_tbl where Professor_email='$emlpf'");

$row=mysqli_fetch_array($query);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Profile of professor</title>
  </head>
  <body>
    <br><br>
    <div class="card">
      <br>
      <div class="card-body text-center">
         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOH2aZnIHWjMQj2lQUOWIL2f4Hljgab0ecZQ&usqp=CAU" style="height: auto;width: auto;">

         <br><br>

         <form method="post">

         <div class="row g-3">
               <div class="col">
                <label style="float:left;">Professor Name</label>
                 <input type="text" class="form-control"  value="<?php echo $row[1];?>" name="epnm" >
               </div>
               <div class="col">
                <label  style="float:left;">Professor Email</label>
                 <input type="email" class="form-control"value="<?php echo $row[2];?>" name="epeml">
               </div>
         </div>
         <br>

          <div class="row g-3">
               <div class="col">
                <label  style="float:left;">Professor Password</label>
                 <input type="Password" class="form-control" id="psw" value="<?php echo $row[3];?>" name="eppass">
                 <script type="text/javascript">
                   const ps=document.getElementById('psw');
                   ps.addEventListener('focus',function(){
                    ps.type="text";
                   });
                   ps.addEventListener('blur',function(){
                    ps.type="Password";
                   });
                 </script>
               </div>
               <div class="col">
                <label  style="float:left;">Professor Contact</label>
                 <input type="number" class="form-control" value="<?php echo $row[4];?>" name="epcon">
               </div>
         </div>

         <br>

         <div class="row g-3">
               <div class="col">
                <label style="float:left;">Professor Subject</label>
                 <input type="text" class="form-control" value="<?php echo $row[6];?>" name="epsub">
               </div>
               <div class="col">
                <label style="float:left;">Professor Address</label>
                 <input type="text" class="form-control" value="<?php echo $row[5];?>" name="epadd">
               </div>
         </div>

         <br>
         <a href="dashboard.php" class="btn btn-danger">Exit</a>
         <button type="submit" name="sbtn" class="btn btn-info">Update</button>


      </div>
      
    </div>
  </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>

<?php


if(isset($_POST['sbtn']))
{
  $ename=$_POST['epnm'];
  $email=$_POST['epeml'];
  $epass=$_POST['eppass'];
  $econt=$_POST['epcon'];
  $esubj=$_POST['epsub'];
  $eadd=$_POST['epadd'];

  $query=mysqli_query($con,"update professor_tbl set  Professor_name='$ename',  Professor_email='$email',Professor_password ='$epass',Professor_contact='$econt',Professor_subject='$esubj',Professor_address='$eadd' where id='$row[0]'");


  if($query)
  {
    echo "<script>
          swal({
           title: 'Success!',
           text: 'Update details succesfully!',
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