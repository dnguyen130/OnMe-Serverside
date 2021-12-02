<?php

  require_once("model/connect.php");

  //GET FUNCTIONS

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

  //POST FUNCTIONS

  function AddCart(
    $firebase_id = "0",
    $user_id = NULL
    ){
    global $db;

    $stmt = $db->prepare(
      "INSERT INTO `cart` 
      (
        `id`, 
        `firebase_id`, 
        `user_id`, 
        `seat_number`, 
        `message`, 
        `total_price`
      )
      VALUES (NULL, :firebase_id, :user_id, NULL, NULL, NULL)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute(array(
      ":firebase_id"=>$firebase_id,
      ":user_id"=>$user_id
    ));

    return $db->lastInsertId();
  }

  //PATCH FUNCTIONS

  function UpdateCartMessage(
    $id=NULL,
    $message=""
  ){
    global $db;

    if($id == NULL){
      return false;
    }

    $stmt = $db->prepare("UPDATE `cart` SET `message` = :message WHERE `cart`.id = :id; ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt -> execute(array(
      ":id"=>$id,
      ":message"=>$message
    ));
  }

  function UpdateCartSeatNumber(
    $id=NULL,
    $seat_number=NULL
  ){
    global $db;

    if($id == NULL){
      return false;
    }

    $stmt = $db->prepare("UPDATE `cart` SET `seat_number` = :seat_number WHERE `cart`.id = :id; ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt -> execute(array(
      ":id"=>$id,
      ":seat_number"=>$seat_number
    ));
  }

  function UpdateCartTotalPrice(
    $id=NULL,
    $total_price=NULL
  ){
    global $db;

    if($id == NULL){
      return false;
    }

    $stmt = $db->prepare("UPDATE `cart` SET `total_price` = :total_price WHERE `cart`.id = :id; ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt -> execute(array(
      ":id"=>$id,
      ":total_price"=>$total_price
    ));
  }

  //DELETE FUNCTIONS

  function DeleteCart($id=NULL){
    global $db;
  
    if($id == NULL){
      return false;
    }
  
    $stmt = $db->prepare("DELETE FROM `cart` WHERE `cart`.`id` = :id", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute(array(
      ":id"=>$id
    ));
  }

?>