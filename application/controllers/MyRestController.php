<?php

use chriskacerguis\Restserver;

require BASEPATH . 'libraries/chriskacerguis/Restserver/RestController.php';
require BASEPATH . 'libraries/chriskacerguis/Restserver/Format.php';

class MyRestController extends \chriskacerguis\RestServer\RestController {

      public function __construct() {
        parent::__construct();
    }

   public function json_encode_function ($results) {
      header('content-Type:text/json; charset=UTF-8');
      echo json_encode($results);
   }    

    public function Contacts_get(){
      $this->load->model('Contacts', 'contact');
   $userID= $this->session->logintemp;
   
      $contactList = $this->contact->getContactList($userID);
    
      $this->json_encode_function($contactList);
   }
   
   public function Contacts_post(){
      $firstName = $this->post('firstName');
      $lastName = $this->post('lastName');
      $email = $this->post('email');
      $tag=$this->post('tags[]');
       $this->load->library('session');
       $userID= $this->session->logintemp;
    
      $tags = $this->post('tags');
      $string=implode(", ",$tags);
      $contactNo = $this->post('contactNo');

      $this->load->model('Contacts', 'contact');
      $count=$this->contact->count();
      $data=array(
          'firstName'=>$firstName,
          'lastName'=>$lastName,
          'email'=>$email,
          'userID'=>$userID,
          'contactNo'=>$contactNo,
          'contactID'=>$count,  
              
      );
      $this->contact->insertContact ($data , $tags , $userID, $count);

      $arr = array('a' => 1, 'b' => 2);

      header('Content-Type: application/json');
      echo json_encode( $arr );

   }
   
   public function Contacts_put($contactID){
        
 $userID= $this->session->logintemp;
      $firstName = $this->put('firstName');
      $lastName = $this->put('lastName');
      $contactNo = $this->put('contactNo');
      $email = $this->put('email');
      
//      $tags = $this->put('Tags');

      
         $data=array(
         
          'firstName'=>$firstName,
          'lastName'=>$lastName,
          'contactNo'=>$contactNo,
          'email'=>$email
      );
      
      
      $this->load->model('Contacts');
      $result=$this->Contacts->editUserContact($contactID,$data);
     
       $res = array (
        'status'=> true
    );
    $this->response($res,200);
      

   }
   
   
    public function Contacts_delete($contactID){
     
      $this->load->model('Contacts', 'contact');
      $this->contact->deleteContact($contactID);
      $arr = array('a' => 1, 'b' => 2);

      //add the header here
      header('Content-Type: application/json');
      echo json_encode( $arr );
   }


    

}
