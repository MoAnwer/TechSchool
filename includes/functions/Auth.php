<?php 

session_start();

class Auth {

  public static function isLog()  {
    if (!isset($_SESSION['username'])) {
      header("HTTP/1.1 403 Forbidden");
      exit();
    } else {
      return true;
    }
  }

  public static function isAdmin(){
    if (!isset($_SESSION['admin'])) {
      header("HTTP/1.1 403 Forbidden");
      exit();
    } else {
      return true;
    }
  }

  public static function forbidden(){
    header("HTTP/1.1 403 Forbidden");
    exit();
  }

  public static function notFount(){
    header("HTTP/1.1 404 NOT Fount");
    exit();
  }
}