<?php 
if (isset($_GET['id']) && Vote_Factory::categoryIdExists($_GET['id'])) {
	$id = sanitize_note($_GET['id']);
	$contestants = Vote_Factory::getContestantsArrayByCategoryId($id);

} else {
	header("Location:index.php");
	exit();
}
?>