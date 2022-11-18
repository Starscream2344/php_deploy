<?php

class Semaphore extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function reg_sms($phone, $uid, $code)
    {
		$ch = curl_init();
		$message = "Thank you for registering. Your RecogU ID credential is $uid and passcode $code. Never share your credentials to anyone.";
		$parameters = array(
			'apikey' => $this->config->item('semaphore_sms_key'),
			'number' => $phone,
			'message' => $message,
			'sendername' => 'SEMAPHORE'
		);
		curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
		curl_setopt( $ch, CURLOPT_POST, 1 );

		//Send the parameters set above with the request
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

		// Receive response from server
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		$output = curl_exec( $ch );
		curl_close ($ch);

		//Show the server response
		echo $output;
    }

	public function gatelog_stud($phone, $student)
    {
		$ch = curl_init();
		$date = date('Y-m-d h:i:s A');
		$message = "$student is inside the school at $date";
		$parameters = array(
			'apikey' => $this->config->item('semaphore_sms_key'),
			'number' => $phone,
			'message' => $message,
			'sendername' => 'SEMAPHORE'
		);
		curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
		curl_setopt( $ch, CURLOPT_POST, 1 );

		//Send the parameters set above with the request
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

		// Receive response from server
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		$output = curl_exec( $ch );
		curl_close ($ch);

		//Show the server response
		echo $output;
    }

	public function gatelog($phone, $uid)
	{
		$ch = curl_init();
		$date = date('Y-m-d h:i:s A');
		$message = "$uid, You Attended at School at $date.";
		$parameters = array(
			'apikey' => $this->config->item('semaphore_sms_key'),
			'number' => $phone,
			'message' => $message,
			'sendername' => 'SEMAPHORE'
		);
		curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
		curl_setopt( $ch, CURLOPT_POST, 1 );

		//Send the parameters set above with the request
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

		// Receive response from server
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		$output = curl_exec( $ch );
		curl_close ($ch);

		//Show the server response
		echo $output;
	}
}