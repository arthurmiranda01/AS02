<?php
// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "pucprpucpr", "academia_boxe");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
