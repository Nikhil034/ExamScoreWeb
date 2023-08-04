<?php

$subject_delete_id=$_GET['id'];
echo $subject_delete_id;

include 'connection.php';

$query=mysqli_query($con,"delete from subject_tbl where scode='$subject_delete_id'");

if($query)
{
	header("location:viewexam.php");
}
else
{
	echo"<script>alert('Something went wrong!');</script>";
}

?>