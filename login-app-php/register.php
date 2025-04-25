<?php
include 'db.php';

$error= "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    mysqli_real_escape_string($conn, $_POST['username']);
}

if($password === $confirm_password){
    $error = "Password do not match";
}else {

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if(mysqli_query($conn, $sql)){
        echo "DATA INSERTED";
    }else{
        echo "SOMETHING HAPPENED not data inserted, error:" . mysqli_error($conn);
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">

        <label for="username">Username:</label><br>
        <input type="username" name="username" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label for="conform_password">Confirm Password:</label><br>
        <input type="password" name="confirm_password" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>