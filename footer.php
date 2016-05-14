<?php
$footer = new BootstrapRow("footer","pad25",$index);
$footer->addCol(1,"col-md-3",$database->getCafeNames(),$index);
$footer->addCol(2,"col-md-9","Footer",$index);
$footer->commitRow();
?>