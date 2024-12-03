<?php
session_start();
session_destroy(); // Destrói todas as sessões

// Redireciona para a página de login após o logout
header("Location: login.php");
exit();
?>