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
        $this->navbar = "<body>
<nav class='column is-fixed-top navbar is-primary' role='navigation' aria-label='main navigation'>
  <div class='navbar-brand'>
    <a class='navbar-item' href=''>
     <img src='img/logo.png'>
    </a> 
    <div class='navbar-start'>
    <a class='navbar-item is-active' href=''>
    Home
    </a>
   

    </div>
    <div class='navbar-end'>
    <div class=\"navbar-item has-dropdown is-hoverable\">
        <a class=\"navbar-link\">
        </a>
        <div class=\"navbar-dropdown is-boxed\">
          <a class=\"navbar-item\" href=\"\">

          </a>
        
        </div>
      </div>
   
     </div>
</div>
    
  </div>
</nav>";
        $this->section = $section;
        $this->fimBody = "<footer style=''></footer></body>";
        $this->body = $this->head().$this->navbar.$this->section.$this->fimBody;
        return $this->body;
    }

}