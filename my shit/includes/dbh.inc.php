<?php
$conn = mysqli_connect("localhost", "root", "", "login");
if(!$conn){
    die("you suck bitch");
}
else{
    echo "connection succesful";
}