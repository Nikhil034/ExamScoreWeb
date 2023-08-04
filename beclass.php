<?php

session_start();

include 'connection.php';

if(isset($_SESSION['AuthStudent']))
{
  $emlst=$_SESSION['AuthStudent'];
}
else if(isset($_SESSION['AuthProfessor']))
{
  
    
}
else
{
    header("location:401.php");
}

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

    <title>View of BE class</title>
  </head>
  <body>
    <br><br>

  <div class="card">
  <div class="card-header">
    List of Student in BE 
    <a href="dashboard.php" class="btn btn-danger" style="float: right;">Exit</a>
  </div>
  <div class="card-body text-center">

    <table class="table table-sm ">
  <thead class="table-warning">
    <tr>
      <th scope="col">#PRN</th>
      <th scope="col">EMAIL</th>
       <th scope="col">YEAR</th>
      <th scope="col">VIEW</th>
    </tr>
  </thead>
  <tbody>  
    <tr>
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td><a href="deletesubject.php" class="btn btn-warning">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
       </svg></a>
     </td>
    </tr>

  </tbody>
</table>
     

  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>

<?php


if(isset($_POST['sbtn']))
{
  $scd=$_POST['scode'];
  $etype=$_POST['sexam'];
  $ttlmr=$_POST['ttlmrk'];
  $edt=$_POST['edate'];


  $query=mysqli_query($con,"insert into subject_tbl(scode,Exam_type,Subject_totalmarks,Subject_professor,Subject_examdate)values('$scd','$etype','$ttlmr','$pf[0]','$edt')");

  

  if($query)
  {
    echo "<script>
          swal({
           title: 'Success!',
           text: 'Succesfully set exam!',
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

      echo "<pre>";
      print_r($query);    
  }
}



//this is query for display time table of exam related to be and mca student

// SELECT exam_subject_tbl.Subject_name, subject_tbl.Exam_type, subject_tbl.Subject_totalmarks, subject_tbl.Exam_type, exam_subject_tbl.Subject_code FROM exam_subject_tbl INNER JOIN subject_tbl ON exam_subject_tbl.Subject_code = subject_tbl.scode WHERE subject_tbl.scode LIKE 'BE%'

// SELECT exam_subject_tbl.Subject_name, subject_tbl.Exam_type, subject_tbl.Subject_totalmarks, subject_tbl.Exam_type, exam_subject_tbl.Subject_code FROM exam_subject_tbl INNER JOIN subject_tbl ON exam_subject_tbl.Subject_code = subject_tbl.scode WHERE subject_tbl.scode LIKE 'MCA%'

?>