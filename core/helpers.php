<?php 

function view($name, $data = [])
{
    extract($data);
    return require "app/views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}

function printInputValue($form_data, $value)
{
    if (isset($form_data[$value]))
    {
        return $form_data[$value];
    }
    return null;
}

function returnToViewWithError($view, $errorMessage, $data = [])
{
    return view($view, [
        'error' => $errorMessage,
        'form_data' => $data
    ]);
}