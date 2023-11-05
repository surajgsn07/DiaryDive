<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "diarydive";
    $conn = "";

    try{
        $conn = mysqli_connect($db_server,
                                $db_user,
                                $db_pass,
                                $db_name);
    }catch(e){
        echo"cannot connect";
    }

?>