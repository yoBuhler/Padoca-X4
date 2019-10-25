const domain = 'http://127.0.0.1/';

$(document).on('click', '#submit', function () {
    console.log('entrou');
    //var Httpreq = new XMLHttpRequest(); // a new request
    //Httpreq.open("GET", domain + 'session.php?username=' + $('#login').val() + '&password=' + $('#pass').val(), false);
    //Httpreq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Httpreq.send();

    var username = $('#login').val();
    var pass = $('#pass').val();

    var request = new XMLHttpRequest();
    var url = domain + "session.php";
    var params = "username=" + username + "&password=" + pass;

    request.open('GET', url + '?' + params, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange = function () {
        if (request.readyState === XMLHttpRequest.DONE) {
            if (request.status === 200) {
                var response = JSON.parse(request.response);
                if (response.result) {
                    alert("funfou");
                } else {
                    alert("não funfou");
                }
            }
        }
    };
    request.send(null);

    //$(location).attr('href', domain);
});