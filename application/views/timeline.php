

<html>  
    <head>  
        <title>Timeline</title>
        <script src="js/jquery.js"></script>
        <script src="js/timeline.min.js"></script>
        <script src="<?php echo base_url('js/jquery.js"'); ?>"></script>
          <script src="<?php echo base_url('js/timeline.min.js"'); ?>"></script>
          
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
          
          <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css"'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('css/timeline.min.css'); ?>"/>
        
		<link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/timeline.min.css" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
		
    </head>  
    <body>  
        
    <nav class="navbar navbar-expand-sm bg-info navbar-dark">
  <!-- Brand -->
  

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#"> &nbsp;&nbsp;&nbsp;&nbsp;</a>
    </li>
    &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()?>index.php/Welcome/showTimeline">Timeline  &nbsp;&nbsp;&nbsp;&nbsp; 
       &nbsp;&nbsp;&nbsp;&nbsp;
      </a>
    </li>
  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
     
                <form method=POST action="<?php echo base_url()?>index.php/Welcome/search">       
               <select id="test"name="search" placeholder="Select Genre"id="framework" class="form-control selectpicker" data-live-search="true" >
     <option value="empty" disabled selected>Select Genre :</option>
       <option value="pop">Pop</option>
      <option value="hpop">Hip-Pop</option>
      <option value="rock">Rock</option>
     <option value="techno">Techno</option>
      <option value="instr">Instrumental</option>
    
     </select> 
                 
                </li>           
       <li> 
                                                     
    <button class="btn btn-success" type="submit">Search</button> </a>
    </form>
    </li>
    
    <!-- Dropdown -->
      &nbsp; &nbsp;   &nbsp; &nbsp;    &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;
      &nbsp; &nbsp;   &nbsp; &nbsp;    &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;
      &nbsp; &nbsp;   &nbsp; &nbsp;    &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;
      &nbsp; &nbsp;   &nbsp; &nbsp;    &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;
      &nbsp; &nbsp;   &nbsp; &nbsp;    &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;
      &nbsp; &nbsp;   &nbsp; &nbsp;    &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;
      &nbsp; &nbsp;   &nbsp; &nbsp;    &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;   &nbsp; &nbsp;
      &nbsp; &nbsp;   &nbsp; &nbsp;    &nbsp; &nbsp;   &nbsp; &nbsp;   
    <li  align="right"class="nav-item dropdown">
        
      <a  align="right"class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
     Account Settings
      
      </a>
        
      <div class="dropdown-menu">
       
          <a class="dropdown-item" href="<?php echo base_url()?>index.php/Welcome/privateprofile">Profile</a>
        <a class="dropdown-item" href="<?php echo base_url()?>index.php/Welcome/logout">Logout</a>
      
        
        
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link">User :  &nbsp; &nbsp;  <?php echo $this->session->userdata('logintemp'); ?></a>
    </li>
      
  </ul>
</nav>     
 
        <div class="container">
			<br />
                        
			<h3 align="center"><a>MusicFy Timeline</a></a></h3><br />
			<div class="panel panel-default">
				<div class="panel-heading">
                                    <h3 class="panel-title">
                                        <form  id="timelineform" method=POST action="<?php echo base_url()?>index.php/Welcome/addmessages">
                            Message: &nbsp; &nbsp; &nbsp;
                            
                            <input type="text" name="messages" size="50">
                            
                            &nbsp; &nbsp;   &nbsp; &nbsp;
                            
                            User :  &nbsp; &nbsp;  <?php echo $this->session->userdata('logintemp'); ?>
                            &nbsp; &nbsp; &nbsp; &nbsp; 
                            
                            <button id="myBtn" type="submit" >Submit
                            
                                       </button>
                                       
                            <br>
                                        
                                    </h3>
                </div>
                <div class="panel-body">
                	<div class="timeline">
                        <div class="timeline__wrap">
                            <div class="timeline__items">
                            <?php
                            foreach($posts as $row)
                            {
                                
                                
                            ?>
                            	<div class="timeline__item">
                                    <div class="timeline__content">
                                    	<h2><?php echo $row->User; 
                                        
                                        ?></h2>
                                        
                                    	<p name="message"><?php 
                                       echo $row->Message;
                                        if ($row->image==true) {
            $finalImage = base64_encode(file_get_contents($row->Link));
            echo '<img src="data:image/jpeg;base64,'.$finalImage.'">';
            
        }          
                                        ?>
                                            
                                            
                                             </form>
                                            <?php
                                        
                                        
                                        
                                        ?></p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
    </body>  
    <script>
$(document).ready(function(){
 jQuery('.timeline').timeline({
 // mode: 'horizontal',
  visibleItems: 4
  //Remove this comment for see Timeline in Horizontal Format otherwise it will display in Vertical Direction Timeline
 });
});
</script>
</html>


