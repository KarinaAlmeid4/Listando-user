<?php
$host = 'localhost';
$user = 'root';  // Usuário padrão para localhost
$password = 'root';  // Senha padrão para localhost
$dbname = 'Usuário';
 
// Cria a conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $dbname);
 
// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>