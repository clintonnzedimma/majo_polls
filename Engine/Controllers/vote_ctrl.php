<?php
if (User_Factory::isLoggedIn()) {
	if (isset($_REQUEST['votes_data'])) {
			$votes = [];
			foreach ($_REQUEST['votes_data'] as $vote) {
				array_push($votes, intval($vote));
			}




			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				Vote_Factory::submitVote($u, $vote);
			}

		}	
}
?>