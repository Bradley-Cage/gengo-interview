<?php
$url = 'http://api.sandbox.gengo.com/v2/';
$public_key = "933zkwvtq^ljnBGfX^m9ha5XoD\$PavRlwr7BuhD6iK@5|nkeXQ_oj8ZbNJ6e8w3G";
$private_key = "EXp0_uFhuGxi{l|k_C{D[@s6r\$N(Zp4VfHGvp8(1~rV8BpPfu0fcP}k2|hVECNwL";
$response_type = 'json';
$header = array('Accept: application/'.$response_type);
$query = array('api_key' => $public_key);
$query = http_build_query($query);
$api_key = $public_key;
$job = array(
	'slug' => 'Test 3',
	'body_src' => 'This is my first real experience with PHP, this should be fun to learn!',
	'lc_src' => 'en',
	'lc_src' => 'ja',
	'tier' => 'ultra',
	'comment' => 'Hey there sandbox! Hope you are having fun letting developers test on you!',
	);
$data = array('jobs' => $job);
$params = array(
    'api_key' => $api_key,
    'ts' => gmdate('U'),
    'data' => json_encode($data)
);
$hmac = hash_hmac('sha1', $params['ts'], $private_key);
$params['api_sig'] = $hmac;
$enc_params = json_encode($params);

$url .= 'translate/jobs';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$response = curl_exec($ch);
curl_close($ch);
?>
