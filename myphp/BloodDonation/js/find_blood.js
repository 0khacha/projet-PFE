var map;
var userMarker;

// Function to initialize the map
function initMap() {
    const defaultLocation = { lat: 34.0209, lng: -6.8416 };
    map = new google.maps.Map(document.getElementById('map'), {
        center: defaultLocation,
        zoom: 14,
    });

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };

                map.setCenter(userLocation);

                userMarker = new google.maps.Marker({
                    position: userLocation,
                    map: map,
                    title: 'Your Location',
                    icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                });

                // Fetch and indicate the nearest hospitals
                fetchNearestCentre(userLocation);
            },
            (error) => {
                console.error('Error getting user location:', error);
                handleLocationError(defaultLocation);
            }
        );
    } else {
        map.setCenter(defaultLocation);
        handleLocationError(defaultLocation);
    }
}

// Function to search for a city
function searchCity() {
    var cityInput = document.getElementById('cityInput').value;

    // Use OpenCage Geocoding API to get the coordinates of the city
    var apiKey = '716230100398465caa53d22bc4fa133b';
    var geocodingUrl = `https://api.opencagedata.com/geocode/v1/json?q=${encodeURIComponent(cityInput)}&key=${apiKey}`;

    fetch(geocodingUrl)
        .then(response => response.json())
        .then(data => {
            if (data.results && data.results.length > 0) {
                var location = data.results[0].geometry;

                map.setCenter({ lat: location.lat, lng: location.lng });
                
                if (userMarker) {
                    userMarker.setPosition({ lat: location.lat, lng: location.lng });
                }

                // Add a marker at the city location
                new google.maps.Marker({
                    position: { lat: location.lat, lng: location.lng },
                    map: map,
                    title: cityInput
                });

                // Fetch and indicate the nearest hospitals
                fetchNearestCentre({ lat: location.lat, lng: location.lng });
            } else {
                alert('City not found. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            alert('Error fetching data. Please try again.');
        });
}
function getUserLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const userLocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
  
          map.setCenter(userLocation);
  
          if (userMarker) {
            userMarker.setPosition(userLocation);
          }
  
          // Fetch and indicate the nearest hospitals
          fetchNearestCentre(userLocation);
        },
        (error) => {
          console.error('Error getting user location:', error);
          handleLocationError(defaultLocation);
        }
      );
    } else {
      map.setCenter(defaultLocation);
      handleLocationError(defaultLocation);
    }
  }
// Function to handle errors during geolocation request
function handleLocationError(defaultLocation) {
    console.error('Geolocation error or denied by the user. Using default location.');
  
    // Use OpenCage Geocoding API to get the coordinates of the default location
    const apiKey = '716230100398465caa53d22bc4fa133b';
    const geocodingUrl = `https://api.opencagedata.com/geocode/v1/json?q=${defaultLocation.lat}+${defaultLocation.lng}&key=${apiKey}`;
  
    fetch(geocodingUrl)
      .then(response => response.json())
      .then(data => {
        if (data.results && data.results.length > 0) {
          const location = data.results[0].geometry;
  
          map.setCenter({ lat: location.lat, lng: location.lng });
  
          if (userMarker) {
            userMarker.setPosition({ lat: location.lat, lng: location.lng });
          }
  
          // Add a marker at the default location
          new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: map,
            title: 'Default Location'
          });
  
          // Fetch and indicate the nearest hospitals
          fetchNearestCentre({ lat: location.lat, lng: location.lng });
        } else {
          console.error('Default location not found. Please check your OpenCage API key.');
        }
      })
      .catch(error => {
        console.error('Error fetching data:', error);
        alert('Error fetching data. Please try again.');
      });
  }
    

// Function to fetch and indicate the nearest hospitals
function fetchNearestCentre(location) {
    // Your code to fetch and indicate hospitals goes here
    const centres = [
{ name: 'المستشفى العسكري گلميم', lat: 29.00337539486048, lng: -10.046788261997143},
{ name: 'Centre Hospitalier Régional Guelmim', lat: 28.97386653104014, lng: -10.048022890396117 },
{ name: 'Nouveau Hôpital de Guelmim', lat: 29.003777216552265, lng: -10.072778782954629 },
{ name: 'Centre Régional de Transfusion Sanguine - Agadir', lat: 30.550394311692518, lng: -9.333780361066601 },
{ name: 'Projet centre de dhémodialyse', lat: 31.6497611775773, lng: -7.907347146508206 },
{ name: 'Centre régional de transfusion sanguine Marrakech', lat: 31.710267756008864, lng: -7.994090417170356 },
{ name: 'Unité de don du sang مركز التبرع بالدم', lat: 33.34916473312339, lng: -7.499442131193936 },
{ name: 'BLOOD CENTER', lat: 33.58208978068688, lng: -7.6723956381789735 },
{ name: 'مركز تحاقن الدم', lat: 33.576327335097545, lng: -7.582478682238401 },
{ name: 'Centre régional de transfusion sanguine de Casablanca', lat: 33.588680274736994, lng: -7.589528654288033 },
{ name: 'مركز التبرع بالدم', lat: 33.602280100526656, lng: -7.618471990155656 },
{ name: 'المركز الجهوي لتحاقن الدم الرباط', lat: 34.01097712493536, lng: -6.783847210085025 },
{ name: 'دار التبرع بالدم الرباط - centre national de transfusion sanguine rabat', lat: 34.02346938137298, lng: -6.786930883549553 },
{ name: 'Centre De Transfusion Sanguine', lat: 33.93710238308867, lng: -5.446504012907152 },
{ name: 'Regional Blood Transfusion Center', lat: 34.05933613299318, lng: -4.8687208192160165 },
{ name: 'Regionale blood transfusion centre', lat: 32.08797652850822, lng: -4.294255893166267 },
{ name: 'مستشفى الضاحية لقصابي-تسكنان', lat: 28.99926110850908, lng: -10.172000431213382 },
{ name: 'Regional Center Transfusion Sanguine Ouarzazate', lat: 30.925582032263595, lng: -6.916548545745445 },

// Add more hospitals as needed
];


centres.forEach((centre) => {
const centreMarker = new google.maps.Marker({
  position: { lat: centre.lat, lng: centre.lng },
  map: map,
  title: centre.name,
  icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
});

const infoWindow = new google.maps.InfoWindow({
  content: `${centre.name}<br>Address: ${centre.address}`,
});

centreMarker.addListener('click', () => {
  infoWindow.open(map, centreMarker);
});
});

}
const bloodCenters = [
    { name: 'Blood Center 1', address: '123 Main St, Guelmim', phone: '123-456-7890', lat: 28.97386653104014, lng: -10.048022890396117},
    { name: 'Blood Center 2', address: '456 Oak St, Agadir', phone: '987-654-3210', lat: 30.550394311692518, lng: -9.333780361066601 },
    { name: 'Blood Center 3', address: '123 Main St, City1', phone: '123-456-7890', lat: 34.0123, lng: -6.7890 },
    { name: 'Blood Center 4', address: '456 Oak St, City2', phone: '987-654-3210', lat: 34.5678, lng: -7.8901 },
    { name: 'Blood Center 5', address: '123 Main St, City1', phone: '123-456-7890', lat: 34.0123, lng: -6.7890 },
    { name: 'Blood Center 6', address: '456 Oak St, City2', phone: '987-654-3210', lat: 34.5678, lng: -7.8901 },
    { name: 'Blood Center 7', address: '123 Main St, City1', phone: '123-456-7890', lat: 34.0123, lng: -6.7890 },
    { name: 'Blood Center 8', address: '456 Oak St, City2', phone: '987-654-3210', lat: 34.5678, lng: -7.8901 },
    // Add more centers as needed
  ];

  function displayBloodCenters() {
    const centerList = document.getElementById('centerList');
    centerList.innerHTML = ''; // Clear existing list

    bloodCenters.forEach(center => {
      const listItem = document.createElement('li');
      listItem.className = 'centerItem';
      listItem.textContent = `${center.name} - ${center.address} - Phone: ${center.phone}`;
      listItem.onclick = () => showCenterOnMap(center.lat, center.lng);

      centerList.appendChild(listItem);
    });
  }

  function showCenterOnMap(lat, lng) {
    // Your code to show the selected center on the map goes here
    const centerLocation = { lat: lat, lng: lng };
  
    // Example: Center the map and add a marker for the selected center
    map.setCenter(centerLocation);
  
    // Check if the userMarker already exists
    if (userMarker) {
      // If it exists, update its position
      userMarker = new google.maps.Marker({
        position: centerLocation,
        map: map,
        title: 'Selected Center',
        icon: {
            url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png', // Example: Blue marker
            scaledSize: new google.maps.Size(60, 60),
          },
          zoom: 14,
        
      });
      userMarker.setPosition(centerLocation);
   
  }
}
  // Call the function to initially display blood donation centers
  displayBloodCenters();
// Request the user's location when the page loads
initMap();