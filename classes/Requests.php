<?php

namespace ToDo\Classes;

class Request
{
    public function get($key = null)
    {
        return (isset($_GET[$key])) ? $_GET[$key] : null;
    }

    public function post($key = null)
    {
        return (isset($_POST[$key])) ? $_POST[$key] : null;
    }

    public function has($key)
    {
        return (isset($key));
    }

    public function cleen($key)
    {
        return trim(htmlspecialchars($key));
    }

    public function header($path)
    {
        return header("location:$path");
    }
}
