<!doctype html>
<meta charset=utf-8>
<title>Lunasync EOL</title>
<p>Lunasync has reached the end of its life.<br>
If you're looking for a good alternative, check out <a href="http://cytu.be/">CyTube</a> or <a href="http://luna.berrypunch.net/">Luna</a>.</p>

<?php

if (isset($_GET['p'])) {
    $path = $_GET['p'];
    $id = (int)base_convert($path, 36, 10);
    $streams = file_get_contents('streams.json');
    if ($streams === FALSE) {
        die('Could not open file');
    }
    $streams = json_decode($streams);
    if (isset($streams->streams[$id])) {
        $data = $streams->streams[$id];
        echo 'Stream data for "' . base_convert($id, 10, 36) . '":';
        echo '<pre>' . htmlspecialchars(json_encode($data, JSON_PRETTY_PRINT)) . '</pre>';
    } else {
        echo 'No such stream "' . base_convert($id, 10, 36) . '".';
    }
} else {
    echo 'Browse to the page for a stream, and its JSON will be outputted below.';
}