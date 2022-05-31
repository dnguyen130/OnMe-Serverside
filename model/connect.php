<?php
//connect to the spreadsheet mdiatest
try {
  $db = new PDO("mysql:dbname=sql3496577;host=sql3.freesqldatabase.com:3306", "sql3496577", "wUWftx9h5L");
} catch (Exception $e){
  echo $e->getMessage();
}

?>