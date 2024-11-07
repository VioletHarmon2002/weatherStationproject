
CREATE DATABASE WeatherStation;
USE WeatherStation;


CREATE TABLE Sensors (
    sensor_id INT AUTO_INCREMENT PRIMARY KEY,
    sensor_name VARCHAR(50) NOT NULL,
    sensor_type VARCHAR(50) NOT NULL
);


CREATE TABLE EnvironmentData (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sensor_id INT,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    temperature FLOAT,
    humidity FLOAT,
    light_level INT,
    FOREIGN KEY (sensor_id) REFERENCES Sensors(sensor_id)
);


CREATE TABLE DeviceState (
    id INT AUTO_INCREMENT PRIMARY KEY,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    red_led BOOLEAN,
    blue_led BOOLEAN,
    button_state BOOLEAN
);


CREATE TABLE TimeLogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    formatted_time VARCHAR(8)
);