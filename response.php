<?php
require "vendor/autoload.php";

use GeminiAPI\client;
use GeminiAPI\Resources\parts\TextPart;

$data = json_decode(file_get_contents("php://input"));

$text=$data->text;

$client=new client("AIzaSyBv9yuy8FsdKEEjlO1FWGZTi_dS5QJaAr0");
$respose=$client->geminiPro()->generateContent(
    new TextPart($text),
);
echo $respose->text();
?>