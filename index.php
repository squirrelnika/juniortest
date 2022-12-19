<?php
  $title = 'Product List';
  require_once 'partials/header.php';
  require_once 'db/conn.php';
  require_once 'productclass.php';

  if(isset($_POST["submit"])){
    $productClass = $_POST['productType'];
    $product = new $productClass($_POST);
    $crud->insertProduct($product->getProduct());
  }

  $results = $crud->getProducts();
?>

<nav class="navbar navbar-default bg-light">
  <div class="container">
    <div class="navbar-header">
      <p class="navbar-brand">Product List</p>
    </div>
    <div>
      <a href="index.php">HOME</a>
      <a href="addproduct.php">ADD</a>
      <a href="index.php" id="delete-product-btn">MASS DELETE</a>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row gx-5">
  <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>

    
    <div class="col-sm-3 my-2">
      <div class="card">
        <div class="card-body">
          <input class="form-check-input mt-0 delete-checkbox" type="checkbox" value="<?php echo $r['sku'] ?>">
          <div class="text-center">
            <h5 class="card-title"><?php echo $r['sku'] ?></h5>
            <p class="card-text"><?php echo $r['name'] ?></p>
            <p class="card-text"><?php echo number_format($r['price'],2) ?> $</p>
            <p class="card-text"><?php echo $r['typeAttribute'] ?></p>
          </div>
        </div>
      </div>
    </div>
  

  <?php }?>
  </div>
</div>


<?php require_once 'partials/footer.php'; ?>