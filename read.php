<?php
/**
 * Created by PhpStorm.
 * User: h.zidi
 * Date: 04/11/13
 * Time: 15:33
 *
 */
header('Access-Control: allow *');
echo @file_get_contents('counter.txt'); // read the hit count from file
?>