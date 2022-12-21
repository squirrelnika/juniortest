<?php
  require_once 'db/conn.php';
  require_once 'productclass.php';

  $results = $crud->getProducts();
  $productList = [];

    while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
        $productClass = $r['type'];
        $product = new $productClass($r);
        array_push($productList,$product);
    }
?>
