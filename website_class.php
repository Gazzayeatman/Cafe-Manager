<?php
include "div_class.php";
include "link_class.php";

class Website {
	public $name;
	public $head;
	public $title;
	public $style;
	public $body;
	public $topLinks = array();
	public $divs = array();
	public $rows = array();
	
	public function __construct($name,$head,$title,$style){
		$this->name = $name;
		$this->head = $head;
		$this->title = $title;
		$this->style = $style;
		$this->body = "";
	}
	public function addDiv($id,$value){
		$this->divs[$id] = $value;
	}
	public function addRow($id,$value){
		$this->rows[$id] = $value;
	}
	public function addLink($id,$hyperlink){
		$this->topLinks[$id] = $hyperlink;
	}
	public function addBulletin($id, $bulletin){
		$this->bulletins[$id] = $bulletin;
	}
	public function createDiv($id,$class,$value,$website){
		$newDiv = new Div($id,$class,$value,$website);
	}
	public function createHyperLink($id,$class,$name,$link){
		$newLink = new HyperLink($id,$class,$name,$link,$this);
	}
	public function getDiv($key){
		if (isset($this->divs[$key])){
			return $this->divs[$key];
		} else {
			throw new KeyInvalidException("Invalid Key $key");
		}
	}
	public function getRow($key){
		if (isset($this->rows[$key])){
			return $this->rows[$key];
		} else {
			throw new KeyInvalidException("Invalid Key $key");
		}
	}
	public function getLink($key){
		if (isset($this->topLinks[$key])){
			return $this->topLinks[$key];
		} else {
			throw new KeyInvalidException("Invalid Key $key");
		}
	}
	public function getDivContentByKey($key){
		if (isset($this->divs[$key])){
			return $this->divs[$key]->returnDiv();
		}
	}
	public function getModalContentByKey($key){
		if (isset($this->divs[$key])){
			return $this->divs[$key]->returnModalDiv();
		}
	}
	public function addContentToDiv($key,$content){
		if (isset($this->divs[$key])){
			$this->divs[$key]->content = $content;
		}
	}
	public function addContent($newContent){
		$this->body = $this->body.$newContent;
	}
	public function initialiseHyperlinks(){
//------Creating the buttons for the functions
	$this->createHyperLink("signIn","btn btn-primary pull-right","Sign In","index.php?function=login");
	$this->createHyperLink("signOut","btn btn-primary pull-right","Logout","index.php?function=Logout");
//------Creating links for the pages
	$this->createHyperLink("accountManager","btn btn-primary pull-right","Account Manager","index.php?page=accountManager");
	$this->createHyperLink("roster","btn btn-block","Roster","index.php?page=Roster");
	$this->createHyperLink("myDetails","btn btn-block","MyDetails","index.php?page=myDetails");
	$this->createHyperLink("myAvaliability","btn btn-block","My Avaliability","index.php?page=MyAvability");
	$this->createHyperLink("timeOff","btn btn-block","Time Off","index.php?page=timeOff");
	$this->createHyperLink("changeAvaliability","btn btn-block","Change My Avaliability","index.php?page=changeAvalibility");
	$this->createHyperLink("mail","btn btn-primary pull-right","Mail Center","index.php?page=Mail");
	}
	
	public function getHyperlink($id){
		$i = $this->getLink($id);
		return $i->returnLink();
	}
	
	public function getModalLink($id){
		$i = $this->getLink($id);
		return $i->returnGenericModalLink($id);
	}
	
	public function returnTopLinksByPrivelage(){
		if (isset($_SESSION['valid_user'])){
			// User Links
			$aAccountManager = $this->getHyperLink("accountManager");
			$aMail = $this->getHyperLink("mail");
        	return $aAccountManager.$aMail;
    	}
   		if (isset($_SESSION['Admin'])){
			//Admin Links
			$aAccountManager = $this->getHyperLink("accountManager");
			$aMail = $this->getHyperLink("mail");
        	return $aAccountManager.$aMail;
    	}
    	if (isset($_SESSION['Root'])){
			//Root Links
			$aAccountManager = $this->getHyperLink("accountManager");
			$aMail = $this->getHyperLink("mail");
        	return $aAccountManager.$aMail;
    	} 
    	if (isset($_SESSION['Ex'])){
        	return null;
    	} else {
     	   	return null;
    	}
	}
	
	public function returnAccountManagerSideLinks(){
		if (isset($_SESSION['valid_user'])){
			// User Links
			$aRoster = $this->getHyperLink("roster");
			$aMyDetails = $this->getHyperLink("myDetails");
			$aMyAvaliability = $this->getHyperLink("myAvaliability");
			$aChangeAvaliability = $this->getHyperLink("changeAvaliability");
			$aTime = $this->getHyperLink("timeOff");
        	return $aRoster.$aMyDetails.$aMyAvaliability.$aChangeAvaliability.$aTimeOff;
    	}
   		if (isset($_SESSION['Admin'])){
			//Admin Links
			$aRoster = $this->getHyperLink("roster");
			$aMyDetails = $this->getHyperLink("myDetails");
			$aMyAvaliability = $this->getHyperLink("myAvaliability");
			$aChangeAvaliability = $this->getHyperLink("changeAvaliability");
			$aTime = $this->getHyperLink("timeOff");
        	return $aRoster.$aMyDetails.$aMyAvaliability.$aChangeAvaliability.$aTimeOff;
    	}
    	if (isset($_SESSION['Root'])){
			//Root Links
			$aRoster = $this->getHyperLink("roster");
			$aMyDetails = $this->getHyperLink("myDetails");
			$aMyAvaliability = $this->getHyperLink("myAvaliability");
			$aChangeAvaliability = $this->getHyperLink("changeAvaliability");
			$aTime = $this->getHyperLink("timeOff");
        	return $aRoster.$aMyDetails.$aMyAvaliability.$aChangeAvaliability.$aTimeOff;
    	} 
    	if (isset($_SESSION['Ex'])){
        	return null;
    	} else {
     	   	return null;
    	}
	}
	
	public function returnWebsite(){
		if(isset($_SESSION['valid_user']) || isset($_SESSION['Admin']) || isset($_SESSION['Root']) || isset($_SESSION['Ex'])){
			$theLink = $this->getLink('signOut')->returnLink();
			$topLinks = $this->returnTopLinksByPrivelage();
		} else {
		//------Setting up the login table
			$loginTable = new Table("login","login-table");
			$loginTable->addData("Username: ");
			$loginTable->addData("<input id='username' name='username' type='text' />");
			$loginTable->addData("&nbsp;");
			$loginTable->commitData();
			$loginTable->addData("Password: ");
			$loginTable->addData("<input id='password' name='password' type='password' />");
			$loginTable->addData("&nbsp;");
			$loginTable->commitData();
			$loginTable->finishTable();
		//------Setting up Sign in Modal
			$signIn = new Modal("signIn","",$this);
			$signIn->constructHeader(1,null,"Sign In");
			$signIn->constructBody(2,null,"<form id='login' action='index.php?function=Login' method='POST'>".$loginTable->returnTable()."");
			$signIn->constructLoginFooter(3,null,"Close");
			$signIn->commitModal();
			$modal = $signIn->getModal();
			$theLink = $this->getModalLink('signIn');
		}	
		echo "
			<!DOCTYPE html>
			<html>
				<head>
					<title>$this->title</title>
					<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'></script>
					<link href=".$this->style." rel='stylesheet' type='text/css'> ".$this->head."
					<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>
					<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js' integrity='sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS' crossorigin='anonymous'></script>
				</head>
				<body>
					<div class='container'>
						<div class='row pad25 nav'>
   							<div class='col-md-4'>
        						<a href='index.php'><h1>".$this->title."</h1></a>
    						</div>
    						<div class='col-md-8'>
        						".$theLink.$topLinks."
    						</div>
						</div>
					</div>
						".$modal."
						$this->body
				</body>
			</html>
			";
	}
}
?>