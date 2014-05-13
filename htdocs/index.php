<!doctype html>
<meta charset=utf-8>
<title>Lunasync EOL</title>
Lunasync has reached the end of its life.

<?php

if (isset($_GET['p'])) {
    $path = $_GET['p'];
    $id = base_convert($path, 36, 10);
    $streams = json_decode(file_get_contents('streams.json'));
    if (array_key_exists($id, $streams->streams)) {
        $data = $streams->streams[$id];
        echo 'Stream data for "' . base_convert($id, 10, 36) . '":';
        echo '<pre>' . htmlspecialchars(json_encode($data, JSON_PRETTY_PRINT)) . '</pre>';
    } else {
        echo 'No such stream "' . base_convert($id, 10, 36) . '".';
    }
} else {
    echo 'Browse to the page for a stream, and its JSON will be outputted below.';
}