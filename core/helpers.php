<?php 

function view($name, $data = [])
{
    extract($data);

    if(isset($error)) {
        $error = ucwords(preg_replace("/[^a-zA-Z]/", " ", $error));
    }

    return require "app/views/{$name}.view.php";
}

function redirect($path)
{
    return header("Location: /{$path}");
}

function dd($data)
{
    die(var_dump($data));
}

function sessionHas($name)
{
    return array_key_exists($name, $_SESSION);
}

function sessionGet($name, $default = null)
{
    if (sessionHas($name))
    {
        return $_SESSION[$name];
    }

    return $default;
}