<?php
	header("Content-type: text/html; charset=utf-8"); 
	$uri = "http://test.a.yuanrenclub.com/api/openapi/rebateexchange";
	// 参数数组
	$data = array (
	        'inaccountid' => '0',
	        'insysrebateid'=>'0',
	        'insysrecordcode'=>'00041100',
	        'inchannelname'=>'',
	        'inchannelaccount'=>'',
	        'inchannelcode'=>0

	// 'password' => 'password'
	);
	 
	$ch = curl_init ();
	// print_r($ch);
	curl_setopt ( $ch, CURLOPT_URL, $uri );
	curl_setopt ( $ch, CURLOPT_POST, 1 );
	curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
	$return = curl_exec ( $ch );
	curl_close ( $ch );
	print_r($return);

?>