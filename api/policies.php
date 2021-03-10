<?php
    class Policy{
        // dbection
        private $db;
        // Table
        private $db_table = "policies";
        // Columns
        public $id;
        public $customer;
        public $address;
        public $premium;
        public $type;
        public $insurer;


        // Db dbection
        public function __construct($db){
            $this->db = $db;
        }

        // GET ALL
        public function getPolicies(){
            $sql = "SELECT id, customer, address, premium, type, insurer FROM " . $this->db_table . "";
            $this->result = $this->db->query($sql);
            return $this->result;
        }

        // CREATE
        public function createPolicy(){
            // sanitize
            $this->customer = htmlspecialchars(strip_tags($this->customer));
            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->premium = htmlspecialchars(strip_tags($this->premium));
            $this->type = htmlspecialchars(strip_tags($this->type));
            $this->insurer = htmlspecialchars(strip_tags($this->insurer));
            $sql = "INSERT INTO " . $this->db_table . "(`customer`, `address`, `premium`, `type`, `insurer`) VALUES 
                ('" . $this->customer ."','" . $this->address . "'," . $this->premium . ",'" . $this->type .
                "','" . $this->insurer . "')";
            $this->db->query($sql);
            if($this->db->affected_rows > 0){
                return true;
            } else {
                return false;
            }
        }

        // UPDATE
        public function getSinglePolicy(){
            $sql = "SELECT * FROM ". $this->db_table ." WHERE id = " . $this->id . " ";
            $record = $this->db->query($sql);
            $dataRow = $record->fetch_assoc();
            $this->customer = $dataRow['customer'];
            $this->address = $dataRow['address'];
            $this->premium = $dataRow['premium'];
            $this->type = $dataRow['type'];
            $this->insurer = $dataRow['insurer'];
        }

        // UPDATE
        public function updatePolicy(){
            $this->customer=htmlspecialchars(strip_tags($this->customer));
            $this->address=htmlspecialchars(strip_tags($this->address));
            $this->premium=htmlspecialchars(strip_tags($this->premium));
            $this->type=htmlspecialchars(strip_tags($this->type));
            $this->insurer=htmlspecialchars(strip_tags($this->insurer));

            $sql = "UPDATE " . $this->db_table . " SET customer = '" . $this->customer . "',
                    address = '" . $this->address . "', premium = '" . $this->premium . "',
                    type = '" . $this->type . "'WHERE id = ".$this->id;
            $this->db->query($sqlQuery);
            if($this->db->affected_rows > 0){
                return true;
            } else {
                return false;
            }
        }

        // DELETE
        function deletePolicy(){ 
            $sql = "DELETE FROM " . $this->db_table . " WHERE id = " . $this->id . "";
            $this->db->query($sql);
            if($this->db->affected_rows > 0){
                return true;
            } else {
                return false;
            }
        }
    }    
?>