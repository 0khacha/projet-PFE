// Function to initialize the map
function initMap() {
  // Default location (Morocco)
  const defaultLocation = { lat: 31.7917, lng: -7.0926 };

  // Create a map with default settings
  const map = new google.maps.Map(document.getElementById('map'), {
    center: defaultLocation,
    zoom: 8,
    mapTypeId: 'roadmap',
  });

  // Try to get the user's location using Geolocation API
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const userLocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };

        // Set the map center to the user's location
        map.setCenter(userLocation);

        // Create a custom marker for the user's location
        const userMarker = new google.maps.Marker({
          position: userLocation,
          map: map,
          title: 'Your Location',
          icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
        });

        // Fetch hospitals or blood donation centers based on the user's location
        fetchHealthcareFacilities(userLocation, map);
      },
      (error) => {
        // If the user denies location access or there's an error, use the default location
        console.error('Error getting user location:', error);
        handleLocationError(defaultLocation, map);
      }
    );
  } else {
    // Browser doesn't support Geolocation, use the default location
    map.setCenter(defaultLocation);
    handleLocationError(defaultLocation, map);
  }

  // Add a button to toggle between map styles
  addMapStyleToggle(map);
}

// Function to handle errors during geolocation request
function handleLocationError(defaultLocation, map) {
  console.error('Geolocation error or denied by the user. Using default location.');

  // Fetch hospitals or blood donation centers using default location
  fetchHealthcareFacilities(defaultLocation, map);
}

// Function to fetch hospitals or blood donation centers based on location
function fetchHealthcareFacilities(location, map) {
  // Replace the following with an actual API call to fetch healthcare facilities
  const apiUrl = `https://api.examplehealthcare.com/facilities?lat=${location.lat}&lng=${location.lng}`;

  // Make an API call to fetch healthcare facilities
  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      // Process the data and add markers to the map for each healthcare facility
      data.forEach(facility => {
        const facilityLocation = { lat: facility.lat, lng: facility.lng };
        let facilityMarkerIcon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';

        // Check the type of facility and set a different icon
        if (facility.type === 'hospital') {
          facilityMarkerIcon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'; // Replace with the path to your hospital icon
        } else if (facility.type === 'blood_donation_center') {
          facilityMarkerIcon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'; // Replace with the path to your blood donation icon
        }

        const facilityMarker = new google.maps.Marker({
          position: facilityLocation,
          map: map,
          title: facility.name,
          icon: facilityMarkerIcon,
        });

        // Add an info window with additional information
        const infoWindow = new google.maps.InfoWindow({
          content: `${facility.name}<br>${facility.address}`,
        });

        facilityMarker.addListener('click', () => {
          infoWindow.open(map, facilityMarker);
        });
      });
    })
    .catch(error => {
      console.error('Error fetching healthcare facilities:', error);
    });
}

// Request the user's location when the page loads
navigator.geolocation.getCurrentPosition(initMap, handleLocationError);
