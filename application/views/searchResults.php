<!DOCTYPE html>
<html>
    <head>
        <style>
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 300px;
                margin: auto;
                text-align: center;
                font-family: arial;
                background-color: #ced4da;


            }

            .title {
                color: grey;
                font-size: 18px;
            }

            .button {
                border: none;
                outline: 0;
                display: inline-block;
                padding: 8px;
                color: white;
                background-color: #3498DB;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }

            .buttonFollow{
                border: none;
                outline: 0;
                display: inline-block;
                padding: 8px;
                color: white;
                background-color: darkred;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }

            a {
                text-decoration: none;
                font-size: 22px;
                color: black;
            }

            button:hover, a:hover {
                opacity: 0.7;
            }
            br{
                background-color: red;
            }

        </style>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="/CourseWork/assets/css/main.css">;  

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
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
                <a href="/CourseWork/index.php/HomeController/logout?">Logout</a>

            </div>

        </div>


        <div class="main">

            <div>
                <center>
                    <h2>Search Results</h2>
                    <br>
                </center>

            </div> 






            <section class="container mt-4 mb-4">
                <div class="container">
                    <div class="row mb-3">
<?php
if (count($userData) > 0) {
    foreach ($userData as $user) {



        $postDesc = $user->getImageUrl();
        $formats = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";
        $imgformats = array("gif", "jpg", "jpeg", "png", "tiff", "tif");
        if (preg_match_all($formats, $postDesc, $postNo)) {

            // Loop through all matches
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
                    $replace = '<img src= "' . $link . '"  style = "width:100%;">';
                    $image = true;
                } else {
                    $replace = '<img src= "https://cdn4.iconfinder.com/data/icons/evil-icons-user-interface/64/avatar-512.png" class="img-thumbnail border-0" >';
                    $image = false;
                }
            }
        } else {
            $replace = '<img src= "https://cdn4.iconfinder.com/data/icons/evil-icons-user-interface/64/avatar-512.png" class="img-thumbnail border-0" >';
        }
        echo"<div class='col-md-6'>";
        echo"<div class='d-flex flex-row border rounded'>";
        echo"<div class='p-0 w-25'>";










        echo $replace;


        echo"</div>";




        echo"<div class='pl-3 pt-2 pr-2 pb-2 w-75 border-left'>";
        echo"<h4 class='text-primary'><a href='/CourseWork/index.php/FollowController/viewUserProfile?USERID=" . $user->GetUserID() . "'>" . $user->getFirstName() . " " . $user->getLastName() . "</a></h4>";



        if ($user->GetCheckFollow() == false) {
            echo"<p><a href='/CourseWork/index.php/FollowController/followUser?USERID=" . $user->GetUserID() . "' class='button'>Follow</a></p>";
        } else {
            echo"<p><a href='/CourseWork/index.php/FollowController/unFollowUser?USERID=" . $user->GetUserID() . "' class='button'>Unfollow</a></p>";
        }




        echo"</div>";


        echo"</div>";
        echo"<br>";
        echo"</div>";
    }
}
?>
                    </div>

                </div>
            </section>


        </div>





    </body>
</html>
