<?php

class ContactDetails {
    
    public $contactID;
    public $firstName;
    public $lastName;
    public $email;
    public $contactNo;
    public $tag;
    
    function __construct($contactID, $firstName, $lastName, $email, $contactNo,$tag) {
        $this->contactID = $contactID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->contactNo = $contactNo;
        $this->tag=$tag;
    }
    function getContactID() {
        return $this->contactID;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getEmail() {
        return $this->email;
    }
    function getTag() {
        return $this->tag;
    }

    function setTag($tag) {
        $this->tag = $tag;
    }

        function getContactNo() {
        return $this->contactNo;
    }

    function setContactID($contactID) {
        $this->contactID = $contactID;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setContactNo($contactNo) {
        $this->contactNo = $contactNo;
    }

   
    
}