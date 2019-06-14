<?php

if (User_Factory::isLoggedIn()) {
		header("Location:vote/");
		exit();	
}

if (isset($_POST['login'])) {
	$mat_no = sanitize_note(strtoupper($_POST['mat_no']));
	$pwd = sanitize_note($_POST['pwd']);

	if (!User_Factory::passwordCheckByMatNumber($mat_no, $pwd) && User_Factory::matNumberExists($mat_no)) {
		$errors[] = 'Incorrect Password !';
	}
	if (!User_Factory::matNumberExists($mat_no)) {
		$errors[] = 'Matriculation number does not exist !';
	}

	if (!empty($errors)) {
		# code...
	}else {
		User_Factory::authenticate($mat_no);
		header("Location:vote/");
		exit();
	}
}
?>