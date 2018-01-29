<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 29/01/2018
 * Time: 16:22
 */
namespace page;
require_once "Connect.class.php";
class Personagem
{
    private $exibirPersonagem;
    private $objSql;
    private $usuario;
    private $reposta;
    private $dPersonagem;
    private $personagem;


    public function getPersonagem(){
        $this->objSql = new Connect;
        $this->usuario = $_SESSION['usuario'];
        $this->reposta = $this->objSql->query("SELECT * FROM `characters` WHERE `Username` = '$this->usuario'");

        $this->exibirPersonagem[] = "<div class='columns'>";
     foreach ($this->reposta as $this->personagem){
       //$this->dPersonagem[$this->personagem['Character']] = $this->personagem;

      $this->exibirPersonagem[] = "<div class=\"card column is-4 \">
  <div class=\"card-image\">
    <figure class=\"image \">
      <center><img src='img/skins/".$this->personagem['Skin'].".png' style='width:110px; height: 218px;'></center>
    </figure>
  </div>
  <div class=\"card-content\">
    <div class=\"media\">
      <div class=\"media-left\">
      </div>

        <p class=\"\">".str_replace("_"," ",$this->personagem['Character'])."</p>
    </div>

    <div class=\"content\">
    
      <a href=\"#\">#css</a> <a href=\"#\">#responsive</a>
      <br>
      <span style='font-size: 11pt;'>Ultimo login: <time datetime=\"1-1-2016\">".date("d/m/y H:i", 1517165548)."</time></span>
    </div>
  </div>
</div>

";


     }
     $this->exibirPersonagem[] = "</div>";
return $this->exibirPersonagem[0].@$this->exibirPersonagem[1].@$this->exibirPersonagem[2].@$this->exibirPersonagem[3].@$this->exibirPersonagem[4];
    }



}