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

function printInputValue($form_data, $value)
{
    if (isset($form_data[$value]))
    {
        return $form_data[$value];
    }
    return null;
}

function toViewWithMessage($view, $message, $data = [])
{
    return view($view, [
        'message' => ucwords(preg_replace("/[^a-zA-Z]/", " ", $message)),
        'form_data' => $data
    ]);
}

function dd($data)
{
    die(var_dump($data));
}