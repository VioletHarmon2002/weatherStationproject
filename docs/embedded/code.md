# Embedded code

1. This code integrates an LCD display, a DHT11 sensor for measuring temperature and humidity, a photoresistor (LDR) for light detection, and an I2C scanner. 
Here is the screenshot from Arduino:

![part of code](/assets/partsofcode.jpeg)

a) Upon startup, the system initializes all components (LCD, DHT11, LDR, and buzzer).
b) The I2C bus is scanned for connected devices, with their addresses printed to the Serial Monitor.
c)In the main loop:
Temperature and humidity are read from the DHT11 sensor and displayed on both the Serial Monitor and LCD.
The photoresistor adjusts the LCD brightness depending on ambient light.









This is not a place to put your code, but to describe the code that you have written. You can describe the code in a general way, but also go into detail on specific parts of the code. You can also refer to the code in your repository. So just add a link to the code in your repository.