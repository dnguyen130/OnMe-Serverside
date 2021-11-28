<?php

  require_once("model/connect.php");

  function GetCartItem(){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `cart_item`');
    $stmt -> execute();
    return $stmt -> fetchAll();
  }

  function GetCartItemById($id=NULL){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `cart_item` WHERE id = :id', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt -> execute(array(":id"=>$id));
    return $stmt -> fetchAll(); 
  }

?>