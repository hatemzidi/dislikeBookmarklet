<?php
/**
 * Created by PhpStorm.
 * User: h.zidi
 * Date: 04/11/13
 * Time: 15:33
 *
 */
header('Access-Control: allow *');

// config
$dbfolder = $_SERVER["DOCUMENT_ROOT"] . "/data/";
$dbname = "counter.sq3";

//connect
$logdb = new PDO("sqlite:" . $dbfolder . $dbname);

// well ...
$statement = $logdb->query("SELECT counter FROM hits WHERE id=1");
$record = $statement->fetchAll();

if (sizeof($record) != 0) {
  $counter = $record[0]['counter'];
} else {
  $counter = 1;
}

echo $counter;

// close connection
$logdb = null;
?>