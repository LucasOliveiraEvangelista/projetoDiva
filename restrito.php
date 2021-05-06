<?php
session_start();
// Se o usuário não está logado, manda para página de inicio.
if (!isset($_SESSION['unique_id'])) 
header("Location: index.php");
exit; // Encerra a execução
?>