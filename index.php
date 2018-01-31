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
require_once "class/Adicionar.class.php";
require_once "class/Avaliar.class.php";

$index = new page\body;
if (isset($_SESSION['usuario'])) {
    $verificarPagina = isset($_GET['p']) ? $_GET['p'] : null;

    $objMenu = new page\Menu;
    $menu = $objMenu->getInicio($verificarPagina);
    if ($verificarPagina == null || $verificarPagina == "home") {
        $home = new page\Home;
        $objConteudo = new page\Personagem;
        $index->page_name = "Dashboard | UCP";
        $conteudo = $objConteudo->getPersonagem();
        $titulo = "Meus Personagens";
        $section = $home->getSection($conteudo, $titulo,$menu);
    }
    if ($verificarPagina == "app"){
        $home = new page\Home;
        $objConteudo = new page\Adicionar;
        $titulo = "Criar Personagem";
        $conteudo = $objConteudo->getHtmlCadastrar();
        $section = $home->getSection($conteudo, $titulo,$menu);
        }
            if ($verificarPagina == "apps") {
                if ($_SESSION['admin'] == 1) {
                $home = new page\Home;
                $objConteudo = new page\Avaliar;
                $conteudo = $objConteudo->getMiojoHtml();
                $titulo = "Avaliar aplicações";
                $section = $home->getSection($conteudo, $titulo, $menu);
            }

            else{
                echo "<script>window.location = '?p=home'</script>";
            }
        }

    if ($verificarPagina == "logout"){
        session_destroy();
        echo "<script>window.location = ''</script>";
    }
}
else{
    $login = new page\login();
    $index->page_name = "Login | UCP";
    $authLogin = $login->authLogin();
    $section= $login->loginHtml($authLogin);

}
echo $index->bodyPadrao($section);
