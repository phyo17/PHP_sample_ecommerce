<?php include_once "../../resource/config.php";?>

<?php include_once template_back.DS."header.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">


<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Product

</h1>
</div>
               
<?php 
  if(isset($_POST['insert'])){
    $title = $_POST['product_title'];
    $description = $_POST['product_description'];
    $product_category = $_POST['product_category'];
    $quantity = $_POST['product_quantity'];
    $price = $_POST['product_price'];
    $short_description = $_POST['short_description'];
    $product_description = $_POST['product_description'];
    $date = $_POST['upload_date'];

    $image = $_FILES['product_image']['name'];
    $img_tmp = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($img_tmp, '../images/'.$image);

    $query = "INSERT INTO `products`(`product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_image`, `product_short_description`, `product_description`, `upload_date`) VALUES ('$title','$product_category','$price','$quantity','$image','$short_description','$product_description','$date')";
    query($query);
  }
 ?>

<form action="" method="post" enctype="multipart/form-data">

<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control">
       
    </div>


    <div class="form-group">
           <label for="product-title">Short Description</label>
      <textarea name="short_description" id="editor1" cols="30" rows="3" class="form-control"></textarea>
    </div>

    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="editor2" cols="30" rows="6" class="form-control"></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60">
      </div>
    </div>


    <div class="form-group">
        <input type="submit" name="insert" class="btn btn-primary btn-lg" value="Upload Product">
    </div>

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <!-- <div class="form-group">
       <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div> -->


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
          <hr>
          
        <select name="product_category" id="" class="form-control">
          <?php 
            $query = "SELECT * FROM categories";
            $result = query($query);
            while($data=fetch_array($result)){
          ?>
            <option value="<?php echo $data['id'] ?>"><?php echo $data['cat_title'] ?></option> 
            <?php
            }
           ?> 
        </select>
</div>


<!-- Product Tags -->


    <div class="form-group">
          <label for="product-title">Product Quantity</label>
          <input type="number" name="product_quantity" class="form-control">
    </div>

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="product_image">   
    </div>

    <div class="form-group">
      <label for="">Date</label>
      <input type="date" name="upload_date" class="form-control">
    </div>
    
</aside><!--SIDEBAR-->
   
</form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once template_back.DS."footer.php" ?>
