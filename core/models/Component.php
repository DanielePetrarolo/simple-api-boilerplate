<?php

class Component{

	// database connection
	protected $conn;
	protected $received_data;
	protected $table_name = "";


	// constructor
	function __construct($db){
		$this->conn = $db;
		$this->received_data = $GLOBALS['RECEIVED_DATA'];
	}


	public function getList(){
		$query 	= "SELECT * FROM " . $this->table_name;
		$stmt 	= $this->conn->prepare($query);

		if($stmt->execute()){
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			http_response_code(200);
			return json_encode($row);
		}
	}






}




?>
