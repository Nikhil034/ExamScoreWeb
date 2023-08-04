<?php

session_start();

include 'connection.php';

if(isset($_SESSION['AuthStudent']))
{
  $emlst=$_SESSION['AuthStudent'];
}
else if(isset($_SESSION['AuthProfessor']))
{
    $emlpf=$_SESSION['AuthProfessor'];
    $query=mysqli_query($con,"select Professor_name from  professor_tbl where Professor_email='$emlpf'");
    $pf=mysqli_fetch_array($query);
    
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

    <title>Set Exam</title>
  </head>
  <body>
    <br><br>

  <div class="card">
  <div class="card-header">
    Set Exam for students
    <a href="viewexam.php" class="btn btn-success" style="float: right;">View Exams</a>
  </div>
  <div class="card-body text-center">
     <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvpV8Z28xROkZpvYm2YwHApBo0LDqxwm-aCQ&usqp=CAU" style="height: auto;width: auto;">

    <h5 class="card-title">Mention all details related to exam</h5>
    <hr><br>
   
    <form method="post">

   <label style="float: left;">Subject Code</label>
   <select class="form-select" id="sscode" name="scode" aria-label="Default select example">
    <option disabled="">Subject Code</option>
    <?php

    $query=mysqli_query($con,"select Subject_code from exam_subject_tbl");
    
    while($row=mysqli_fetch_array($query))
    {
    ?>
    <option value=<?php echo $row['Subject_code'];?>><?php echo $row['Subject_code'];?></option>
    <?php
     }
     ?>
    </select>

    <br>
    <label style="float: left;">Subject Name</label>
    <select class="form-select" id="subname" aria-label="Default select example">
    <?php

    $query=mysqli_query($con,"select Subject_name from exam_subject_tbl");
    
    while($row=mysqli_fetch_array($query))
    {
    ?>
    <option value=<?php echo $row['Subject_name'];?>><?php echo $row['Subject_name'];?></option>
    <?php
     }
     ?>  
    </select>

    <br>
 
    <label style="float: left;">Exam Type</label>
    <select class="form-select" name="sexam" id="subname" aria-label="Default select example">
    <option value="Internal">Internal</option>
    <option value="External">External</option>
    </select>

    <br>
    <label style="float: left;">Total Mark</label>
    <input class="form-control" type="number" name="ttlmrk">


    <br>
   
    <label style="float: left;">Name of the subject professor</label>
    <input class="form-control" type="text" name="pfname" disabled="" placeholder="Professor of Subject" value="<?php echo $pf[0];?>">


    <br>

    <label style="float: left;">Exam Date</label>
    <input class="form-control" type="date" name="edate" placeholder="Exam Date" aria-label="default input example">

    <br>
     <button type="submit" name="sbtn" class="btn btn-success">Submit</button>
     <a href="dashboard.php" class="btn btn-warning">Cancel</a>

     </form> 


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