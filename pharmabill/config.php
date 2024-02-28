<?php

$db='pharmabill';
$port = 3307; //specify the port number
$conn=mysqli_connect('localhost','root','', $db, $port);

if (!$conn){
    echo "error during connection" . mysqli_connect_error();
}

$db_selected=mysqli_select_db($conn,$db);
if (!$db_selected){
    echo "error db" . mysqli_error($conn);
}
?>