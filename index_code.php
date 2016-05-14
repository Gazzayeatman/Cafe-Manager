<?php
	$index = new Website("index","","Cafe Manager","default.css");
	include "hyperlinks.php";
	include "link-privelages.php";
	$content = "";
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
	$signIn = new Modal("signIn","",$index);
	$signIn->constructHeader(1,null,"Sign In");
	$signIn->constructBody(2,null,"<form id='login' action='index.php?function=Login' method='POST'>".$loginTable->returnTable()."");
	$signIn->constructLoginFooter(3,null,"Close");
	$signIn->commitModal();
//------Creating the divs
	if (isset($_SESSION['valid_user']) || isset($_SESSION['Admin']) || isset($_SESSION['Root']) || isset($_SESSION['Ex'])){
			$links = $aSignOut.$userLinks;
			$latestNews = $database->getAllFromBulletin($index);
		} else {
			$links = "$aSignIn";
			$content = "<h3>Please sign in to use the features</h3>";
			$latestNews = null;
		}
//------Header
	include"header.php";
//------Content
	$leftContent = new BootstrapRow("leftContent","pad25",$index);
	$leftContent->addCol(1,"col-md-3",null,$index);
	$leftContent->addCol(2,"col-md-6",$content,$index);
	$leftContent->addCol(3,"col-md-3",$latestNews,$index);
	$leftContent->commitRow();
//------Footer
	include"footer.php";
//------Gets the value of the divs
	$divBlankSpace = $index->getDivContentByKey('blankspace');
	$divNavBar = $index->getDivContentByKey($navbar->id);
	$contentDiv = $index->getDivContentByKey($leftContent->id);
	$footerDiv = $index->getDivContentByKey($footer->id);
	$modal = $signIn->getModal();
//------Adds the links to the page	
	$index->createDiv('container',"container","$divNavBar$contentDiv$footerDiv$modal",$index);
	$divContainer = $index->getDivContentByKey('container');
	$index->addContent($divContainer);
?>