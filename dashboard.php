
<?php


session_start();


//Code for redirect if professor or student is try to access without login

if(isset($_SESSION['AuthStudent']))
{
  $emlst=$_SESSION['AuthStudent'];
}
else if(isset($_SESSION['AuthProfessor']))
{
    $emlpf=$_SESSION['AuthProfessor'];
    //echo $emlpf;
}
else
{
    header("location:401.php");
}



//Code for count student of mca and be and return total amount of student for dashboard

include 'connection.php';
$query1=mysqli_query($con,"select Student_prn from student_tbl where  Student_stream='MCA'");
$countmca=mysqli_num_rows($query1);

$query2=mysqli_query($con,"select Student_prn from student_tbl where  Student_stream='BE'");
$countbe=mysqli_num_rows($query2);

$TotalStudent=$countmca+$countbe;



?>



<style>
    @import url("https://fonts.googleapis.com/css?family=Lato:300,400,700|Source+Sans+Pro:300,600");

body {
    font-family: "Lato", sans-serif;
}

.logo .logo {
    display: inline-block;
    color: #020202;
    font-size: 1.4em;
    font-weight: 700;
    font-family: "Source Sans Pro", sans-serif;
}

.logo .rog {
    color: #666666;
    font-family: "Lato", sans-serif;
    font-weight: 300;
}

.dashboto-logo {
    margin-left: 6px;
    background: #14abfa;
    height: 25px;
    width: 25px;
    color: #ffffff;
    font-family: "Source Sans Pro", sans-serif;
    padding: 4px;
    border-radius: 4px;
    display: inline-block;
}

.dashboto-logo p {
    display: inline-block;
    letter-spacing: -2px;
    margin-top: -2px;
}

.dashboto-logo p:nth-child(2) {
    font-weight: 600;
}

.tagline {
    color: #9b9ea2;
    font-weight: 300;
    padding: 0px 5px;
    margin-top: -5px;
}

.tagline bold {
    color: #14abfa;
    font-eright: 600;
}

.option {
    width: 20%;
    height: 100vh;
    padding: 0px 2%;
    float: left;
}

button {
    background: #14abfa;
    border: solid 6px #14abfa;
    border-radius: 3px;
    color: #ffffff;
    font-weight: 700;
    font-family: "Source Sans Pro", sans-serif;
    font-size: 1.2em;
    margin-left: 6px;
    cursor: pointer;
}

.menu {
    margin-top: 30px;
    width: 100%;
    padding: 0px;
    margin-left: 8px;
}

.menu a {
    width: 100%;
    color: #666666;
    text-decoration: none;
    margin: 15px 0px;
    float: left;
    display: block;
    font-size: 1.2em;
}

.menu a:first-child {
    color: #14abfa;
}

.menu a i {
    font-size: 1.7em;
    color: #14abfa;
    position: relative;
    padding-right: 10px;
    top: 3px;
}

.menu .fa-tasks {
    top: 6px;
    padding-left: 2px;
}

.menu .fa-book {
    top: 5px;
    padding-left: 2px;
}

.menu .fa-newspaper-o {
    top: 6px;
    padding-left: 2px;
}

.menu .fa-money {
    top: 5px;
    padding-left: 2px;
}

.clear {
    clear: both;
}

.dashboard-heading {
    width: 76%;
    float: left;
    background: #ffffff;
    position: relative;
    color: #73787c;
    margin-top: 20px;
    position: relative;
}

.dashboard-heading .panel {
    padding-bottom: 20px;
}

.dashboard-heading .panel i bold {
    position: absolute;
    font-size: 0.6em;
    border-radius: 50%;
    padding: 4px 6px;
    background: #12abf7;
    color: white;
    font-weight: 700;
    margin-top: -10px;
}

.btc-price {
    display: inline-block;
    position: absolute;
    right: 20px;
    top: -29px;
    color: #c021ff;
}

.dashboard-heading .panel i {
    border-radius: 50%;
    background: #f4f4f4;
    padding: 8px;
    border: solid 2px;
    position: relative;
    left: 20px;
    cursor: pointer;
}

.dashboard-heading .all {
    background: #f2f2f2;
    width: 100%;
    min-height: 100vh;
}

.all .starter-stats .blok {
    background: #ffffff;
    width: 30%;
    float: left;
    margin: 20px 1.5%;
    font-size: 1.1em;
    font-family: "Source Sans Pro", sans-serif;
    position: relative;
}

.blok i {
    border-radius: 50%;
    background: #12abf7;
    padding: 10px;
    color: white;
    display: inline-block;
    position: relative;
    top: -20px;
    margin-left: 20px;
    margin-right: 5px;
    font-size: 1.2em;
}

.blok .kl {
    background: #978ded;
}

.blok .pl {
    background: #facaee;
}

.blok .no {
    display: inline-block;
}

.blok .no p:first-child {
    font-weight: 700;
    font-size: 0.8em;
    position: relative;
    top: 8px;
}

.blok .no p:nth-child(2) {
    position: relative;
    top: -10px;
    font-size: 1.3em;
    font-weight: 700;
}

.gains {
    width: 80%;
    padding: 20px 8%;
    margin: 5px auto;
    background: #ffffff;
}

@media only screen and (max-width: 800px) {
    .option {
        width: 90%;
        display: none;
    }
    .dashboard-heading {
        width: 100%;
    }
    .blok i {
        display: none;
    }
}
h3
{
    text-align: center;
}

.btn
{
    width: 100%;
    justify-content: center;
    display: flex;
    text-decoration: none;
    cursor: pointer;


}

</style>

<!DOCTYPE html>
<html>
<head>
   
    <title>Dashboard of ExamScoreWeb</title>
</head>
<body>

    <div class="option">
    <div class="logo">
       
        <p class="logo rog">Exam</p>
        <p class="logo">Scoreweb</p>
    </div>
    <p class="tagline">Helping Professor & Students <bold>Easy</bold> to Connect!</p>
    <a href="dashboard.php" style="cursor: pointer;"><button class="main">THE MSU</button></a>
    <div class="clear"></div>
    <ul class="menu">
        <a href="">
            <i class="fa fa-dashboard" id="l1"></i>
            Dashboard
        </a>
        <br>
        <a href="setexam.php">
            <?php
            if(isset($emlpf))
            {
            ?>    
            <i class="fa fa-tasks"></i>
            Set Exam
        </a>
        <?php
         }
         ?>

         <a href="studentviewexam.php">
            <?php
            if(isset($emlst))
            {
            ?>    
            <i class="fa fa-tasks"></i>
            View Exam
        </a>
        <?php
         }
         ?>
        <a href="setresult.php">
            <?php
            if(isset($emlpf))
            {
            ?>    
            <i class="fa fa-book"></i>
            Set Result
        </a>
        <?php
         }
         ?>
          <a href="studentviewresult.php">
            <?php
            if(isset($emlst))
            {
            ?>    
            <i class="fa fa-tasks"></i>
            View Result
        </a>
        <?php
         }
         ?>
        <a href="profileprofessor.php">
            <?php
            if(isset($emlpf))
            {

            ?>
            <i class="fa fa-newspaper-o"></i>
            Profile
        </a>
    <?php  } ?>

     <a href="studentviewprofile.php">
            <?php
            if(isset($emlst))
            {
            ?>    
            <i class="fa fa-tasks"></i>
            View Profile
        </a>
        <?php
         }
         ?>


    </ul>
</div>

<div class="dashboard-heading">
    <div class="panel">
        <div ng-app="app" ng-controller="coin">
            <a href="logout.php"><p class="btc-price">Logout</p></a>
        </div>
    </div>
    <div class="all">
        <div class="starter-stats">
            <div class="blok">
                <i class="fa fa-money"></i>
                <div class="no">
                    <p>Total Students</p>
                    <p><?php echo $TotalStudent;?></p>
                </div>
            </div>

            <div class="blok">
                <i class="fa fa-money kl"></i>
                <div class="no">
                    <p>Student of MCA</p>
                    <p><?php echo $countmca;?></p>
                </div>
            </div>

            <div class="blok">
                <i class="fa fa-money pl"></i>
                <div class="no">
                    <p>Student of BE</p>
                    <p><?php echo $countbe;?></p>
                </div>
            </div>
            <div class="clear"></div>
            <div class="gains">

                <h3>Welcome Professor,Test</h3>

                <img src="dash.png" style="width: 70%;margin-left: 110px;"></img>

                <br>

               
              <div class="btn"> 
              <a href="mcaclass.php" class="btn"><button>MCA CLASS</button></a>
              <a href="beclass.php" class="btn"><button>BE CLASS</button></a>
              </div>    
                  



              
            </div>

        </div>

    </div>

</div>

<script type="text/javascript">


   

</script>

</body>
</html>