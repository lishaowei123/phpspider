<?php
namespace Spider\Tests;

/**
 * Created by PhpStorm.
 * User: sks
 * Date: 2016/12/5
 * Time: 10:30
 */
use Bin\requests;
use Bin\selector;

include './../config.php';
ini_set("memory_limit", "1024M");

header("Content-type:text/html;charset=utf-8");
$html = requests::get('https://hibihibi.com/');
echo selector::select($html, '/html/head/title/text()');