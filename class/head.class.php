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
    protected $footer;
    public $page_name;
    public function head(){
        $this->head = "<!DOCTYPE html>
<html>
<head.class>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>$this->page_name</title>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css\">
    <script defer src=\"https://use.fontawesome.com/releases/v5.0.0/js/all.js\"></script>
</head.class>";
        return $this->head;

    }
}