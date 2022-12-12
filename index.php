<?php
    $title = 'Product List';
    require_once 'partials/header.php';
    require_once 'db/conn.php';
    require_once 'productclass.php';
?>

<nav class="navbar navbar-default bg-light">
    <div class="container">
      <div class="navbar-header">
        <p class="navbar-brand">Product List</p>
      </div>
      <div>
        <a href="index.php">HOME</a>
        <a href="addproduct.php">ADD</a>
        <a href="index.php">MASS DELETE</a>
      </div>
    </div>
  </nav>
  <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <input class="form-check-input mt-0 delete-checkbox" type="checkbox">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
</div>
<?php 
  if(isset($_POST['submit'])){

    //extract values from the $_POST array
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $product = new Product($sku,$name,$price);

    echo $product->getProduct();

  }
?>

<?php require_once 'partials/footer.php'; ?>