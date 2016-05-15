<?php
class Database{

	public $server;
	public $username;
	public $password;
	public $database;
	public $conn;
	public $bulletins = array();
	public $cafes = array();
	public $users = array();
	
	public function __construct($server,$username,$password,$database){
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		$this->conn = new mysqli($this->server,$this->username,$this->password, $this->database);
	}
	public function login($username, $password){
		$db2 = $this->conn;
		$sql = "SELECT * FROM Users WHERE username='$username' AND password =sha1('$password')";
		if(!$db2->query($sql)){
			echo $db2->error;
		}
		$result = $db2->query($sql);
		$row = $result->fetch_array();
		$userType = $row['usertype'];
		if ($result->num_rows == 1){
			if ($userType == "User"){
				$_SESSION['valid_user'] = $username;
			}
			if ((strcmp($userType, "Admin") !== false)){
				$_SESSION['Admin'] = $username;
			}
			if ((strcmp($userType, "Root") !== false)){
				$_SESSION['Root'] = $username;
			} else{
				$_SESSION['Ex'] = $username;
			}
		}
	}
	public function logout(){
		if(isset($_SESSION['valid_user']) || isset($_SESSION['Admin']) || isset($_SESSION['Root']) || isset($_SESSION['Ex'])) {
   			unset($_SESSION['valid_user']);
			unset($_SESSION['Admin']);
			unset($_SESSION['Root']);
			unset($_SESSION['Ex']);  
   			session_destroy();
    		$page = 'index';
    		header('Location:index.php?page="index"');
 		}
	}
	public function addBulletins(){
		$db2 = $this->conn;
		$sql = "SELECT * FROM Bulletin";
		$result = $db2->query($sql);
		while ($row = $result->fetch_array()){
			$id = $row['id'];
			$subject = $row['subject'];
			$message = $row['message'];
			$time = $row['time'];
			$date = $row['date'];
			$from = $row['_from'];
			$b = new Bulletin($id,$subject,$message,$time,$date,$from,$db2);
			$this->bulletins[$id] = $b;
		}
	}
	public function getAllFromBulletin($website){
		$result = "";
		foreach($this->bulletins as $i){
			$result = $result.$i->get($website);
		}
		return $result;
	}
	public function addCafes(){
		$db2 = $this->conn;
		$sql = "SELECT * FROM Cafes";
		$result = $db2->query($sql);
		while ($row = $result->fetch_array()){
			$id = $row['id'];
			$name = $row['name'];
			$address = $row['address'];
			$b = new Cafe($id,$name,$address);
			$this->cafes[$id] = $b;
		}
	}
	public function addUsers(){
		$db2 = $this->conn;
		$sql = "SELECT * FROM Users";
		$result = $db2->query($sql);
		while ($row = $result->fetch_array()){
			$id = $row['id'];
			$name = $row['name'];
			$address = $row['address'];
			$b = new Cafe($id,$name,$address);
			$this->cafes[$id] = $b;
		}
	}
	public function getCafe($id){
		return $this->cafes[$id];
	}
	public function getCafeNames(){
		$result = "";
		foreach($this->cafes as $c){
			$result = $result.$c->name."<br />";
		}
		return $result;
	}
}
?>