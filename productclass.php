<?php
    class Product{
        protected $sku;
        protected $name;
        protected $price;

        public function __construct($Psku,$Pname,$Pprice){
            $this->sku = $Psku;
            $this->name = $Pname;
            $this->price = $Pprice;
        }

        public function getProduct(){
            $productInfo =  $this->sku ." ". $this->name." ".$this->price;
            return $productInfo;
        }

        public function setProduct($Psku,$Pname,$Pprice){
            $this->sku = $Psku;
            $this->name = $Pname;
            $this->price = $Pprice;
        }

    }

    class DVD extends Product {
        private $size;

        public function __construct($Psku,$Pname,$Pprice,$size){
            $this->size = $size;
            parent::__construct($Psku,$Pname,$Pprice);
        }
    }

    class Book extends Product{
        private $weight;

        public function __construct($Psku,$Pname,$Pprice,$weight){
            $this->weight = $weight;
            parent::__construct($Psku,$Pname,$Pprice);
        }
    }

    class Furniture extends Product{
        private $height;
        private $lenght;
        private $width;
        private $dimensions;

        public function __construct($Psku,$Pname,$Pprice,$height,$lenght,$width){
            $this->height = $height;
            $this->width = $width;
            $this->lenght = $lenght;
            $this->dimensions = $height."X".$width."X".$lenght;
            parent::__construct($Psku,$Pname,$Pprice);
        }

    }


?>