let locationButton = document.getElementById('locationButton');
locationButton.addEventListener( 'click', () => {
    if ( "geolocation in navigator" ){
        navigator.geolocation.getCurrentPosition( function (position) {
            var apikey = '0a056a691dd14afc9a3ef1cbcbfedec1';
            const {latitude, longitude} = position.coords;
            var api_url = 'https://api.opencagedata.com/geocode/v1/json';
            var request_url = api_url
                + '?'
                + 'key=' + apikey
                + '&q=' + encodeURIComponent(latitude + ',' + longitude)
                + '&pretty=1'
                + '&no_annotations=1';

            var request = new XMLHttpRequest();
            request.open( 'GET', request_url, true);
            request.onload = function () {
                if ( request.status == 200 ){
                    var data = JSON.parse( request.responseText );
                    console.log(data);
                    console.log( data.results[0].formatted );
                    console.log(data.results[0].components.postcode);
                    let postcode = data.results[0].components.postcode;

                }
            };

            request.send();

        });
    } else {
        console.log('fail');
    }
});