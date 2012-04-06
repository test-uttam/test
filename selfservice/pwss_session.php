<?php
    /*
     * Get Current cookie details.
     */
    $currentCookieParams = session_get_cookie_params();
    /*
     * Set root domain for cookie 
     */
    $rootDomain = '.loomlearning.com';
    session_set_cookie_params(
        $currentCookieParams["lifetime"],
        $currentCookieParams["path"],
        $rootDomain,
        $currentCookieParams["secure"],
        $currentCookieParams["httponly"]
    ); 
    /*
     * Declare response to false
     */
    $arrReturn = array("success"=>false);
    
    /*
     * Start session and setup cookie and session values.
     */
    session_start();
    setcookie('token', trim(base64_encode($_REQUEST['username'])), time() + 180, '/', $rootDomain);
    
    $_SESSION['token'] = trim(base64_encode($_REQUEST['username']));
    $arrReturn['success'] = true;
    /*
     * Return JSON response
     */
    echo json_encode($arrReturn);
?>