<?php 

/**
*	@author Clinton Nzedimma(c) Novacom Webs Nigeria 2018
*	@package  tesseract Hotel Management System v 1.0.0
*	@subpackage Initialized Functions
*	@license MIT 
* Some functions here were written as of php 5.2.0
*/


function custom_real_escape_string ($string) {
	$DB =  new DB();
	return $DB->real_escape_string ($string);
}






function sanitize ($text)
	{
/*
	No special character allowed, recommended for username registeration and login. 
*/

$val=htmlentities(strip_tags(custom_real_escape_string($text)));

	if (preg_match("/[a-zA-Z0-9]/","$val") ) {
	 $str=preg_replace("/[^A-Za-z0-9_]/", "", "$val");
		$newstr=ereg_replace("/[[:space:]]/", "", trim($str));
		return $newstr;
	}
}



function sanitize_note ($text)
	{
/*
	Used for a text field.
	Can be used for things like description, biography and any note
*/
	$val=htmlentities(strip_tags(custom_real_escape_string(trim($text))));
	return $val;
}



function sanitize_username ($text)
	{
/*
	Checks if username has spaces or special characters

	If FALSE is returned then it contains special characters

*/
$val=sanitize_note($text);
	if ( preg_match("/[^a-zA-Z0-9_]/","$val") || preg_match("(')", "$val") || preg_match("/[[:space:]]/", "$val") ) 
	{
		return false;
		
	}

	else 
	{

		return true;
	}

	}




function sanitize_default_query ($text)
	{
/*
	for fixed ur query over url
*/

	$val=strip_tags(custom_real_escape_string($text));


	return $val;
}




function sanitize_r ($text)
	{
/* No special character allowed except apostrophe (') because of names like e.g O'Neil. Its is recommended for First Name, Last Name

*/		
$val=sanitize_note($text);

	if (preg_match("/[a-zA-Z]/","$val") || preg_match("(')", "$val") ) {
			return $val;
		}
}	

function sanitize_email ($address) 
	{
		if (filter_var($address, FILTER_VALIDATE_EMAIL)){
			return $address;
		}

	
	}	



function sanitize_integer ($text) {

/*
	Checks if user input is an integer

*/

$val=htmlentities(strip_tags(custom_real_escape_string($text)));
	if (preg_match("/[^0-9]/","$val")  )
	{
		return false;
		
	}

	else 
	{

	return true;
	}


}


function sanitize_url_query ($text)
	{
/*
	This function sanitizes url query by replacing every whitespace with +
*/

$val=urlencode(htmlspecialchars_decode(strip_tags(custom_real_escape_string($text))));

	if (preg_match("/[a-zA-Z0-9]/","$val") ) {
	 $str=preg_replace("/%26amp%3B[^A-Za-z0-9_]/", "", "$val");
		$newstr=ereg_replace("/[[:space:]]/", "", trim($str));
		return $newstr;
	}
}



function whitespaces_only ($text) {
	$val=htmlentities(strip_tags(custom_real_escape_string($text)));
		if (strlen(trim($val))==0 ){

			return true;
		}
}

function strHasLettersOnly($str){
	if (preg_match("/[^a-zA-Z\s]/","$str")) {
		return false;
	} else {
		return true;
	}
}

function is_phone_number($par)
{
	if (preg_match("/[^0-9]/","$par")) {
		return false;
	} else {
		return true;
	}
}

function check_for_whitespace($string) {
	return (preg_match("/[\s]/", $string)) ? $string : false;
}


function strip_whitespace($string) {
	return $string =preg_replace("/[\s+]/", '', $string);
}

function slice_string ($string, $n)
	{
			/* This function is used to limit the letters of a string and put 3 dots at its end
			For example if a string is "Tahiti is a beautiful place"
			and $n is set to 10.
			it will print "Tahiti is..."
			*/


			return substr($string, 0, $n) ."...";
			
	}


function input_confine($form_name, $allowed_values) {
        /*
            This function is used to confine a value submitted in a form.
            The $form_name is the name of the form whether a POST or GET value or just a dynamic variable 
            The $allowed_values must be an array.
            Recommended for form options, radio, check
        */

                if (in_array($form_name, $allowed_values))     
                        {
                            return true;
                        }



}


function getConst($name)	
	{
		/*
			The $name variable is the name of the form
			This is recommended for forms.
			It is not recommended for secure forms e.g passwords, token etc 
		*/

		if (isset($_GET[$name]))
			{
				echo sanitize_note($_GET[$name]);
			}

	}


function postConst($name)	
	{
		/*
			The $name variable is the name of the form
			This is recommended for forms.
			Set this as form value to avoid the value of the form dissappearing during submit errors
			It is not recommended for secure forms e.g passwords, token etc 
		*/
		if (isset($_POST[$name]))
			{
				echo sanitize_note($_POST[$name]);
			}

	}


function selectPostConst($name, $value)
	{ 
		/* 
			Similar to postConst but used for html select tag
		*/

		if(isset($_POST[$name]) && $_POST[$name]==$value)
			{
				echo "selected='selected' ";
			}

	}

function selectGetConst($name, $value)
	{ 
		/* 
			Similar to postConst but used for html select tag
		*/

		if(isset($_GET[$name]) && $_GET[$name]==$value)
			{
				echo "selected='selected' ";
			}

	}	

function checkPostConst($name, $value)
	{ 
		/* 
			Similar to postConst but used for html radio and checkbox tag
		*/

		if(isset($_POST[$name]) && $_POST[$name]==$value)
			{
				echo "checked";
			}

	}	




function selectPostConstCMP($par1, $par2) {
	
	if($par1==$par2) {
		echo "selected= 'selected' ";
	}
}

function checkPostConstCMP($par1, $par2) {
	
	if($par1==$par2) {
		echo "checked";
	}
}

function activeLinkSelectorPaginate($get_var, $page_number, $element_class) {
	if (isset($_GET[$get_var])) { 
		if($page_number==$_GET[$get_var]){
		return "class='$element_class'";
	}
	}

}




function submit_btn_clicked ($par) {
	/* 
		This function is used to check if a submit that has a parameter is clicked.

		The function parameter $par is the name of the button 

	*/

		if (isset($_POST[$par]) || isset($_GET[$par])) {

			return true;

		}

		else {

			return false;
		}



}


function pad_zero_before_digit($num) {
		// this function pads digits less than 10 to have 0 before it i.e 1==01, 5==05 etc.
		if ($num>9) {
			return $num;
		}
		
		else {
			return '0'. $num;
			
		}	
	} 


function hyphenateIfNull($param) {
	// returns '-' if param is null
	return (!$param) ? "-" : $param;
}

function grease($param) {
	return password_hash("flimbit").".".md5($param);
}


function mandatory_fields ($required_fields) {
	$check_val = null;
	foreach ($_REQUEST as $key => $value) {
		if (empty($value) && in_array($key, $required_fields) ===true) {
			$check_val = true;
			break 1;
		}
	}	
		return ($check_val==true) ? false : true;
}

function generate_voucher($split_length)
{	
	$random_number = rand(1,999);
	$encrypt_random_number = md5($random_number);
	$voucher = strtoupper(substr($encrypt_random_number, 0, $split_length)."-".substr(uniqid(), 0, $split_length));
	return $voucher;
}

 function generate_pin()
{
	return rand(1000,9999);
}

?>