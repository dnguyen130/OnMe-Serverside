<?php

  require_once("model/connect.php");

  function GetItem(){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `item`');
    $stmt -> execute();
    return $stmt -> fetchAll();
  }

  function GetItemById($id=NULL){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `item` WHERE id = :id', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt -> execute(array(":id"=>$id));
    return $stmt -> fetchAll(); 
  }

?>