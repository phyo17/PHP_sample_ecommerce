<?php include_once "../../resource/config.php";?>

<?php include_once template_back.DS."header.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

<h1 class="page-header">
  Product Categories
</h1>

<?php 
    if(isset($_POST['add_category'])){
        $category = $_POST['category'];
        query("INSERT INTO `categories`(`cat_title`) VALUES ('$category')");
    }
 ?>


<div class="col-md-4">

        <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name="category" class="form-control">
        </div>

        <div class="form-group">
            
            <input type="submit" name="add_category" class="btn btn-primary" value="Add Category">
        </div>      

    </form>


    <?php 
        if(isset($_GET['edit'])){
            $edit = $_GET['edit'];
            $query = query("SELECT * FROM categories WHERE id=$edit");
            $data = fetch_array($query);
            $result = $data['cat_title'];
    ?>
     <?php 
        if(isset($_POST['edit_category'])){
            $category = $_POST['category'];
            query("UPDATE `categories` SET `cat_title`='$category' WHERE id=$edit");
            redirect('categories.php');
        }
      ?>
    <h2 class="text-center">Update</h2>
        <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name="category" value="<?php echo $result; ?>" class="form-control">
        </div>

        <div class="form-group">
            
            <input type="submit" name="edit_category" class="btn btn-info" value="Update Category">
        </div>      

    </form>
    <?php
        }
    ?>
    
    


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
            </thead>


    <tbody>
        <?php 
            $no = 1;
            $query = query("SELECT * FROM categories ORDER BY id DESC");
            //$data = fetch_array($query);
            while($row=fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['cat_title']; ?></td>
            <td><a href="categories.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning">Update</a></td>
            <td><a href="categories.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php
            }
         ?>
    </tbody>

        </table>

</div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include_once template_back.DS."footer.php" ?>

<?php 
        if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            query("DELETE FROM `categories` WHERE id=$id");
            redirect('categories.php');
        }
      ?>
