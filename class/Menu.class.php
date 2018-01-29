<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 29/01/2018
 * Time: 16:00
 */

namespace page;

class Menu
{

    private $inicio;
    private $pPersonagens;
    private $pCriarPesonagem;
    private $pMinhaConta;

    public function getInicio($pagina){
        if ($pagina == "home" || $pagina == null){
            $this->pPersonagens = "is-active";
        }
        if ($pagina == "a"){
            $this->pCriarPesonagem = "is-active";
        }
        if ($pagina == "data"){
            $this->pMinhaconta = "is-active";
        }



        $this->inicio = "<div class='column is-3 is-fixed-top is-offset-1' >
<nav class=\"panel\">
<p class=\"panel-heading\">
Menu
</p>

<p class=\"panel-tabs\">
      
<a class=\"is-active\">UCP</a>
<a>Fórum</a>
<a>LSPD</a>
<a>LSFD</a>
<a>LIVESTER</a>
</p>
<a class=\"panel-block  $this->pPersonagens\" href='?p=home'>
<span class=\"panel-icon\">
<i class=\"fas fa-home\"></i>
</span>
Meus Personagens
</a>
<a class=\"panel-block $this->pCriarPesonagem\"  href='?p=app'>
<span class=\"panel-icon\">
<i class=\"fas fa-book\"></i>
</span>
Criar Personagem
</a>

<a class=\"panel-block $this->pMinhaConta\"  href='?p=data'>
<span class=\"panel-icon\">
<i class=\"fas fa-book\"></i>
</span>
Minha Conta
</a>
</div>
</nav>
</div>";
        return $this->inicio;
    }

}