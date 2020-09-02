<?php


class MyContacts extends CI_Controller{

    public function index() {
   
        $this->load->view('myContacts');
        
    }
    
public function deleteContact(){
    
}

public function editContact(){
    
}

public function addContact(){
    
}

public function search(){
    $this->load->view('searchdelete');
}

}
