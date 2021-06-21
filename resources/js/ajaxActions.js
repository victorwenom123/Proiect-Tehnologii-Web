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
        var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');

        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
        xhr.open('POST', url);
        xhr.onreadystatechange = function() {
            if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
        };
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
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

