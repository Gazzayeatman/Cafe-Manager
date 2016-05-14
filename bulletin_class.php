<?php
    class Bulletin{
        
        public $id;
        public $subject;
        public $message;
        public $time;
        public $date;
        public $from;
    
        public function __construct($id,$subject,$message,$time,$date,$from){
            $this->id = $id;
            $this->subject = $subject;
            $this->message = $message;
            $this->time = $time;
            $this->date = $date;
            $this->from = $from;
        }
        
        public function get($i){
            $footerContent = "
            <p><span class='From'>From: ".$this->from."</span><br />
            <span class='dateTime'>".$this->date." ".$this->time."</span></p>
            ";
            $modal = new Modal($this->id,$this->subject,$i);
            $modal->constructHeader($this->id,null,$this->subject);
            $modal->constructBody($this->id,null,$this->message.$footerContent);
            $modal->constructFooter($this->id,null,"Close");
            $modal->commitModal();
            $result = "
            <h4>".$this->subject."</h4><br />
            <p>".substr($this->message,0,150)."...
            <button type='button' class='news-btn' data-toggle='modal' data-target='#".$this->id."'>See More</button>
            </p>".$footerContent."".$m = $modal->getModal()."
            ";
            $news = new BootstrapRow("Bulletin",null,$i);
            $news->addCol(1,"col-xs-12",$result,$i);
            $news->commitRow();
            $a = $i->getDivContentByKey($news->id);
            return $a;
        }
    }
?>