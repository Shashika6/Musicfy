

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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
		
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
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
 <script>function myFunction() {
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
<h2>Search And Delete</h2>


    <div name="view" id="view">
        <br>
    <input id="firstName" name="firstName" type="text" placeholder="First Name">

<label style="text-align:left">Select Tag</label>
<div class="form-group" style="width:auto;">
                            <select  required="true" id="genreSelection" class="js-example-basic-multiple" style="height:150px; width: 1050px;" multiple="multiple" name='tags[]' >
                              
                                <option value="1"> family</option>
                                <option value="2"> friends</option>
                                <option value="3"> office</option>
                                <option value="4"> school</option>
                               
                            </select>
                        </div>
<button id="search">Search</button>


</div>
</div>
                
                 <div id="contacts">
        <script id="contactTemplate" type="text/template">
    
    
    
    <div class='panel panel-default'> 
               <div class='panel-heading'>
               <a><h2>Contact ID: <span class="contactID"> <%= contactID %> </span>
                  
               


         <button type="button" id="edit" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-edit"></span> Edit
       </button>
               <button id="delete" type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-trash"></span> Delete 
        </button>
       
               </div> 
               <div class='panel-body'>
               <div>
               <h3>  First Name :  <span class="firstName"> <%= firstName %> </span>  </h3>
             <h3> Last Name :
                     <span class="lastName"> <%= lastName %> </span> </h3>
                     <h3 id="email">Email : 
                    
                    <span class="email"><%= email %> </span> </h3>	
                   <h3>Contact No: 
      
      <span class="contactNo"> <%= contactNo %> </span> </h3>	
                 <h3>Tag : <%= tag %></h3>
         
         
         <button style="display:none" id="update" type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-ok"></span> Update
        </button>

           <button style="display:none" id="cancel" type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-remove"></span> Cancel 
        </button>
         	
         
            </div>
               </div>
    
    
    

         
        </script>

               
      </div>
                                                   
      </div>
            
            
           </div>
       
         <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.3/backbone-min.js"></script>
    <script src="/CourseWork/assets/javascript/javascript2.js"></script>
        
                       
                         
        
    </body>
   
    
    </html>
