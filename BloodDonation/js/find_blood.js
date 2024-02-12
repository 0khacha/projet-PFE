// Function to initialize the map
function initMap() {
  const defaultLocation = { lat: 31.7917, lng: -7.0926 };
  const map = new google.maps.Map(document.getElementById('map'), {
    center: defaultLocation,
    zoom: 12,
    mapTypeId: 'roadmap',
  });

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const userLocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };

        map.setCenter(userLocation);

        const userMarker = new google.maps.Marker({
          position: userLocation,
          map: map,
          title: 'Your Location',
          icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
        });

        // Fetch and indicate the nearest hospitals
        fetchNearestHospitals(userLocation, map);
      },
      (error) => {
        console.error('Error getting user location:', error);
        handleLocationError(defaultLocation, map);
      }
    );
  } else {
    map.setCenter(defaultLocation);
    handleLocationError(defaultLocation, map);
  }

  addMapStyleToggle(map);
}

// Function to handle errors during geolocation request
function handleLocationError(defaultLocation, map) {
  console.error('Geolocation error or denied by the user. Using default location.');
  fetchNearestHospitals(defaultLocation, map);
}

// Function to fetch and indicate the nearest hospitals
function fetchNearestHospitals(location, map) {
  // Replace this array with your own list of hospitals and their coordinates
  const hospitals = [
    { name: 'المستشفى العسكري گلميم', lat: 29.00337539486048, lng: -10.046788261997143},
    { name: 'Centre Hospitalier Régional Guelmim', lat: 28.97386653104014, lng: -10.048022890396117 },
    { name: 'N. Hospital ', lat: 29.003777216552265, lng: -10.072778782954629 },
    // Add more hospitals as needed
  ];

  hospitals.forEach((hospital) => {
    const hospitalMarker = new google.maps.Marker({
      position: { lat: hospital.lat, lng: hospital.lng },
      map: map,
      title: hospital.name,
      icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
    });

    const infoWindow = new google.maps.InfoWindow({
      content: `${hospital.name}<br>Address: ${hospital.address}`,
    });

    hospitalMarker.addListener('click', () => {
      infoWindow.open(map, hospitalMarker);
    });
  });
}

// Request the user's location when the page loads
navigator.geolocation.getCurrentPosition(initMap, handleLocationError);



