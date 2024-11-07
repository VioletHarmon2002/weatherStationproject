# Technical Documentation

# Design Decisions

## Backend Technology

The use of PHP as the backend technology for this project because of its ease and multi-purpose programming language. . This project in PHP does the sensor data operation through HTTP methods GET, POST and DELETE. It is the backend that queries the database, processes requests and response back to frontend always in a structured JSON format.

## Frontend Technology

HTML and CSS are used to create a front-end for the weather station dashboard.  Navigation page layout shows sensor data in a table format. JavaScript handles the interactive aspects (fetching, adding and deleting sensor data) In the example, it uses the javascript fetch api to asynchronously (AJAX) calls to update the dashboard without reloading the page.

## Database

For the storage of sensor data, I use MySQL. 

- **Sensors**: Stores information about the various sensors used in the system.
- **EnvironmentData**: Logs the environmental data (temperature, humidity, light level) collected by the sensors.
- **DeviceState**: Keeps track of the state of the device, including the status of LEDs and buttons.


## Data Handling

The data exchange between the frontend and backend is managed through JSON format. When the frontend sends data (e.g., sensor readings) to the backend, it is sent as a JSON object via an AJAX request. T

The form on the frontend collects sensor data from the user and sends it to the backend using a POST request. 

## Challenges
The first time I tried to connect, it gave me a few issues — wrong credentials or database configurations. We fixed this solved by ensuring that the server was correctly configured, and the credentials were right