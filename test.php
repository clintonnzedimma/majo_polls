<?php 
include $_SERVER['DOCUMENT_ROOT'].'/Majo/Engine/Env/ftf.php';


?>


<?php

$DB = new DB();
Vote_Factory::submitVote($u,["701" => 1]);


?>