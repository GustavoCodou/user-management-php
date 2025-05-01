<?php

// Verifica se o usuário está logado
function is_user_logged_in() {
    // Retorna true se a variável de sessão 'logged_in' estiver definida e for igual a true
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

// Redireciona o usuário para a página de login
function redirect($location) {
    // Envia um cabeçalho HTTP para redirecionar para 'login.php'
    header("Location: login.php");
    // Encerra a execução do script imediatamente após o redirecionamento
    exit;
}

// Define a classe CSS "active" se a página atual for igual à passada como parâmetro
function setActiveCLass($pageName) {
    // Obtém o nome do arquivo da página atual (ex: 'index.php')
    $current_page = basename($_SERVER['PHP_SELF']);
    // Compara com o nome da página passada. Se for igual, retorna "active", senão retorna string vazia
    return ($current_page === $pageName) ? "active" : '';
}

// Retorna o nome da página atual (sem a extensão .php) para usar como classe CSS no <body>
function getPageClass() {
    // basename com o segundo parâmetro remove a extensão ".php" do nome da página
    return basename($_SERVER['PHP_SELF'], ".php");
}

// Verifica se um usuário já existe no banco de dados
function user_exists($conn, $username) {
    // Monta a consulta SQL buscando pelo nome de usuário exato
    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    // Executa a consulta no banco de dados
    $result = mysqli_query($conn, $sql);
    // Retorna true se encontrou pelo menos uma linha (usuário existe), senão false
    return mysqli_num_rows($result) > 0;
}

// Formata uma data para mostrar o mês por extenso e o dia (ex: "April 28")
function full_month_date($date) {
    // Converte a string de data para timestamp e formata como "F j" (ex: April 28)
    return date("F j", strtotime($date));
}
