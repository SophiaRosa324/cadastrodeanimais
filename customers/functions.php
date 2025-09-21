<?php

    include('../config.php');
    include(DBAPI);

    $customers = null;
    $customer = null;

    /**
     *  Listagem de Clientes
     */
    function index() {
        global $customers;
        $customers = find_all("customers");
    }

    /**
     *  Cadastro de Clientes
     */
    function add() {

        if (!empty($_POST['customer'])) {
            
            $today = 
            date_create('now', new DateTimeZone('America/Sao_Paulo'));

            $customer = $_POST['customer'];
            $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
            
            save('customers', $customer);
            header('location: index.php');
        }
    }

    /**
     *	Atualizacao/Edicao de Cliente
    */

    function edit() {

        $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            if (isset($_POST['customer'])) {

                $customer = $_POST['customer'];
                $customer['modified'] = $now->format("Y-m-d H:i:s");

                update("customers", $id, $customer);
                header("location: index.php");
            } else {

                global $customer;
                $customer = find("customers", $id);
                $birthdate = new DateTime( $customer["birthdate"], new DateTimeZone('America/Sao_Paulo'));
                $customer["birthdate"] = $birthdate->format("Y-m-d");
                $created = new DateTime( $customer["created"], new DateTimeZone('America/Sao_Paulo'));
                $customer["created"] = $created->format("Y-m-d");

            } 
        } else {
            header('location: index.php');
        }
    }

   /**
     *  Visualização de um Cliente
     */
    function view($id = null) {
        global $customer;
        $customer = find('customers', $id);
    }

    //Formata data
    function formataData($data, $formato){
        $novadata = new DateTime($data, new DateTimeZone("America/Sao_Paulo"));
        return $novadata->format($formato);
        
    }
    // Formata telefones
     function formataTel($tel){
        $telefone = "(" .substr($tel, 0, 2) . ")" . substr($tel, 2, 5) . "-" .substr($tel, 7, 4);
        return $telefone;
        
    }

    //Formata CEP
    function formataCEP($cep){
        $cepupd = substr($cep, 0, 5) . "-" . substr($cep, 5, 3);
        return $cepupd;
    }

    /**
     *  Exclusão de um Cliente
     */
    function delete($id = null) {

        global $customer;
        $customer = remove('customers', $id);

        header('location: index.php');
    }

