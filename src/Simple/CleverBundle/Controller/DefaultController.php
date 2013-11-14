<?php

namespace Simple\CleverBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Simple\CleverBundle\Entity\Product;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $products = $this->generateProducts();
        return $this->render('SimpleCleverBundle:Default:index.html.twig', array(
            'products' => $products,
        ));
    }

    public function aboutAction()
    {
        return $this->render('SimpleCleverBundle:Default:about.html.twig');
    }

    public function contactAction()
    {
        return $this->render('SimpleCleverBundle:Default:contact.html.twig');
    }

    public function navAction($route)
    {
        $navItems = $this->getNavItems();
        return $this->render('SimpleCleverBundle:Default:nav.html.twig', array(
            'navItems' => $navItems,
            'route'    => $route
        ));
    }

    private function generateProducts()
    {
        $products = array();
        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->setName('<br/>' . $this->generateRandomString(rand(5,15)));
            $product->setPrice(rand(5,100));
            $product->setQty(rand(0,10));
            array_push($products, $product);
        }
        return $products;
    }

    private function getNavItems()
    {
        return array(
            array(
                'route' => 'simple_clever_homepage',
                'title' => 'Home',
            ),
            array(
                'route' => 'simple_clever_about',
                'title' => 'About',
            ),
            array(
                'route' => 'simple_clever_contact',
                'title' => 'Contact',
            ),
        );
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

}