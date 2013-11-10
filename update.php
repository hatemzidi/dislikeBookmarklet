<?php
/**
 * Created by PhpStorm.
 * User: h.zidi
 * Date: 04/11/13
 * Time: 15:33
 *
 */
header('Access-Control: allow *');
header('Access-Control-Allow-Origin: *');
header("Content-Type: image/gif");

// config
$dbfolder = $_SERVER["DOCUMENT_ROOT"] . "/data/";
$dbname = "counter.sq3";

// check if database file exists first
if (!file_exists($dbfolder . $dbname)) {
  $logdb = new PDO("sqlite:" . $dbfolder . $dbname);
  $logdb->exec("CREATE TABLE hits(id INTEGER PRIMARY KEY, counter INTEGER)");
  $logdb->exec("INSERT INTO hits(id, counter) VALUES (1, 0)");
} else {
  $logdb = new PDO("sqlite:" . $dbfolder . $dbname);
}

// and boom ...
$logdb->exec("UPDATE hits SET counter=counter+1 WHERE id=1");

// close connection
$logdb = null;

echo file_get_contents(dirname(__FILE__).'/images/blank.gif');
?>