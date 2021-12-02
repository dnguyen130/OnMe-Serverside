<?php
//make the rules
if(
  isset($_POST['firebase_id']) &&
  isset($_POST['item_id']) &&
  isset($_POST['cart_id']) &&
  isset($_POST['i_name']) &&
  // isset($_POST['picture']) &&
  isset($_POST['price']) &&
  isset($_POST['quantity'])
  ) {
    $lastid = AddCartItem(
    $_POST['firebase_id'],
    $_POST['item_id'],
    $_POST['cart_id'],
    $_POST['i_name'],
    $_POST['price'],
    // $_POST['picture'],
    $_POST['quantity']
  );

  echo json_encode($lastid);
}

else {
  echo "If statement not true";
}
?>