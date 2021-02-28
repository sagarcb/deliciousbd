<?php
$link = mysqli_connect('localhost','root','','cookingfactory');
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
