<?php
/**
 * Created by PhpStorm.
 * User: Dudut
 * Date: 28/01/2018
 * Time: 00:07
 */

namespace view;


class view
{
    private $head;
    private $body;
    private $footer;

    public function view($conteudo){
        $this->head = "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Hello Bulma!</title>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css\">
    <script defer src=\"https://use.fontawesome.com/releases/v5.0.0/js/all.js\"></script>
</head>";

        $this->body = "<body>
$conteudo

</body>";

        return $this->head.$this->body;

    }
}