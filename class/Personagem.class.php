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

    private $objConnectionChecarPerson;
    private $statusPersonagem;
    private $obj2ConnectionChecarPerson;

    public function getPersonagem(){
        $this->objSql = new Connect;
        $this->usuario = $_SESSION['usuario'];
        $this->reposta = $this->objSql->query("SELECT * FROM `characters` WHERE `Username` = '$this->usuario'");

        $this->objConnectionChecarPerson = new Connect;
        $this->objConnectionChecarPerson->query("SELECT * FROM `avaliacoes` WHERE `Username` = '$this->usuario' AND `Status` = '0'");
        if ($this->objConnectionChecarPerson->stmt->rowCount() == 1){
            $this->statusPersonagem = "<div><div class=\"notification is-link\">
  <button class=\"delete\"></button>
 <center>Você possui uma aplicação de um personagem aguardando avaliação.</center>
</div></div>";
        }

        $this->obj2ConnectionChecarPerson = new Connect;
        $this->obj2ConnectionChecarPerson->query("SELECT * FROM `avaliacoes` WHERE `Username` = '$this->usuario' AND `Status` = '2'");
        if ($this->obj2ConnectionChecarPerson->stmt->rowCount() == 1){
            $this->statusPersonagem = "<div><div class=\"notification is-danger\">
  <button class=\"delete\"></button>
 <center>Sua aplicação foi negada clique aqui para reenviar.</center>
</div></div>";
        }

        $this->exibirPersonagem[] = "$this->statusPersonagem;<div class='columns'>";
     foreach ($this->reposta as $this->personagem){
       //$this->dPersonagem[$this->personagem['Character']] = $this->personagem;
if ($this->personagem['Admin'] > 0){
    $this->personagem['Admin'] = "Admin";
}
else{
    $this->personagem['Admin'] = "Player";
}

      $this->exibirPersonagem[] = "
<div class=\"card column is-4 \">
  <div class=\"card-image\">
    <figure class=\"image \">
      <center><img src='img/skins/".$this->personagem['Skin'].".png' style='width:80px; height: 158px;'></center>
    </figure>
  </div>
  <div class=\"card-content\">
    <div class=\"media\">
      <div class=\"media-left\">
      </div>

  
    </div>
    <hr />
<center><p class=\"title is-5\">".str_replace("_"," ",$this->personagem['Character'])."</p></center>
 <hr />
    <div class=\"content\">
    <span class='title is-6'>Informações Personagem:</span>
    <ul>
   <li class='subtitle is-6'>Banco: US$ ".number_format($this->personagem['BankMoney'], 2, ",", ".")."</li>
   <li class='subtitle is-6'>Dinheiro: US$ ".number_format($this->personagem['Money'], 2, ",", ".")."</li>
    <li class='subtitle is-6'>Tempo Jogado: ".date("H:i", $this->personagem['PlayingHours'])." horas</li>
      <li class='subtitle is-6'>Vida: ".$this->personagem['Health']."%</li>
      <li class='subtitle is-6'>Rank: ".$this->personagem['Admin']."</li>
</ul>
      <span style='font-size: 11pt;'>Ultimo login: <time datetime=\"1-1-2016\">".date("d/m/y H:i", $this->personagem['LastLogin'])."</time></span>
    </div>
  </div>
</div>

";


     }
     $this->exibirPersonagem[] = "</div>";
return $this->exibirPersonagem[0].@$this->exibirPersonagem[1].@$this->exibirPersonagem[2].@$this->exibirPersonagem[3].@$this->exibirPersonagem[4];
    }



}