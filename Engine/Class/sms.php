<?php
/**
 * @author Clinton Nzedimma
 * @package SMS
 */
class SMS
{
	public static $DB;
	public static $SMS_API;
	function __construct()
	{
		self::$DB = new DB();
		self::$SMS_API = new EBulkSMS("novacomng@gmail.com","6b6a0b4f1b516f45a9feb65a91068954401165ab");
	}


	//Sending vanilla message	
	public static function sendMsgToUser($username, $senderName, $msg)
	{		
		if (User_Factory::usernameExists($username)) {
			$phone_number = User_Factory::getByUsername('phone', $username);
			if (get_magic_quotes_gpc()) {
				$msg = stripcslashes($msg);	
			}	
			 $msg = substr($msg, 0, 160);

			 //sending
			 $result = self::$SMS_API->useJSON(self::$SMS_API->json_url, self::$SMS_API->username, self::$SMS_API->apikey, self::$SMS_API->flash, $senderName, $msg, $recipients = $phone_number);	

			return ($result == "SUCCESS") ? true : false;		
		}
	}


	// Sending Flash Message to user, message will not be saved to users phone	
	public static function sendFlashMsgToUser($username, $senderName, $msg)
	{		
		if (User_Factory::usernameExists($username)) {
			$phone_number = User_Factory::getByUsername('phone', $username);
			if (get_magic_quotes_gpc()) {
				$msg = stripcslashes($msg);	
			}	
			 $msg = substr($msg, 0, 160);

			 //sending
			 $result = self::$SMS_API->useJSON(self::$SMS_API->json_url, self::$SMS_API->username, self::$SMS_API->apikey, 1, $senderName, $msg, $recipients = $phone_number);	
			return ($result == "SUCCESS") ? true : false;		
		}
	}

	public static function sendToPhone($phone_number, $msg) {
		$msg = substr($msg, 0, 160);
		$result = self::$SMS_API->useJSON(self::$SMS_API->json_url, self::$SMS_API->username, self::$SMS_API->apikey, self::$SMS_API->flash, $senderName, $msg, $recipients = $phone_number);	
		return ($result == "SUCCESS") ? true : false;				
	}			

}


#Static Initialization
new SMS();

?>