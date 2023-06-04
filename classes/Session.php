<?php

namespace ToDo\Classes;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = "$value";
        return $this;
    }
    public function has($key)
    {
        return isset($_SESSION[$key]);
    }
    public function get($key)
    {
        echo $_SESSION[$key];
        return $this;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
        return $this;
    }

    public function destroy()
    {
        session_destroy();
    }
}
