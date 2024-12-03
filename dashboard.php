<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Redireciona para o login se não estiver autenticado
    exit();
}

echo "<h1>Bem-vindo, " . $_SESSION['nome_usuario'] . "!</h1>";
echo "<p>Você está autenticado e pode acessar o conteúdo restrito.</p>";
?>