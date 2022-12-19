<?php

    // Abstract product class 
    abstract class Product{
        protected $data;
        private static $attributes = ['sku', 'name', 'price', 'productType'];

        public static function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function __construct($post_data){
            foreach(self::$attributes as $attribute){
                if(array_key_exists($attribute, $post_data)){
                    $this->data[$attribute] = self::test_input($post_data[$attribute]);
                }
            }
        }

        // change get and set, to choose which property to change
        public function getProduct(){
            return $this->data;
        }

        // public function setProduct($sku, $name, $price, $productType, $typeAttribute){
        //     $this->data["sku"] = $sku;
        //     $this->data["name"] = $name;
        //     $this->data["price"] = $price;
        //     $this->data["productType"] = $productType;
        //     $this->data["typeAttribute"] = $typeAttribute;
        // }
    }
    class DVD extends Product {
        public function __construct($post_data){
            parent::__construct($post_data);
            $this->data["typeAttribute"] = "Size: ". $post_data["size"] . "MB";
        }

    }

    class Book extends Product{
        public function __construct($post_data){
            parent::__construct($post_data);
            $this->data["typeAttribute"] = "Weight: ". $post_data["weight"]."KG";
        }
    }

    class Furniture extends Product{
        private $dimensions;
        public function __construct($post_data){
            parent::__construct($post_data);
            $this->dimensions = $post_data["height"]."X".$post_data["width"]."X".$post_data["lenght"];
            $this->data["typeAttribute"] = "Dimensions: ". $this->dimensions."cm";
            
        }
        // public function setProduct($sku, $name, $price, $productType, $height, $lenght, $width){
        //     $this->dimensions = $height."X".$width."X".$lenght;
        //     parent::setProduct($sku, $name, $price, $productType,$this->dimensions);
        // }

    }


?>