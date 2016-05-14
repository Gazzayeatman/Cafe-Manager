<?php
//------Creating the buttons for the functions
	$index->createHyperLink("signIn","btn-primary pull-right","Sign In","index.php?function=login");
	$index->createHyperLink("signOut","btn btn-primary pull-right","Logout","index.php?function=Logout");
//------Creating links for the pages
	$index->createHyperLink("accountManager","btn btn-primary pull-right","Account Manager","index.php?page=AccountManager");
	$index->createHyperLink("roster","btn btn-block","Roster","index.php?page=Roster");
	$index->createHyperLink("myDetails","btn btn-block","MyDetails","index.php?page=myDetails");
	$index->createHyperLink("myAvaliability","btn btn-block","My Avaliability","index.php?page=MyAvability");
	$index->createHyperLink("timeOff","btn btn-block","Time Off","index.php?page=timeOff");
	$index->createHyperLink("changeAvaliability","btn btn-block","Change My Avaliability","index.php?page=changeAvalibility");
	$index->createHyperLink("mail","btn btn-primary pull-right","Mail Center","index.php?page=Mail");
	
//------Gets the value of the link objects
	$nav1 = $index->getLink("signIn");
	$nav2 = $index->getLink("signOut");
	$nav3 = $index->getLink("accountManager");
	$nav4 = $index->getLink("roster");
	$nav5 = $index->getLink("myDetails");
	$nav6 = $index->getLink("myAvaliability");
	$nav7 = $index->getLink("timeOff");
	$nav8 = $index->getLink("changeAvaliability");
	$nav9 = $index->getLink("mail");
//------Returning the anchor tag
	$aSignIn = $nav1->returnGenericModalLink("signIn");
	$aSignOut = $nav2->returnLink();
	$aAccountManager = $nav3->returnLink();
	$aRoster = $nav4->returnLink();
	$aMyDetails = $nav5->returnLink();
	$aMyAvaliability = $nav6->returnLink();
	$aTimeOff = $nav7->returnLink();
	$aChangeAvaliability = $nav8->returnLink();
	$aMail = $nav9->returnLink();
?>