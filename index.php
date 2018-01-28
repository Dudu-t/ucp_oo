<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 28/01/2018
 * Time: 00:15
 */
require_once "class/body.class.php";

$index = new page\body;
$index->page_name = "Login | User Control Panel";
echo $index->bodyPadrao();