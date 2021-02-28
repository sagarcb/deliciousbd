<?php
session_start();
include_once 'dbconfig.php';

$result = mysqli_query($link,"select id,title,chef_id,created_at,images,is_featured from recipes");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php include_once 'common-header.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <form method="post" action="index.php">
      <?php if (!empty($_SESSION['added'])){?>
      <div class="col-md-12">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Successfully Added!!</strong>
              <button type="button" name="addedBtn" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      </div>
      <?php }?>
      <?php if (!empty($_SESSION['update'])){?>
      <div class="col-md-12">
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Successfully Updated!!</strong>
              <button type="button" name="addedBtn" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      </div>
      <?php }?>
      <?php if (!empty($_SESSION['delete'])){?>
      <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Successfully Deleted!!</strong>
              <button type="button" name="deleteBtn" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      </div>
      <?php }?>
          <?php
          unset($_SESSION['added']);
          unset($_SESSION['update']);
          unset($_SESSION['delete']);
          ?>
      </form>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Recipe List</h1>
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

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Recipe Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Chef Id</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Is Featured</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row){?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?=$row['title']?></td>
                        <th><img src="../uploads/<?=$row['images']?>" alt="" height="64px" width="120px"></th>
                        <td><?=$row['chef_id']?></td>
                        <td><?= date('d M Y h:i a',strtotime($row['created_at'])) ?></td>
                        <td>
                            <?php if($row['is_featured']==0){?>
                            <input type="checkbox">
                            <?php }else{?>
                            <input type="checkbox" checked>
                            <?php }?>
                        </td>
                        <td>
                            <div class="btn-group btn-group-justified">
                                <a href="edit-recipe.php?id=<?=$row['id']?>" class="btn btn-primary">Edit</a>
                                <a href="delete-recipe.php?id=<?=$row['id']?>"><button class="btn btn-danger delete" onclick="confirmDelete()" type="submit">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'common-footer.php'?>


<script type="text/javascript">
        function confirmDelete() {
            var v = confirm('Are you sure want to delete this medicine information?');
            if (v == false){
                event.preventDefault();
            }
        }
</script>
