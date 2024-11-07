# Database

The database is designed to support an IoT-based weather station application. It stores data from sensors, logs device states, and keeps records of formatted time for specific actions or events.


1. Database structure:

[View the create.database.sql file](docs/database/create.database.sql)


## Database Structure

1. **Sensors**
This table stores information about the different types of sensors used in the weather station.

2. **EnvironmentData**
This table stores the environment data such as temperature, humidity, and light readings from the sensors.

3. **DeviceState**
This table logs the state of the device (LEDs and button state)

4. **TimeLogs**
This table logs the formatted time for the weather station.


## Database Interacture 

When the embedded device sends sensor data, for instance temperature, humidity,light, it is stored in Sensors table. So the web application retrieves data from the database and allows users do view device outputs and status messages on the front-end. 
To interact with the database, I use PHP to send requests and retrieve or insert data


## Database Documentation

For detailed information about the database structure and interactions, please refer to the [ReadMe](docs/database/README.md).





