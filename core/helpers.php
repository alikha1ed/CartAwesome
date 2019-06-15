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

function toViewWithError($view, $error, $data = [])
{
    return view($view, [
        'error' => ucwords(preg_replace("/[^a-zA-Z]/", " ", $error)),
        'form_data' => $data
    ]);
}

function toViewWithSuccess($view, $message, $data = [])
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