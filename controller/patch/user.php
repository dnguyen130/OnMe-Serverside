<?php
  //then make the rules for the get request

  if(
    isset($_PATCH['id']) && 
    isset($_PATCH['age']) &&
    isset($_PATCH['truth1']) &&
    isset($_PATCH['truth2']) &&
    isset($_PATCH['lie'])
    ){
    UpdateUser(
      $_PATCH['id'],
      $_PATCH['age'], 
      $_PATCH['truth1'],
      $_PATCH['truth2'],
      $_PATCH['lie']
    );
    echo "updated!";
  }
?>