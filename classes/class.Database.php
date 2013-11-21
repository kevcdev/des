<?php
	//Database Class
	require_once("../classes/class.Logging.php");

	class TDatabase {
		function __construct() {
			$this->Logging = new TLogging();
			if($this->database = mysqli_connect("localhost","root","m1359x","users")) {
				$this->Logging->log(__FILE__."||".__CLASS__."||".__LINE__."||Connected to database.");
//				$sqlQuery = "select * from users.users";
//				$result = $this->singleRowQuery($sqlQuery);
//				print_r($result);
			} else {
				$this->Logging->log("Could not connect to database.");
			}

		}
		function multiRowQuery($sqlQuery) {
			//returns array of all results
			$result = $this->database->query($sqlQuery);
			
			$rows = array();
			while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$returnArray[] = $rows;
			}
			return $returnArray;
		}

		function singleRowQuery($sqlQuery) {
			//returns array of single result			
			$result = $this->database->query($sqlQuery);
			
			$rows = array();
			while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				return $rows;
			}
			return $returnArray;
			echo "da ging vas sheif!";
		}

	}


