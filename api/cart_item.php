<?php

  require_once("config.php");
  require_once("model/cart_item.php");

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require_once("../controller/get/cart_item.php");
  }
  
  //if you send a new movie name over under the variable movie_name, then I will add a new move to the database
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once("../controller/post/cart_item.php");
  }
  
  if($_SERVER['REQUEST_METHOD'] == 'PATCH'){
    require_once("../controller/patch/cart_item.php");
  }
  
  if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    require_once("../controller/delete/cart_item.php");
  }
  ?>