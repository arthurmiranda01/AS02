<?php
session_start();
include('db.php');

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_GET['id'];

// Deletar o usuário
$query = "DELETE FROM usuarios WHERE id_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();

header("Location: dashboard.php"); // Redireciona após a exclusão
exit();
?>
