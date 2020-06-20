<?php
$id = '3aff766b-8031-4674-aa70-8a9804ab2bd6';
$data = json_encode([
    'warp_enabled' => true,
    'referrer' => $id,
]);
$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => ['Content-Type: application/json', 'User-Agent: okhttp/3.12.1'],
        'content' => $data
    )
);

$context  = stream_context_create($opts);
file_get_contents('https://api.cloudflareclient.com/v0a977/reg', false, $context);
