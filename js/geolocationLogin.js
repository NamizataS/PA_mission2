function getLocationLogin() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(redirectToPositionLogin);
    } else {
        geo.innerHTML = "Geolocalisation is not supported by this browser please enter your postcode.";
    }
}

function redirectToPositionLogin( position ) {
    window.location = 'login.php?lat='+position.coords.latitude+'&lng='+position.coords.longitude;
}