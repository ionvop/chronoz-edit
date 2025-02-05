<?php

header("Access-Control-Allow-Origin: *");

if (file_exists("name.txt") == false) {
    file_put_contents("name.txt", "");
}

if (file_exists("song.txt") == false) {
    file_put_contents("song.txt", "");
}

if (file_exists("chart.txt") == false) {
    file_put_contents("chart.txt", "");
}

switch ($_GET["method"]) {
    case "name":
        echo file_get_contents("name.txt");
        break;
    case "song":
        echo file_get_contents("song.txt");
        break;
    case "chart":
        echo file_get_contents("chart.txt");
        break;
    case "download":
        echo json_encode([
            "name" => file_get_contents("name.txt"),
            "song" => file_get_contents("song.txt"),
            "chart" => file_get_contents("chart.txt")
        ]);

        break;
}