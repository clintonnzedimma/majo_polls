<?php 
/**
 * @author Clinton Nzedimma
 * General database class
 */
class DB extends mysqli
{
	public $conn;	
	public function __construct()
	{		
		  parent::__construct("localhost","root","","majo");	
	}

}
?>