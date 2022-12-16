<?php

    // Abstract product class 
    class Product{
        protected $data;

        public function __construct($post_data){
            $this->data = $post_data;
        }

        // change get and set, to choose which property to change
        public function getProduct(){
            return $this->data;
        }

        public function setProduct($sku, $name, $price, $productType, $typeAttribute){
            $this->data["sku"] = $sku;
            $this->data["name"] = $name;
            $this->data["price"] = $price;
            $this->data["productType"] = $productType;
            $this->data["typeAttribute"] = $typeAttribute;
        }
    }
    // classes for other types
    // class DVD extends Product {

    // }

    // class Book extends Product{

    // }

    class Furniture extends Product{
        private $dimensions;
        public function __construct($post_data){
            parent::__construct($post_data);
            $this->dimensions = $post_data["height"]."X".$post_data["width"]."X".$post_data["lenght"];
            $this->data["typeAttribute"] = $this->dimensions;
            
        }
        // public function setProduct($sku, $name, $price, $productType, $height, $lenght, $width){
        //     $this->dimensions = $height."X".$width."X".$lenght;
        //     parent::setProduct($sku, $name, $price, $productType,$this->dimensions);
        // }

    }


?>