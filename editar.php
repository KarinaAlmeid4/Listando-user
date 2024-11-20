<?php
include 'conexao.php';
 
// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Obtém o ID da URL e o converte em número inteiro
 
    // Consulta o banco de dados para recuperar os dados do usuário
    $sql = "SELECT * FROM Usuário WHERE id = $id";
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc(); // Obtém os dados do usuário
    } else {
        echo "<script>alert('Usuário inexistente.');</script>";
        echo "<script>window.location.href = 'lista.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID não informado.');</script>";
    echo "<script>window.location.href = 'lista.php';</script>";
    exit;
}
 
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
 
    // Atualiza os dados do usuário no banco
    $sql = "UPDATE Usuário SET nome = '$nome', email = '$email', cargo = '$cargo' WHERE id = $id";
 
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Atualização do usuário realizada com sucesso!');</script>";
        echo "<script>window.location.href = 'lista.php';</script>";
    } else {
        echo "<script>alert('Falha ao atualizar as informações do usuário: " . $conn->error . "');</script>";
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
        <br>
        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" value="<?php echo $usuario['cargo']; ?>" required>
        <br>
        <button type="submit">Salvar</button>
        <a href="lista.php">Cancelar</a>
    </form>

</body>
</html>