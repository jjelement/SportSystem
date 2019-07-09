<?php 

namespace App\Services\Payment;


class Api 
{

	protected static $baseUrl = 'https://worldwallet.net/payment';


	 public function setBaseUrl($baseUrl)
	 {
	 	self::$baseUrl = $baseUrl;
	 }

	 public static function getBaseUrl()
	 {
	 	return self::$baseUrl;
	 }

	 public static function getFullUrl($relativeUrl)
	 {
	 	return self::getBaseUrl() . $relativeUrl;
	 }

	 public function CallAPI($path,$param) {

	 	$ch = curl_init();
	 	curl_setopt($ch, CURLOPT_URL, $this->getBaseUrl().$path);
	 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 	curl_setopt($ch, CURLOPT_POST, true);

	 	$data = $param;

	 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	 	$output = curl_exec($ch);
	 	$info = curl_getinfo($ch);
	 	curl_close($ch);

	 	return $output;


	 }

	 public function CreatePayment($data){


	 	$call = $this->CallAPI("/CreateTransaction/",$data);

	 	return $call;


	 }

	 public function Check_Transaction($tranID){


	 	$call = $this->CallAPI("/transactionID/",$tranID);

	 	return $call;


	 }

	 public function OpenPayment($tranID){


	 	$call = $this->CallAPI("/OpenPayment/",$tranID);

	 	return $call;


	 }

	 public function Check_OrderID($orderID){

	 	$call = $this->CallAPI("/OrderID/",$orderID);

	 	return $call;


	 }
	 


	}



?>