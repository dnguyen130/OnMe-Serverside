<?php

  if(count($_GET) == 0) {
    echo json_encode(GetOrder());
  } 
  
  else if(isset($_GET['id'])) {
    if(is_numeric($_GET['id'])) {
      echo json_encode(GetOrderById($_GET['id']));
    }

    else {
      echo "invalid request";
    }
  }

?>