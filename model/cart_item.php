<?php

  require_once("model/connect.php");

  //GET FUNCTIONS

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

  //POST FUNCTIONS

  function AddCartItem(
    $firebase_id = "",
    $item_id = NULL,
    $cart_id = NULL,
    $i_name = "",
    $price = NULL,
    $quantity = NULL
    ){
    global $db;

    $stmt = $db->prepare(
      "INSERT INTO `cart_item` 
      (
        `id`, 
        `firebase_id`, 
        `item_id`,
        `cart_id`,
        `i_name`,
        `picture`,
        `price`,
        `quantity`
      )
      VALUES (NULL, :firebase_id, :item_id, :cart_id, :i_name, NULL, :price, :quantity)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute(array(
      ":firebase_id"=>$firebase_id,
      ":item_id"=>$item_id,
      ":cart_id"=>$cart_id,
      ":i_name"=>$i_name,
      // ":picture"=>$picture,
      ":price"=>$price,
      ":quantity"=>$quantity
    ));

    return $db->lastInsertId();
  }

  //PATCH FUNCTIONS
  
  function UpdateCartItemQuantity(
    $id=NULL,
    $quantity = NULL
  ){
    global $db;

    if($id == NULL){
      return false;
    }

    $stmt = $db->prepare("UPDATE `cart` SET `quantity` = :quantity WHERE `cart_item`.id = :id; ", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt -> execute(array(
      ":id"=>$id,
      ":quantity"=>$quantity
    ));
  }

  //DELETE FUNCTIONS

  function DeleteCartItem($id=NULL){
    global $db;
  
    if($id == NULL){
      return false;
    }
  
    $stmt = $db->prepare("DELETE FROM `cart_item` WHERE `cart`.`id` = :id", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute(array(
      ":id"=>$id
    ));
  }
?>