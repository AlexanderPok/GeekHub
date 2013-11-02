<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GeekhubController extends Controller
{
    public function responseAction()
    {
        return new Response('Simple Response Object');
    }

    public function simpleTemplateAction($var)
    {
        return $this->render('AcmeDemoBundle:Geekhub:simple-template.html.twig', array(
            'var' => $var,
        ));
    }

    public function templateAction($page)
    {
        return $this->render('AcmeDemoBundle:Geekhub:template.html.twig', array(
            'page' => $page,
        ));
    }
}
