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
	public function returnWebsite(){
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
						$this->body
				</body>
			</html>
		";
	}
}
?>