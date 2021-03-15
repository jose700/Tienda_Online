<!DOCTYPE html>
<html>

<head>
    <title>Local Context Restrictions</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIwzALxUPNbatRBj3Xi1Uhp0fFzwWNBkE&callback=initMap&libraries=localContext&v=beta"
        defer></script>
    <style type="text/css">
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    #map {
        height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    </style>
    <script>
    "use strict";

    var map;

    function initMap() {
        var center = {
            lat: -0.94854403,
            lng: -80.63947409,
        };
        var bigBounds = {
            north: 37.432,
            south: 37.412,
            west: -122.094,
            east: -122.074,
        };
        var localContextMapView = new google.maps.localContext.LocalContextMapView({
            element: document.getElementById("map"),
            placeTypePreferences: ["restaurant"],
            maxPlaceCount: 12,
            locationRestriction: bigBounds,
            directionsOptions: {
                origin: center,
            },
        });
        map = localContextMapView.map;
        new google.maps.Marker({
            position: center,
            map: map,
        });
        map.setOptions({
            center: center,
            zoom: 6,
        });
    }
    </script>
</head>

<body>
    <div id="map"></div>
</body>

</html>