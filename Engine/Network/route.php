<?php

/**
 * @author Clinton Nzedimma
 * @package Network
 * @static Class simulates the property of a router (This class is redundant)
 */
class Route
{	
	// The current file name
	public static $file_name;

	function __construct()
	{
		self::$file_name = basename($_SERVER['PHP_SELF'], '.php').".php";
	}

	public static function ctrl($param) {
		foreach ($param as $ctrl_file_name => $param_file_name) {
			if (count($param) == 1) {
				if ($param_file_name == self::$file_name) {
					include ROOT.'engine/controllers/'.$ctrl_file_name;
					}
				}
		}
	}

}

# Static Initialization
new Route(); 
?>