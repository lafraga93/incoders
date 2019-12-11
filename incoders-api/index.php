<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');

$json = file_get_contents('php://input');
$data = json_decode($json);

$text = "Nome: $data->name\nEndereço: $data->address\nValor: $data->amount\nVencimento: $data->due";

$filename = __DIR__.'/output/'.time().'.txt';
$file = fopen($filename, 'a');

fwrite($file, $text);
fclose($file);

echo json_encode([
    'status' => true,
]);
