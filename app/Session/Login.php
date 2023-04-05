<?php

namespace App\Session;

class Login{

  private static function init(){
    //VERIFICA O STATUS DA SESSÃO
    if(session_status() !== PHP_SESSION_ACTIVE){
      //INICIA A SESSÃO
      session_start();
    }
  }

  //MÉTODO RESPONSÁVEL POR RETORNAR OS DADOS DO USUÁRIO LOGADO
  public static function getUsuarioLogado(){
    self::init();

    //RETORNA DADOS DO USUÁRIO
    return self::isLogged() ? $_SESSION['usuario'] : null; 
  }

  public static function login($obUsuario){
    //INICIA A SESSÃO
    self::init();

    //SESSÃO DE USUÁRIO
    $_SESSION['usuario'] = [
      'id'    => $obUsuario->id,
      'nome'  => $obUsuario->nome,
      'email' => $obUsuario->email
    ];

    //REDIRECIONA USUÁRIO PARA INDEX
    header('location: index.php');
    exit;
  }

  public static function logout() {
    //INICIA A SESSÃO
    self::init();

    //REMOVE A SESSÃO DE USUÁRIO
    unset($_SESSION['usuario']);

    //REDIRECIONA USUÁRIO PARA LOGIN
    header('location: login.php');
    exit;
  }

  // Método responsável por verificar se o usuário está logado
  public static function isLogged(){
    //INICIA A SESSÃO
    self::init();

    //VALIDAÇÃO
    return isset($_SESSION['usuario']['id']);
  }

  // Método responsável por obrigar a estar logado para acessar
  public static function requireLogin(){
    if(!self::isLogged()){
      header('location: login.php');
      exit;
    }
  }

  // Método responsável por obrigar a estar deslogado para acessar
  public static function requireLogout(){
    if(self::isLogged()){
      header('location: index.php');
      exit;
    }
  }

}