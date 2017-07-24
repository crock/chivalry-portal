<?php

function buildURL() {
    $lines = file("config.txt", FILE_IGNORE_NEW_LINES);

    $ip = $lines[0];
    $port = $lines[1];

    $url = 'https://api.minetools.eu/ping/' . $ip . '/' . $port;

    return $url;
}

function fetchJSON($x) {
    $response = file_get_contents($x) or die('Unable to fetch contents!');
    return $response;
}

function output2file($y) {
    $obj = json_decode($y);

    $online = $obj->players->online;

    $file = fopen('js/player_count.txt', 'w');
    fwrite($file, $online);
    fclose($file);
}

function main() {
    output2file(fetchJSON(buildURL()));
}

main();

?>
