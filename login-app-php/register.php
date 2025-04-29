<?php

// Aqui vamos utilizar aquele arquivo.
include 'db.php';


// Deixa ativado erros do php para mostrar.
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);


//Variavel para guardar mensagens de erro
$error= "";


// Isso verifica **como o formulário foi enviado**.

// Se for via `POST`, o código dentro desse `if` será executado.
// Isso é comum quando se quer processar um formulário só **depois que ele for enviado**
// evitando executar o código automaticamente ao abrir a página.


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    mysqli_real_escape_string($conn, $_POST['username']);
}

    // Check if the password and confirm match
    if($password === $confirm_password){
        $error = "Password do not match";
    }else {

    $sql = "SELECT * FROM  users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) ===1){
        $error = "Username already exists, Please choose another";
    } else {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$passwordHash', '$email')";

        if(mysqli_query($conn, $sql)){
            echo "DATA INSERTED";
        }else{
            $error= "SOMETHING HAPPENED not data inserted, error:" . mysqli_error($conn);
        }

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

<h2>Register</h2>

<?php if($error): ?>

<p style="color: red">
    <?php echo $error; ?>
</p>

<?php endif; ?>


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

<?php
mysqli_close($conn);
?>