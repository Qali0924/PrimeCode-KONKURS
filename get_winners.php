<?php
$data = json_decode(file_get_contents('database.json'), true);
if(time() >= strtotime('2026-04-16 19:00:00') && count($data) >= 3) {
    $keys = array_rand($data, 3);
    $winners = [$data[$keys[0]]['nick'], $data[$keys[1]]['nick'], $data[$keys[2]]['nick']];
    echo json_encode($winners);
} else {
    echo json_encode(["Konkurs trwa..."]);
}
?>
