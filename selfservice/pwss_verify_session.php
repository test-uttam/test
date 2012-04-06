<?php
    session_start();
    /*
     * check for existing cookie values and requested values
     * If both matches return successful response otherwise return false.
     */
    $strToken = '';
    $strSessionToken = '';
    /*
     * Get requested token.
     */
    if(array_key_exists('token', $_REQUEST)){
        $strToken = base64_decode(trim($_REQUEST['token']));
    }
    /*
     * Get token from session.
     */
    if(array_key_exists('token', $_SESSION)){
        $strSessionToken = base64_decode(trim($_SESSION['token']));
    }
    
    /*
     * Check if token match with session information.
     */
    if($strToken != '' && $strSessionToken != '' &&  $strToken == $strSessionToken){
        $arrData['success'] = true;
    }else{
        $arrData['success'] = false;
    }
    echo $_GET['callback'].'('.json_encode($arrData).')';
?>