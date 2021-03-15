<!DOCTYPE html>
<html>

<head>
    <title>Geocoding Service</title>
    <meta charset="utf-8" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIwzALxUPNbatRBj3Xi1Uhp0fFzwWNBkE&callback=initMap&libraries=&v=weekly"
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

    #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
        padding-left: 10px;
    }
    </style>
    <script>
    "use strict";

    function initMap() {
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6,
            center: {
                lat: -0.948722,
                lng: -80.636306,
            },
        });
        var geocoder = new google.maps.Geocoder();
        document
            .getElementById("submit")
            .addEventListener("click", function() {
                geocodeAddress(geocoder, map);
            });
    }

    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById("address").value;
        geocoder.geocode({
                address: address,
            },
            function(results, status) {
                if (status === "OK") {
                    resultsMap.setCenter(results[0].geometry.location);
                    new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location,
                    });
                } else {
                    alert(
                        "Geocode was not successful for the following reason: " + status
                    );
                }
            }
        );
    }
    </script>
</head>

<body>
    <div id="floating-panel">
        <input id="address" type="textbox" value="Jaramijo,El Peñon" />
        <input id="submit" type="button" value="Buscar" />
    </div>
    <div id="map"></div>
</body>

</html>