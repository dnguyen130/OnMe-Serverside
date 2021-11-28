<?php

  require_once("model/connect.php");

  function GetCart(){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `cart`');
    $stmt -> execute();
    return $stmt -> fetchAll();
  }

  function GetCartById($id=NULL){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `cart` WHERE id = :id', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt -> execute(array(":id"=>$id));
    return $stmt -> fetchAll(); 
  }

?>