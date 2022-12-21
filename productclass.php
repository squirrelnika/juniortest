<?php

    // Abstract product class
    abstract class Product{
        protected $data;
        private static $attributes = ['sku', 'name', 'price', 'productType'];

        // Function to clean data
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

        public function getProduct(){
            return $this->data;
        }

        public function setProduct($sku, $name, $price, $productType, $typeAttribute){
            $this->data["sku"] = self::test_input($sku);
            $this->data["name"] = self::test_input($name);
            $this->data["price"] = self::test_input($price);
            $this->data["productType"] = self::test_input($productType);
            $this->data["typeAttribute"] = self::test_input($typeAttribute);
        }
    }

    // Product child class for DVD
    class DVD extends Product {
        public function __construct($post_data){
            parent::__construct($post_data);
            $this->data["typeAttribute"] = parent::test_input( "Size: ". $post_data["size"] . "MB");
        }

    }

    // Product child class for Book
    class Book extends Product{
        public function __construct($post_data){
            parent::__construct($post_data);
            $this->data["typeAttribute"] = parent::test_input("Weight: ". $post_data["weight"]."KG");
        }
    }

    // Product child class for Furniture
    class Furniture extends Product{
        private $dimensions;
        public function __construct($post_data){
            parent::__construct($post_data);
            $this->dimensions = $post_data["height"]."X".$post_data["width"]."X".$post_data["length"];
            $this->data["typeAttribute"] = parent::test_input("Dimensions: ". $this->dimensions."cm");
            
        }
        // public function setProduct($sku, $name, $price, $productType, $height, $lenght, $width){
        //     $this->dimensions = parent::test_input($height."X".$width."X".$lenght);
        //     parent::setProduct($sku, $name, $price, $productType,$this->dimensions);
        // }

    }


?>