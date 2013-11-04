<?php
/**
 * Created by PhpStorm.
 * User: h.zidi
 * Date: 04/11/13
 * Time: 15:33
 *
 */
header('Access-Control: allow *');
$hit_count = @file_get_contents('counter.txt'); // read the hit count from file
$hit_count++; // increment the hit count by 1
@file_put_contents('counter.txt', $hit_count); // store the new hit count
echo $hit_count; //  display the hit count
?>