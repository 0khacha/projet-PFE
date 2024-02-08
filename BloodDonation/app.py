from flask import Flask, render_template, jsonify

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('frist.html')

@app.route('/get_healthcare_facilities')
def get_healthcare_facilities():
    # Replace this with your logic to fetch healthcare facilities (hospitals, blood donation centers)
    facilities = [
        {'name': 'Hospital 1', 'lat': 37.775, 'lng': -122.415},
        {'name': 'Hospital 2', 'lat': 37.780, 'lng': -122.410},
        {'name': 'Blood Center', 'lat': 37.770, 'lng': -122.420},
    ]
    return jsonify(facilities)

if __name__ == '__main__':
    app.run(debug=True)
