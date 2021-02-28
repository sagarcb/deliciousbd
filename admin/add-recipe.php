<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
include_once 'dbconfig.php';

if (!empty($_POST)) {
    $title = htmlentities($_POST['title'], ENT_QUOTES);
    $cook_time = htmlentities($_POST['cook-time'], ENT_QUOTES);
    $prep_time = htmlentities($_POST['prep-time'], ENT_QUOTES);
    $total_time = htmlentities($_POST['total-time'], ENT_QUOTES);
    $category = htmlentities($_POST['category'], ENT_QUOTES);
    $ingredients = htmlentities($_POST['ingredients'], ENT_QUOTES);
    $cooking_steps = htmlentities($_POST['cooking-steps'], ENT_QUOTES);
    $food_image = $_FILES['food-image'];
    $chef_id = 1;
    $cooking_style = htmlentities($_POST['cooking_style'],ENT_QUOTES);
    $veg_nonveg = htmlentities($_POST['veg_nonveg'],ENT_QUOTES);
    if (isset($_POST['is_featured'])){
        $isfeatured = 1;
    }else{
        $isfeatured = 0;
    }


    $ext = pathinfo($food_image['name'], PATHINFO_EXTENSION);
    $filename = time() . '_' . rand(100000, 999999) . '_' . rand(100000, 999999) . '_' . rand(100000, 999999) . '_' . rand(100000, 999999);
    $created_at = date("Y-m-d H:i:s");
    move_uploaded_file($food_image['tmp_name'], "../uploads/$filename.$ext");

    if (!empty($title) && !empty($cook_time) && !empty($prep_time) && !empty($total_time)
        && !empty($category) && !empty($ingredients) && !empty($cooking_steps)
        && !empty($food_image) && !empty($chef_id)) {

        $query = "insert into recipes(title,ingredients,cooking_steps,prep_time,cook_time,total_time,recipe_category,chef_id,
                    images,created_at,is_featured,veg_nonveg,cooking_style) values('$title','$ingredients','$cooking_steps','$prep_time','$cook_time',
                    '$total_time','$category','$chef_id','$filename.$ext','$created_at','$isfeatured','$veg_nonveg','$cokinng_style')";
        mysqli_query($link,$query);
        $_SESSION['added']= "Successfully Added!!";
        header('location: index.php');

    } else {
        $error = "Each fields required to fill up";
        $_SESSION['added']= " ";
    }


}

?>

<?php include_once 'common-header.php'?>

<div class="content-wrapper">
    <div class="container-fluid">


        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add a recipe</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--Contents Starts-->
        <div class="contents">
            <div class="container-fluid">
                <div class="col-md-12">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Recipe Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title of the Recipe">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="prep-time">Prep Time</label>
                                    <input type="text" class="form-control" name="prep-time" id="prep-time">
                                </div>
                                <div class="col">
                                    <label for="cook-time">Cook Time</label>
                                    <input type="text" class="form-control" name="cook-time" id="cook-time">
                                </div>
                                <div class="col">
                                    <label for="total-time">Total Cooking Time</label>
                                    <input type="text" class="form-control" name="total-time" id="total-time">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="category">Recipe Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option selected>Main Dish</option>
                                        <option>Snacks</option>
                                        <option>Appetizer</option>
                                        <option>Desert</option>
                                        <option>Bread</option>
                                        <option>Kabab and Grill</option>
                                        <option>Lentils and Daal</option>
                                        <option>Rice</option>
                                        <option>Spice Mixes</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="cooking_style">Cooking Style</label>
                                    <select name="cooking_style" id="cooking_style" class="form-control">
                                        <option selected>Traditional</option>
                                        <option>Regional</option>
                                        <option>Moghlai</option>
                                        <option>Fusion</option>
                                        <option>Chinese</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="is_featured">Is Featured</label>
                                    <input type="checkbox" name="is_featured" id="is_featured" class="form-control" value="1">
                                </div>

                                <div class="col">
                                    <label for="veg_nonveg">Veg Or Non-veg</label>
                                    <select name="veg_nonveg" id="veg_nonveg" class="form-control">
                                        <option selected>Non-veg</option>
                                        <option selected>Veg</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ingredients">Ingredients</label>
                            <textarea class="form-control" name="ingredients" id="ingredients" rows="3" placeholder="Must be typed with # separated as example chili#1/2 cup cornflower"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cooking-steps">Cooking Steps</label>
                            <textarea class="form-control" name="cooking-steps" id="cooking-steps" rows="3" placeholder="Must be typed with # separated. Example: boil the eggs.# cut the onions."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="food-image">Food Image</label>
                            <input type="file" class="form-control" id="food-image" name="food-image">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Recipe</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php if (!empty($error)) {?>
                                <p style="color: red"><?='*'.$error?></p>
                            <?php }?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Contents ends-->


    </div>
</div>

<?php include_once 'common-footer.php'?>
