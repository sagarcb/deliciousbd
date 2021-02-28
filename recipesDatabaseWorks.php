<?php

include_once "admin/dbconfig.php";


$limit = 12;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page -1) * $limit;


if (isset($_GET['traditional'])){
    $traditional = $_GET['traditional'];
    $result = mysqli_query($link,"select * from recipes where cooking_style='Traditional' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where cooking_style='Traditional'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['regional'])){
    $regional = isset($_GET['regional']);
    $result = mysqli_query($link,"select * from recipes where cooking_style='Regional' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where cooking_style='Regional'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if(isset($_GET['moghlai'])){
    $moghlai = isset($_GET['moghlai']);
    $result = mysqli_query($link,"select * from recipes where cooking_style='Moghlai' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where cooking_style='Moghlai'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['fusion'])){
    $fusion = isset($_GET['fusion']);
    $result = mysqli_query($link,"select * from recipes where cooking_style='Fusion' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where cooking_style='Fusion'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if(isset($_GET['chinese'])){
    $chinese = isset($_GET['chinese']);
    $result = mysqli_query($link,"select * from recipes where cooking_style='Chinese' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where cooking_style='Chinese'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['main_dish'])){
    $main_dish = isset($_GET['main_dish']);
    $result = mysqli_query($link,"select * from recipes where recipe_category='Main Dish' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where recipe_category='Main Dish'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['snacks'])){
    $snacks = isset($_GET['snacks']);
    $result = mysqli_query($link,"select * from recipes where recipe_category='Snacks' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where recipe_category='Snacks'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['appetizer'])){
    $appetizer = isset($_GET['appetizer']);
    $result = mysqli_query($link,"select * from recipes where recipe_category='Appetizer' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where recipe_category='Appetizer'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['desert'])){
    $desert = isset($_GET['desert']);
    $result = mysqli_query($link,"select * from recipes where recipe_category='Desert' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where recipe_category='Desert'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['bread'])){
    $bread = isset($_GET['bread']);
    $result = mysqli_query($link,"select * from recipes where recipe_category='Bread' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where recipe_category='Bread'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['kabab_grill'])){
    $kabab_grill = isset($_GET['kabab_grill']);
    $result = mysqli_query($link,"select * from recipes where recipe_category='Kabab and Grill' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where recipe_category='Kabab and Grill'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['lentils_daal'])){
    $lentils_daal = isset($_GET['lentils_daal']);
    $result = mysqli_query($link,"select * from recipes where recipe_category='Lentils and Daal' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where recipe_category='Lentils and Daal'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['rice'])){
    $rice = isset($_GET['rice']);
    $result = mysqli_query($link,"select * from recipes where recipe_category='Rice' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where recipe_category='Rice'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['spice_mixes'])){
    $spice_mixes = isset($_GET['spice_mixes']);
    $result = mysqli_query($link,"select * from recipes where recipe_category='Spice Mixes' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where recipe_category='Spice Mixes'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['shakes'])){
    $shakes = isset($_GET['shakes']);
    $result = mysqli_query($link,"select * from recipes where recipe_category='Shakes' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where recipe_category='Shakes'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}else if (isset($_GET['vegan'])){
    $shakes = isset($_GET['vegan']);
    $result = mysqli_query($link,"select * from recipes where recipe_category='Veg' limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes where recipe_category='Veg'");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
} else{
    $result = mysqli_query($link,"select * from recipes limit $start,$limit");
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $result11 = mysqli_query($link, "select count(id) as id from recipes");
    $custCount = mysqli_fetch_all($result11,MYSQLI_ASSOC);
}



$total = $custCount[0]['id'];
$pages = ceil($total / $limit);
$count = $pages;

$previous = $page - 1;
$next = $page + 1;
if($previous <1){
    $previous = 1;
}
if($next > $pages){
    $next = $pages;
}
