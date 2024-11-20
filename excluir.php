<?php
include 'conexao.php';
 
// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
 
    // Comando SQL para excluir o usuário
    $sql = "DELETE FROM Usuário WHERE id = $id";
 
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuário removido com sucesso!');</script>";
        echo "<script>window.location.href = 'lista.php';</script>";
    } else {
        echo "<script>alert('Falha ao remover o usuário: " . $conn->error . "');</script>";
        echo "<script>window.location.href = 'lista.php';</script>";
    }
}
 
$conn->close();
?>