<?php
    include('../config.php');
    include(DBAPI);

    $animals = null;
    $animal = null;

    /**
     *  Listagem de Animais
     */
    function index() {
        global $animals;
        $animals = find_all("animal");
    }

    /**
     *  Cadastro de Animal
     */
   function add() {
    if (!empty($_POST['animal'])) {
        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));

        $animal = $_POST['animal'];
        $animal['created']  = $today->format("Y-m-d H:i:s");
        $animal['modified'] = $today->format("Y-m-d H:i:s");
        
        // Processar upload da foto
        if (!empty($_FILES['foto']['name'])) {
            $foto = uploadFotoAnimal();
            if ($foto) {
                $animal['foto'] = $foto;
            }
        }

        save('animal', $animal);
        header('location: index.php');
        exit;
    }
}

    function formataData($data, $formato){
        $novadata = new DateTime($data, new DateTimeZone("America/Sao_Paulo"));
        return $novadata->format($formato);
    }

    /**
     *	Atualização/Edição de Animal
     */
    function edit() {
        $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            if (isset($_POST['animal'])) {

                $animal = $_POST['animal'];
                $animal['modified'] = $now->format("Y-m-d H:i:s");
                
                // Processar exclusão de foto se solicitado
                if (isset($_POST['excluir_foto']) && $_POST['excluir_foto'] == '1') {
                    $animal_antigo = find("animal", $id);
                    if (!empty($animal_antigo['foto'])) {
                        excluirFotoAnimal($animal_antigo['foto']);
                        $animal['foto'] = ''; // Limpa o campo da foto
                    }
                }
                
                // Processar upload da nova foto
                if (!empty($_FILES['foto']['name'])) {
                    $foto = uploadFotoAnimal();
                    if ($foto) {
                        // Excluir foto antiga se existir
                        $animal_antigo = find("animal", $id);
                        if (!empty($animal_antigo['foto'])) {
                            excluirFotoAnimal($animal_antigo['foto']);
                        }
                        $animal['foto'] = $foto;
                    }
                }

                update("animal", $id, $animal);
                header("location: index.php");
                exit;

            } else {
                global $animal;
                $animal = find("animal", $id);

                if (!empty($animal["data_nasc"])) {
                    $birthdate = new DateTime($animal["data_nasc"], new DateTimeZone('America/Sao_Paulo'));
                    $animal["data_nasc"] = $birthdate->format("Y-m-d");
                }

                if (!empty($animal["created"])) {
                    $created = new DateTime($animal["created"], new DateTimeZone('America/Sao_Paulo'));
                    $animal["created"] = $created->format("Y-m-d");
                }
            } 
        } else {
            header('location: index.php');
            exit;
        }
    }

   /**
     *  Visualização de um Animal
     */
    function view($id = null) {
        global $animal;
        $animal = find('animal', $id);
    }

    /**
     *  Exclusão de um Animal
     */
    function deleteAnimal($id = null) {
        // Primeiro obtém os dados do animal para excluir a foto
        $animal = find("animal", $id);
        
        if ($animal && !empty($animal['foto'])) {
            excluirFotoAnimal($animal['foto']);
        }
        
        $database = open_database();
        
        try {
            if ($id) {
                $sql = "DELETE FROM animal WHERE id = " . $id;
                $result = $database->query($sql);

                if ($result) {   	
                    $_SESSION['message'] = "Animal removido com sucesso.";
                    $_SESSION['type'] = 'success';
                } else {
                    throw new Exception("Erro ao excluir: " . $database->error);
                }
            }
        } catch (Exception $e) { 
            $_SESSION['message'] = $e->getMessage();
            $_SESSION['type'] = 'danger';
        }

        close_database($database);
        header('location: index.php');
        exit;
    }
    
    /**
     *  Upload de Foto para Animais
     */
    function uploadFotoAnimal() {
        $diretorio = "../uploads/animais/";
        
        // Criar diretório se não existir
        if (!file_exists($diretorio)) {
            mkdir($diretorio, 0777, true);
        }
        
        $extensao = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
        $nome_unico = uniqid() . '.' . $extensao;
        $caminho_completo = $diretorio . $nome_unico;
        
        // Verificar se é uma imagem válida
        $check = getimagesize($_FILES['foto']['tmp_name']);
        if ($check === false) {
            $_SESSION['message'] = "Arquivo não é uma imagem válida.";
            $_SESSION['type'] = 'danger';
            return false;
        }
        
        // Verificar tamanho do arquivo (máximo 2MB)
        if ($_FILES['foto']['size'] > 2000000) {
            $_SESSION['message'] = "Arquivo muito grande. Máximo 2MB permitido.";
            $_SESSION['type'] = 'danger';
            return false;
        }
        
        // Permitir apenas certos formatos
        $formatos_permitidos = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($extensao, $formatos_permitidos)) {
            $_SESSION['message'] = "Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
            $_SESSION['type'] = 'danger';
            return false;
        }
        
        // Fazer upload
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_completo)) {
            return "animais/" . $nome_unico;
        } else {
            $_SESSION['message'] = "Erro ao fazer upload da imagem.";
            $_SESSION['type'] = 'danger';
            return false;
        }
    }
    
    /**
     *  Excluir Foto do Animal
     */
    function excluirFotoAnimal($foto) {
        $caminho_completo = "../uploads/" . $foto;
        if (file_exists($caminho_completo)) {
            unlink($caminho_completo);
        }
    }
?>