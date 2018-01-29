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
require_once "class/Home.class.php";
require_once "class/Menu.class.php";
require_once "class/Personagem.class.php";

$index = new page\body;
if (isset($_SESSION['usuario'])) {
    if (!isset($_GET['p']) || $_GET['p'] == "home") {
        $home = new page\Home;
        $objMenu = new page\Menu;
        $objConteudo = new page\Personagem;
        $conteudo = $objConteudo->getExibirPersonagem();
        $menu = $objMenu->getInicio(isset($_GET['p']));
        $section = $home->getSection($conteudo, $menu);
    }
}
else{
    $login = new page\login();
    $index->page_name = "Login | User Control Panel";
    $authLogin = $login->authLogin();
    $section= $login->loginHtml($authLogin);

}
echo $index->bodyPadrao($section);
