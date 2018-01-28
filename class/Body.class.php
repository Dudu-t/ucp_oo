<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 28/01/2018
 * Time: 12:47
 */

namespace page;

require_once "Head.class.php";
class body extends head
{
    private $navbar;
    private $section;
    public function bodyPadrao($section){
        $this->navbar = "<nav class='column is-fixed-top navbar is-primary' role='navigation' aria-label='main navigation'>
  <div class='navbar-brand'>
    <a class='navbar-item' href='https://bulma.io'>
      <img src='https://bulma.io/images/bulma-logo.png' alt='Bulma: a modern CSS framework based on Flexbox' width='112' height='28'>
    </a>
    <button class='button navbar-burger'>
      <span>a</span>
      <span>a</span>
      <span>a</span>
    </button>
  </div>
</nav>";
        $this->section = $section;

        $this->body = $this->head().$this->navbar.$this->section;
        return $this->body;
    }

}