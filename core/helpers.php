<?php 

function view($name, $data = [])
{
    extract($data);
    return require "app/views/{$name}.view.php";
}

function redirect($path)
{
    return header("Location: /{$path}");
}

function toViewWithError($view, $error, $data = [])
{
    return view($view, [
        'error' => ucwords(preg_replace("/[^a-zA-Z]/", " ", $error)),
    ]);
}

function toViewWithSuccess($view, $message, $data = [])
{
    return view($view, [
        'message' => ucwords(preg_replace("/[^a-zA-Z]/", " ", $message)),
    ]);
}

function dd($data)
{
    die(var_dump($data));
}