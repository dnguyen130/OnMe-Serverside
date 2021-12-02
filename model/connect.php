<?php
//connect to the spreadsheet mdiatest
try {
  $db = new PDO("mysql:dbname=defaultdb;db-mysql-sfo2-94703-do-user-10363188-0.b.db.ondigitalocean.com:25060", "doadmin", "uletajN9CXSngTXV");
} catch (Exception $e){
  echo $e->getMessage();
}

?>