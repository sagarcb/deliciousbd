<?php
include_once 'admin/dbconfig.php';
date_default_timezone_set('Asia/Dhaka');
if (!empty($_POST)){
    $id = htmlentities($_POST['id'],ENT_QUOTES);
    $name = htmlentities($_POST['name'],ENT_QUOTES);
    $subject = htmlentities($_POST['subject'],ENT_QUOTES);
    $email = htmlentities($_POST['email'],ENT_QUOTES);
    $message = htmlentities($_POST['message'],ENT_QUOTES);
    $created_at = date("Y-m-d H:i:s");

    mysqli_query($link, "insert into comments(name,email,subject,message,recipe_id,created_at)
                values('$name','$email','$subject','$message','$id','$created_at')");
    header("location:receipe-post.php?id=$id");
}
