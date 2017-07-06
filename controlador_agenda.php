<?php

    //
    function prettyHeader($contatosAuxiliar){

        $contatosJson = json_encode($contatosAuxiliar, JSON_PRETTY_PRINT); //o array foi codificado para json

        file_put_contents('contatos.json', $contatosJson); //Está sendpo atribuido strings ao arquivo contatos.json//          HELPPPPPPPPPPPPPPPP

        header("Location: index.phtml");


    }


    //TRANSFORMA  JSON EM ARRAY
    function codific(){


        $contatosAuxiliar = file_get_contents('contatos.json'); //a variavel está recebendo o valor de um arquivo json;
        $contatosAuxiliar = json_decode($contatosAuxiliar, true); //o arquivo json foi codificado/transformado em um array;

        return $contatosAuxiliar;
    }

    //CADASTRA OS CONTATOS
    function cadastrar($nome,$email,$telefone){

       codific();


        $contato = [
            'id'       => uniqid(),
            'nome'     => $nome,
            'email'    => $email,
            'telefone' => $telefone
        ];

        array_push($contatosAuxiliar, $contato); //no array $contatosAuxiliar  está sendo adicionado valores do array $contato;

        prettyHeader($contatosAuxiliar);

    }

    //BUSCA OS CONTATOS
    function buscar($busca = null){

        $contatosAuxiliar= codific();

        $contatosEncontrados = [];

        if ($busca == null || $busca == ""){

            $contatosEncontrados = getContact();

        } else {

            foreach ($contatosAuxiliar as $contato) {
                if ($contato['nome'] == $busca) {
                    //echo "Achei o danado";
                    $contatosEncontrados[] = $contato;
                }

            }
        }

        return $contatosEncontrados;

    }



    //PEGA O CONTATO
    function getContact(){

       $contatosAuxiliar= codific();
        return $contatosAuxiliar;

    }


    //EXCLUIR O CONTATO
    function excluirContato($id){

        $contatosAuxiliar= codific();

        foreach($contatosAuxiliar as $posicao => $contato){
            if($id == $contato['id']){

               unset($contatosAuxiliar[$posicao]);
            }
        }

        prettyHeader($contatosAuxiliar);

    }


    //EDITAR O CONTATO
    function editarContato($id){

        $contatosAuxiliar= codific();

        foreach ($contatosAuxiliar as $contato) {
            if ($contato['id'] == $id) {
                //echo "Achei o danado";
                return $contato;
            }

        }

    }

    //SALVAR CONTATO EDITADO
    function salvarContatoEditado($id,$nome,$email,$telefone){

        $contatosAuxiliar= codific();

        foreach($contatosAuxiliar as $posicao =>$contato){
            if($contato['id'] == $id){
               $contatosAuxiliar[$posicao]['nome']= $nome;
               $contatosAuxiliar[$posicao]['email']= $email;
               $contatosAuxiliar[$posicao]['telefone']= $telefone;

               break;
            }
        }

        prettyHeader($contatosAuxiliar);
    }


    //ROTAS
    if ($_GET['acao'] == 'cadastrar'){
        cadastrar($_POST['nome'],$_POST['email'], $_POST['telefone'] );

    }elseif($_GET['acao']=='excluir'){
        excluirContato($_GET['id']);

    }elseif($_GET['acao']=='editar'){
        salvarContatoEditado($_GET['id'],$_POST['nome'],$_POST['email'], $_POST['telefone'] );

    }elseif($_GET['acao']=='buscar') {
        buscar($busca);

    }
