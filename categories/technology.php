<?php
// session_start();
include("../database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="../style.css">
    <style>
        #heading , #content{
            border: 1px solid white;
            border-radius: 5vh;
            padding: 3vh;
            margin: 3vh;
            text-shadow: 10px 10px 10px black;
            background:url("https://source.unsplash.com/random/1920x1080/?sports,dark");
       
        }
        #contentarea{
            background-color:black;
            text-shadow: 10px 10px 10px black;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div id="main">
        <div id="nav">
            <div id="pic">
                <img src="../sg.jpg" alt="">
            </div>
            <div id="nav-feature">
                
            <h3><a href="../index.php">Home</a></h3>
                    <h3><a href="../index.php #page2">About</a></h3>
                    <?php 
                    
                    session_start();
                    // echo $_SESSION["logout"];
                    if(isset($_SESSION["logout"])){
                        if($_SESSION["logout"] == 0){ 
                            echo'<h3><a href="../logout.php">Logout</a></h3>'; 
                         }
                            else{
                                echo'<h3><a href="../index.php #page3">Login</a></h3>';
                            }
                    }else{
                        echo'<h3><a href="../index.php #page3">Login</a></h3>';
                    }
                        
                    ?>
                
            </div>
        </div>

        <div id="heading" style="text-align: center; ">
            <h1>Technology</h1>
        </div>

        

        <?php
        if($_SESSION["logout"] == 0){
            echo '
            <div style="display: flex; justify-content: center; align-items: center;">
                <a href="../blogs.php" style="text-decoration:none; color: white;">
                    <div id="postblog" style="background-color: red; color: white; padding: 2vh 5vh; border-radius: 3vh ;">
                        POST BLOG
                    </div>
                </a>
            </div>';
        }
        
        ?>

        <div id="content" style="border: 1px solid white; margin: 3vh; border-radius: 3vh;">
            <?php
            $sql1 = "SELECT  * FROM blogs WHERE category='technology'";
            $result = mysqli_query($conn , $sql1);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    echo '
                    <hr>
                    <div id="contentarea" style="padding: 2vw; ">
                        <h2 style="text-align: center; text-transform: uppercase; font-size: 8vh;">'. $row["theme"] .'</h2>
                        <h4 style="text-align: right;">by  '.$row["user"].'</h4>
                        <h4 style="text-align: right;">on '.$row["date"].'</h4><br>
                        <p>'. $row["content"].'</p>
                    </div>
                    <hr>
                    ';
                }
            }else{
                echo ' <h2 style="padding: 3vh;">NO BLOGS AVAILABLE </h2>';
            }
            ?>
        </div>

        
    <?php
    include("../footer.html");
    ?>
    </div>


</body>
</html>