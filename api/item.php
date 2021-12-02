<?php

  require_once("config.php");
  require_once("model/item.php");

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require_once("controller/get/item.php");
  }
  
  //if you send a new movie name over under the variable movie_name, then I will add a new move to the database
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once("controller/post/item.php");
  }
  
  if($_SERVER['REQUEST_METHOD'] == 'PATCH'){
    require_once("controller/patch/item.php");
  }
  
  if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    require_once("controller/delete/item.php");
  }
  ?>