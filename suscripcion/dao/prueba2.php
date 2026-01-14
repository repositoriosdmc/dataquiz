<?php

$data = [
    'phone' => '51981350255', // Receivers phone
    'body' => 'Hola Yelsi', // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$url = 'https://eu56.chat-api.com/instance94280/sendMessage?token=qp19t8kqlymv6lmc';
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);
// Send a request
$result = file_get_contents($url, false, $options);

var_dump($result);


?>