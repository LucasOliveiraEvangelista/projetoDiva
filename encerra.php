<?php

    require_once 'conexao.php';
    session_start();
    $id = $_SESSION['unique_id'];
	session_destroy();
    header("Location: login.php");

	        

?>