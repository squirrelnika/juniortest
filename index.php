<?php
    $title = 'Product List';
    require_once 'partials/header.php';
    require_once 'db/conn.php';
    require_once 'productclass.php';

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
      <a href="index.php">MASS DELETE</a>
    </div>
  </div>
</nav>

<div class="row">
<?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>

  
  <div class="col-sm-6 my-2">
    <div class="card">
      <div class="card-body">
        <input class="form-check-input mt-0 delete-checkbox" type="checkbox">
        <h5 class="card-title"><?php echo $r['sku'] ?></h5>
        <p class="card-text"><?php echo $r['name'] ?></p>
      </div>
    </div>
  </div>
 

<?php }?>
</div>

<?php
  if(isset($_POST["submit"])){
    $product = new Product($_POST);
    print_r($product->getProduct()) ;
    echo "<br>";
    print_r($_POST);
    $dvd = new DVD($_POST);
    echo "<br>";
    print_r($dvd->getProduct());
    $crud->insertProduct($dvd->getProduct());
  }
?>

<?php require_once 'partials/footer.php'; ?>