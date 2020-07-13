<?php
$id = '3aff766b-8031-4674-aa70-8a9804ab2bd6';
$proxytype = '';
$e = explode("\n", file_get_contents($file));
foreach ($e as $time => $proxy)
	for ($i = 0; $i < 2; $i++)
		connect('https://api.cloudflareclient.com/v0a977/reg', array('User-Agent: okhttp/3.12.1', 'Content-Type: application/json'), 'POST', array('referrer' => $id), $proxy, $proxytype);
function connect($url, $header, $method = null, $data = null, $proxy = null, $proxytype = null)
{
	$ch = curl_init($url);
	curl_setopt_array($ch, [
		CURLOPT_HTTPHEADER => $header,
		CURLOPT_SSLVERSION => CURL_SSLVERSION_MAX_TLSv1_1,
		CURLOPT_USERAGENT => 'okhttp/3.12.1',
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_RETURNTRANSFER => true
	]);
	($method) ? curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method) : null;
	($data) ? curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)) : null;
	if ($proxy) {
		$int = str_ireplace(['http', 'https', 'socks4', 'socks5', 'socks4a'], [0, 2, 4, 5, 6], $proxytype);
		curl_setopt_array($ch, array(
			CURLOPT_PROXYTYPE => $int,
			CURLOPT_PROXY => $proxy
		));
	}
	$res = curl_exec($ch);
	curl_close($ch);
	return $res;
}
