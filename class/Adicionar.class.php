<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 29/01/2018
 * Time: 19:55
 */
namespace page;

class Adicionar
{
    private $htmlCadastrar;
    private $var1;
    private $var2;
    private $connection;
    private $mensagem_erro;
    private $alertErro;
    private $focusErro;
    private $objConnection;

    //Salvar_APP
    private $nomePerson;
    private $usuarioPerson;
    private $originPerson;
    private $genderPerson;
    private $birthPerson;
    private $historyPerson;

    private $obj2Connection;
    private $obj3Connection;




    public function getHtmlCadastrar()
    {
        $this->usuarioPerson = $_SESSION['usuario'];
        $this->objConnection = new Connect;
        $this->obj2Connection = new Connect;
  $this->objConnection->query("SELECT * FROM `characters` WHERE `Username` = '$this->usuarioPerson'");
  $this->obj2Connection->query("SELECT * FROM `avaliacoes` WHERE `Username` ='' '$this->usuarioPerson'");
        if ($this->objConnection->stmt->rowCount() == 3 || $this->obj2Connection->stmt->rowCount() == 1){

             $this->htmlCadastrar = '<div class="notification is-danger">
  <button class="delete"></button>
  <h3>Aviso!</h3>
          Você já possui três personagens ou tem um aguardando avaliação.
</div>';

        }
        else{


        if (@$_POST['gender'] == 1){
            $this->var1 = "selected";
        }
        if (@$_POST['gender'] == 2){
            $this->var2 = "selected";
        }
if (isset($_POST['enviar'])) {

    $this->nomePerson = trim($_POST['name']);
    $this->birthPerson = date('d/m/Y', strtotime($_POST['birthdate']));
    $this->genderPerson = $_POST['gender'];
    $this->originPerson = $_POST['origin'];
    $this->historyPerson = $_POST['history'];
    $this->obj3Connection = new Connect;
    $this->connection = $this->objConnection->query("SELECT * FROM `characters` WHERE `Character` = '$this->nomePerson'");
    $this->obj3Connection->query("SELECT * FROM `avaliacoes` WHERE `Character` = '$this->nomePerson'");
    if ($this->objConnection->stmt->rowCount() == 1 || strpos($this->nomePerson, "_") == 0|| $this->obj3Connection->stmt->rowCount() == 1) {
        if (strpos($this->nomePerson, "_") == 0) {
            $this->mensagem_erro = "<p class=\"help is-danger\">Este nome está fora do formato</p>";
            $this->alertErro = "is-danger";
            $this->focusErro = "autofocus";
        } else {

            $this->mensagem_erro = "<p class=\"help is-danger\">Este nome já esta em uso</p>";
            $this->alertErro = "is-danger";
            $this->focusErro = "autofocus";
        }
    } else {
$this->objConnection->exec("INSERT INTO `avaliacoes` (`Character`, `Username`, `Gender`, `Origin`, `History`, `Status`, `Birthdate`) VALUES ('$this->nomePerson', '$this->usuarioPerson', '$this->genderPerson', '$this->originPerson', '$this->historyPerson', '0', '$this->birthPerson')");
echo "<script>window.location = '?=home'</script>";

    }
}

        $this->htmlCadastrar = "<form method='post'>
<div class='columns'>
<div class=\"field column  is-6\">
  <label class=\"label\">Nome personagem(Nome_Sobrenome)</label>
  <div class=\"control\">
    <input class=\"input  $this->alertErro\" name='name' type=\"text\"   $this->focusErro placeholder=\"\" value='".@$_POST['name']."' maxlength='29'>
  </div>
  $this->mensagem_erro
</div>
<div class=\"field column\"\">
  <label class=\"label\">Gênero</label>
  <div class=\"control\">
    <div class=\"select  is-6\">
      <select name='gender'>
        <option value='1' $this->var1>Masculino</option>
        <option value='2' $this->var2 >Feminino</option>
      </select>
    </div>
  </div>
</div>

</div>
<div class='columns'>   
<div class=\"field column is-6\">
  <label class=\"label\">Local de Origem</label></label>
  <div class=\"control\">
    <input class=\"input\" type=\"text\" placeholder=\"\" name='origin' value='".@$_POST['origin']."'>
  </div>
</div>
<div class=\"field column  is-6\">
  <label class=\"label\">Data de nascimento</label>
  <div class=\"control\">
    <input class=\"input\" type=\"date\" placeholder=\"\" name='birthdate' value='".@$_POST['birthdate']."'>
    
  </div>
</div>
</div>
<div class=\"field\">
  <label class=\"label\">História</label>
  <div class=\"control\">
    <textarea class=\"textarea\" placeholder=\"Digite aqui a sua história. (Limite de 2000 caracteres)\" name='history' rows='10'>".@$_POST['history']."</textarea>
  </div>
</div>
<center><button class='button is-link' type='submit' name='enviar'>Enviar</button></center>
</form>";

    }
        return $this->htmlCadastrar;
}
}