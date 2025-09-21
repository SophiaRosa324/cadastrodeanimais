<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>CRUD com Bootstrap - Sistema de Gerenciamento</title>
        <meta name="description" content="Sistema de gerenciamento de clientes e animais">
        <meta name="keyword" content="crud, clientes, animais, gestão">
        <meta name="author" content="Sophia Rosa e Beatriz de Andrade">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
        <style>
            /* Garantir que o body ocupe toda a altura */
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            }
            
            /* Conteúdo principal */
            .content-wrapper {
                flex: 1 0 auto;
            }
            
            /* Ajuste para navbar fixa */
            main.container {
                padding-top: 80px;
            }
        </style>       
    </head>
    <body class="d-flex flex-column min-vh-100">

        <nav class="navbar navbar-expand-md bg-body-tertiary fixed-top" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="<?php echo BASEURL; ?>index.php">
                    <i class="fa-solid fa-database"></i> Sistema CRUD
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               <i class="fa-solid fa-users"></i> Clientes
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?php echo BASEURL; ?>customers">
                                        <i class="fa-solid fa-users"></i> Gerenciar Clientes
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php">
                                        <i class="fa-solid fa-user-plus"></i> Novo Cliente
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               <i class="fa-solid fa-paw"></i> Animais
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?php echo BASEURL; ?>Animais">
                                        <i class="fa-solid fa-paw"></i> Gerenciar Animais
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo BASEURL; ?>Animais/add.php">
                                        <i class="fa-solid fa-circle-plus"></i> Novo Animal
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container content-wrapper">