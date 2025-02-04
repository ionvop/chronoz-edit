<?php

header("Access-Control-Allow-Origin: *");

echo json_encode([
    "name" => file_get_contents("name.txt"),
    "song" => file_get_contents("song.txt"),
    "chart" => file_get_contents("chart.txt")
]);