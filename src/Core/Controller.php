<?php
namespace Core;

class Controller
{
    public function renderView($file, $params = array())
    {
        $twig = App::getTemplating();
        $template = $twig->loadTemplate($file);
        echo $template->render($params);
    }
}