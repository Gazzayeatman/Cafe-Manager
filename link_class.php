<?php
class HyperLink{
	public $id;
	public $divClass;
	public $name;
	public $link;
	
	public function __construct($id,$class,$name,$link,$website){
		$this->id = $id;
		$this->divClass = $class;
		$this->name = $name;
		$this->link = $link;
		$website->addLink($id,$this);
	}
	
	public function returnLink(){
		return "<a class='".$this->divClass."' href=".$this->link." id=".$this->id.">".$this->name."</a>";
	}
	
	public function returnGenericModalLink($id){
		return "<button type='button' class='btn ".$this->divClass."' data-toggle='modal' data-target='#".$id."'>".$this->name."</button>";
	}
}
?>