<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class moviefy_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
//    function getUsers($userid)
//    {
//        $this->db->where('userid',$userid);
//        $res = $this->db->get('todo');
//        if ($res->num_rows() == 0) {
//            return false;
//        }
//        $actions = array();
//        foreach ($res->result() as $row) {
//            $actions[] = $row->action;
//        }
//        return $actions;
//    }
     function loginCheck($username,$password){
       $query = $this->db->get('user');
       $loginuser="";
       $valid=true;
      $user=false;

foreach ($query->result() as $row)
{
        if ($username==$row->Username){
            $loginuser=$username;
           // echo "exists";
            $user=true;
           $valid=true;
            break;
        }
else {
     $valid=false  ;
        }
        
    }
    
    if ($user==true) {
     
    
        $query = $this->db->get('user');
     

foreach ($query->result() as $row){
           
            if (password_verify($password, $row->Password)){
          //  echo "correct pass";
           $valid=true;
            break;
        }
        else {
           $valid=false;
        }
    }
    }
    if ($valid==false){
       return false;
    }
    else if ($valid==true){
       
        $this->session->logintemp = $loginuser;
      //  echo $loginuser;
        return true;
    }
     }
      function add($userid,$password,$fullname,$genre,$profpic)
    {
        $this->db->insert('user',array('username' => $userid,'password' => $password,'fullname' => $fullname,'genre' => $genre, 'profilepic' => $profpic));
    }
    
    function timeline($currentUser){
      $this->db->where('Username',$currentUser);
       $query = $this->db->get('user');
       
         $query->result();
        $followsString="";
      
   
         
        foreach ($query->result() as $row)
{
       $followsString=$row->Follows;
      
}
    if ($followsString!=""){
    $followsString= ltrim($followsString, $followsString[0]); 
 //$followsString= str_replace(",","\",&nbsp;\"",$followsString);
//$followsString= "\"".$followsString."\"";
$followsString=$followsString.",".$currentUser;
  $stringParts = explode(",", $followsString);

    }
    else {
        $stringParts[0]=$currentUser; 
    }


$this->db->where_in('User', $stringParts);
$this->db->order_by("date", "desc");
$query = $this->db->get('timeline');

return $query->result();



foreach ($query->result() as $row){
   echo $row->User;
    echo $row->Message;
}
    
    }
    
     function privatetimeline($userprofile){
         $this->db->where('User', $userprofile );
        $query = $this->db->get('timeline');
        return $query->result();
    }
    
    function addMessages($messageusername,$message){
        $this->db->insert('timeline',array('User' => $messageusername,'Message' => $message));
    }
    
    function search (){
    
        $query = $this->db->get('user');
        return $query->result();   
    }
    
    function searchwithfilter ($search){
      $data = array();
      
        
       
        
      $this->db->like('Genre', $search);
    $res = $this->db->get('user');
     return $res->result();
    }
    
    function followedby($currentUser,$followeduser){
    $this->db->where('Username', $followeduser );
        $res=$this->db->get('user');
         $currentfollowedby="";
    

foreach ($res->result() as $row)
{
       $currentfollowedby=  $currentfollowedby. $row->FollowedBy;
       
}
        
        $this->db->set('followedby', $currentfollowedby.",".$currentUser);
$this->db->where('Username', $followeduser );
$this->db->update('user'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
                                  // update user set followedby= currentuser where  username= 
    }
    
  
    function follows($currentUser,$followeduser){
    
   $this->db->where('Username', $currentUser );
        $res=$this->db->get('user');
      $currentfollows="";
    

foreach ($res->result() as $row)
{
       $currentfollows=  $currentfollows . $row->Follows;
       
}


        
           $this->db->set('follows',  $currentfollows.",".$followeduser);
$this->db->where('Username', $currentUser );
$this->db->update('user');  
    }
    
    function unfollow($currentUser,$followeduser) {
        
          $query = $this->db->query("UPDATE user
SET Follows = REPLACE(Follows, ',".$followeduser."', '')
where Username='".$currentUser."'");
         
        
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "musicfy";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//
//$sql = "UPDATE user
//SET Follows = REPLACE(Follows, ',".$followeduser."', '')
//where Username='".$currentUser."'";
//echo $sql;
//if ($conn->query($sql) === TRUE) {
//    echo "Record updated successfully";
//} else {
//    echo "Error updating record: " . $conn->error;
//}
//
//$conn->close();
        
        
        
        
        
    }
    
    function unfollowedby($currentUser,$followeduser){
        
         $query = $this->db->query("UPDATE user
SET FollowedBy = REPLACE(Followedby, ',".$currentUser."', '')
where Username='".$followeduser."'");
        
        
//        $servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "musicfy";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//
//$sql = "UPDATE user
//SET FollowedBy = REPLACE(Followedby, ',".$currentUser."', '')
//where Username='".$followeduser."'";
//
//echo $sql;
//if ($conn->query($sql) === TRUE) {
//    echo "Record updated successfully";
//} else {
//    echo "Error updating record: " . $conn->error;
//}
//
//$conn->close();
        
        
        
    }
    
    function checkfriends($currentuser,$otheruser){
        
   
        $this->db->where('Username', $otheruser);
        $this->db->select('Follows');
         $res = $this->db->get('user');
        // print_r($this->db->last_query());   
        // print_r("<br>");
         $follows="";
         $followedby="";
 
         foreach ($res->result() as $row)
{
       $follows=$row->Follows;
      
}
         
          $this->db->where('Username', $otheruser);
          $this->db->select('FollowedBy');
         $res = $this->db->get('user');
       //  print_r($this->db->last_query());
      //   print_r("<br>");
         
                  foreach ($res->result() as $row)
{
       $followedby=$row->FollowedBy;
       
        
}

// echo $follows; 
    //  echo "<br>";
 //echo $followedby;
    //  echo "<br>";
            if (strpos($follows,$currentuser) !== false && strpos($followedby, $currentuser) !== false){
                  //  echo "found";
                   // echo "<br>";
                return true;
           
            }
            else {
              //  echo "notfound";
              //  echo "<br>";
                return false;
            }
    }
    
    function profile ($name){
        $this->db->where('Username', $name);
         $res = $this->db->get('user');
           return $res->result();
    }
    
    function checkUsername ($username){
        $query = $this->db->query("SELECT * FROM user WHERE username='".$username."'");

$row = $query->row();

   if (empty($row)){
       return false;
   }
   
   else {
       return true;
   }
    }
    
   function checkfollowcount($name){
       $this->db->where('Username', $name);
         $res = $this->db->get('user');
          $follows= "";
          
          foreach ($res->result() as $row)
{
       $follows=$row->Follows;
      
}
return substr_count($follows, ','); 

   } 
   
    function checkfollowedbycount($name){
       $this->db->where('Username', $name);
         $res = $this->db->get('user');
   
   $followedby="";
          foreach ($res->result() as $row)
{
       $followedby=$row->FollowedBy;
      
}
return substr_count($followedby, ','); 
    } 
    
    
    function getfollow($user){
   
        $this->db->where('Username', $user);
        $this->db->select('Follows');
         $res = $this->db->get('user');
       
         $follows="";
       
 
         foreach ($res->result() as $row)
{
       $follows=$row->Follows;
      
}
  $follows = substr( $follows, 1);
 
return $follows;

    }
    
    function getfollowedby($user){
          $this->db->where('Username', $user);
          $this->db->select('FollowedBy');
         $res = $this->db->get('user');
          $followedby="";
       //  print_r($this->db->last_query());
      //   print_r("<br>");
        
                  foreach ($res->result() as $row)
{
       $followedby=$row->FollowedBy;
     
        
}
      $followedby = substr( $followedby, 1);

      return $followedby;
}
        
     }
    
   

   