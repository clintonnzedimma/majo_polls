<?php

//error_reporting (E_ERROR );


function error_msg ($errors_message)
	{
		// This function returns error message

		if ($errors_message==true){
		return "<ul type='none' align = 'left'><li>" .implode("</li><li>", $errors_message). "</li></ul>";
	}
}


$errors=array(); // the general errors array







function success_msg ($success_message)
	{
		// This function returns success message message

		if ($success_message==true){
		return "<ul type='none' align='left'><li>" .implode("</li><li>", $success_message). "</li></ul>";
	}
}

$success=array(); // the general success array




?>