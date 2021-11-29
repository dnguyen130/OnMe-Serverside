<?php
//make the rules
if(
  isset($_POST['firebase_id']) &&
  isset($_POST['first_name']) &&
  isset($_POST['last_name']))
  {
    $lastid = AddUser(
    $_POST['firebase_id'],
    $_POST['first_name'],
    $_POST['last_name']);

  echo json_encode($lastid);
}

else {
  echo "If statement not true";
}
?>