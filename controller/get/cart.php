<?php

  if(count($_GET) == 0) {
    echo json_encode(GetCart());
  } 
  
  else if(isset($_GET['id'])) {
    if(is_numeric($_GET['id'])) {
      echo json_encode(GetCartById($_GET['id']));
    }

    else {
      echo "invalid request";
    }
  }

?>