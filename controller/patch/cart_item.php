<?php

if(
  isset($_PATCH['id']) &&
  isset($_PATCH['quantity'])
) {
  UpdateCartMessage(
    $_PATCH['id'],
    $_PATCH['quantity']
  );

  echo "quantity updated";
}

?>