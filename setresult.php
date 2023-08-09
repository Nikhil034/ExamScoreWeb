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

    <title>Set Result</title>
  </head>
  <body>
    <br><br>

  <div class="card">
  <div class="card-header">
     <a href="dashboard.php" class="btn btn-danger" style="float: right;">X</a>
        <a href="viewexam.php" class="btn btn-success" style="float: left;">View Result</a>
  </div>
  <div class="card-body text-center">
     <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToQThvkzQ2sFZu0lIpor6NVMaN4vmIhCbPkw&usqp=CAU" style="height: auto;width: auto;border-radius: 20px">
     <br><br>

    <h5 class="card-title">Select details to set result</h5>
    <hr><br>
   
    <form method="get">

   <label style="float: left;">Choose Stream</label>
   <select class="form-select" id="sscode" name="stream" aria-label="Default select example">
    <option value="MCA">MCA</option>
    <option value="BE">BE</option>
   </select>

    <br>
    <label style="float: left;">Choose Year</label>
    <select class="form-select" id="subname" name="syear" aria-label="Default select example">
    <option value="1">1</option>  
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    </select>
    <br>
 
    <label style="float: left;">Choose subject code</label>
    <select class="form-select" name="scode">

     <?php
      $query=mysqli_query($con,"select scode from subject_tbl");

      while($row=mysqli_fetch_array($query))
      {
    ?>  
     <option value="<?php echo $row['scode'];?>"><?php echo $row['scode'];?></option>      
    <?php
     }
     ?>      
    </select>
    <br> 
     <button type="submit" name="sbtn" class="btn btn-success" formaction="setscore.php">Submit</button>
     <a href="dashboard.php" class="btn btn-warning">Cancel</a>

     </form> 


  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>

