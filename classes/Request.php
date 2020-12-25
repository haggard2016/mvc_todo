<?php

namespace MVC;

class Request
{
    public $controller, $action, $params;

    public function __construct()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri_offset = count(explode('/', BASE_URL)) - 3;
        $uri = array_slice(explode('/', $uri), 1+$uri_offset);
        $this->controller = ucfirst($uri[0]);
        $this->action = $uri[1];
        $this->params = array_slice($uri, 2);
    }

    public function routeToController()
    {
        $controller_name = "\MVC\\" . $this->controller . 'Controller';
        if (class_exists($controller_name)) {
            $controller_obj = new $controller_name();
        } else {
            $controller_obj = new TaskController();
        }

        call_user_func_array([$controller_obj, method_exists($controller_obj, $this->action) ? $this->action : 'index'],
            $this->params);
    }
}