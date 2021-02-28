<?php
include_once 'recipesDatabaseWorks.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Delicious - Food Blog Template | Receipe Post</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="css/pagination.css">


</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <i class="circle-preloader"></i>
    <img src="img/core-img/salad.png" alt="">
</div>

<!-- Search Wrapper -->
<?php include_once 'searchbox.php'?>

<!-- ##### Header Area Start ##### -->
<?php include_once "common/common-navbar.php"?>
<!-- ##### Header Area End ##### -->

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>All Recipes</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Receipe list Area Start ##### -->
<section class="best-receipe-area">
    <div class="container">

        <div class="row mt-3">
            <?php foreach ($data as $row) {?>
                <!-- Single Best Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-best-receipe-area mb-30">
                        <img style="height: 300px;" src="uploads/<?=$row['images']?>" alt="">
                        <div class="receipe-content">
                            <a href="receipe-post.php?id=<?=$row['id']?>">
                                <h5><?=$row['title']?></h5>
                            </a>
                            <?php
                            $ingredients = explode('#',$row['ingredients']);
                            ?>
                            <div>
                                <b><span style="color: #f0ad4e" class="mr-1"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=$row['total_time']?></span></b>
                                <b><span style="color: #f0ad4e"><i class="fa fa-spoon" aria-hidden="true"></i> <?=sizeof($ingredients)?> ingredients</span></b>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>


            <!--Pagination starts-->
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><h3><a class="page-link" style="font-size: 70%; color: #3b9e3b; border: 1px solid #3b9e3b; padding: 2px; width: 30px; text-align: center" href="recipes.php?page=<?= $previous; ?>"><</a></h3></li>
                                <?php for($i = 1; $i <= $pages; $i++):?>
                                    <li class="page-item"><h3><a class="page-link" style="font-size: 70%; color: #3b9e3b; border: 1px solid #3b9e3b; padding: 2px; width: 30px; text-align: center" href="recipes.php?page=<?= $i; ?>"><?=$i?></a></h3></li>
                                <?php endfor; ?>
                                <li class="page-item"><h3><a class="page-link" style="font-size: 70%; color: #3b9e3b; border: 1px solid #3b9e3b; padding: 2px; width: 30px; text-align: center" href="recipes.php?page=<?= $next; ?>">></a></h3></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--Pagination Ends-->


    </div>
</section>
<!-- ##### Receipe list End ##### -->

<!-- ##### Follow Us Instagram Area Start ##### -->
<div class="follow-us-instagram">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5>Follow Us Instragram</h5>
            </div>
        </div>
    </div>
    <!-- Instagram Feeds -->
    <div class="insta-feeds d-flex flex-wrap">
        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta1.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta2.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta3.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta4.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta5.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta6.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Insta Feeds -->
        <div class="single-insta-feeds">
            <img src="img/bg-img/insta7.jpg" alt="">
            <!-- Icon -->
            <div class="insta-icon">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- ##### Follow Us Instagram Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 h-100 d-flex flex-wrap align-items-center justify-content-between">
                <!-- Footer Social Info -->
                <div class="footer-social-info text-right">
                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </div>
                <!-- Footer Logo -->
                <div class="footer-logo">
                    <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
                </div>
                <!-- Copywrite -->
                <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by @sagar chakraborty
</p>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->

<!-- ##### All Javascript Files ##### -->
<!-- jQuery-2.2.4 js -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>
</body>

</html>
