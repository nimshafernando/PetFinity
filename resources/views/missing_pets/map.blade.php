<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found Map</title>
    <style>
        body {
            font-family: 'Fredoka One', cursive;
            background-color: #F7E9DE; /* Albescent White */
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #ff6600;
            margin-bottom: 20px;
        }

        #map {
            height: 600px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .btn-group {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #F15F61;
            color: white;
            padding: 10px 20px;
            margin: 0 5px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn:hover, .btn.active {
            background-color: #ff6600;
        }

        .marker-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ff6600;
        }

        .popup-content {
            text-align: center;
        }

        .popup-content strong {
            font-size: 1.2rem;
            color: #EA785B;
            display: block;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .btn {
                padding: 8px 15px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.8rem;
            }

            .btn {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=geometry"></script>
</head>
<body>

<h1>Lost and Found Map</h1>

<div class="btn-group">
    <button class="btn active" id="showAll">Show All</button>
    <button class="btn" id="showMissing">Show Missing Pets</button>
    <button class="btn" id="showSightings">Show Sightings</button>
    <button class="btn" id="showPetsNearMe">Show Pets Near Me</button>
</div>

<div id="map"></div>

<script>
    var map;
    var missingPetMarkers = [];
    var sightingMarkers = [];
    var userLocationMarker;

    function initMap() {
        var mapOptions = {
            zoom: 12,
            center: { lat: 6.9271, lng: 79.8612 } // Centered on Colombo, Sri Lanka
        };
        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Missing Pets Markers
        var missingPets = @json($missingPets);

        missingPets.forEach(function(pet) {
            var latLng = new google.maps.LatLng(pet.last_seen_location_latitude, pet.last_seen_location_longitude);

            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                icon: {
                    url: `{{ Storage::url('${pet.photo}') }}`,
                    scaledSize: new google.maps.Size(50, 50),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(25, 25),
                }
            });

            var infowindow = new google.maps.InfoWindow({
                content: `<div class="popup-content">
                            <strong>${pet.pet.pet_name}</strong>
                            <img src="{{ Storage::url('${pet.photo}') }}" alt="Pet Photo" class="marker-image"><br>
                            <span><strong>Last Seen:</strong></span> ${pet.last_seen_location}<br>
                            <span><strong>Date:</strong></span> ${pet.last_seen_date}<br>
                            <span><strong>Time:</strong></span> ${pet.last_seen_time}<br>
                            <span><strong>Features:</strong></span> ${pet.distinguishing_features}<br>
                            ${pet.additional_info ? '<strong>Additional Info:</strong> ' + pet.additional_info : ''}
                          </div>`
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

            missingPetMarkers.push(marker);
        });

        // Reported Sightings Markers
        var sightings = @json($sightings);

        sightings.forEach(function(sighting) {
            var latLng = new google.maps.LatLng(sighting.latitude, sighting.longitude);

            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                icon: {
                    url: `{{ Storage::url('${sighting.photo}') }}`,
                    scaledSize: new google.maps.Size(50, 50),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(25, 25),
                }
            });

            var infowindow = new google.maps.InfoWindow({
                content: `<div class="popup-content">
                            <strong>Sighting of ${sighting.missing_pet_name}</strong>
                            <img src="{{ Storage::url('${sighting.photo}') }}" alt="Sighting Photo" class="marker-image"><br>
                            <span><strong>Location:</strong></span> ${sighting.location}<br>
                            <span><strong>Description:</strong></span> ${sighting.description}
                          </div>`
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

            sightingMarkers.push(marker);
        });

        // Event Listeners for Buttons
        document.getElementById('showAll').addEventListener('click', showAll);
        document.getElementById('showMissing').addEventListener('click', showMissing);
        document.getElementById('showSightings').addEventListener('click', showSightings);
        document.getElementById('showPetsNearMe').addEventListener('click', showPetsNearMe);
    }

    function showAll() {
        clearMarkers();
        showMarkers(missingPetMarkers);
        showMarkers(sightingMarkers);
        setActiveButton('showAll');
    }

    function showMissing() {
        clearMarkers();
        showMarkers(missingPetMarkers);
        setActiveButton('showMissing');
    }

    function showSightings() {
        clearMarkers();
        showMarkers(sightingMarkers);
        setActiveButton('showSightings');
    }

    function showPetsNearMe() {
        clearMarkers();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                console.log("Detected Coordinates:", position.coords.latitude, position.coords.longitude); // Log the coordinates

                userLocationMarker = new google.maps.Marker({
                    position: userLatLng,
                    map: map,
                    title: "You are here",
                    icon: {
                        url: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                    }
                });

                var infowindow = new google.maps.InfoWindow({
                    content: `<div class="popup-content">
                                <strong>Your current location</strong>
                              </div>`
                });

                userLocationMarker.addListener('click', function() {
                    infowindow.open(map, userLocationMarker);
                });

                map.setCenter(userLatLng);

                // Calculate distance to all missing pets and sightings
                calculateDistances(userLatLng);
                setActiveButton('showPetsNearMe');
            }, function(error) {
                console.error("Geolocation failed:", error); // Log any geolocation errors
                alert('Geolocation failed.');
            });
        } else {
            alert('Your browser does not support geolocation.');
        }
    }

    function calculateDistances(userLatLng) {
        missingPetMarkers.forEach(function(marker) {
            var distance = google.maps.geometry.spherical.computeDistanceBetween(userLatLng, marker.getPosition()) / 1000;
            var infowindow = new google.maps.InfoWindow({
                content: `<div class="popup-content">
                            <strong>Distance:</strong> ${distance.toFixed(2)} km
                          </div>`
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        });

        sightingMarkers.forEach(function(marker) {
            var distance = google.maps.geometry.spherical.computeDistanceBetween(userLatLng, marker.getPosition()) / 1000;
            var infowindow = new google.maps.InfoWindow({
                content: `<div class="popup-content">
                            <strong>Distance:</strong> ${distance.toFixed(2)} km
                          </div>`
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        });
    }

    function clearMarkers() {
        missingPetMarkers.forEach(function(marker) {
            marker.setMap(null);
        });
        sightingMarkers.forEach(function(marker) {
            marker.setMap(null);
        });
        if (userLocationMarker) {
            userLocationMarker.setMap(null);
        }
    }

    function showMarkers(markers) {
        markers.forEach(function(marker) {
            marker.setMap(map);
        });
    }

    function setActiveButton(buttonId) {
        var buttons = document.querySelectorAll('.btn');
        buttons.forEach(function(btn) {
            btn.classList.remove('active');
        });
        document.getElementById(buttonId).classList.add('active');
    }

    google.maps.event.addDomListener(window, 'load', initMap);
</script>
</body>
</html>
