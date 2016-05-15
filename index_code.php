<?php
	$index = new Website("index","","Cafe Manager","default.css");
	$index->initialiseHyperlinks();
	$content = "";
	if(isset($_SESSION['valid_user']) || isset($_SESSION['Admin']) || isset($_SESSION['Root']) || isset($_SESSION['Ex'])){
		$latestNews = $database->getAllFromBulletin($index);
	} else {
		$latestNews = null;
		$content = "<h3>Please sign in to use our features</h3>";
	}
//------Content
	$leftContent = new BootstrapRow("leftContent","pad25",$index);
	$leftContent->addCol(1,"col-md-3",null,$index);
	$leftContent->addCol(2,"col-md-6",$content,$index);
	$leftContent->addCol(3,"col-md-3",$latestNews,$index);
	$leftContent->commitRow();
//------Gets the value of the divs
	$divBlankSpace = $index->getDivContentByKey('blankspace');
	$divNavBar = $index->getDivContentByKey($navbar->id);
	$contentDiv = $index->getDivContentByKey($leftContent->id);
	$footerDiv = $index->getDivContentByKey($footer->id);
//------Adds the links to the page	
	$index->createDiv('container',"container","$divNavBar$contentDiv$footerDiv$modal",$index);
	$divContainer = $index->getDivContentByKey('container');
	$index->addContent($divContainer);
?>