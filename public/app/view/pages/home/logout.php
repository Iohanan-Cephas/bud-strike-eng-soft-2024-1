<?php
// Iniciar a sessão
session_start();

// Limpar as variáveis de sessão
unset($_SESSION['user_id']);
unset($_SESSION['username']);

// Redirecionar para a tela de login
header("Location: ../login");
exit();
?>