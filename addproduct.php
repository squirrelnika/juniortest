<?php
    $title = 'Product Add';
    require_once 'partials/header.php';
    require_once 'db/conn.php';
?>

<nav class="navbar navbar-default bg-light">
    <div class="container">
      <div class="navbar-header">
        <p class="navbar-brand">Product Add</p>
      </div>
      <div>
        <a href="index.php">HOME</a>
        <button type="submit" form="product_form" class="btn btn-outline-info" name="submit">Save</button>
        <button type="button" class="btn btn-outline-info">Cancel</button>     
      </div>
    </div>
</nav>

<form class="row g-3 align-items-center ms-2" action="index.php" method="post" id="product_form">
  <div class="col-auto">
    <div class="row my-2">
      <div class="col-3"><label for="sku" class="form-label">SKU</label></div>
      <div class="col-9"><input class="form-control" type="text" name="sku" id="sku" pattern="^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z\d]{9}$" required></div>
    </div>
    <div class="row my-2">
      <div class="col-3"><label for="name" class="form-label">Name</label></div>
      <div class="col-9"><input class="form-control" type="text" name="name" id="name" pattern="^[a-zA-Z\s]*$" required ></div>
    </div>
    <div class="row my-2">
      <div class="col-3"><label for="price" class="form-label">Price ($)</label></div>
      <div class="col-9"><input class="form-control" type="text" name="price" id="price" pattern="^\d+(,\d{1,2})?$" required></div>
    </div>
    <div class="row my-2">
      <div class="col-auto"><label for="productType" class="form-label">Type Switcher</label></div>
      <div class="col-auto">
        <select name="productType" id="productType" class="form-select" required>
          <option selected>Type Switcher</option>
          <option value="DVD">DVD</option>
          <option value="Furniture">Furniture</option>
          <option value="Book">Book</option>
        </select>
      </div>
    </div>
    <div id="DVDdescription" class="my-2">
      <p>Please provide DVD size in MB</p>
      <div class="row">
        <div class="col-auto"> <label for="size" class="form-label">Size (MB)</label> </div>
        <div class="col-auto"> <input class="form-control" type="text" name="typeAttribute" id="size"> </div> 
      </div>
    </div>
    <div id="furnitureDescription" class="my-2">
      <p>Please provide Furniture dimensions in cm</p>
      <div class="row my-2">
        <div class="col-auto"> <label for="height" class="form-label">Height (cm)</label> </div>
        <div class="col-auto"> <input class="form-control" type="text" name="FurnitureHeight" id="height"> </div> 
      </div>
      <div class="row my-2">
        <div class="col-auto"> <label for="width" class="form-label">Width (cm)</label> </div>
        <div class="col-auto"> <input class="form-control" type="text" name="FurnitureWidth" id="width"> </div> 
      </div>
      <div class="row my-2">
        <div class="col-auto"> <label for="lenght" class="form-label">Lenght (cm)</label> </div>
        <div class="col-auto"> <input class="form-control" type="text" name="FurnitureLenght" id="lenght"> </div> 
      </div>
    </div>
    <div id="bookDescription" class="my-2">
      <p>Please provide Books weight in kg</p>
      <div class="row">
        <div class="col-auto"> <label for="size" class="form-label">Weight (kg)</label> </div>
        <div class="col-auto"> <input class="form-control" type="text" name="typeAttribute" id="weight"> </div> 
      </div>
    </div>
   
  </div>
  
</form>











<?php require_once 'partials/footer.php'; ?>