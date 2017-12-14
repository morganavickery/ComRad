
//GOOGLE MAPS API
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(35.9121, -79.0512),
        zoom: 15,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    var geocoder = new google.maps.Geocoder;
    var infowindow = new google.maps.InfoWindow;
    var selectedLocation;
    var addressStr;
    google.maps.event.addListener(map, 'click', function (event) {
        selectedLocation = event.latLng;
        placeMarker(map, event.latLng);
        console.log("TAG: LAT:" + selectedLocation.lat() + " LONG:" + selectedLocation.lng());
        console.log("TAG: latlng: " + selectedLocation);
        geocodeLatLng(geocoder, map, selectedLocation);

    });
}
function placeMarker(map, location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    var infowindow = new google.maps.InfoWindow({
        content: 'Address: ' + addressStr
    });
    infowindow.open(map, marker);
}

var addressStr;
function geocodeLatLng(geocoder, map, inputLocation) {
    var latlngArray = [inputLocation.lat(), inputLocation.lng()];
    var latlng = {
        lat: parseFloat(latlngArray[0]),
        lng: parseFloat(latlngArray[1])
    };
    geocoder.geocode({ 'location': latlng }, function (results, status) {
        console.log("TAG: INSIDE GEOCODE");
        console.log(results[0].address_components);
        var address = results[0].address_components;
        addressStr = address[0].short_name;
        for (i = 1; i < address.length; i++) {
            if (i == 2) {
                addressStr = addressStr + ". " + address[i].short_name;
            } else if (i == 4) {
                addressStr = addressStr + " " + address[i].short_name;
            } else {
                addressStr = addressStr + " " + address[i].short_name;
            }
        }
        console.log("STRING:" + addressStr);
    });

}
