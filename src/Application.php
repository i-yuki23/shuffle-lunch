<?php

class Application
{
    protected $router;
    protected $response;

    public function __construct()
    {
        $this->router = new Router($this->registerRoutes());
        $this->response = new Response();
    }

    public function run()
    {   
        try {
            $params = $this->router->resolve($this->getPathInfo());
            if (!$params) {
                throw new HttpNotFoundException();
            }
            $controller = $params['controller'];
            $action = $params['action'];
            $this->runAction($controller, $action);
        } catch (HttpNotFoundException) {
            $this->render404Page();
        }

        $this->response->send();
    }

    private function runAction($controllerName, $action)
    {
        $controllerClass = ucfirst($controllerName) . 'Controller';
        if (!class_exists($controllerClass)) {
            throw new HttpNotFoundException();
        }
        $controller = new $controllerClass();
        $content = $controller->run($action);
        $this->response->setContent($content);
    }

    public function registerRoutes()
    {
        return [
            '/' => ['controller' => 'shuffle', 'action' => 'index'],
            '/shuffle' => ['controller' => 'shuffle', 'action' => 'create'],
            '/employee' => ['controller' => 'employee', 'action' => 'index'],
            '/employee/create' => ['controller' => 'employee', 'action' => 'create'],
        ];
    }

    private function getPathInfo()
    {
        return $_SERVER['REQUEST_URI'];
    }

    private function render404Page()
    {
        $this->response->setStatusCode(404, 'Not Found');
        $this->response->setContent(
            <<<EOF
<!DOCTYPE html>
<head>
    <!-- <meta charset="utf-8"> -->
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="stylesheets/css/app.css"> -->
    <title>Shuffle Lunch</title>
</head>
<body>
    <h2>
        404 Page Not Found.
    </h2>
</body>
</html>
EOF
        );
        $this->response->send();
    }
}