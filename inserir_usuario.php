<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "academia_boxe");

// Verificação de conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Exemplo de inserção de senha com hash
$nome_usuario = "admin";
$senha = "admin123";
$senha_hash = password_hash($senha, PASSWORD_BCRYPT);
$tipo_usuario = "administrador";

// Inserção no banco
$stmt = $conn->prepare("INSERT INTO usuarios (nome_usuario, senha_hash, tipo_usuario) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome_usuario, $senha_hash, $tipo_usuario);

if ($stmt->execute()) {
    echo "Usuário inserido com sucesso!";
} else {
    echo "Erro ao inserir usuário: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
