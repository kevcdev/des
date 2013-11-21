<?php
	class TAuthentication {
		function __construct() {
			//constructor, duh.
			if ($_GET['logout'] == 1) {
				$_SESSION['loggedin'] = 0;
			}
			if ($_SESSION['loggedin'] == 1) {
				$this->isAuthorized = 1;
			} else {
				$this->isAuthorized = 0;
			}

		}

		function isAuthorized($username, $password) {
			//determine id someone has authorization
			return $this->isAuthorized;
		}
	
		function checkUserPass() {
			if ($_POST['username'] == 'Kevin' && $_POST['password'] == '123') {
				return 1;
			} else {
				return 0;
			}
		}

		function successfulLogin() {
			$_SESSION['loggedin'] = 1;
		}

		function failedLogin() {
			$_SESSION['loggedin'] = 0;
		}
	}
