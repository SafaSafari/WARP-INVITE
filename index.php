<?php
$id = '3aff766b-8031-4674-aa70-8a9804ab2bd6';
$data = json_encode([
    'warp_enabled' => true,
    'referrer' => $id,
]);
$header = array(
    'Content-Type: application/json',
    'User-Agent: okhttp/3.12.1',
);
$opts = array('http' =>
array(
    'method' => 'POST',
    'header' => $header,
    'content' => $data
));
$all = explode("\n", file_get_contents('proxy.txt'));
foreach ($all as $t => $proxy) {
    $opts['http']['proxy'] = 'tcp://' . trim($proxy);
    $context  = stream_context_create($opts);
    exec('title ' . $t . ' FROM ' . $sizeof($all));
    for ($i = 0; $i < 2; $i++)
        file_get_contents('https://api.cloudflareclient.com/v0a977/reg', false, $context);
}
