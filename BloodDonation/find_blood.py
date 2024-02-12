import googlemaps

def get_user_location(AIzaSyC1ej_S6l7pkeldI9xg09bjifi3_IqDbCQ):
    gmaps = googlemaps.Client(key=AIzaSyC1ej_S6l7pkeldI9xg09bjifi3_IqDbCQ)

    try:
        # Request user's location using IP address
        user_location = gmaps.geolocate()
        return user_location['location']
    except googlemaps.exceptions.TransportError as e:
        print(f"Error getting user location: {e}")
        return None

def fetch_nearest_hospital(api_key, user_location):
    gmaps = googlemaps.Client(key=api_key)

    try:
        # Search for the nearest hospital using Places API
        places_result = gmaps.places_nearby(
            location=user_location,
            radius=5000,  # Adjust the radius as needed
            type='hospital'
        )

        if places_result['status'] == 'OK' and places_result.get('results'):
            nearest_hospital = min(places_result['results'], key=lambda x: x['geometry']['location']['lat'])
            return nearest_hospital
    except googlemaps.exceptions.TransportError as e:
        print(f"Error fetching nearest hospital: {e}")

    return None

def main(api_key):
    user_location = get_user_location(api_key)

    if user_location:
        print(f"User Location: {user_location}")

        nearest_hospital = fetch_nearest_hospital(api_key, user_location)
        if nearest_hospital:
            print(f"Nearest Hospital: {nearest_hospital['name']}, Address: {nearest_hospital['vicinity']}")
        else:
            print("No hospitals found nearby.")
    else:
        print("Failed to retrieve user location.")

if __name__ == "__main__":
    # Replace 'YOUR_API_KEY' with your actual Google Maps API key
    api_key = 'AIzaSyC1ej_S6l7pkeldI9xg09bjifi3_IqDbCQ'
    main(api_key)