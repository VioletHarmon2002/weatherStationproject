# Database

Thsi document descibes the database structure and relationships used in the Smart Time Regisatration project. The database is being designed to store information related to the devices, sensors, outputs and status messages.

Database structure:

CREATE TABLE Devices (
    device_id INT PRIMARY KEY AUTO_INCREMENT,
    device_name VARCHAR(50) NOT NULL,
    device_type VARCHAR(50) NOT NULL,
    status VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Sensors (
    sensor_id INT PRIMARY KEY AUTO_INCREMENT,
    device_id INT,
    sensor_type VARCHAR(50) NOT NULL,
    sensor_value FLOAT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (device_id) REFERENCES Devices(device_id)
);

CREATE TABLE Outputs (
    output_id INT PRIMARY KEY AUTO_INCREMENT,
    device_id INT,
    output_type VARCHAR(50) NOT NULL,
    output_value VARCHAR(100) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (device_id) REFERENCES Devices(device_id)
);

CREATE TABLE StatusMessages (
    message_id INT PRIMARY KEY AUTO_INCREMENT,
    device_id INT,
    message TEXT NOT NULL,
    received_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (device_id) REFERENCES Devices(device_id)
);


Tables:
1. Devices Table

![Devices Table](images/devices_table.jpg)
2. Sensors Table
img
3. Outputs Table
img
4. StatusMessages Table
img
