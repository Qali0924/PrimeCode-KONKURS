<?php
$file = 'database.json';
$ip = $_SERVER['REMOTE_ADDR'];
$data = json_decode(file_get_contents($file), true) ?: [];

foreach($data as $entry) {
    if($entry['ip'] === $ip) {
        die(json_encode(['status' => 'error', 'message' => 'Już się zgłosiłeś!']));
    }
}

$data[] = ['ip' => $ip, 'nick' => $_POST['nick']];
file_put_contents($file, json_encode($data));
echo json_encode(['status' => 'success']);
?>
