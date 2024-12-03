<?php
session_start();

// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "pucprpucpr", "academia_boxe");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Obter os dados do formulário
$nome_usuario = $_POST['nome_usuario'];
$senha = $_POST['senha'];

// Buscar usuário no banco de dados
$query = "SELECT * FROM usuarios WHERE nome_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $nome_usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    
    // Verificar a senha
    if (password_verify($senha, $usuario['senha_hash'])) {
        // Iniciar a sessão e armazenar informações do usuário
        $_SESSION['id'] = $usuario['id_usuario'];
        $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario']; // Tipo de usuário (aluno/professor)

        // Redirecionar para a página inicial ou área protegida
        header("Location: dashboard.php");
        exit(); // Adicionando exit após o header para garantir que o código pare aqui
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

$stmt->close();
$conn->close();
?>