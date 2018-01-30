<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 29/01/2018
 * Time: 13:52
 */

namespace page;


class Home
{
    private $section;

    public function getSection($conteudo, $titulo,$menu)
    {
        $this->section = "  <section class=\"section \">
  
    <div class=\"container columns\">

  <div class=\"card column is-10 is-offset-1\">
     <h3 class=\"subtitle is-3\">$titulo</h3>
  <div class=\"card-content \">
  
$conteudo

   
  </footer>
</div>
</div>
$menu
</div>

  </section>
  ";

        return $this->section;
    }

}