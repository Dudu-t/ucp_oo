<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 28/01/2018
 * Time: 00:15
 */
require_once "class/Body.class.php";
require_once "class/Login.class.php";

$index = new page\body;

if (!isset($_SESSION['usuario'])){
$login = new page\login();
$authLogin = $login->authLogin();
$section= $login->loginHtml($authLogin);

}

echo $index->bodyPadrao($section);
