<?php
if (isset($_SESSION['valid_user']) || isset($_SESSION['Admin']) || isset($_SESSION['Root']) || isset($_SESSION['Ex'])){
    $stores = $database->getCafeNames();
    $footer = new BootstrapRow("footer","pad25",$index);
    $footer->addCol(1,"col-md-3","<h3>Our Stores</h3>".$stores,$index);
    $footer->addCol(2,"col-md-9","",$index);
    $footer->commitRow();
} else {
    $stores = null;
    $footer = null;
}
?>