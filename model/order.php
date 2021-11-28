<?php

  require_once("model/connect.php");

  function GetOrder(){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `order`');
    $stmt -> execute();
    return $stmt -> fetchAll();
  }

  function GetOrderById($id=NULL){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `order` WHERE id = :id', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt -> execute(array(":id"=>$id));
    return $stmt -> fetchAll(); 
  }

?>