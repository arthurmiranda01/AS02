<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - Academia de Boxe</title>
</head>
<body>
    <h2>Criar Conta</h2>
    <form action="processa_criar_conta.php" method="POST">
        <label for="nome_usuario">Nome de Usuário:</label>
        <input type="text" name="nome_usuario" id="nome_usuario" required>
        <br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br><br>
        
        <label for="senha_confirmacao">Confirmar Senha:</label>
        <input type="password" name="senha_confirmacao" id="senha_confirmacao" required>
        <br><br>
        
        <button type="submit">Criar Conta</button>
    </form>
</body>
</html>
