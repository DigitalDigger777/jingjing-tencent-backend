<?php
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

$data = json_decode(file_get_contents('php://input'), true);

$host = 'jingjing-mqtt.fenglinfl.com';
$port = 1883;
$user = 'jingjing';
$pass = 'eisen9999jingjing';

$minutes = strlen($data['minutes']) == 1 ? strlen($data['minutes']) . '.' : strlen($data['minutes']);

$client = new \Mosquitto\Client();
$client->setCredentials($user, $pass);
$client->connect($host, $port, 5);
$client->publish($data['imei'], $minutes . "m", 0, 0);

print($minutes . "m");
