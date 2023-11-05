<?php

include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="blogs.css">

    <style>
        #main{
            margin-bottom: 4vh;
        }
        #main  h1{
            text-align: center;
            margin: 3vw;
        }

        #main  h3{
            text-align: center;
            margin: 1vw;
        }

        #main  .blog,#blogarea{
            width: 90%;
            margin:0  5%;
        }

        #blogarea{
            height: 40vh;
            padding: 12px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #555;
        }
        #category{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #form{
            background:url("https://source.unsplash.com/random/1920x1080/?black");
            text-shadow: 10px 10px 10px black;
        }

    </style>
    <title>Document</title>
</head>
<body>
    <div id="main">
        
<div id="nav">
    <div id="pic">
        <img src="sg.jpg" alt="">
    </div>
    <div id="nav-feature">
        
            <h3><a href="index.php">Home</a></h3>
            <h3><a href="index.php #page2">About</a></h3>
            <?php 
            
            session_start();
            // echo $_SESSION["logout"];
            if($_SESSION["logout"] == 1){
                echo'<h3><a href="#page3">Login</a></h3>';  }
                else{
                    echo'<h3><a href="logout.php">Logout</a></h3>'; 

                }
                
                ?>
        
    </div>
</div>

<div id="form" style="border: 1px solid white; border-radius: 3vh; margin: 2vh; padding-bottom: 5vh;">
            <form action="blogs.php" method="post" style=" width: 60vw;">
            <h1>WRITE YOUR BLOG</h1>
            <hr>
            <h3>Theme of the blog :</h3><br>
            <input type="text" name="theme" class="blog" id="theme">
            <h3>Write your blog here :</h3><br>
            <textarea name="blogarea" id="blogarea" cols="30" rows="10"></textarea>
            <h3>Select the category :</h3><br>
            <div class="blog" id="category">
                <div>
    
                    <div><input type="radio" name="category"  id="" value="sport and adventure"> Sports and Adventure <br></div>
                    <div><input type="radio" name="category" id="" value="coding"> Coding <br></div>
                    <div><input type="radio" name="category" id="" value="technology"> Technology <br></div>
                    <div><input type="radio" name="category" id="" value="food and cooking"> Food and Cooking <br></div>
                </div>
            </div>
            <input type="submit" name="submit" value="submit" class="blog">

        </form>
</div>
 
        

        <?php
            
            include("database.php");

            if (isset($_POST["submit"])) {
                if (isset($_POST["theme"]) && isset($_POST["blogarea"]) && isset($_POST["category"])) {
                    if (!empty($_POST["theme"]) && !empty($_POST["blogarea"]) && !empty($_POST["category"])) {
                        $theme = $_POST["theme"];
                        $content = $_POST["blogarea"];
                        $user = $_SESSION["username"];
                        $category = $_POST["category"];
            
                        // Prepare the SQL statement
                        $sql = "INSERT INTO blogs (theme, content, user, category) VALUES (?, ?, ?, ?)";
                        $stmt = mysqli_prepare($conn, $sql);
            
                        // Bind parameters and execute the statement
                        mysqli_stmt_bind_param($stmt, "ssss", $theme, $content, $user, $category);
            
                        if (mysqli_stmt_execute($stmt)) {
                            echo "Successful insertion.";
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
            
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "3rd if";
                    }
                } else {
                    echo "2nd if";
                }
            }
            
            


            
mysqli_close($conn);
        ?>

    </div>

</body>
</html>

<?php
    include("footer.html");
?>