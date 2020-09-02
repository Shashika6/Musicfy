<?php

include 'ContactDetails.php';
class Contacts extends CI_Model {
    
    
    public function getTagString($id){
           
        $this->db->select('tagname');
$this->db->from('tag_name');
$this->db->join('contact_tags', 'tag_name.tagID = contact_tags.tagID');
$this->db->where('contact_tags.contactID', $id);
        
     //   $query="SELECT tagname from tag_name";
// $query=  "SELECT a.tagname as tags FROM tag_name a INNER JOIN contact_tags b ON a.tagID = b.tagID where b.contactID='".$id."'";
          $query = $this->db->get();
          $string="";
       foreach ($query->result() as $row){
           $string= $string.$row->tagname.",";  
                   
               //    tag=tag+tag;
                   
                   
       }
        $string= substr_replace($string ,"",-1);
         return $string;
    }
    
    public function getContactList($userID) {

      
        $this->db->select('contactID,firstName,lastName,email,contactNo');
        $this->db->where('userID', $userID);
        $query=$this->db->get('my_contacts');
        
    
        
         $contactList = array();
        foreach ($query->result() as $row) {
        
 
         $string= $this->getTagString($row->contactID);
         
              $contactList[] = new ContactDetails($row->contactID, $row->firstName, $row->lastName, $row->email, $row->contactNo,"$string");
        }   
        return $contactList;
       
    }
    
   public function count(){
        $id=$this->db->count_all('my_contacts');
         $id=$id+1;
         
         return $id;
   }
    
    public function insertContact($data,$tags,$userID,$count){
        
        
       
         $res = $this->db->insert('my_contacts', $data);
         
         foreach ($tags as $tagID) {

            $tagArray = array(
                'tagID' => $tagID,
                'userID' => $userID,
                   'contactID'=>$count
            );
            
          $this->db->insert('contact_tags', $tagArray);
    }
    
   }
   public function editUserContact ($contactId,$data) {
        $this->load->database(); 
   $this->db->where('contactID', $contactId);
$res=$this->db->update('my_contacts', $data);
        
     
        return $res;
    }
    public function deleteContact($contactID){
         $this->load->database();


        $this->db->where('contactID', $contactID);
        $this->db->delete('my_contacts');
    }
    
}
