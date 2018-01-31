<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 30/01/2018
 * Time: 14:12
 */

namespace page;
require_once "Connect.class.php";

class Avaliar
{
    private $miojoHtml;
    private $objSql;

    public function getMiojoHtml()
    {
        $this->objSql = new Connect;
        $this->objSql->query("SELECT * FROM `avaliacoes`");

        $this->miojoHtml = "";
        return $this->miojoHtml;
    }


}