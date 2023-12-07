<?php

namespace app\core;

class Request
{
    /**
     * @return mixed|string
     */
    public function getPath(): mixed
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) return $path;
        return substr($path, 0, $position);
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}