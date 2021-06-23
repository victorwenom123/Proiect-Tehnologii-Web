/**
 * Ajax Callbacks
 */

    /**
     *
     * @param url
     * @param data
     * @param success
     * @returns {XMLHttpRequest|any}
     */
    function postAjax(url, data, success) {
        /*if "data" is a string then "params" will take data's value
        else "data" is an array and "params" will take the string that will be created from data's keys annd values */
        var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');
        /*XMLHttpRequest (XHR) objects are used to interact with servers. You can retrieve data from a URL without having
         to do a full page refresh. This enables a Web page to update just part of a page without disrupting what the user is doing.*/
        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
        
        /*Initializes a request.*/
        xhr.open('POST', url);
        /*An event handler that is called whenever the readyState attribute changes*/
        xhr.onreadystatechange = function() {
            /*xhr.responseText returns a DOMString that contains the response to the request as text, 
            or null if the request was unsuccessful or has not yet been sent.*/
            if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }

        };

        /*The XMLHttpRequest method setRequestHeader() sets the value of an HTTP request header. */
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        /*//For application/x-www-form-urlencoded, the body of the HTTP message sent to the server is essentially one giant query string -- 
        name/value pairs are separated by the ampersand (&), and names are separated from values by the equals symbol (=). An example of this would be: */
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        /*The XMLHttpRequest method send() sends the request to the server.*/
        xhr.send(params);
        return xhr;
    }
    /**
     * Checks if the current input is empty or not
     * @param obj
     * @returns {boolean}
     */

    function check_empty(obj) {
        var field = document.getElementById(obj);
        if(field.value === "")
        {
            field.classList.add("warning");
            return false;
        }
        else
        {
            field.classList.remove("warning");
            return true;
        }
    }

/**
 * Login Ajax
 * @param e
 */
document.getElementById('loginAction').onclick = function(e){

        var username = document.getElementById('loginUsername').value;
        var password = document.getElementById('loginPassword').value;


        check_empty("loginUsername");
        check_empty("loginPassword");

        if(check_empty("loginUsername") && check_empty("loginPassword"))
        {
            postAjax(
                "load_ajax.php?file=processLogin",
                "username="+username+"&password="+password+"",function(data){
                    if(data === "1")
                    {
                        window.location.href = "home";
                    }
                    else
                    {
                        document.getElementById('loginMessage').innerHTML = "";
                        document.getElementById('loginMessage').innerHTML = data;
                    }
            });
        }
    }

/**
 * Register ajax
 * @param e
 */
document.getElementById('registerAction').onclick = function(e){

        var username = document.getElementById('registerUsername').value
        var password = document.getElementById('registerPassword').value;
        var repeatPassword = document.getElementById('repeatPassword').value;
        var email = document.getElementById('email').value;
        var firstName = document.getElementById('firstName').value;
        var lastName = document.getElementById('lastName').value;

        check_empty("registerUsername");
        check_empty("registerPassword");
        check_empty("repeatPassword");
        check_empty("email");
        check_empty("firstName");
        check_empty("lastName");


        if(check_empty("registerUsername") && check_empty("registerPassword") && check_empty("repeatPassword") && check_empty("email") && check_empty("firstName") && check_empty("lastName"))
        {
            postAjax(
                "load_ajax.php?file=processRegister",
                "username="+username+"&password="+password+"&repeatPassword="+repeatPassword+"&email="+email+"&firstName="+firstName+"&lastName="+lastName+"",function(data){
                    if(data === "1")
                    {
                        window.location.href = "home";
                    }
                    else
                    {
                        document.getElementById('registerMessage').innerHTML = "";
                        document.getElementById('registerMessage').innerHTML = data;
                    }
                });
        }
    }

