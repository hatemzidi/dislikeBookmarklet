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
$dbfolder = dirname(__FILE__)  . "/data/";
$dbname = "counter.sq3";

// sniffer
$browser = $_SERVER['HTTP_USER_AGENT']; // get the browser name
$ip = $_SERVER['REMOTE_ADDR']; // get the IP address
$referrer = $_SERVER['HTTP_REFERER']; //  page from which visitor came


$logdb = new PDO("sqlite:" . $dbfolder . $dbname);

// check if database file exists first
if (!file_exists($dbfolder . $dbname)) {
  $logdb->exec("CREATE TABLE hits(id INTEGER PRIMARY KEY, counter INTEGER)");
  $logdb->exec(
    "CREATE TABLE tracker (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      browser TEXT default '',
      ip varchar(15) NOT NULL default '',
      d DATETIME NOT NULL default CURRENT_TIMESTAMP,
      referrer TEXT NOT NULL default ''
      )"
  );
  $logdb->exec("INSERT INTO hits(id, counter) VALUES (1, 0)");
}

// and boom ...
$logdb->exec("UPDATE hits SET counter=counter+1 WHERE id=1");
$logdb->exec("INSERT INTO tracker(browser, ip, referrer) VALUES ('$browser','$ip', '$referrer')");


// close connection
$logdb = null;

echo file_get_contents(dirname(__FILE__) . '/images/blank.gif');
?>