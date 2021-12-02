<?php
  //then make the rules for the get request
  if(isset($_DELETE['id'])){
    DeleteCartItem($_DELETE['id']);
    echo "deleted!";
  }
?>