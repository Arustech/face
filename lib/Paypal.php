<?php
/*
Paypal Wrapper class  v1.0
@author AbdulBasit
http:///www.arustech.com
*/

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payment;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;



class Paypal  extends Main

{

	//Application Settings
       private $client_id='AX5H7RDebADal2eG6JxQybpQMhYxFY8V1RnYgic6CIWx-jK6IyiAnp50diaM';
       private $secret_id='EKPelhCYMU5PkIPQciYRQqUvQk0OtGu83FuFP2f2PNaUarR1-3S5eThkc-kG';
       private $mode ='sandbox'; 
       private $http_timeout =30;
       private $record_log = TRUE;
       private $log_file = 'Paypal.log';
       private $log_level = 'FINE';
       private $apiContext;
       	
	
        // Payment Settings
	public $payment_method  ="paypal";
	public $currency  ='USD';
	

	
    
    	public function __construct()

		{

		parent::__construct();
		$this->apiContext = $this->getApiContext();

		}
		
	

		

		
	
	//Items Type Array
	//items ('name' = >'Item1'  ,'price'=>7.50)
	
	
	function PayUsingPaypal($prod, $return_file)
	
	
	
	{
		
		
			$this->initSession();
			$payer = new Payer();
			$payer->setPaymentMethod($this->payment_method);
		
				
		
		
			$item1 = new Item();
			$item1->setName($prod['name'])
				->setCurrency($this->currency)
				->setQuantity(1)
				->setPrice($prod['price']);
			
		
			$itemList = new ItemList();
			$itemList->setItems(array($item1));
			
			/*
			$details = new Details();
			$details->setShipping('1.20')
				->setTax('1.30')
				->setSubtotal('17.50');
			*/
			$amount = new Amount();
			$amount->setCurrency($this->currency)
				->setTotal($prod['price']);
				
			
			$transaction = new Transaction();
			$transaction->setAmount($amount)
				->setItemList($itemList)
				->setDescription("Payment description");
			
			
			$baseUrl = $this->getBaseUrl();
			$redirectUrls = new RedirectUrls();
			$redirectUrls->setReturnUrl("$baseUrl/{$return_file}.php?success=true")
				->setCancelUrl("$baseUrl/{$return_file}.php?success=false");
			
			
			$payment = new Payment();
			$payment->setIntent("sale")
				->setPayer($payer)
				->setRedirectUrls($redirectUrls)
				->setTransactions(array($transaction));
			
			try {
				$payment->create($this->apiContext);
			} catch (PayPal\Exception\PPConnectionException $ex) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				var_dump($ex->getData());	
				exit(1);
			}
			
			foreach($payment->getLinks() as $link) {
				if($link->getRel() == 'approval_url') {
				$redirectUrl = $link->getHref();
				break;
				}
			}
			$_SESSION['paymentId'] = $payment->getId();
			return array('pay_id'=>$payment->getId(),'url'=>$redirectUrl);

			

		

	}
	
	
	
	
		
	function getApiContext() {
		
	
	require_once($this->config['script_path'].'lib/bootstrap.php');

	$apiContext = new ApiContext(new OAuthTokenCredential($this->client_id,$this->secret_id));
	$apiContext->setConfig(
		array(
			'mode' => $this->mode,
			'http.ConnectionTimeOut' => $this->http_timeout,
			'log.LogEnabled' => $this->record_log,
			'log.FileName' => $this->log_file,
			'log.LogLevel' => $this->log_file
		)
		
		
	);
	
	return $apiContext;
	}
	
	function execPayment($get)
	{
		$this->initSession();
		if(isset($get['success']) && $get['success'] == 'true') {
		$paymentId = $_SESSION['paymentId'];
		$payment = Payment::get($paymentId, $this->apiContext);
		$execution = new PaymentExecution();
		$execution->setPayerId($get['PayerID']);
		$result = $payment->execute($execution, $this->apiContext);
		
           
	   
		
	  
	  $arr = get_object_vars(json_decode($result));
	  	  $arr2 = get_object_vars($arr['transactions'][0]);
	  
	  
  
	  return array('id'=>$arr['id'],'state'=>$arr['state'],'amount'=>$arr2['amount']->total);
	  
	  
	  } else {
	  return false;
	  }
	
	}
	
	
		
		
        
}//class ends

?>