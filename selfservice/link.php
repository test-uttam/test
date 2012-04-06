<?php session_start();
 //  echo session_id();
//echo session_id();print_r($_COOKIE);?>
<html>
    <head>
    <style type="text/css">
        .linkDiv{
            clear:both;
        }
        .linkDiv a{
            text-decoration:none;
        }
        .form-field{
            clear:both;
            padding:5px 10px;
        }
    </style>
    <script type="text/javascript" src="jquery.1.6.2.js"></script>
    <script type="text/javascript">
    
    var strPassLoginUrl   = '/intel352-loom-lms-nlc-sso-tip/pwss_login.php';
    var strPassSessionUrl = 'pwss_session.php';
    var strCredentialError = 'Login credentials not found. Please login.';
    //strActionUrl = 'http://44wideds2.pointinspace.com/getjson.php?callback=?';
    
    $(document).ready(function(){
        /*
        * Send request to pwss_session.php to create domain level cookie and user session in PHP.
        */
        $('#loomlogin').click(function(){
           /*
            * Get username and password
            * TODO : Update this with self session username and password.
            */
           var strUsername = $.trim($('#username').val());
           var strPassword = $.trim($('#password').val());
           /*
            * Check if username and password is not blank.
            */
           if(strUsername != '' && strPassword != ''){
               $.getJSON(
                    strPassSessionUrl, 
                    {
                        username: strUsername,
                    },
                    function(objResponse) {
                         //objResponse = jQuery.parseJSON(response);
                         if(null != objResponse && true === objResponse.success){
                             window.location.href = strPassLoginUrl;
                         }else{
                             alert('Unable to connect with LOOM LMS');
                         }
                    }
               );
           }else{
               /*
                * Reset login details.
                */
               $('#username').val('');
               $('#password').val('');
               alert(strCredentialError);
           }
       });
    });
    </script>
    </head>
    <body>
    <div id="container"></div>
        <h2> Self Service </h2>
        <div class="form-lebel"> Username: </div>
        <div class="form-field">
            <input  type="text" name="username" id="username" value="" size="20"/>
        </div>
        <div class="form-lebel"> Password: </div>
        <div class="form-field">
            <input  type="text" name="password" id="password" value="" size="20"/>
        </div>
        <div class="linkDiv">
            <a href="javascript:void(0);" id="loomlogin">LOOM Login</a>
        </div>
    </body>
</html>