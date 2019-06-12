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

function returnToViewWithError($view, $errorMessage, $data = [])
{
    // Remove extra characters and capitalize first char of every word
    $errorMessage = ucwords(preg_replace("/[^a-zA-Z]/", " ", $errorMessage));

    return view($view, [
        'error' => $errorMessage,
        'form_data' => $data
    ]);
}