<?php

session_start();
?>
<div id="alert" style="display: none; background-color: #ff3333; color: #fff; padding: 10px; text-align: center; position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 999;">
<span onclick="dismissAlert()" style="cursor: pointer; float: right;">&times;</span>

</div>



<?php

$login = 1;
if(!isset($_SESSION["logout"])){

    $_SESSION["logout"] = 1; 
}
?>
        <?php

include("database.php");


if(isset($_POST["submit"])){

    if(isset($_POST["username"]) && isset($_POST["password"])){
        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            
            
            $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $username = $_POST["username"];
            
            
            $sql1 = "SELECT  * FROM users WHERE username='$username'";
            $result = mysqli_query($conn , $sql1);
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if(password_verify($_POST["password"] ,   $row["password"])){
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["password"] = $hash;
                    $login = 0;
                    $_SESSION["logout"] = 0;

                    
                    $alertMessage = 'LOGIN SUCCESSFULLY .';
                    echo "<script>
                    document.getElementById('alert').textContent = '$alertMessage';
                    document.getElementById('alert').style.display = 'block';
                    function dismissAlert() {
                        document.getElementById('alert').style.display = 'none';
                    }
                    setTimeout(function () {
                        dismissAlert();
                    }, 3000);
                    </script>"; //add bootstrap here
                }else{
                    $alertMessage = 'Wrong password';
                    echo "<script>
                    document.getElementById('alert').textContent = '$alertMessage';
                    document.getElementById('alert').style.display = 'block';
                    function dismissAlert() {
                        document.getElementById('alert').style.display = 'none';
                    }
                    setTimeout(function () {
                        dismissAlert();
                    }, 3000);
                    </script>"; //add bootstrap here
                }
            }else{
                
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["password"] = $hash;
                $sql = "INSERT INTO users (username, password)
                VALUES ('$username', '$hash')";
                
                
                if(mysqli_query($conn, $sql)){
                    echo "Registered successfully"; //add bootstrap file  here ..
                    $login = 0;
                    $_SESSION["logout"] = 0;

                } else {
                    $alertMessage = 'SERVER ISSUE .';
                    echo "<script>
                    document.getElementById('alert').textContent = '$alertMessage';
                    document.getElementById('alert').style.display = 'block';
                    function dismissAlert() {
                        document.getElementById('alert').style.display = 'none';
                    }
                    setTimeout(function () {
                        dismissAlert();
                    }, 3000);
                    </script>"; //add bootstrap here
                    // echo "Could not register: " . mysqli_error($conn);  //add bootstrap file  here .
                }

            }


        } else {
            echo "Not working";
        }
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        /* #php_part{
            width:100%;
            height:100%;
            background:url("https://source.unsplash.com/random/1920x1080/?login");
            
        } */
    </style>
</head>
<body>
    <!-- <div id="cursor">

    </div> -->

    <div id="main">

<div id="nav">
    <div id="pic">
        <img src="sg.jpg" alt="">
    </div>
    <div id="nav-feature">
        
            <h3><a href="index.php">Home</a></h3>
            <h3><a href="#page2">About</a></h3>
            <?php if($_SESSION["logout"] == 1){
                echo'<h3><a href="#page3">Login</a></h3>';  }
                else{
                    echo'<h3><a href="logout.php">Logout</a></h3>'; 
                }
                
                ?>
        
    </div>
</div>
        <div id="page1">
            <h1>" Explore. Dream. Discover."  </h1>
            <h2> - mark twain</h2> 
            <div id="keywords">
                <h4> EXPLORATION </h4>
                <h4>⚪</h4>
                <h4>PERSPECTIVE</h4>
                <h4>⚪</h4>
                <h4>JOURNEY</h4>
            </div>
        </div>
        <hr>
        <div id="page2">
            <div id="diarydive">
                <button>DIARY DIVE</button>
            </div>
            
            <div id="aboutsection">
                <div id="about-img">
                    <img src="about.jpg" alt="">
                </div>
                <div id="about">
                    
                    <p>Welcome to DIARY DIVE , where words come to life and stories find their voice. We are a community of passionate writers, explorers, and dreamers who believe in the power of words to inspire, inform, and entertain.</p>
                    
                    <p>Our mission is to share diverse perspectives, foster creativity, and take our readers on a journey of exploration through the written word. Whether it's travel tales, insightful essays, or creative fiction, we have something for everyone.</p>
    
                    <p>Our team of writers and contributors is dedicated to delivering high-quality content that sparks curiosity and ignites imaginations. We're here to provide you with a unique blend of perspectives, ideas, and stories that you won't find anywhere else.</p>
    
                    <p>Thank you for joining us on this literary adventure. We invite you to explore our blog, share your thoughts, and become a part of our growing community. Together, let's explore, dream, and discover the world through words.</p>
                </div>
            </div>
            <hr>
            <div id="blogging">
                <div id="btn">
                    <button>TOPICS</button>
                </div>
                <div id="blogging_topics">
                    <a href="./categories/sports.php" style="text-decoration: none; color: white;">
                        <div class="topics" id="sports">
                            <img src="./photos/sports.jpg" alt="">
                            <h3> Sports and Adventure </h3>
                        </div>
                    </a>
                    <a href="./categories/coding.php" style="text-decoration: none; color: white;">
                        <div class="topics" id="coding">
                            <img src="./photos/coding.webp" alt="">
                            <h3>Coding</h3>
                        </div>
                    </a>
                    <a href="./categories/technology.php" style="text-decoration: none; color: white;">
                        <div class="topics" id="technology"> 
                            <img src="./photos/tech.jpeg" alt=""> 
                            <h3>Technology</h3>
                        </div>
                    </a>
                    <a href="./categories/food.php" style="text-decoration: none; color: white;">
                        <div class="topics" id="food"> 
                            <img src="./photos/food.jpeg" alt=""> 
                            <h3>Food and Cooking</h3>
                        </div>
                    </a>
                </div>
            </div>
            <br>
        </div>

        <hr>
     

        <div id="page3">
    
            

            <!-- assigning username and password to the database.php through session feature -->
        <div id="php_part" style="display: flex; justify-content: center; align-items: center;">

                
            <div id="login">
        <?php
            if($login == 1){
                include("login.php");
            }
        ?>
        </div>
    </div>
          
        </div>

  

        <hr>
        <?php include("footer.html"); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js" integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js" integrity="sha512-Ic9xkERjyZ1xgJ5svx3y0u3xrvfT/uPkV99LBwe68xjy/mGtO+4eURHZBW2xW4SZbFrF1Tf090XqB+EVgXnVjw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>
</html>