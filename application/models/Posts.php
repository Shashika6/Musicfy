<?php

class Posts {

    private $postDescription;
    private $date;
    private $firstName;
    private $lastName;
    private $imageUrl;
    private $userID;

    function __construct($postDescription, $date, $firstName, $lastName, $imageUrl, $userID) {
        $this->postDescription = $postDescription;
        $this->date = $date;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->imageUrl = $imageUrl;
        $this->userID = $userID;
    }

    function getPostDescription() {
        return $this->postDescription;
    }

    function getDate() {
        return $this->date;
    }

    function setPostDescription($postDescription) {
        $this->postDescription = $postDescription;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getImageUrl() {
        return $this->imageUrl;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    function getUserID() {
        return $this->userID;
    }

    function setUserID($userID) {
        $this->userID = $userID;
    }

}
