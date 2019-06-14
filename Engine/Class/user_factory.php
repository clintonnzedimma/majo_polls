<?php
/**
 * @author Clinton Nzedimma
 * @package Users 
 */
class User_Factory
{
	public static $DB;
	function __construct()
	{	
		 self::$DB = new DB();
	}




	public static function getByMatNumber($par, $mat_no){
		$par = sanitize_note($par);
		$mat_no = sanitize_note($mat_no); 
		$sql = "SELECT * FROM users WHERE mat_no = '$mat_no' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;

		if ($num_rows>0) {
			while ($row = $query->fetch_assoc()) {
				switch ($par) {
					case $par:
						$value = $row[$par];
						break;

					default:
						$value = null;
						break;
				}
			}
			return $value;
		 }
	}	

	public static function listOfStudents () {
		$query = self::$DB->query("SELECT * FROM users");
		$data = [];
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) { 
				$data[] = $row;
			}
			return $data;
		}	
	}

	public static function matNumberExists($mat_no)
	{
		$mat_no = sanitize_note(strip_whitespace($mat_no));
		return (self::$DB->query("SELECT * FROM users WHERE mat_no ='$mat_no' ")->num_rows >0) ? true : false;
	}

	public static function passwordCheckByMatNumber($mat_no, $param_password) {
			$mat_no = sanitize_note(strip_whitespace($mat_no));
			$param_password = sanitize_note($param_password);
			$sql = "SELECT * FROM users WHERE mat_no = '$mat_no' ";
			$query = self::$DB->query($sql);
			$num_rows = $query->num_rows;

			$count_check = null;
			if($num_rows > 0) {
				while ($row = $query->fetch_assoc()){
					if ($row['password'] == $param_password) {
						$count_check ++;
					}
				}
				return ($count_check>0) ? true :false;
			}
		}	

		public static function authenticate ($param) {
			$param = sanitize_note($param);
			$_SESSION['majo_mat_no'] = $param;
		}	

		public static function logOut() {
			session_unset($_SESSION['majo_mat_no']);
		}		

		public static function isLoggedIn() {
			return (isset($_SESSION['majo_mat_no'])) ? true : false;
		}

		public static function protectPage() {
			if (!self::isLoggedIn()) {
				header("Location:../index.php");
				exit();
			}
		}

		public static function recordUserLog($user_id) {
			$user_id = sanitize_note($user_id);
			$phpsessid = $_COOKIE['PHPSESSID'];
			$date_log = date("Y-m-d");		
			$time_log= date("H:i");
			$sql = "INSERT INTO user_logs (
					id,
					user_id,
					phpsessid,
					date_log,
					time_log
				)
				VALUES (
					'id',
					'$user_id',
					'$phpsessid',
					'$date_log',
					'$time_log'					
				)
			";
			return self::$DB->query($sql);
		}
	

}

# Static Initializations
new User_Factory();

?>