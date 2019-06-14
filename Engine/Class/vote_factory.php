<?php
/**
 * @author Clinton Nzedimma
 * @package Voting
 */
class Vote_Factory
{
	public static $DB;
	public static $number_of_categories;
	public static $number_of_eligible_voters;
	function __construct()
	{
		self::$DB = new DB();
		self::$number_of_categories = self::$DB->query("SELECT * FROM categories")->num_rows;
		self::$number_of_eligible_voters = self::$DB->query("SELECT * FROM users")->num_rows;
	}


	public static function categoryAssoc()
	{
		$query = self::$DB->query("SELECT * FROM categories");
		$data = [];
		while ($row = $query->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}

	public static function getContestantsArrayByCategoryId($cat_id) {
		$cat_id = sanitize_note($cat_id);
		$query = self::$DB->query("SELECT * FROM contestants WHERE category_id='$cat_id' ");
		$data = [];
		while ($row = $query->fetch_assoc()) {
			$data[] = $row;
		}
		return $data;
	}


	public static function getCategoryById($par, $category_id)
	{

		$par = sanitize_note($par);
		$category_id = sanitize_note($category_id); 
		$sql = "SELECT * FROM categories WHERE id = '$category_id' ";
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

	private static function categoryIdIsMappedToContestantId($category_id, $contestant_id) {
		$query = self::$DB->query("SELECT * FROM contestants WHERE category_id ='$category_id' AND id = '$contestant_id' ");
		return ($query->num_rows > 0) ? true : false;
	}


	public static function countUserNumberOfVote(User_Singleton $user) {
		return self::$DB->query("SELECT * FROM votes WHERE user_id = '".$user->get('id')."' ")->num_rows;
	}

	public static function userHasVotedCategory(User_Singleton $user, $category_id){
		$query = self::$DB->query("SELECT * FROM votes WHERE category_id = '$category_id' AND user_id = '".$user->get('id')."' ");
		return ($query->num_rows > 0) ? true : false;
	}

	public static function userHasCompletedVoting (User_Singleton $user) {
		$check = 0;
		$categories = self::categoryAssoc();
		foreach ($categories as $category) {
			if (self::userHasVotedCategory($user, $category['id'])) {
				$check ++;
			}
		}
		return ($check == self::$number_of_categories) ? true : false;
	}

	public static function submitVote(User_Singleton $user, $category_id, $contestant_id) {
			if(self::categoryIdIsMappedToContestantId($category_id, $contestant_id) && !self::userHasVotedCategory($user, $category_id)) {
				return self::$DB->query("INSERT INTO votes (id,user_id,category_id,contestant_id) VALUES (NULL, '".$user->get('id')."', '$category_id', '$contestant_id') ");		
			}
											
	} 

	public static function categoryIdExists($param) {
		$param = sanitize_note ($param);
		$query =  self::$DB->query("SELECT * FROM categories WHERE id = '$param' ");
		return ($query->num_rows > 0) ? true : false;
	}

	public static function countVotesOfContestant($category_id, $contestant_id) {
		return self::$DB->query("SELECT * FROM votes WHERE category_id='$category_id' AND contestant_id='$contestant_id' ")->num_rows;
	}
	public static function countTotalVotesOfCategory ($category_id) {
		return self::$DB->query("SELECT * FROM votes WHERE category_id='$category_id'")->num_rows;
	}

	
}
new Vote_Factory();
?>