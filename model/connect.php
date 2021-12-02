<?php
//connect to the spreadsheet mdiatest
try {
  $db = new PDO("mysql:dbname=heroku_28d7d7cb17342e4;host=us-cdbr-east-04.cleardb.com", "bbbe45aa37ea5a", "a227905e");
} catch (Exception $e){
  echo $e->getMessage();
}

?>