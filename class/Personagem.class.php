<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 29/01/2018
 * Time: 16:22
 */
namespace page;
class Personagem
{
    private $exibirPersonagem;
public function getExibirPersonagem(){
        $this->exibirPersonagem = "   <div class=\"card column is-3\">
  <div class=\"card-image\">
    <figure class=\"image is-4by3\">
      
    </figure>
  </div>
  <div class=\"card-content\">
    <div class=\"media\">
      <div class=\"media-left\">
      </div>
      <div class=\"media-content\">
        <p class=\"title is-4\">John Smith</p>
        <p class=\"subtitle is-6\">@johnsmith</p>
      </div>
    </div>

    <div class=\"content\">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.
      <a href=\"#\">#css</a> <a href=\"#\">#responsive</a>
      <br>
      <time datetime=\"2016-1-1\">11:09 PM - 1 Jan 2016</time>
    </div>
  </div>
</div>";
        return $this->exibirPersonagem;
}
}