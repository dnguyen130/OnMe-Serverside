<?php

  if(count($_GET) == 0) {
    echo json_encode(GetItem());
  } 
  
  else if(isset($_GET['id'])) {
    if(is_numeric($_GET['id'])) {
      echo json_encode(GetItemById($_GET['id']));
    }

    else {
      echo "invalid request";
    }
  }

?>