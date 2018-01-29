<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 28/01/2018
 * Time: 00:07
 */

namespace page;


class head
{
    private $head;
    protected $body;
    public $page_name;
    protected $fimBody;
    public function head(){
        $this->head = "<!DOCTYPE html>
<html  class=\"has-navbar-fixed-top\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>$this->page_name</title>

    <link rel=\"stylesheet\" href=\"css/bulma.css\">
    <script defer src=\"https://use.fontawesome.com/releases/v5.0.0/js/all.js\"></script>
        <style>

</style>
</head>";
        return $this->head;

    }
}