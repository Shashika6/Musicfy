<!DOCTYPE html>
<html>
    <head>
  <style>
            .addon {
background: #fff;
border: 1px solid #C0CAE3;
margin-bottom: 20px;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
}

.addon li {
padding: 10px;
border-top: 1px solid #eee;
overflow: hidden;
}
.addon li {
list-style:none;
}

.clearfix {
display: block;
}
.clearfix:after {
content: " ";
display: block;
height: 0;
clear: both;
visibility: hidden;
overflow: hidden;
}

li {
display: list-item;
text-align: -webkit-match-parent;
} ul {
margin: 0;
padding: 0;
border: 0;
font-size: 100%;
font: inherit;
vertical-align: baseline;
}
 ul {
list-style: none;
}
.round {
border-radius:100%;
  display: block;
height: 48px;
width: 49px;
float: left;
}
.addon li em {
background: url(http://d1dls1ko4h0b59.cloudfront.net/assets/campaign-legend-d95e12bce50a8e18d8bd3c96383c352f.png) no-repeat;
display: block;
height: 48px;
width: 49px;
float: left;
}
.addon li em.extra {
background-position: -118px 0;
}
.addon li em.hot {
background-position: -58px 0;
}
.addon p {
padding: 10px 15px;
margin: 0;
font: 600 16px/22px "myriad-pro",Arial,"Helvetica Neue",Helvetica,sans-serif;
}
p {
display: block;
-webkit-margin-before: 1em;
-webkit-margin-after: 1em;
-webkit-margin-start: 0px;
-webkit-margin-end: 0px;
}

.addon li .legend-info {
float: left;
margin-left: 10px;
width: 155px;
}

.addon strong {
display: block;
margin: 0 0 4px;
}

strong {
font-weight: bold;
}
        </style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="/CourseWork/assets/css/main.css">;  
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
<!------ Include the above in your HEAD tag ---------->
</head>

<body>
<div class="sidenavigation">
    
    
     <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Search</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    
   <?php
                   foreach($listOfGenre as $genre){
                       
                        echo "<a href='/CourseWork/index.php/SearchController/results?genre=".$genre->getGenreID()."'>".$genre->getGenreName()."</a>";
                   }
                   
                   
                   ?>
  </div>
</div>
         <div class="loginText">
             <img  src="https://i.imgur.com/kUdGUYU.png"><br>   
             
             
            
<a href="/CourseWork/index.php/HomeController">Home</a>
  <a href="/CourseWork/index.php/MyAccount">My Account</a>
  <a href="/CourseWork/index.php/HomeController/logout?">Logout</a>
 
         </div>
    
      </div>
    
    
      <div class="main">
          
          
              
    <div class="addon">
          <h1>Friend List</h1>
          <ul>

<?php
if (count($userInfo) > 0) {
    foreach ($userInfo as $user) {


        echo " <a href='/CourseWork/index.php/FollowController/viewUserProfile?USERID=" . $user->GetUserID() . "'></a>";
        echo "<br>";
         echo"<li class='clearfix'>";
         $postImg = $user->getImageUrl();
          $formats = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))\)|[^\s`!()\[\]{};:'\".,<>?Â«Â»â€œâ€â€˜â€™]))/";
         $imgformats = array("gif", "jpg", "jpeg", "png", "tiff", "tif"); 
       
        
if (preg_match_all($formats, $postImg, $postNo)) {

            // Loop through all matches
            foreach ($postNo[0] as $posttype) {
                if (strstr($posttype, ":") === false) {
                    $link = 'http://' . $posttype;
                } else {
                    $link = $posttype;
                }


                $search = $posttype;
                $temp = explode(".", $posttype );
                
                 $ext = end($temp);
             
                  if ( in_array($ext, $imgformats) ){
                       $replace = '<img  src= "' . $link . '"  target="_blank" class="round">';
                      $image=true;
                  } else {
                        $replace = '<img src= "https://cdn4.iconfinder.com/data/icons/evil-icons-user-interface/64/avatar-512.png" target="_blank" class="round">';
                        $image=false;
                  }
                      
                 
              
                
            }
        }else{
             $replace = '<img src= "https://cdn4.iconfinder.com/data/icons/evil-icons-user-interface/64/avatar-512.png" target="_blank" class="round">';
         }
              echo " <a href='/CourseWork/index.php/FollowController/viewUserProfile?USERID=" . $user->GetUserID() . "' >";
              echo $replace;
              echo"<div class='legend-info'>";
               echo" <strong>" . $user->getFirstName() . " " . $user->getLastName() . "</strong>";
               echo" </div></a>";
       echo"  </li>";
    }
}else{
    echo "<h2>Still You have No Friends...</h2>";
}
?>
               </ul>
        </div>
          
          
         </div>
      
    </body>
</html>
