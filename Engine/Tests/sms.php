<?php
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php';
$DB = new DB(); 

$query = $DB->query("SELECT * FROM users ORDER BY id DESC");
if ($query->num_rows > 0) {
	while ($row = $query->fetch_assoc()) {
		$msg = 'Hello '.User_Factory::getByUsername('full_name', $row['username'])." You can tell your friends to view your profile at http://flimbit.com.ng/profile?u=".$row['username'].". Thank you for using Flimbit";



			$send = SMS::sendMsgToUser($row['username'], 'Flimbit', $msg);

			if ($send) {
				echo $row['username'] ." - T <br>";
			}else {
				echo $row['username'] ." - F <br>";
			}



	}
}
?>