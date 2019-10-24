const domain = 'http://127.0.0.1/';

$('#submit').on("click", function() {
    var Httpreq = new XMLHttpRequest(); // a new request
    Httpreq.open("GET", domain + 'session.php?username=' + $('#login').val() + '&password=' + $('#pass').val() , false);
    Httpreq.send();
    $(location).attr('href', domain);
});

