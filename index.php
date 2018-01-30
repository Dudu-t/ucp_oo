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

$index = new page\body;
if (isset($_SESSION['usuario'])) {
    $verificarPagina = isset($_GET['p']) ? $_GET['p'] : null;
    if ($verificarPagina == null || $verificarPagina == "home") {
        $home = new page\Home;
        $objMenu = new page\Menu;
        $index->page_name = "Dashboard | UCP";
        $objConteudo = new page\Personagem;
        $conteudo = $objConteudo->getPersonagem();
        $menu = $objMenu->getInicio($verificarPagina);
        $titulo = "Meus Personagens";
        $section = $home->getSection($conteudo, $titulo,$menu);
    }
    if ($verificarPagina == "app"){
        $home = new page\Home;
        $objMenu = new Page\Menu;
        $objConteudo = new page\Adicionar;

        $menu = $objMenu->getInicio($verificarPagina);
        $titulo = "Criar Personagem";
        $conteudo = $objConteudo->getHtmlCadastrar();
        $section = $home->getSection($conteudo, $titulo,$menu);
    }
    if ($verificarPagina == "logout"){
        session_destroy();
        echo "<script>window.location = ''</script>";
    }
echo $_SESSION['admin'];
}
else{
    $login = new page\login();
    $index->page_name = "Login | UCP";
    $authLogin = $login->authLogin();
    $section= $login->loginHtml($authLogin);

}

echo $index->bodyPadrao($section);
//echo strpos("Carlos eduardo", "_");
