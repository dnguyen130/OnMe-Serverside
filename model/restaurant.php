<?php

  require_once("model/connect.php");

  function GetRestaurant(){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `restaurant`');
    $stmt -> execute();
    return $stmt -> fetchAll();
  }

  function GetRestaurantById($id=NULL){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `restaurant` WHERE id = :id', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt -> execute(array(":id"=>$id));
    return $stmt -> fetchAll(); 
  }

?>