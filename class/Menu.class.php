<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 29/01/2018
 * Time: 16:00
 */

namespace page;
require_once "Connect.class.php";
class Menu
{

    private $inicio;
    private $pPersonagens;
    private $pCriarPesonagem;
    private $pMinhaConta;
    private $menuAdmin;
    private $objSQL;
    private $aguardandoAv;

    public function getInicio($pagina){
        if ($pagina == "home" || $pagina == null){
            $this->pPersonagens = "is-active";
        }
        if ($pagina == "app"){
            $this->pCriarPesonagem = "is-active";
        }
        if ($pagina == "data"){
            $this->pMinhaconta = "is-active";
        }
        if (isset($_GET['mAcp']) == 1 && $_SESSION['admin'] == 1){
          $this->objSQL =  new Connect;
          $this->objSQL->query("SELECT * FROM `avaliacoes` WHERE 1");
           $this->aguardandoAv = $this->objSQL->stmt->rowCount();
            $this->inicio = "<div class='column is-3' >

<nav class=\"panel\">
<p class=\"panel-heading\">
Menu
</p>

<p class=\"panel-tabs\">
      
<a href='?p=$pagina'>UCP</a>
<a class=\"is-active\">ACP</a>
<a>Fórum</a>
<a>LSPD</a>
<a>LSFD</a>

</p>
<a class=\"panel-block \" href='?p=apps&mAcp=1'>
<span class=\"panel-icon\"> 
<i class=\"fas fa-file-alt\"></i>
</span>
Aplicações($this->aguardandoAv)
</a>
</div>
</nav>
</div>";

        }
        else {
            if ($_SESSION['admin'] == 1) {
                $this->menuAdmin = "<a href='?p=$pagina&mAcp=1'>ACP</a>";
            }
            $this->inicio = "<div class='column is-3' >

<nav class=\"panel\">
<p class=\"panel-heading\">
Menu
</p>

<p class=\"panel-tabs\">
      
<a class=\"is-active\">UCP</a>
$this->menuAdmin
<a>Fórum</a>
<a>LSPD</a>
<a>LSFD</a>

</p>
<a class=\"panel-block  $this->pPersonagens\" href='?p=home'>
<span class=\"panel-icon\">
<i class=\"fas fa-home\"></i>
</span>
Meus Personagens
</a>
<a class=\"panel-block $this->pCriarPesonagem\"  href='?p=app'>
<span class=\"panel-icon\">
<i class=\"fas fa-user-plus  \"></i>
</span>
Criar Personagem
</a>

<a class=\"panel-block $this->pMinhaConta\"  href='?p=data'>
<span class=\"panel-icon\">
<i class=\"fas fa-cog\"></i>
</span>
Minha Conta
</a>
<a class=\"panel-block\"  href='?p=logout'>
<span class=\"panel-icon\">
<i class=\"fas fa-sign-out-alt\"></i>
</span>
Sair
</a>
</div>
</nav>
</div>";
        }
        return $this->inicio;
    }

}