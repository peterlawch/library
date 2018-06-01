<?php

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: index.php");
    die();
}

require "vendor/autoload.php";

$qrcode = new QrReader($_FILES['qrimage']['tmp_name']);
$text = $qrcode->text();

var_dump($text);