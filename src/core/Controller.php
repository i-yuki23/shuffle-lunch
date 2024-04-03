<?php

class Controller
{
    protected $actionName;
    public function run($action)
    {
        $this->actionName = $action;
        if (!method_exists($this, $action)) {
            throw new HttpNotFoundException();
        }
        $content = $this->$action();
        return $content;
    }

    protected function render($variables = [], $templete = null, $layout = 'layout')
    {
        $view = new View(__DIR__ . '/../views');
        if (is_null($templete)) {
            $templete = $this->actionName;
        }
        $controllerName = strtolower(substr(get_class($this), 0, -10));
        $path = $controllerName . '/' . $templete;
        return $view->render($path, $variables, $layout);
    }
}