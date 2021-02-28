<?php
session_start();
 unset($_SESSION['isLogged']);
 unset($_SESSION['adminId']);
header('location: index.php');
