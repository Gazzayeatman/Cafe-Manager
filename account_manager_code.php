<?php
    $accountManager = new Website("accountManager","","Cafe Manager - Account Manager","default.css");
//------User Details
    $content =  '
        <ul class="userDetails">
            <li>Username: </li><span></span>
            <li>First Name: </li><span></span>
            <li>Last Name: </li><span></span>
            <li>User Type: </li><span></span>
            <li>Phone Number: </li><span></span>
            <li>Address: </li><span></span>
            <li>Cafe: </li><span></span>
        </ul>
        <div class="row">
            <div class="col-xs-2">
                <h3>Avaliability</h3>
            </div>
        </div>
    ';
//------Content
    $accountManager->initialiseHyperlinks();
    $leftContent = new BootstrapRow("leftContent","pad25",$accountManager);
	$leftContent->addCol(1,"col-md-3",null,$accountManager);
	$leftContent->addCol(2,"col-md-9",null,$accountManager);
	$leftContent->commitRow();
//------Gets the value of the divs
    $divBlankSpace = $accountManager->getDivContentByKey('blankspace');
	$divNavBar = $accountManager->getDivContentByKey($navbar->id);
	$contentDiv = $accountManager->getDivContentByKey($leftContent->id);
	$footerDiv = $accountManager->getDivContentByKey($footer->id);
//------Adds the divs to the page 
    $accountManager->createDiv('container',"container","$contentDiv$footerDiv$modal",$accountManager);
	$divContainer = $accountManager->getDivContentByKey('container');
	$accountManager->addContent($divContainer);
?>