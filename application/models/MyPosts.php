<?php

class MyPosts{
    
   
    private $postDescription;
    private $date;
    

    
    function __construct($postDescription, $date) {
        $this->postDescription = $postDescription;
        $this->date = $date;
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


}

