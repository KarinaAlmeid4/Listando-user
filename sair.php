<?php
session_start();
session_destroy();
header('Location: sair.html');
exit;
?>

