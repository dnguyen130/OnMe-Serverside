<?php
//make the rules
if(
  isset($_POST['firebase_id']) &&
  isset($_POST['user_id']))
  {
    $lastid = AddCart(
    $_POST['firebase_id'],
    $_POST['user_id']);

  echo json_encode($lastid);
}

else {
  echo "If statement not true";
}
?>