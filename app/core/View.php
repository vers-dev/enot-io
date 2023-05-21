<?php

namespace App\core;

class View
{
    private function view(string $view, array $data): string
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once(dirname(__DIR__) . '/views/' . $view . '.view.php');
        return ob_get_clean();
    }

    private function layout(string $layout = 'layouts\layout'): string
    {
        ob_start();
        include_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $layout . '.view.php');
        return ob_get_clean();
    }

    public function renderView($view, array $data = [])
    {
        $viewContent = $this->view($view, $data);
        $layoutContent = $this->layout();

        return str_replace("{{ content }}", $layoutContent, $viewContent);
    }
}