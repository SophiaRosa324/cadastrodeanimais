<?php 
    require_once "config.php";
    require_once DBAPI;


    $db = open_database(); 
    
    if ($db) {
        echo '<h1>Banco de Dados Conectado!</h1>';
    } else {
        echo '<h1>ERRO: Não foi possível Conectar!</h1>';
    }
?>