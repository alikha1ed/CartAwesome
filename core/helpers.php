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

function killSession()
{
    session_start();
    session_destroy();
    
    return;
}