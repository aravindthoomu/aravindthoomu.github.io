<?php
header("Access-Control-Allow-Origin: *");
$url = $_GET['url'] ?? '';
if (!$url) {
    http_response_code(400);
    echo "Missing URL parameter.";
    exit;
}
$context = stream_context_create([
    'http' => ['header' => "User-Agent: PHPProxy\r\n"]
]);
$response = @file_get_contents($url, false, $context);
if ($response === FALSE) {
    http_response_code(500);
    echo "Failed to fetch URL.";
    exit;
}
echo $response;
?>
