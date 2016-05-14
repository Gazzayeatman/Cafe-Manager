<?php
$index->createDiv("header","header","<h1>Cafe Manager<h1>",$index);
$divHeader = $index->getDivContentByKey('header');
$index->createDiv("blankspace","blankspace","&nbsp;",$index);
$index->createDiv("navBar","'navbar navbar-nav'","$links",$index);
$navbar = new BootstrapRow('navbar',"pad25",$index);
$navbar->addCol(1,"col-md-4",$divHeader,$index);
$navbar->addCol(2,"col-md-8",$links,$index);
$navbar->commitRow();
?>