

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
	
  <style>
       .quickform { background:#fff; padding:30px 25px;}
.quickform h2 { text-transform:uppercase; color:#000; margin:15px 0px;}

.quickform input { width:100%; height:auto; float:left; border:1px solid #000; padding:12px 5px; color:#999; background:none; margin:0px 0px 20px 0px;}
.quickform textarea { width:100%; height:auto; min-height:230px; float:left; border:1px solid #000; padding:8px 5px; color:#999; background:none; margin:0px 0px 20px 0px; resize:none;}

.quickform button { background:#CCC; color:#333; padding:8px 15px;  border:1px solid #000; background:none; font-size:12px; text-transform:uppercase; color:#000;}
.quickform button:hover { background:#fff; color:#333;}

.quickform input[type="text"]:focus {
  border-color: #66afe9;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
} 

.quickform textarea[type="text"]:focus {
  border-color: #66afe9;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
} 


.quickform textarea:focus {
        border-color: #66afe9;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
}
      
  </style>
 <script>
     function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>
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
 
        <div align="center">
                                               <div class="main">
          
          
            <div class="container">
                <div  class="quickform">
<h2>Add Contact</h2>
<img style="height:200px; width:200px" src="https://upload.wikimedia.org/wikipedia/commons/b/b7/Google_Contacts_logo.png" alt="Contact">

    <div id="inputarea">
        <br>
    <input id="firstName" name="firstName" type="text" placeholder="First Name">
    <input id="lastName" name="lastName" type="text" placeholder="Last Name">
    <input id="email" name="email" type="text" placeholder="Email">
    <input id="contactNo" name="contactNo" type="text" placeholder="Contact No.">
<label style="text-align:left">Select Tag</label>


<select  required="true" id="tags" class="form-control selectpicker" style="height:150px; width: 150px;" multiple="multiple" name='tags[]' >
                             
                                <option value="1"> Family</option>
                                <option value="2"> Friends</option>
                                <option value="3"> WorkPlace</option>
                                <option value="4"> Other</option>
				
                               
                            </select>


<button id="insert">Add Contact</button>
    </div>

<br>



</div>
</div>

      </div>  
      </div>
           </div>
       
         <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>
    <script src="/CourseWork/assets/javascript/javascript.js"></script>
        
                       
                         
        
    </body>
   
    
    </html>
