<?php
session_start();
if (!isset($_SESSION['nome'])) {
    $_SESSION['nome'] = 'Usuário de teste'; 
}
?>
 
<nav class="navbar">
    <div class="navbar-container">
        <span>Bem-vindo, <?php echo $_SESSION['nome']; ?></span>
        <a href="sair.php" class="btn-sair">Sair</a>
    </div>
</nav>