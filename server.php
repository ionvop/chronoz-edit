<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$_POST = json_decode(file_get_contents("php://input"), true);

if (isset($_POST["method"])) {
    switch ($_POST["method"]) {
        case "newSong":
            NewSong();
            break;
        case "updateName":
            UpdateName();
            break;
        case "loadSong":
            LoadSong();
            break;
        case "updateChart":
            UpdateChart();
            break;
        default:
            DefaultMethod();
            break;
    }
} else {
    DefaultMethod();
}

function NewSong() {
    file_put_contents("name.txt", "");
    file_put_contents("song.txt", "");
    file_put_contents("chart.txt", "");
}

function UpdateName() {
    file_put_contents("name.txt", $_POST["data"]);
}

function LoadSong() {
    file_put_contents("song.txt", $_POST["data"]);
}

function UpdateChart() {
    file_put_contents("chart.txt", $_POST["data"]);
}

function DefaultMethod() {
    echo json_encode([
        "status" => 400,
        "message" => $_POST
    ], JSON_PRETTY_PRINT);
}