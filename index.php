<?php
  $title = 'Product List';
  require_once 'partials/header.php';
  require_once 'db/conn.php';
  require_once 'productclass.php';

  if(isset($_POST["submit"]) && isset($_POST["name"])){
    $productClass = $_POST['productType'];
    $product = new $productClass($_POST);
    $crud->insertProduct($product->getProduct());
  }

  if(isset($_POST["submit"]) && isset($_POST["delete"])){
    foreach($_POST["delete"] as $prod){
      $crud->deleteProduct($prod);
    }
  }

  require_once 'fetchproducts.php';
?>

<nav class="navbar navbar-default bg-light">
  <div class="container">
    <div class="navbar-header">
      <p class="navbar-brand">Product List</p>
    </div>
    <div>
      <a href="addproduct.php"><button class="btn btn-outline-info">ADD</button></a>
      <button type="submit" form="delete_form" class="btn btn-outline-info" id="delete-product-btn" name="submit">MASS DELETE</button>
    </div>
  </div>
</nav>

<form action="index.php" method="POST" id="delete_form">
  <div class="container">
    <div class="row gx-5">
    <?php foreach($productList as $product) {
      $p = $product->getProduct();  
    ?>

      
      <div class="col-sm-3 my-2">
        <div class="card">
          <div class="card-body">
            <input class="form-check-input mt-0 delete-checkbox" type="checkbox" name="delete[]" value="<?php echo $p['sku'] ?>">
            <div class="text-center">
              <h5 class="card-title"><?php echo $p['sku'] ?></h5>
              <p class="card-text"><?php echo $p['name'] ?></p>
              <p class="card-text"><?php echo number_format($p['price'],2) ?> $</p>
              <p class="card-text"><?php echo $p['typeAttribute'] ?></p>
            </div>
          </div>
        </div>
      </div>

    <?php }?>
    </div>
  </div>
</form>

<?php require_once 'partials/footer.php'; ?>