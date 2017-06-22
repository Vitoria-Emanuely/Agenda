<?php

    function cadastrar(){

        //controlador agenda

        $contatosAuxiliar = file_get_contents('contatos.json');
        $contatosAuxiliar = json_decode($contatosAuxiliar, true);

        $contato = [
            'id'       => uniqid(),
            'nome'     => $_POST['nome'],
            'email'    => $_POST['email'],
            'telefone' => $_POST['telefone']
        ];

        array_push($contatosAuxiliar, $contato);

        $contatosJson = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT);

        file_put_contents('contatos.json', $contatosJson);

        header("Location: index.phtml");

    }

    function getContact(){
        $contatosAuxiliar = file_get_contents('contatos.json');
        $contatosAuxiliar = json_decode($contatosAuxiliar, true);

        return $contatosAuxiliar;
    }

    //ROTAS
    if ($_GET['acao'] == 'cadastrar'){
        cadastrar();
    }
