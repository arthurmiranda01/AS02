<?php
session_start();
include('db.php');

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['acao'])) {
    $nome_usuario = $_POST['nome_usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo_usuario = $_POST['tipo_usuario'];

    if ($_POST['acao'] == 'inserir') {
        // Inserir novo usuário
        $query = "INSERT INTO usuarios (nome_usuario, senha_hash, tipo_usuario) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $nome_usuario, $senha, $tipo_usuario);
        $stmt->execute();
        header("Location: dashboard.php"); // Redireciona após inserir
    } elseif ($_POST['acao'] == 'atualizar') {
        // Atualizar usuário
        $id_usuario = $_POST['id_usuario'];
        $query = "UPDATE usuarios SET nome_usuario = ?, senha_hash = ?, tipo_usuario = ? WHERE id_usuario = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $nome_usuario, $senha, $tipo_usuario, $id_usuario);
        $stmt->execute();
        header("Location: dashboard.php"); // Redireciona após atualizar
    }
}
?>
