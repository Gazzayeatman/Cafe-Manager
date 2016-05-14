<?php
class Modal{
    public $id;
    public $title;
    public $header;
    public $content;
    public $footer;
    public $result;
    public $website;
        
    public function __construct($id,$title,$website){
        $this->id = $id;
        $this->title = $title;
        $this->website = $website;
    }
    public function constructHeader($id, $class, $header){
        $i = $this->website;
        $content = "<button type='button' class='close'".$class." data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>".$header."</h4>";
        $i->createDiv($id,"modal-header ".$class,$content,$i);
        $this->header = $i->getDivContentByKey($id);
    }
    public function constructBody($id, $class, $content){
        $i = $this->website;
        $content = "<p>".$content."</p>";
        $i->createDiv($id, "modal-body ".$class,$content,$i);
        $this->content = $i->getDivContentByKey($id);
    }
    public function constructFooter($id,$class,$text){
        $i = $this->website;
        $content = '<button type="button" class="btn btn-default" data-dismiss="modal">'.$text.'</button>';
        $i->createDiv($id,"modal-footer ".$class, $content,$i);
        $this->footer = $i->getDivContentByKey($id);
    }
    public function constructLoginFooter($id,$class,$text){
        $i = $this->website;
        $content = '
        <p class="login-errors"></p>
        <input class="btn btn-default" type="submit" value="Login"><button type="button" class="btn btn-default" data-dismiss="modal">'.$text.'</button></form>';
        $i->createDiv($id,"modal-footer ".$class, $content,$i);
        $this->footer = $i->getDivContentByKey($id);
    }
    public function commitModal(){
        $i = $this->website;
        $a = $this->header.$this->content.$this->footer;
        $i->createDiv($this->id."content","modal-content",$a,$i);
        $content = $i->getDivContentByKey($this->id."content");
        $i->createDiv($this->id."dialog","modal-dialog",$content,$i);
        $dialog = $i->getDivContentByKey($this->id."dialog");
        $i->createDiv($this->id,"modal fade",$dialog,$i);
        $this->result = $i->getModalContentByKey($this->id);
    }
    public function getModal(){
        return $this->result;
    }
}
?>