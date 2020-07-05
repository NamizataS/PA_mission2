let geo = document.getElementById("geo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(redirectToPosition);
    } else {
        geo.innerHTML = "Geolocalisation is not supported by this browser please enter your postcode.";
    }
}

function redirectToPosition( position ) {
    window.location = 'truckAvailable.php?lat=' + position.coords.latitude + '&lng=' + position.coords.longitude;
}






