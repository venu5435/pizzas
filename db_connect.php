<?php

//connect to a database

$conn = mysqli_connect('localhost', 'venu', 'test1234', 'ninja_pizza');

//check connection

if(!$conn){
    echo 'connection error:' . mysqli_conection_error();
}
?>