<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Academia de Boxe</title>
</head>
<body>
    <h2>Login</h2>
    <form action="processa_login.php" method="POST">
        <label for="nome_usuario">Nome de Usuário:</label>
        <input type="text" name="nome_usuario" id="nome_usuario" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>