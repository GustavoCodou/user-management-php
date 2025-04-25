<?php

$conn = mysqli_connect("localhost", "root", "", "login_ap");

//Deixar em uma variavel para ser mais facil
if($conn){
    echo "Connected";
} else {
    echo "Not connected". mysqli_error($conn);
}

?>