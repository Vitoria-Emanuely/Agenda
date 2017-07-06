<?php
    require 'controlador_agenda.php';
    $contato = editarContato($_GET['id']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
</head>
<body>


    <form method="post" action='controlador_agenda.php?acao=editar'>

        <br><br><br>
        <input name="id"        type="text" value="<?= $contato['id'] ?>"> <br>
        <br>
        <input name="nome"      type="text" value="<?= $contato['nome'] ?>">Nome  <br>
        <br>
        <input name="email"     type="text" value="<?= $contato['email'] ?>">Email  <br>
        <br>
        <input name="telefone"  type="text" value="<?= $contato['telefone'] ?>">Telefone<br>
        <br><br><br>

        <input type="submit" name="editar" value="editar">
    </form>







</body>
</html>