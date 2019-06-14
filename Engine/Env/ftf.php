<?php

/**
 * @author Clinton Nzedimma
 * First Things First (FTF).
 * This module contain all included classes and initializations
 * 
 */
ob_start();
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/majo/');

/**
 	* Environment can be imported by including this below
 	* => $_SERVER['DOCUMENT_ROOT'].'/Majo/Engine/Env/ftf.php';
*/

 
include ROOT.'/engine/env/db.php';
include ROOT.'/engine/procedures/init.php';
include ROOT.'/engine/procedures/errors.php';
include ROOT.'engine/network/route.php';

/*Plugins*/
include ROOT.'/engine/plugins/class/ebulksms.php';

/* Class Includes */
include ROOT.'/engine/class/user_factory.php';
include ROOT.'/engine/class/user_singleton.php';
include ROOT.'/engine/class/vote_factory.php';





/* Initialization */
if(User_Factory::isLoggedIn()){
	$u = new User_Singleton(User_Factory::getByMatNumber('id',$_SESSION['majo_mat_no']));
}

?>