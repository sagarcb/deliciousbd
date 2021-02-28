<?php

include_once "admin/dbconfig.php";

$id = $_GET['id'];
$result = mysqli_query($link,"select * from recipes where id='$id'");
$data = mysqli_fetch_assoc($result);
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

    <style>
        body{
            counter-reset: my-sec-counter;
        }
        .cooking_steps::before {
            /* Increment "my-sec-counter" by 1 */
            counter-increment: my-sec-counter;
            content:counter(my-sec-counter) ". ";
        }
    </style>

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
<?php include_once 'common/common-navbar.php'?>
<!-- ##### Header Area End ##### -->

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>Recipe</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<div class="receipe-post-area section-padding-80">

    <!-- Receipe Slider -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="receipe-slider owl-carousel">
                    <img style="height: 500px;" src="uploads/<?=$data['images']?>" alt="">
                    <img style="height: 500px;" src="uploads/<?=$data['images']?>" alt="">
                    <img style="height: 500px;" src="uploads/<?=$data['images']?>" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Receipe Content Area -->
    <div class="receipe-content-area">
        <div class="container">

            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="receipe-headline my-5">
                        <span><?=date("M-d-Y",strtotime($data['created_at']))?></span>
                        <h2><?=$data['title']?></h2>
                        <div class="receipe-duration">
                            <h6>Prep: <?=$data['prep_time']?></h6>
                            <h6>Cook: <?=$data['cook_time']?></h6>
                            <h6>Yields: <?=$data['total_time']?></h6>
                            <h6>Recipe Category: <?=$data['recipe_category']?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $steps = explode('#',$data['cooking_steps']);
            $ingredients = explode('#',$data['ingredients']);
            ?>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <?php for ($i=0; $i< sizeof($steps); $i++){?>
                    <!-- Single Preparation Step -->
                    <div class="single-preparation-step d-flex">
                        <h4 class="cooking_steps"></h4>
                        <p><?=$steps[$i]?></p>
                    </div>
                    <?php }?>

                </div>

                <!-- Ingredients -->
                <div class="col-12 col-lg-4">
                    <div class="ingredients">
                        <h4>Ingredients</h4>
                        <?php for($i=0; $i<sizeof($ingredients);$i++){?>
                        <!-- Custom Checkbox -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="<?=$i?>">
                            <label class="custom-control-label" for="<?=$i?>"><?=$ingredients[$i]?></label>
                        </div>
                        <?php }?>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-left">
                        <h3>Leave a comment</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="contact-form-area">
                        <form action="post-comment.php" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn delicious-btn mt-30" type="submit">Post Comments</button>
                                </div>
                                <input type="text" name="id" hidden value="<?=$id?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="section-heading text-left">
                        <h3>Comments</h3>
                    </div>
                </div>
            </div>

            <?php
            $result1 = mysqli_query($link,"select * from comments where recipe_id='$id'");
            $comments = mysqli_fetch_all($result1,MYSQLI_ASSOC);
            ?>
            <div class="row mt-0">
            <?php foreach ($comments as $row){?>

                    <div class="col-12 m-1" style="background: #F3F5F8">
                        <span><b><?=$row['name']?>: <span style="color: #3b9e3b"><?=date('d M Y h:i a',strtotime($row['created_at']))?></span></b> </span>
                        <b><p style="color: #3b9e3b; font-size: medium">Comment: <?=$row['message']?></p></b>
                    </div>

            <?php }?>
            </div>
        </div>
    </div>
</div>

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
