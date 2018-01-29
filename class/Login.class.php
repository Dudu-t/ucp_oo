<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 28/01/2018
 * Time: 15:58
 */
namespace page;
require_once "Connect.class.php";
require_once "Head.class.php";
class login
{

    private $section;
    private $consultaUsuario;
    private $resultadoConsultaUsuario;
    private $usuario;
    private $senha;
    private $retorno;
    private $namepage;
    public function loginHtml($resultado = null)
    {
        $this->section = "<section class='section'>
<div class='box column is-5 is-offset-4' style=''> 
<p class='title is-5'>Login</p>
<hr />
<div class='field'>
<form method='post'>
  <label class='label'>Usuário</label>
  <div class='control has-icons-left has-icons-right'>
    <input class='input is-primary' type='text' placeholder='' name='usuario'>
    <span class='icon is-small is-left'>
      <i class='fas fa-user'></i>
    </span>
  </div>
   <label class='label'>Senha</label>
  <div class='control has-icons-left has-icons-right'>
    <input class='input is-primary' type='password' placeholder='' name='senha'>
    <span class='icon is-small is-left'>
      <i class='fas fa-lock'></i>
    </span>
    
  </div>
  <div class='control column'>
  <button class='button is-primary is-medium column is-12' name='enviar'>Login</button>
</div>
</div>
</div>
$resultado
</section>";
        return $this->section;
    }
    public function authLogin(){
        if (isset($_POST['enviar'])){
            $this->usuario = $_POST['usuario'];
            $this->senha = hash("Whirlpool", $_POST['senha']);
            $this->consultaUsuario = new Connect();
            $this->resultadoConsultaUsuario = $this->consultaUsuario->query("SELECT * FROM `accounts` WHERE `Username` = '$this->usuario' AND `Password` = '$this->senha'");
            if ($this->consultaUsuario->stmt->rowCount() == 1){
                $_SESSION['usuario'] = $_POST['usuario'];
                echo "<script>window.location = '?p=home'</script>";
                return $this->retorno = '
<div class="notification is-success column is-5 is-offset-4">
  <button class="delete"></button>
 Usuário autenticado.
</div>';


            }
            else{
                return $this->retorno = '
<div class="notification is-danger column is-5 is-offset-4">
  <button class="delete"></button>
 Usuário ou senha inválidos.
</div>';
            }

        }
    }
}