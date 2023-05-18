<?php

namespace App\core;

class Request
{
    private array $parsedUrl;

    public function __construct()
    {
        $this->parsedUrl = parse_url($_SERVER['REQUEST_URI'] ?? '/');
    }

    public function getPath(): string
    {
        return $this->parsedUrl['path'];
    }

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function input(): array
    {
        $post = [];
        $get = $this->query();

        foreach ($_POST as $key => $value) {
            $post[$key] = filter_input(0, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return array_merge($post, $get);
    }

    public function query(): array
    {
        $body = [];
        foreach ($_GET as $key => $value) {
            $body[$key] = filter_input(1, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $body;
    }
}