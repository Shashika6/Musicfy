<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

      
    public $CI = NULL;
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function  index()
	{
          $this->CI = & get_instance(); 
            $this->load->helper('url');
             $this->load->model('moviefy_model');
           
             $test="Welcome, Please Enter Username and Password Below :";
             $data['check'] = array("$test");
             
		$this->load->view('Login',$data);
              
	}
        
        public function url(){
            echo $test;
        }
        public function loginCheck(){
            $this->load->helper('url');
             $username = $this->input->post('username');
            
             $password = $this->input->post('password');
          
             if ($username==""||$username==null){
            
              
       $test="Please Enter Username";
             $data['check'] = array("$test");
             
		$this->load->view('Login',$data);
             }
             
             else if ($password==""||$password==null){
                   $test="Please Enter Password";
             $data['check'] = array("$test");
                              
   $this->load->helper('url');
		$this->load->view('Login',$data);

   
             }
             
             else {
              //   echo "valid";
                  $this->load->library('session');
                    $this->load->model('moviefy_model','mod');
       $test= $this->mod->loginCheck($username,$password);
        if ($test==true) {
            
      
         $this->showTimeline();         
          
             
       
        }
        
        else {
              $test="Invalid Username/Password";
             $data['check'] = array("$test");
                              
   $this->load->helper('url');
		$this->load->view('Login',$data);
        }
             }
        }
        
        public function search(){
                 $this->load->library('session');
                   $currentuser= $this->session->logintemp;
            $search = $this->input->post('search');
                  if ($search==""||$search==null) {
                       
                           $this->load->model('moviefy_model','model');
$getusers['posts'] = $this->model->search();
    
             foreach($getusers['posts'] as $row){
                 if ($currentuser==$row->Username){
                     continue;
                 }
                 else {
                      $row->followsCount=$this->model->checkfollowcount($row->Username);
       $row->followedByCount=$this->model->checkfollowedbycount($row->Username);  
                  $boolcheck= $this->model->checkfriends($currentuser,$row->Username);
       if ($boolcheck==true || $boolcheck==1)   {
       $row->friends="You are friends with this user";
    
       }
        else {
           $row->friends="You are not friends with this user";
       }
       
                 
            
      if (strpos($row->FollowedBy, $currentuser) !== false){
          $row->disabled= "disabled";
          $row->enabled="";
          
      
        
  }
  else {
            $row->disabled="";
            $row->enabled="disabled";
           
             }
             }
             
     
              $this->load->helper('url');
       
     
       
                       
                  }
                  }
                    
                    else {
                        
                        
                        
                         $this->load->model('moviefy_model','model');
$getusers['posts'] = $this->model->searchwithfilter($search);
  foreach($getusers['posts'] as $row){
      $row->Username;
      if ($currentuser==$row->Username){
                     continue;
                 }
                 else {
                     
      //
       $row->followsCount=$this->model->checkfollowcount($row->Username);
       $row->followedByCount=$this->model->checkfollowedbycount($row->Username);          
       $boolcheck= $this->model->checkfriends($currentuser,$row->Username);
       if ($boolcheck==true || $boolcheck==1)   {
       $row->friends="You are friends with this user";
       }
       else {
           $row->friends="You are not friends with this user";
       }
       
 if (strpos($row->FollowedBy, $currentuser) !== false){
          $row->disabled= "disabled";
          $row->enabled="";
   
    
       }
        
  
  else {
            $row->disabled="";
            $row->enabled="disabled";
            
             }
             }
                    }
             
      }
            
              $this->load->helper('url');
       
        $this->load->view('search', $getusers);
                            
              
                    }
                    
        
        public function profile () {
             $this->load->library('session');
              $currentuser= $this->session->logintemp;
          $profile = $this->input->post('userprofile');
              $this->load->model('moviefy_model','mod');
      $getusers['posts'] = $this->mod->profile($profile);
        
          foreach($getusers['posts'] as $row){
              
                 $row->followsString=$this->mod->getfollow($row->Username);
               $row->followedbyString=$this->mod->getfollowedby($row->Username);
               $row->followsCount=$this->mod->checkfollowcount($row->Username);
       $row->followedByCount=$this->mod->checkfollowedbycount($row->Username);    
      if (strpos($row->FollowedBy, $currentuser) !== false){
          $row->disabled= "disabled";
          $row->enabled="";
    
         
        
  }
  else {
            $row->disabled="";
            $row->enabled="disabled";
             }
             }
             
     
              $this->load->helper('url');
       
    
              
    $linkimage="";

         
$getmessages['posts2'] = $this->mod->privatetimeline($profile);

          foreach(array_reverse($getmessages['posts2']) as $row){
              $checkURL= $row->Message;
           $reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";
$imagevalidation=false;

	// Check if there is a url in the text
	if(preg_match_all($reg_exUrl, $checkURL, $url)) {

        // Loop through all matches
        foreach($url[0] as $newLinks){
            if(strstr( $newLinks, ":" ) === false){
				$link = 'http://'.$newLinks;
			}else{
				$link = $newLinks;
			}
             $str_to_insert="<br>";

   $newstr = substr_replace($link, $str_to_insert, 70, 0);

            // Create Search and Replace strings
            $search  = $newLinks;
            
            $replace = '<a href="'.$link.'" title="'.$newLinks.'" target="_blank">'.$newstr.'</a>';
            
           $checkURL = str_replace($search, $replace, $checkURL);
       
          $checkimage="";
          
          $checkimage=getimagesize($link);
         if ($checkimage==null||$checkimage==""){
              //echo "not an image";
              $imagevalidation=false;
                        }
                        else {
                            $imagevalidation=true;
                          $linkimage=$link;
                        }
	}
        }
        $str_to_insert="<br>";
    //Return result
  //  echo $checkURL;
                    $row->image=$imagevalidation;
                   $row->Message=$checkURL;    
                   $row->Link= $linkimage;
               
          }  
           $this->load->helper('url');               
        
              
              
              
       
                        $bagofvalues= array(
                'posts'  => $getusers['posts'],  
                 'posts2' => $getmessages['posts2']          
                 
    );
                  
      
      
        $this->load->view('profile', $bagofvalues);
            
        }
        
        
        
        public function privateprofile () {
             $this->load->library('session');
              $currentuser= $this->session->logintemp;
          $profile = $this->input->post('userprofile');
              $this->load->model('moviefy_model','mod');
      $getusers['posts'] = $this->mod->profile($currentuser);
           
      
          foreach($getusers['posts'] as $row){
            $row->followsString=$this->mod->getfollow($row->Username);
               $row->followedbyString=$this->mod->getfollowedby($row->Username);
               $row->followsCount=$this->mod->checkfollowcount($row->Username);
       $row->followedByCount=$this->mod->checkfollowedbycount($row->Username);
      if (strpos($row->FollowedBy, $currentuser) !== false){
          $row->disabled= "disabled";
          $row->enabled="";
    
         
        
  }
  else {
            $row->disabled="";
            $row->enabled="disabled";
             }
             }
             
     
              $this->load->helper('url');
       
    
              
    $linkimage="";

         
$getmessages['posts2'] = $this->mod->privatetimeline($currentuser);
rsort($getmessages['posts2']);
          foreach($getmessages['posts2'] as $row){
              $checkURL= $row->Message;
           $reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";
$imagevalidation=false;

	// Check if there is a url in the text
	if(preg_match_all($reg_exUrl, $checkURL, $url)) {

        // Loop through all matches
        foreach($url[0] as $newLinks){
            if(strstr( $newLinks, ":" ) === false){
				$link = 'http://'.$newLinks;
			}else{
				$link = $newLinks;
			}
             $str_to_insert="<br>";

   $newstr = substr_replace($link, $str_to_insert, 70, 0);

            // Create Search and Replace strings
            $search  = $newLinks;
            
            $replace = '<a href="'.$link.'" title="'.$newLinks.'" target="_blank">'.$newstr.'</a>';
            
           $checkURL = str_replace($search, $replace, $checkURL);
       
          $checkimage="";
          
          $checkimage=getimagesize($link);
         if ($checkimage==null||$checkimage==""){
              //echo "not an image";
              $imagevalidation=false;
                        }
                        else {
                            $imagevalidation=true;
                          $linkimage=$link;
                        }
	}
        }
        $str_to_insert="<br>";
    //Return result
  //  echo $checkURL;
                    $row->image=$imagevalidation;
                   $row->Message=$checkURL;    
                   $row->Link= $linkimage;
               
          }  
           $this->load->helper('url');               
        
              
              
              
       
                        $bagofvalues= array(
                'posts'  => $getusers['posts'],  
                 'posts2' => $getmessages['posts2']          
                 
    );
                  
      
      
        $this->load->view('profile', $bagofvalues);
            
        }
        
        public function addMessages(){
             $this->load->library('session');
            $message = $this->input->post('messages');
           $messageusername= $this->session->logintemp;
            $this->load->model('moviefy_model','mod');
        $this->mod->addMessages($messageusername,$message);
           
        /////if success only
        
      $this->showTimeline();
        }
             
        public function showTimeline(){
            $this->load->library('session');
              $currentUser= $this->session->logintemp;
             $this->load->model('moviefy_model','model');
$linkimage="";

         
$getmessages['posts'] = $this->model->timeline($currentUser);

          foreach($getmessages['posts'] as $row){
              $checkURL= $row->Message;
           $reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";
$imagevalidation=false;

	// Check if there is a url in the text
	if(preg_match_all($reg_exUrl, $checkURL, $url)) {

        // Loop through all matches
        foreach($url[0] as $newLinks){
            if(strstr( $newLinks, ":" ) === false){
				$link = 'http://'.$newLinks;
			}else{
				$link = $newLinks;
			}
             $str_to_insert="<br>";

   $newstr = substr_replace($link, $str_to_insert, 70, 0);

            // Create Search and Replace strings
            $search  = $newLinks;
            
            $replace = '<a href="'.$link.'" title="'.$newLinks.'" target="_blank">'.$newstr.'</a>';
            
           $checkURL = str_replace($search, $replace, $checkURL);
       
          $checkimage="";
          
          $checkimage=getimagesize($link);
         if ($checkimage==null||$checkimage==""){
              //echo "not an image";
              $imagevalidation=false;
                        }
                        else {
                            $imagevalidation=true;
                          $linkimage=$link;
                        }
	}
        }
        $str_to_insert="<br>";
    //Return result
  //  echo $checkURL;
                    $row->image=$imagevalidation;
                   $row->Message=$checkURL;    
                   $row->Link= $linkimage;
               
                   
                   
          }  
           $this->load->helper('url');               
$this->load->view('timeline', $getmessages);
} 

  
        
       public function regpage(){
            $this->load->helper('url');
              $test="Please Fill Registration Fields Below";
             $data['check'] = array("$test");
                         
		
        $this->load->view('Register',$data);
       }
       public function add() 
        {
               $userid = $this->input->post('username');
               $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                 $this->load->model('moviefy_model','mod');
      $checkusername= $this->mod->checkUsername($userid);
               $profpic = $this->input->post('profpic');
                 $fullname = $this->input->post('fullname');
                 $genreString="";
       $genre = $this->input->post('genre[]');
                
      if  ($userid=="" ||$userid== null){
           $this->load->helper('url');
              $test="Please Enter an username";
             $data['check'] = array("$test");
                         
	 $this->load->helper('url');	
        $this->load->view('Register',$data);
      }
      
        if  ($fullname=="" ||$fullname== null){
           $this->load->helper('url');
              $test="Please Enter Full Name";
             $data['check'] = array("$test");
                         
		 $this->load->helper('url');
        $this->load->view('Register',$data);
      }
       
      
      else  if  ($this->input->post('password')=="" ||$this->input->post('password')== null){
           $this->load->helper('url');
              $test="Please Enter a password";
             $data['check'] = array("$test");
                 $this->load->helper('url');         
		
        $this->load->view('Register',$data);
      }
      
     
      
      else if($checkusername==true || $checkusername==1 ){
                $this->load->helper('url');
              $test="Username already exists";
             $data['check'] = array("$test");
                         
		 $this->load->helper('url');
        $this->load->view('Register',$data);      
                       
      }
       
     else  if ($genre==""||$genre==null) {
                   $this->load->helper('url');
              $test="Please select a Genre";
             $data['check'] = array("$test");
                         
		 $this->load->helper('url');
        $this->load->view('Register',$data);      
                       
                  }
                    
                    else {
                            
                 foreach ($_POST['genre'] as $genre)
                    {
               $genreString=$genreString.$genre.",";
      
                    }
          
     //             $genre = $this->input->post('genre');
//               if (password_verify('qwe', $pass)) {
//            echo 'Password is valid!';
//        } else {
//            echo 'Invalid password.';
//        }

        // $pass = $this->input->post('password');
        $this->load->model('moviefy_model','mod');
       
        $this->mod->add($userid,$pass,$fullname,$genreString,$profpic);
        $this->load->helper('url');
        $this->index();
       
    
        }
        }
        
        public function follow(){
              $this->load->library('session');
                $currentUser= $this->session->logintemp;
                 $followeduser = $this->input->post('followeduser');
                  $currentfollows="";
                 
               
               
                $this->load->model('moviefy_model','mod');
                
                
        $this->mod->followedby($currentUser,$followeduser);
                     $this->mod->follows($currentUser,$followeduser);
                       $this->load->helper('url');
                    $this->   search();
        
              
        }
 public function unfollow (){
      $this->load->library('session');
                $currentUser= $this->session->logintemp;
                $unfolloweduser = $this->input->post('unfolloweduser');
          $this->load->model('moviefy_model','mod');
          $this->mod->unfollow($currentUser,$unfolloweduser);
           $this->mod->unfollowedby($currentUser,$unfolloweduser);
           $this->search();
                }       

public function logout (){
    $this->load->library('session');
        $this->load->helper('url'); 
   $this->session->sess_destroy();
     $this->index();
}          
                
 }
    

?>