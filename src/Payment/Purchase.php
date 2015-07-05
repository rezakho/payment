<?php

namespace Payment;

use Payment\Gateway\Gateway;
use Payment\Gateway\GatewayInterface;

class Purchase
{
	protected $amount;


	protected $orderId;


	protected $gateway;



	public function __construct($amount, $orderId, GatewayInterface $gateway)
	{
		$this->amount  = (int)$amount;
		$this->orderId = $orderId;
		$this->gateway = $gateway;
	}



	public function send()
	{
		return $this->gateway->send($this->amount, $this->orderId);
	}



	public function getAmount()
	{
		return $this->amount;
	}
	


	public function getOrderId()
	{
		return $this->orderId;
	}



	public function getData()
	{
		return $this->gateway->getRequestData();
	}



	public function getToken()
	{
		return $this->gateway->getToken();
	}



	public function redirect()
	{
		return $this->gateway->redirect();
	}



	public function getError()
	{
		return $this->gateway->getRequestError();
	}



	public function getErrorCode()
	{
		return $this->gateway->getRequestError()['code'];
	}



	public function getErrorMessage()
	{
		return $this->gateway->getRequestError()['message'];
	}
}
