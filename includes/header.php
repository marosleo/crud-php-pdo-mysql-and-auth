<?php

  use \App\Session\Login;

  //DADOS DO USUÁRIO LOGADO
  $usuarioLogado = Login::getUsuarioLogado();

  //DETALHES DO USUÁRIO
  $usuario = $usuarioLogado ? 
             $usuarioLogado['nome'].' <a href="logout.php" class="text-light font-weight-bold ml-2">Sair</a>' :
             'Visitante <a href="login.php" class="text-light font-weight-bold ml-2">Entrar</a>'

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Sistema de gerenciamento de vagas!</title>
  </head>
  <body class="bg-dark text-light">

    <div class="container">

      <div class="jumbotron bg-danger">
        <h1>Gerenciamento de vagas</h1>
        <p>Exemplo de CRUD com PHP orientados a objetos</p>

        <hr class="border-light">

        <div class="d-flex justify-content-start">
          <?=$usuario?>
        </div>
      </div>


