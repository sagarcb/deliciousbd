<?php
session_start();
$_SESSION['delete']= " ";
include 'dbconfig.php';
$id = $_GET['id'];
$query2 = "select images from recipes where id = $id";
$result = mysqli_query($link,$query2);
$data =  mysqli_fetch_assoc($result);
$fileName = $data['images'];
unlink("../uploads/$fileName");

$query = "delete from recipes where id='$id'";
mysqli_query($link,$query);

$_SESSION['delete'] = 'Successfully Deleted!!';
header('location:index.php');
