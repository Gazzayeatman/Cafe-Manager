<?php
    if (isset($_SESSION['valid_user'])){
        $userLinks = $aAccountManager;
    }
    if (isset($_SESSION['Admin'])){
        
    }
    if (isset($_SESSION['Root'])){
        $userLinks = $aAccountManager.$aMail;
    } 
    if (isset($_SESSION['Ex'])){
        	
    } else {
        null;
    }
?>