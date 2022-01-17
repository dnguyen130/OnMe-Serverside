<?php
//connect to the spreadsheet mdiatest
try {
  $db = new PDO("mysql:dbname=defaultdb;host=db-mysql-sfo2-61504-do-user-10363188-0.b.db.ondigitalocean.com:25060", "doadmin", "cJo0OrGY7ifxvnuI");
} catch (Exception $e){
  echo $e->getMessage();
}

?>