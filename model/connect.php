<?php
//connect to the spreadsheet mdiatest
try {
  $db = new PDO("mysql:dbname=onme;host=localhost:3307", "root", "root");
} catch (Exception $e){
  echo $e->getMessage();
}

?>