<?php
require_once('functions.php');

// Verifica se o ID foi passado e é numérico
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    deleteAnimal($id);
} else {
    // Se não tem ID válido, redireciona com mensagem de erro
    $_SESSION['message'] = "ID inválido para exclusão.";
    $_SESSION['type'] = 'danger';
    header('location: index.php');
    exit;
}