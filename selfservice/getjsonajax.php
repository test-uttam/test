<script type="text/javascript" src="jquery.1.6.2.js"></script>
<script type="text/javascript">
    /*
     * Method to get cookie details
     * @param string c_name -cookie name
     */
    function getCookie(c_name){
        var i,x,y,ARRcookies = document.cookie.split(";");
        for ( i = 0; i < ARRcookies.length; i++)
        {
            x = ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
            y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
            x = x.replace(/^\s+|\s+$/g,"");
            if (x == c_name){
                return unescape(y);
            }
        }
    }
   /*
    * Set required variables
    */
   var strPassVerifySessionUrl   = 'http://localhost/Selfservice/SSO/TestFiles/pwss_session.php?callback=?';
   var strModelLoginPageUrl = '/login/index.php';
    $(document).ready(function(){
alert(2);
               /*
                * Send ajax request to verify username and password.
                */
               $.getJSON(
                    strPassVerifySessionUrl, 
                    {
                        username: 'asdf',
                        password: 'asdfas'
                    },
                    function(objResponse) {
                        alert(objResponse.success);
                         //objResponse = jQuery.parseJSON(response);
                         if(null == objResponse || false === objResponse.success){
                             alert('Please check selfservice credentials.');
                             window.location.href = strModelLoginPageUrl;
                         }else{
                             alert('false');
                         }
                    }
               );
         
    });


    
</script>
