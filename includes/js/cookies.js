function logValue(selectedLanguage) {
    if (selectedLanguage == "") {
        alert("Seleccione un idioma valido en el desplegable.");
        //confirm('You chose option 3, didn\'t you?');
        document.getElementById('my-input-id-min').setAttribute("onclick", "alert('Seleccione un idioma')");
        document.getElementById('my-input-id-yes').setAttribute("onclick", "alert('Seleccione un idioma')");
    } else {
        document.getElementById('my-input-id-min').setAttribute("onclick", "createCookie('acceptCookies', 'min'); createCookie('lenguage', '" + selectedLanguage + "'); $('#exampleModal').modal('hide')");
        document.getElementById('my-input-id-yes').setAttribute("onclick", "createCookie('acceptCookies', 'yes'); createCookie('lenguage', '" + selectedLanguage + "'); $('#exampleModal').modal('hide')");
    }

}






function searchCookies(cname) { //Devuelve si existe (0) o no (1)
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return 0;
        }
    }
    return 1;
}

function getCookie(cname) { // Devuelve el contenido de la cookie o (0) si no existe
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function createCookie(name, value) {
    document.cookie = name + "=" + value + ";path=/";
}

function tester() {
    /*
            $('#exampleModal').modal({
                    backdrop: 'static',
                    keyboard: false
                }) //TODO (luego borrar)
*/
    var d = new Date();
    d.setTime(d.getTime() + (6000));
    document.cookie = "cookieTester=ok;expires=" + d.toUTCString() + ";path=/";
    if (searchCookies("cookieTester") == 0) {
        var ver2 = searchCookies("acceptCookies")
        if (ver2 == 1) {
            $('#exampleModal').modal({
                backdrop: 'static',
                keyboard: false
            })
        }
    }
}