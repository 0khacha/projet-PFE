from Flask import Flask, render_template
import subprocess

app = Flask(__name__)

@app.route('/')
def index():
    try:
        # Run the Python script and capture its output
        result = subprocess.check_output(['python', 'find_blood.py'], stderr=subprocess.STDOUT).decode('utf-8')
        print(result)  # Print the output for debugging
    except subprocess.CalledProcessError as e:
        print(f"Error running script: {e}")
        result = "An error occurred."

    return render_template('findbloodcentre.html', result=result)

if __name__ == '__main__':
    app.run(debug=True)
