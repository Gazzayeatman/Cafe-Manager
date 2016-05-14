<?php
    class Cafe{
        public $id;
        public $name;
        public $address;
        
        public function __construct($id,$name,$address){
            $this->id = $id;
            $this->name = $name;
            $this->address = $address;  
        }
        
        public function get(){
            null;
        }
        public function getName(){
            return $this->name;
        }
    }
?>