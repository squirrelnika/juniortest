<?php

    class crud {
        // private database object
        private $db;
        
        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
        public function insertProduct($sku, $name, $price, $productType, $typeAttribute){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO products (sku, name, price, type, typeAttribute) VALUES (:sku,:productname,:price,:productType,:typeAttribute)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':sku',$sku);
                $stmt->bindparam(':productname',$name);
                $stmt->bindparam(':price',$price);
                $stmt->bindparam(':productType',$productType);
                $stmt->bindparam(':typeAttribute',$typeAttribute);


                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }

?>