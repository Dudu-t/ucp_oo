<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 28/01/2018
 * Time: 12:47
 */

namespace page;

require_once "head.class.php";
class body extends head
{
   public function bodyPadrao(){
       $this->body = "<nav class=\"navbar\" role=\"navigation\" aria-label=\"main navigation\">
  <div class=\"navbar-brand\">
    <a class=\"navbar-item\" href=\"https://bulma.io\">
      <img src=\"https://bulma.io/images/bulma-logo.png\" alt=\"Bulma: a modern CSS framework based on Flexbox\" width=\"112\" height=\"28\">
    </a>

    <button class=\"button navbar-burger\">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</nav>";
       return $this->head().$this->body;
   }

}