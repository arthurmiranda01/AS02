<?php
// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "pucprpucpr", "academia_boxe");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Obter os dados do formulário
$nome_usuario = $_POST['nome_usuario'];
$senha = $_POST['senha'];
$senha_confirmacao = $_POST['senha_confirmacao'];

// Verificar se as senhas são iguais
if ($senha !== $senha_confirmacao) {
    echo "As senhas não coincidem!";
    exit();
}

// Verificar se o nome de usuário já existe
$query = "SELECT * FROM usuarios WHERE nome_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $nome_usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Erro: O nome de usuário já existe!";
    exit();
} else {
    // Criptografar a senha
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);
    
    // Inserir novo usuário
    $insert_query = "INSERT INTO usuarios (nome_usuario, senha_hash, tipo_usuario) VALUES (?, ?, ?)";
    $tipo_usuario = "aluno"; // Tipo padrão de usuário
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("sss", $nome_usuario, $senha_hash, $tipo_usuario);
    
    if ($insert_stmt->execute()) {
        echo "Conta criada com sucesso! <a href='login.php'>Faça login aqui</a>";
    } else {
        echo "Erro ao criar conta: " . $insert_stmt->error;
    }
}

$stmt->close();
$insert_stmt->close();
$conn->close();
?>
