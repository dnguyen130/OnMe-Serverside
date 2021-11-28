<?php

  require_once("model/connect.php");

  function GetOrderItem(){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `order_item`');
    $stmt -> execute();
    return $stmt -> fetchAll();
  }

  function GetOrderItemById($id=NULL){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `order_item` WHERE id = :id', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt -> execute(array(":id"=>$id));
    return $stmt -> fetchAll(); 
  }

?>