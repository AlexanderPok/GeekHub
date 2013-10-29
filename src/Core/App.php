<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PokuZz
 * Date: 27.10.13
 * Time: 19:00
 * To change this template use File | Settings | File Templates.
 */

namespace Core;
use Symfony\Component\HttpFoundation\Request;

class App
{
    private static $request;
    private static $templating;

    public static function getRequest()
    {
        if (!self::$request) {
            self::$request = Request::createFromGlobals();
        }
        return self::$request;
    }

    public static function getTemplating()
    {
        if (!self::$templating) {
            \Twig_Autoloader::Register();
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../Workstation/View');
            self::$templating = new \Twig_Environment($loader);
        }
        return self::$templating;
    }

    /* This method handles requests and call needed controller action */
    public function handleRequest()
    {
        $request = $this->getRequest();
        $requestUri = $request->getPathInfo();
        if ($requestUri && $requestUri !== '/') {
            $path = explode('/', substr($requestUri, 1));
            $pathCount = count($path);
            if ($pathCount >= 2) {
                $actionKey = count($path) - 1;
                $action = $path[$actionKey];
                unset($path[$actionKey]);
                $controller = $path;
            } else {
                $controller = $path;
                $action = 'index';
            }
            foreach ($controller as $key => $item) {
                $controller[$key] = ucfirst($item);
            }
        } else {
            $controller = array('index');
            $action = 'index';
        }
        $notFoundError = false;
        $controllerClass = '\\Workstation\\Controller\\' . implode('\\', $controller) . 'Controller';
        if (class_exists($controllerClass)) {
            $controllerObject = new $controllerClass();
            $method = $action . 'Action';
            if (method_exists($controllerObject, $method)) {
                $controllerObject->$method();
            } else {
                $notFoundError = true;
            }
        } else {
            $notFoundError = true;
        }
        if ($notFoundError) {
            $response = new \Symfony\Component\HttpFoundation\Response();
            $response->setStatusCode(404);
            $response->headers->set('Content-Type', 'text/html');
            $response->setContent('404 Not Found');
            $response->send();
            exit;
        }
    }


}