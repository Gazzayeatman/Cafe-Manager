<?php 
session_start();
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else {
		$page = 'index';
	}
	
	include "database_class.php";
	include "bulletin_class.php";
	include "cafe_class.php";
	//Edit here to connect to your database
	//Server, username, password, database in use
	$database = new Database("localhost","Garry","aaaaaa","Cafe-Manager");
	$database->addBulletins();
	$database->addCafes();
	if (isset($_GET['function'])){
		$function = $_GET['function'];
		if ($function == "Register"){
			$userName = trim($_POST["username"]);
			$firstName = trim($_POST['firstName']);
			$lastName = trim($_POST['lastName']);
			$password = trim($_POST['password']);
			$email = trim($_POST['email']);
			//Add checks to see if there are null values
			$database->addUser($userName,$firstName,$lastName,$email,$password);
		}
		if ($function == "Login"){
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			//Add checks to see if strings are null 
			$database->login($username,$password);
		}
		if ($function == "Logout"){
			$database->logout();
		}
	}
	include "website_class.php";
	include "table_class.php";
	include "bootstrap_row_class.php";
	include "modal_class.php";
	include "index_code.php";
	include "account_manager_code.php";
	//Change to switch
	switch ($page){
		case "index":
			echo $index->returnWebsite();
			break;
		case "accountManager":
			echo $accountManager->returnWebsite();
			break;
		default:
			echo $index->returnWebsite();
			break;
	}
?>