<?php 
User_Factory::protectPage();

if (User_Factory::isLoggedIn()) {
	$categories = Vote_Factory::categoryAssoc();
	
}

?>