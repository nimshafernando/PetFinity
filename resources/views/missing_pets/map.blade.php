<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found Map</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');

        body {
            font-family: 'Fredoka One', cursive;
            background-color: #F7E9DE; /* Albescent White */
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            font-size: 4rem;
            color: #fff;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            background-color: #ff6600;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        h1::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 4px;
            background-color: #F15F61;
            left: 0;
            bottom: -8px;
            border-radius: 5px;
        }

        #map {
            height: 600px;
            width: 100%;
            max-width: 2000px;
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
            border: 5px solid #ff6600; /* Adding a border around the map */
            overflow: hidden;
            margin-top: 20px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px; /* Adding some space between buttons */
            margin-bottom: 20px;
            width: 100%;
            max-width: 800px;
        }

        .btn {
            background-color: #F15F61;
            color: white;
            padding: 15px 0;
            border: none;
            cursor: pointer;
            border-radius: 10px; /* Rounded buttons */
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            min-width: 160px;
        }

        .btn i {
            font-size: 1.2rem; /* Icon size */
            margin-right: 8px;
        }

        .btn:hover {
            background-color: #ff6600;
            transform: scale(1.05); /* Slightly enlarge on hover */
        }

        .btn.active {
            background-color: #ffcc00; /* Active button color */
            color: #333;
        }
/* Beaming Effect for Marker Image (Missing Pets) */
.beaming-marker-missing {
    position: relative;
}

.beaming-marker-missing::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100px;
    height: 100px;
    background-color: rgba(255, 0, 0, 0.3); /* Red beaming effect for missing pets */
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(1);
    animation: beaming 1.5s infinite ease-in-out;
}

/* Beaming Effect for Marker Image (Sighted Pets) */
.beaming-marker-sighted {
    position: relative;
}

.beaming-marker-sighted::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100px;
    height: 100px;
    background-color: rgba(0, 0, 255, 0.3); /* Blue beaming effect for sighted pets */
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(1);
    animation: beaming 1.5s infinite ease-in-out;
}

@keyframes beaming {
    0% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
    }
    100% {
        transform: translate(-50%, -50%) scale(1.5);
        opacity: 0;
    }
}

        

        @keyframes beaming {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
            100% {
                transform: translate(-50%, -50%) scale(1.5);
                opacity: 0;
            }
        }

        .marker-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ff6600;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-bottom: 10px;
            transition: transform 0.3s ease;
        }

        .popup-content {
            text-align: center;
            padding: 10px;
            background: linear-gradient(145deg, #fffbfb, #f7e8e8);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border: 1px solid #ff6600;
            transition: transform 0.3s ease;
        }

        .popup-content:hover {
            transform: scale(1.05);
        }

        .popup-content strong {
            font-size: 1.2rem;
            color: #ff6600;
            display: block;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .popup-content span {
            font-size: 1rem;
            color: #666;
            display: block;
            margin-bottom: 5px;
        }

        .back-button {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #ff6600;
            font-weight: 600;
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background-color: #ff6600;
            color: #fff;
        }

        .back-button i {
            margin-right: 8px;
            font-size: 1.2em;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 3rem;
            }

            .btn {
                padding: 12px 0;
                font-size: 0.9rem;
            }

            .marker-image {
                width: 60px;
                height: 60px;
            }

            .popup-content strong {
                font-size: 1.2rem;
            }

            .popup-content span {
                font-size: 0.9rem;
            }

            .btn-group {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                flex: none;
                width: 100%;
                max-width: none;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 2.5rem;
            }

            .btn {
                padding: 10px 0;
                font-size: 0.8rem;
            }

            .marker-image {
                width: 50px;
                height: 50px;
            }

            .popup-content strong {
                font-size: 1rem;
            }

            .popup-content span {
                font-size: 0.8rem;
            }
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=geometry"></script>
</head>
<body>

<a href="{{ route('pet-owner.dashboard') }}" class="back-button">
    <i class="fas fa-arrow-left"></i> Back to Dashboard
</a>

<h1>Lost and Found Map</h1>

<div class="btn-group">
    <button class="btn active" id="showAll"><i class="fas fa-globe"></i> Show All</button>
    <button class="btn" id="showMissing"><i class="fas fa-paw"></i> Show Missing Pets</button>
    <button class="btn" id="showSightings"><i class="fas fa-binoculars"></i> Show Sightings</button>
    <button class="btn" id="showPetsNearMe"><i class="fas fa-map-marker-alt"></i> Show Pets Near Me</button>
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

            var infowindowContent = `<div class="popup-content">
                                       <div class="beaming-marker-missing">
                                            <img src="{{ Storage::url('${pet.photo}') }}" alt="Pet Photo" class="marker-image">
                                        </div>
                                        <strong>${pet.pet.pet_name}</strong>
                                        <span><strong>Last Seen:</strong> ${pet.last_seen_location}</span>
                                        <span><strong>Date:</strong> ${pet.last_seen_date}</span>
                                        <span><strong>Time:</strong> ${pet.last_seen_time}</span>
                                        <span><strong>Features:</strong> ${pet.distinguishing_features}</span>
                                        ${pet.additional_info ? '<span><strong>Additional Info:</strong> ' + pet.additional_info + '</span>' : ''}
                                     </div>`;

            var infowindow = new google.maps.InfoWindow({
                content: infowindowContent
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

            // Access the pet's name safely
            var petName = "Unknown Pet";
            if (sighting.missing_pet && sighting.missing_pet.pet && sighting.missing_pet.pet.pet_name) {
                petName = sighting.missing_pet.pet.pet_name;
            }

            var infowindowContent = `<div class="popup-content">
                                      <div class="beaming-marker-sighted">
                                            <img src="{{ Storage::url('${sighting.photo}') }}" alt="Sighting Photo" class="marker-image">
                                        </div>
                                        <strong>Sighting of ${petName}</strong>
                                        <span><strong>Location:</strong> ${sighting.location}</span>
                                        <span><strong>Description:</strong> ${sighting.description}</span>
                                     </div>`;

            var infowindow = new google.maps.InfoWindow({
                content: infowindowContent
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
