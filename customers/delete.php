<?php 
  include"functions.php"; 
    try {
         if (isset($_GET['id'])){
                //Apaga a imagem
                delete($_GET['id']);
            } else {
                throw new Exception("ERRO: ID não definido");
            }
    } catch (\Throwable $e) {
        throw $e;
    }
 
?>