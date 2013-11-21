<?php
	//Logging Class
	class TLogging {
		function __construct() {
			$this->logfile = '../logs/system.txt';
		}

		function log($message) {
			$fp = fopen($this->logfile, 'a+');
			$logMessage = date("Y m d h:t:s", time())."| ".$message."\n";

			// Strip out path
			$logMessage = str_replace('/var/www/des/','',$logMessage);

			fwrite($fp,$logMessage);
			fclose($fp);
		}
	}
