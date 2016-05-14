<?php
class BootstrapRow{
    public $id;
    public $divClass;
    public $makeup = array();
    public $result;
    public $website;
    
    public function __construct($id,$class,$website){
        $this->id = $id;
        $this->divClass = 'row '.$class;
        $this->website = $website;
        $website->addRow($id,$this);
    }
    public function addCol($id,$class,$data,$website){
        $col = new Div($id,$class,$data,$website);
        $this->makeup[$id] = $col;
    }
    public function returnRow(){
        return $this->result;
    }
    public function commitRow(){
        $div;
        foreach($this->makeup as $col){
            $div = $div.$col->returnDiv();
        }
       $row = new Div($this->id,$this->divClass,$div,$this->website);
       $this->result = $row;
    }
}
?>