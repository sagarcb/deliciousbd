<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
include_once 'dbconfig.php';
$id = $_GET['id'];
$_SESSION['update']= " ";
$result = mysqli_query($link,"select * from recipes where id = $id");
$data = mysqli_fetch_assoc($result);
$error = "";
$title = "";
$cook_time = "";
$prep_time = "";
$total_time = "";
$category = "";
$ingredients = "";
$cooking_steps = "";
$food_image = " ";


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
    $created_at = date("Y-m-d H:i:s");
    $cooking_style = htmlentities($_POST['cooking_style'],ENT_QUOTES);
    $veg_nonveg = htmlentities($_POST['veg_nonveg'],ENT_QUOTES);
    if (isset($_POST['is_featured'])){
        $isfeatured = 1;
    }else{
        $isfeatured = 0;
    }

    if(!empty($food_image['name'])) {
        $ext = pathinfo($food_image['name'], PATHINFO_EXTENSION);
        $filename = time() . '_' . rand(100000, 999999) . '_' . rand(100000, 999999) . '_' . rand(100000, 999999) . '_' . rand(100000, 999999);

        move_uploaded_file($food_image['tmp_name'], "../uploads/$filename.$ext");
    }

    if (!empty($food_image['name'])){
        unlink('../uploads/'.$data['images']);
        $query = "update recipes set title='$title',ingredients='$ingredients',cooking_steps='$cooking_steps',prep_time='$prep_time',
                cook_time='$cook_time',total_time='$total_time',recipe_category='$category',created_at='$created_at',images='$filename.$ext',
                cooking_style='$cooking_style',veg_nonveg='$veg_nonveg',is_featured='$isfeatured' where id='$id'";
        mysqli_query($link,$query);
        $_SESSION['update']= "Successfully Updated!!";
        header('location:index.php');

    }else if(empty($food_image['name']))
    {
        $query = "update recipes set title='$title',ingredients='$ingredients',cooking_steps='$cooking_steps',prep_time='$prep_time',
                cook_time='$cook_time',total_time='$total_time',recipe_category='$category',created_at='$created_at',
                 cooking_style='$cooking_style',veg_nonveg='$veg_nonveg',is_featured='$isfeatured' where id='$id'";
        mysqli_query($link,$query);
        $_SESSION['update']= "Successfully Updated!!";
        header('location:index.php');
    }else{
        $_SESSION['update']= " ";
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
                        <h1 class="m-0 text-dark">Edit recipe</h1>
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
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title of the Recipe" value="<?=$data['title']?>">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="prep-time">Prep Time</label>
                                    <input type="text" class="form-control" name="prep-time" id="prep-time" value="<?=$data['prep_time']?>">
                                </div>
                                <div class="col">
                                    <label for="cook-time">Cook Time</label>
                                    <input type="text" class="form-control" name="cook-time" id="cook-time" value="<?=$data['cook_time']?>">
                                </div>
                                <div class="col">
                                    <label for="total-time">Total Cooking Time</label>
                                    <input type="text" class="form-control" name="total-time" id="total-time" value="<?=$data['total_time']?>">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="category">Recipe Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option selected><?=$data['recipe_category']?></option>
                                        <option>Main Dish</option>
                                        <option>Snacks</option>
                                        <option>Appetizer</option>
                                        <option>Desert</option>
                                        <option>Bread</option>
                                        <option>Kabab and Grill</option>
                                        <option>Lentils and Daal</option>
                                        <option>Rice</option>
                                        <option>Spice Mixes</option>
                                        <option>Spice Mixes</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="cooking_style">Cooking Style</label>
                                    <select name="cooking_style" id="cooking_style" class="form-control">
                                        <option selected><?=$data['cooking_style']?></option>
                                        <option selected>Traditional</option>
                                        <option>Regional</option>
                                        <option>Moghlai</option>
                                        <option>Fusion</option>
                                        <option>Chinese</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <?php if ($data['is_featured'] == 0){?>
                                    <label for="is_featured">Is Featured</label>
                                    <input type="checkbox" name="is_featured" id="is_featured" class="form-control" value="1">
                                    <?php } else{?>
                                    <label for="is_featured">Is Featured</label>
                                    <input type="checkbox" name="is_featured" id="is_featured" class="form-control" value="1" checked>
                                    <?php }?>
                                </div>

                                <div class="col">
                                    <label for="veg_nonveg">Veg Or Non-veg</label>
                                    <select name="veg_nonveg" id="veg_nonveg" class="form-control">
                                        <option selected><?=$data['veg_nonveg']?></option>
                                        <option>Non-veg</option>
                                        <option>Veg</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ingredients">Ingredients</label>
                            <textarea class="form-control" name="ingredients" id="ingredients" rows="3" placeholder="Must be typed with comma separated as example chili,1/2 cup cornflower"><?=$data['ingredients']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cooking-steps">Cooking Steps</label>
                            <textarea class="form-control" name="cooking-steps" id="cooking-steps" rows="3" placeholder="Must be typed with # separated. Example: boil the eggs.# cut the onions."><?=$data['cooking_steps']?></textarea>
                        </div>
                        <img src="../uploads/<?=$data['images']?>" alt="" height="300px" width="300px">
                        <div class="form-group">
                            <label for="food-image">Change Image</label>
                            <input type="file" class="form-control" id="food-image" name="food-image" value>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Recipe Details</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Contents ends-->
    </div>
</div>

<?php include_once 'common-footer.php'?>
