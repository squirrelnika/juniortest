<?php

    class crud {
        // private database object
        private $db;
        
        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
        public function insertProduct($data){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO products (sku, name, price, type, typeAttribute) VALUES (:sku,:productname,:price,:productType,:typeAttribute)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':sku',$data['sku']);
                $stmt->bindparam(':productname',$data['name']);
                $stmt->bindparam(':price',$data['price']);
                $stmt->bindparam(':productType',$data['productType']);
                $stmt->bindparam(':typeAttribute',$data['typeAttribute']);


                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getProducts(){
            try{
                $sql = "SELECT * FROM products";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }
           
        }
        public function deleteProduct($sku){
            try{
                 $sql = "delete from products where sku = :sku";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':sku', $sku);
                 $stmt->execute();
                 return true;
             }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }
    }

?>