  <?php

class Opinion_poll_model {
	private $db_handle;
	private $host = '127.0.0.1';
	private $db = 'opinion_poll';
	private $user = 'root'; 
	private $pwd = 'ockypocky123';

	public function __construct() {
		$this->db_handle = mysqli_connect($this->host, $this->user, $this->pwd, $this->db); //connect to mysql server
		if (!$this->db_handle) die("Unable to connect to MySQL: " . mysqli_error());
		if (!mysqli_select_db($db_handle, $db)) die("Unable to select database: " . mysqli_error());
	}


	 //this is the class constructor method that is used to establish the database connection

	private function execute_query($sql_stmt) {
		$result = mysqli_query($db_handle, $sql_stmt); //execute SQL statement
		return !$result ? FALSE : TRUE;
	} //is the method for executing queries such as insert, update and delete


	public function select($sql_stmt) {
		$result = mysqli_query($db_handle, $sql_stmt);
		if (!$result) die("Database access failed: " . mysqli_error());
		$rows = mysqli_num_rows($result);
		$data = array();
		if ($rows) {
			while ($row = mysqli_fetch_array($result)) {
				$data = $row;
			}
		}
		return $data;
	} //is the method for retrieving data from database and returning numeric array

	public function insert($sql_stmt) {
		return $this->execute_query($sql_stmt);
	} //is the insert method that calls the excute_query method

	public function __destruct(){
		mysqli_close($this->db_handle);
	} // is the destructor that closes the db connection
}

?>
