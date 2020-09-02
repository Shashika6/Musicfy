<?php

class UserDetails {

    private $firstName;
    private $lastName;
    private $email;
    private $imageURL;
    private $userID;
    private $checkFollow;

    function __construct($firstName, $lastName, $email, $imageURL, $userID, $checkFollow) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->imageURL = $imageURL;
        $this->userID = $userID;
        $this->checkFollow = $checkFollow;
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

    function getImageURL() {
        return $this->imageURL;
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

    function setImageURL($imageURL) {
        $this->imageURL = $imageURL;
    }

    function getUserID() {
        return $this->userID;
    }

    function setUserID($userID) {
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

    function getCheckFollow() {
        return $this->checkFollow;
    }

    function setCheckFollow($checkFollow) {
        $this->checkFollow = $checkFollow;
    }

}
