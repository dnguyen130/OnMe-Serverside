<?php
//make the rules
if(isset($_POST['user'])){
  $lastid = AddUser($_POST['']);
  echo json_encode($lastid);
}
?>