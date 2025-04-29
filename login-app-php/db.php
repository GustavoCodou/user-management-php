<?php

// É bom deixar isso em apenas um arquivo para podermoss reutilizar depois.

//Essa variavel vai conectar com o banco de dados 
//Usuário: "root", Senha: "" (vazia), Banco: "login_ap".
$conn = mysqli_connect("localhost", "root", "", "login_ap");

//Deixar em uma variavel para ser mais facil
if ($conn) {
    echo "Connected";
} else {
    // Em caso de erro, exibe a mensagem correspondente
    echo "Not connected: " . mysqli_connect_error();
}
?>

?>