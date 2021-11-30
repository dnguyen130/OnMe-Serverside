<?php

  require_once("model/connect.php");

  //GET FUNCTIONS

  function GetUser(){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `user`');
    $stmt -> execute();
    return $stmt -> fetchAll();
  }

  function GetUserById($id=NULL){
    global $db;

    $stmt = $db -> prepare('SELECT * FROM `user` WHERE id = :id', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt -> execute(array(":id"=>$id));
    return $stmt -> fetchAll(); 
  }

  //POST FUNCTIONS

  function AddUser(
    $firebase_id = "0",
    $first_name = "",
    $last_name = ""
    ){
    global $db;

    $stmt = $db->prepare(
      "INSERT INTO `user` 
      (
        `id`, 
        `firebase_id`, 
        `picture`, 
        `first_name`, 
        `last_name`, 
        `age`, 
        `truth1`, 
        `truth2`, 
        `lie`)
      VALUES (NULL, :firebase_id, NULL, :first_name, :last_name, NULL, NULL, NULL, NULL)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute(array(
      ":firebase_id"=>$firebase_id,
      ":first_name"=>$first_name,
      ":last_name"=>$last_name));

    return $db->lastInsertId();
  }

  function UpdateUser(
    $id=NULL,
    $age=NULL, 
    $truth1="",
    $truth2="",
    $lie=""
    ){
    global $db;

    if($id == NULL){
      return false;
    }

    $stmt = $db->prepare(
      "UPDATE `user` 
      SET 
      `age` = :age,
      `truth1` = :truth1,
      `truth2` = :truth2,
      `lie` = :lie
      WHERE 
      `user`.`id` = :id;", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute(array(
      ":id"=>$id,
      ":age"=>$age,
      ":truth1"=>$truth1,
      ":truth2"=>$truth2,
      ":lie"=>$lie
    ));
  }

?>