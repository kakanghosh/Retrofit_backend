<?php
$host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "retro";

$con = mysqli_connect($host, $db_user, $db_pass, $db_name);
if ($con){
    //echo "Connected ....";
}else{
    //echo "Could not connect";
}
