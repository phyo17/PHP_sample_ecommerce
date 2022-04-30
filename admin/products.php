<?php include_once "../../resource/config.php";?>

<?php include_once template_back.DS."header.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

             <div class="row">

<h1 class="page-header">
   All Products

</h1>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Category</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Update</th>
           <th>Delete</th>
      </tr>
    </thead>
    <tbody>

      <?php 
        $no = 1;
        $query = "SELECT * FROM products ORDER BY id DESC";
        $result = query($query);
        while($data=fetch_array($result)){
      ?>

      <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['product_title']; ?><br>
              <img src="http://placehold.it/62x62" alt="">
            </td>
            <?php 
              $category = "SELECT * FROM categories WHERE id={$data['product_category_id']}";
              $cat_result = query($category);
              while($cat_data=fetch_array($cat_result)){
            ?>           
            <td><a href="../category.php?id=<?php echo $cat_data['id'] ?>"><?php echo $cat_data['cat_title'] ?></a> </td>
             <?php
              }
             ?>

            <td><?php echo $data['product_price']; ?></td>
            <td><?php echo $data['product_quantity']; ?></td>
            <td><a href="edit_product.php?edit_id=<?php echo $data['id'] ?>" class="btn btn-warning">Update</a></td>
            <td><a href="products.php?delete_id=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a></td>
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
