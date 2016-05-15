<?php
    class User{
        public $id;
        public $username;
        public $firstName;
        public $lastName;
        public $usertype;
        public $phoneNumber;
        public $address;
        public $myCafe;
        
        public function __construct($id, $username, $firstName, $lastName, $usertype, $phoneNumber, $address, $myCafe){
            $this->id = $id;
            $this->username = $username;
            $this->firstName = $firstName;
            $this->lastName = lastName;
            $this->phoneNumber = $phoneNumber;
            $this->address = $address;
            $this->myCafe = $database->getCafe($myCafe);
        }
    }
?>