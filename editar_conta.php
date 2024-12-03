<?php
session_start();
include('db.php');

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_GET['id'];

// Buscar os dados do usuário para editar
$query = "SELECT * FROM usuarios WHERE id_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário - Academia de Boxe</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form action="processar_crud.php" method="POST">
        <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
        
        <label for="nome_usuario">Nome de Usuário:</label>
        <input type="text" name="nome_usuario" id="nome_usuario" value="<?php echo $usuario['nome_usuario']; ?>" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br><br>
        
        <label for="tipo_usuario">Tipo de Usuário:</label>
        <select name="tipo_usuario" id="tipo_usuario" required>
            <option value="aluno" <?php echo ($usuario['tipo_usuario'] == 'aluno') ? 'selected' : ''; ?>>Aluno</option>
            <option value="professor" <?php echo ($usuario['tipo_usuario'] == 'professor') ? 'selected' : ''; ?>>Professor</option>
        </select><br><br>
        
        <button type="submit" name="acao" value="atualizar">Atualizar</button>
    </form>
    <a href="dashboard.php">Voltar</a>
</body>
</html>
