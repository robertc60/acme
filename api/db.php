<?php

    class Database {
        public $db;
        public function getConnection(){
            $this->db = null;
            try{
                $this->db = new mysqli('localhost','acme_user','Lampclock3','acmebroker');
            }catch(Exception $e){
                echo "Database could not be connected: " . $e->getMessage();
            }
            return $this->db;
        }
    }
?>