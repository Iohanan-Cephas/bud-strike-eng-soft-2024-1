<?php
// Dados de conexão com o banco de dados
$db_name = 'railway'; // nome do banco de dados
$db_host = 'monorail.proxy.rlwy.net'; // host do banco de dados
$db_port = '53107'; // porta do banco de dados
$db_user = 'root'; // usuário do banco de dados
$db_password = 'ElAGeNXWGcgGbhCiruCCIgRfdjBfxjmk'; // senha do banco de dados

try {
    // Conectar ao banco de dados MySQL
    $pdo = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Em caso de falha na conexão, exibir mensagem de erro
    exit;
}
?>
