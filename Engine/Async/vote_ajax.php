<?php
/**
* @author Clinton Nzedimma
* AJAX script for voting
*/
include $_SERVER['DOCUMENT_ROOT'].'/Majo/Engine/Env/ftf.php'; 


if (User_Factory::isLoggedIn()) {
	if (isset($_REQUEST['votes_data'])) {
			$votes = [];
			foreach ($_REQUEST['votes_data'] as $vote) {
				array_push($votes, intval($vote));
			}

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if(!Vote_Factory::userHasCompletedVoting($u)) {
					$success_count = 0;
					for ($i=1; $i <=count($votes)-1 ; $i++) { 
						$success_count =  Vote_Factory::submitVote($u, 700+$i, $votes[$i])+ $success_count;
					}
					$ajax_response = intval($success_count);
				} else {
					$ajax_response = 1;
				}
				
				echo $ajax_response;				
			}

		}	
}
?>