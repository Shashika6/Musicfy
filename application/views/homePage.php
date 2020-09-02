<!DOCTYPE html>
<html>
    <head>
        <style>

            @import url(http://fonts.googleapis.com/css?family=Roboto:400,700);

            body {
                background-color: rgb(229, 229, 229);
                padding-top: 60px;
                padding-bottom: 30px;
            }

            .panel-google-plus {
                position: relative;
                border-radius: 0px;
                border: 1px solid rgb(216, 216, 216);
                font-family: 'Roboto', sans-serif;
            }
            .panel-google-plus > .dropdown {
                position: absolute;
                top: 5px;
                right: 15px;
            }
            .panel-google-plus > .dropdown > span > span {
                font-size: 10px;   
            }
            .panel-google-plus > .dropdown > .dropdown-menu {
                left: initial;
                right: 0px;
                border-radius: 2px;
            }
            .panel-google-plus > .panel-google-plus-tags {
                position: absolute;
                top: 35px;
                right: -3px;
            }
            .panel-google-plus > .panel-google-plus-tags > ul {
                list-style: none;
                padding: 0px;
                margin: 0px;
            }
            .panel-google-plus > .panel-google-plus-tags > ul:hover {
                box-shadow: 0px 0px 3px rgb(0, 0, 0);   
                box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.25);   
            }
            .panel-google-plus > .panel-google-plus-tags > ul > li {
                display: block;
                right: 0px;
                width: 0px;
                padding: 5px 0px 5px 0px;
                background-color: rgb(245, 245, 245);
                font-size: 12px;
                overflow: hidden;
            }
            .panel-google-plus > .panel-google-plus-tags > ul > li::after {
                content:"";
                position: absolute;
                top: 0px;
                right: 0px;
                height: 100%;
                border-right: 3px solid rgb(66, 127, 237);
            }
            .panel-google-plus > .panel-google-plus-tags > ul:hover > li,
            .panel-google-plus > .panel-google-plus-tags > ul > li:first-child {
                padding: 5px 15px 5px 10px;
                width: auto;
                cursor: pointer;
                margin-left: auto;
            }
            .panel-google-plus > .panel-google-plus-tags > ul:hover > li {
                background-color: rgb(255, 255, 255);   
            }
            .panel-google-plus > .panel-google-plus-tags > ul > li:hover {
                background-color: rgb(66, 127, 237);
                color: rgb(255, 255, 255);
            }
            .panel-google-plus > .panel-heading,
            .panel-google-plus > .panel-footer {
                background-color: rgb(255, 255, 255);
                border-width: 0px; 
            }
            .panel-google-plus > .panel-heading {
                margin-top: 20px;    
                padding-bottom: 5px; 
            }
            .panel-google-plus > .panel-heading > img { 
                margin-right: 15px;
            }
            .panel-google-plus > .panel-heading > h3 {
                margin: 0px;
                font-size: 14px;
                font-weight: 700;
            }
            .panel-google-plus > .panel-heading > h5 {
                color: rgb(153, 153, 153);
                font-size: 12px;
                font-weight: 400;
            }
            .panel-google-plus > .panel-body {
                padding-top: 5px;
                font-size: 13px;
            }
            .panel-google-plus > .panel-body > .panel-google-plus-image {
                display: block;
                text-align: center;
                background-color: rgb(245, 245, 245);
                border: 1px solid rgb(217, 217, 217);
            }
            .panel-google-plus > .panel-body > .panel-google-plus-image > img {
                max-width: 100%;
            }

            .panel-google-plus > .panel-footer {
                font-size: 14px;
                font-weight: 700;
                min-height: 54px;
            }
            .panel-google-plus > .panel-footer > .btn {
                float: left;
                margin-right: 8px;
            }
            .panel-google-plus > .panel-footer > .input-placeholder {
                display: block;
                margin-left: 98px;
                color: rgb(153, 153, 153);
                font-size: 12px;
                font-weight: 400;
                padding: 8px 6px 7px;
                border: 1px solid rgb(217, 217, 217);
                border-radius: 2px;
                box-shadow: rgba(0, 0, 0, 0.0470588) 0px 1px 0px 0px;
            }
            .panel-google-plus.panel-google-plus-show-comment > .panel-footer > .input-placeholder {
                display: none;   
            }
            .panel-google-plus > .panel-google-plus-comment {
                display: none;
                padding: 10px 20px 15px;
                border-top: 1px solid rgb(229, 229, 229);
                background-color: rgb(245, 245, 245);
            }
            .panel-google-plus.panel-google-plus-show-comment > .panel-google-plus-comment {
                display: block;
            }
            /*.panel-google-plus > .panel-google-plus-comment > img {
                float: left;   
            }*/
            .panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea {
                float: right;
                width: calc(100% - 56px);
            }
            .panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > textarea {
                display: block;
                /*margin-left: 60px;
                width: calc(100% - 56px);*/
                width: 100%;
                background-color: rgb(255, 255, 255);
                border: 1px solid rgb(217, 217, 217);
                box-shadow: rgba(0, 0, 0, 0.0470588) 0px 1px 0px 0px;
                resize: vertical;
            }
            .panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > .btn {
                margin-top: 10px;
                margin-right: 8px;
                width: 100%;
            }
            @media (min-width: 992px) {
                .panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > .btn {
                    width: auto;
                }    
            }


            .panel-google-plus .btn {
                border-radius: 3px;   
            }
            .panel-google-plus .btn-default {
                border: 1px solid rgb(217, 217, 217);
                box-shadow: rgba(0, 0, 0, 0.0470588) 0px 1px 0px 0px;
            }
            .panel-google-plus .btn-default:hover, 
            .panel-google-plus .btn-default:focus, 
            .panel-google-plus .btn-default:active {
                background-color: rgb(255, 255, 255);
                border-color: rgb(0, 0, 0);    
            }
            .btnpost{
                
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;

            }
        </style>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="/CourseWork/assets/css/main.css">;  

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
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
                    foreach ($listOfGenre as $genre) {

                        echo "<a href='/CourseWork/index.php/SearchController/results?genre=" . $genre->getGenreID() . "'>" . $genre->getGenreName() . "</a>";
                    }
                    ?>
                </div>
            </div>

            <div class="loginText">
                <img  src="https://i.imgur.com/kUdGUYU.png"><br>   
                
                <a href="/CourseWork/index.php/HomeController">Home</a>
                <a href="/CourseWork/index.php/MyAccount">My Account</a>
                <a href="/CourseWork/index.php/MyContacts">My Contacts</a>
                <a href="/CourseWork/index.php/HomeController/logout?">Logout</a>

            </div>

        </div>
        

        <div class="main">
            <div>
                
                                 <?php echo"<h2>Hello, " . $firstName . "</h2>";
?>
                    <br>
                

            </div> 

            <form action="/CourseWork/index.php/HomeController/post" method=POST>
   
                <textarea class="autoExpand forumPost form-control" rows="4" data-min-rows="4" name="postText" placeholder="Enter your message here" spellcheck="false"></textarea>
                 <button class="btnpost" type="submit"> POST</button>
                 <hr>
                 
            </form>




<?php
$image = false;
if (count($userPosts) > 0) {
    foreach ($userPosts as $post) {


        $postDesc = $post->getPostDescription();
        $formats = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";
        $imgformats = array("gif", "jpg", "jpeg", "png", "tiff", "tif");
        if (preg_match_all($formats, $postDesc, $postNo)) {


            foreach ($postNo[0] as $posttype) {
                if (strstr($posttype, ":") === false) {
                    $link = 'http://' . $posttype;
                } else {
                    $link = $posttype;
                }


                $search = $posttype;
                $temp = explode(".", $posttype);

                $ext = end($temp);

                if (in_array($ext, $imgformats)) {
                    $replace = '<img src= "' . $link . '"  style = "width:200px;">';
                    $image = true;
                } else {
                    $replace = '<a href="' . $link . '">' . $link . '</a>';
                    $image = false;
                }



                $postDesc = str_replace($search, $replace, $postDesc);
            }
        }

        $postImg = $post->getImageUrl();


        if (preg_match_all($formats, $postImg, $postNo)) {


            foreach ($postNo[0] as $posttype) {
                if (strstr($posttype, ":") === false) {
                    $link = 'http://' . $posttype;
                } else {
                    $link = $posttype;
                }


                $search = $posttype;
                $temp = explode(".", $posttype);

                $ext = end($temp);

                if (in_array($ext, $imgformats)) {
                    $replace = '<img class="[ img-circle pull-left ]" src= "' . $link . '"  style = "width:50px;">';
                    $image = true;
                } else {
                    $replace = '<img src= "https://cdn4.iconfinder.com/data/icons/evil-icons-user-interface/64/avatar-512.png" class="[ img-circle pull-left ]" style = "width:50px;">';
                    $image = false;
                }
            }
        } else {
            $replace = '<img src= "https://cdn4.iconfinder.com/data/icons/evil-icons-user-interface/64/avatar-512.png" class="[ img-circle pull-left ]" style = "width:50px;">';
        }



        echo"<div class='container'>";
        echo"<div class='row'>";
        echo"<div class='[ col-xs-12 col-sm-offset-1 col-sm-8 ]'>";
        echo"<div class='[ panel panel-default ] panel-google-plus'>";



        echo" <div class='panel-heading'>";

        echo $replace;
        echo"<h3>" . $post->getFirstName() . " " . $post->getLastName() . "</h3>";
        echo"<h5><span>" . $post->getDate() . "</span> </h5>";
        echo"</div>";
        echo"<div class='panel-body'>";
        echo"<p>" . $postDesc . "</p>";
        echo"</div>";


        echo"</div>";
        echo"</div>";
        echo"</div>";
        echo"</div>";
    }
}
?>



        </div>



    </body>
</html>