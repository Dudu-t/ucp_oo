<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 28/01/2018
 * Time: 15:58
 */

namespace page;

require_once "Connect.class.php";
class login
{

    private $section;
    private $section2;
    private $consultaUsuario;
    private $resultadoConsultaUsuario;
    private $usuario;
    private $senha;
    private $retorno;

    public function loginHtml($resultado = null)
    {
        $this->section = "<div class='column is-10'>
<div class='box column is-5 is-offset-5' style='margin-top:80px;'> 
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
  <button class='button is-success is-medium column is-12' name='enviar'>Login</button>
</div>
</div>
</div>
$resultado
</div>";
        return $this->section;
    }
    public function authLogin(){
        if (isset($_POST['enviar'])){
            $this->usuario = $_POST['usuario'];
            $this->senha = hash("Whirlpool", $_POST['senha']);
            $this->consultaUsuario = new Connect();
            $this->resultadoConsultaUsuario = $this->consultaUsuario->query("SELECT * FROM `accounts` WHERE `Username` = '$this->usuario' AND `Password` = '$this->senha'");
            if ($this->consultaUsuario->stmt->rowCount() == 1){
                return $this->retorno = '
<div class="notification is-success column is-5 is-offset-5">
  <button class="delete"></button>
 Usuário autenticado.
</div>';
                $_SESSION['usuario'] = $_POST['Usuario'];
            }
            else{
                return $this->retorno = '
<div class="notification is-danger column is-5 is-offset-5">
  <button class="delete"></button>
 Usuário ou senha inválidos.
</div>';
            }

        }
    }
}