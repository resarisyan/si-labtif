<?php

$data_required = false;
$required_message = [];

if (! function_exists('getAllJurusan')) {
    function getAllJurusan()
    {
        return \App\Models\Jurusan::all();
    }
}

if (!function_exists('setDataRequired')) {
    function setDataRequired($data, $message)
    {
        global $data_required;
        global $required_message;
        if ($required_message == null) {
            $required_message = [];
        }
        $data_required = $data;
        array_push($required_message, $message);
    }
}

if (!function_exists('getDataRequired')) {
    function getDataRequired()
    {
        global $data_required;
        global $required_message;

        return [
            'required' => $data_required,
            'message' => $required_message,
        ];
    }
}
