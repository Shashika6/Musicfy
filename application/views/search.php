

<html>  
    <head>  
        <title>Search</title>
       
        <script src="<?php echo base_url('js/jquery.js"'); ?>"></script>
          <script src="<?php echo base_url('js/timeline.min.js"'); ?>"></script>
          
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
          
          <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css"'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('css/timeline.min.css'); ?>"/>
        
		
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
 
        
         <?php
                            foreach($posts as $row)
                            {
                                 if ($row->Username==$this->session->userdata('logintemp')){
                continue;
            }    
                        ?>
                                  

        <div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2><?php echo $row->Username ?></h2>
                    <p><strong>Full Name: </strong> <?php echo $row->Fullname ?> </p>
                    <p><strong>Genres: </strong> <?php echo $row->Genre ?> </p>
                    <p style="color:blue;"><strong><?php echo $row->friends ?></strong></p>
                </div>             
                <div class="col-xs-12 col-sm-4 text-center">
                    
                </div>
            </div>            
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    
                    <form method=POST action="<?php echo base_url()?>index.php/Welcome/follow">   
                        <input type="hidden" name="followeduser" value=<?php echo $row->Username ?>>
                       
                    <h2><strong> <?php echo $row->followedByCount ?> </strong></h2>                    
                    <p><small>Followers</small></p>
                    
                    <button <?php echo$row->disabled ?> class="btn btn-success btn-block" ><span class="fa fa-plus-circle"></span> Follow </button>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong><?php echo $row->followsCount ?></strong></h2>                    
                    <p><small>Following</small></p>
                    
                 
                         <input type="hidden" name="userprofile" value=<?php echo $row->Username ?>>
                    <button formaction="<?php echo base_url()?>index.php/Welcome/profile" class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>
                    
                </div>
                    <div>
                <div class="col-xs-12 col-sm-4 emphasis">
                   <h2><strong> Yes </strong></h2>                    
                    <p><small>Verified</small></p>
                    <form method=POST action="<?php echo base_url()?>index.php/Welcome/unfollow">  
                         <input type="hidden" name="unfolloweduser" value=<?php echo $row->Username ?>>
                    <button formaction="<?php echo base_url()?>index.php/Welcome/unfollow" <?php echo$row->enabled ?> class="btn btn-success btn-block" ><span class="fa fa-plus-circle"></span> Unfollow </button>
                    </form>
                </div>
                    </div>
            </div>
    	 </div>                 
		</div>
               
	</div>
</div>
                                                   
        
                        <?php     
                            } 
                            ?>
                         
        
    </body>
   
    
    </html>
