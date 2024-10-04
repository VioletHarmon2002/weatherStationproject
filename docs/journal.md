# Learning journal

13.09.2024

 today i am dealing with dowmloading all the neccessary apps for my Project.
 i had also some problems with mySQl databases today, because i could not connect to it. But i managed to do that.
 I’ve been working on setting up a Docker environment to streamline my development workflow. The process has been both challenging and rewarding, as it involved configuring docker-compose to orchestrate multiple services, such as MySQL.  I encountered several issues, but each challenge has deepened my understanding of Docker and containerization.
 today i am gong to start working on my portflio website and this week my interntions also include to to create a blinking LED on my  Arduino Uno, as it was told in Knowledge base.
 so today most of the time i was working with my terminal, dealing with mySql and Docker, checking my assignments and checking my standart kit.
 i also tried to solder, but i suppose i need to improve it, as i suppose i have not done it correctly in a proper way .


 16.09,2024

 i had a lasercut workshop today, where we were having a tutorial of how to cut properly with laser, using various materials 
 right after explanantion, we tried to make it without teacher help

im still dealing with soldering today, right after this i am going to connect stuff to the WeMOS as see how it goes
i was also thinking about the desigh of my products, i may combine 3d printer and laser cutting for my physical ptoject 
another question of the day is how i can use fusion for prototyping 


19.09.2024

today we had three different presentations, about front-end, back-end and databases
i learnt a few new things about these 3 crucial parts in our projects, so i can impplement everything
i had a problem with connecting my microcontroller to my mac using hub, but eventually it worked, so i could also connect Internet on my WeMos.
i spent some time today to go through all the documentation, especially knowledge base, so i can i deeper understanding in whole structure.


20.09.2024
Today i mostly spending my time on working with front-end in VsCode, especially html and css
moreover, i have accomplished, that i can run my Portfolio Website locally, so it could be serving on http://127.0.0.1:8000/
i have also started working with mySQL workbench, creating sketches of tables
this week i want to continue working on databases, so i could send my work for the feedback.
i have designed two main tables users and time logs.
where user table stores the ssebtial information about each user, including user id identifier
talking about time logs table, where check in and check out times are being tracked.
but more tables are needed to be created for the data.

25.09.2024
today i am finally done with database using phpmyadmin, where i have created database, called time_registration_db with 4 tables: "devices" and "outputs", "sensors" and "statusmessges". 

27.09.2024
today i am dealing with  fritzing designs, creating 3d models for my project. As i chose smart clocks, i had to choose the right materials and components. It may be quite complicated for me, as its the first time i am working with 3d modeling. I also chose details foe my project, but i still need to buy KY-018 (Photo Resistor, KY-040 (Rotary Encoder) 

29.09.2024

today i have created Php connections to my project, so i can use database i have created for my project. however, i am having a huge problem to put my images into my project. i am always having the mistake, which says that Error loading webview: Error: Could not register service worker: InvalidStateError: Failed to register a ServiceWorker: The document is in an invalid state.

30.09.2024

i have noticed a problem, realted to my gitlab project, that when i am pushing changes(photos), it is being updated in my gitlab folders, but not in my IoT - Students' Portfolio. however, i have managed do solve the problem i ahd yesterday with my error. 
today i was also soldering some of my details, How to Use I2C LCD with weMos.


03.09.2024

Today i managed to fix the problem with my LCD screen, so now i am having everything working.
Moreover, i have managed to write the fist program and get an output for it 
For my project, I have successfully set up an I2C LCD with the WeMos D1 Mini. 
I started by downloading the necessary libraries and writing an I2C scanner code to detect the LCD on the I2C bus. 
I connected the D1 pin to SCL and the D2 pin to SDA, using the Wire library to scan for devices on the I2C bus. 
After detecting the LCD at address 0x27, I was able to initialize it and display a custom message. By using the LiquidCrystal_I2C library, I initialized the display, enabled the backlight, and printed several lines of text to verify its operation. 
This setup will allow me to interact with the LCD easily and is a crucial part of my ongoing IoT project.

These images shows part of the code, where i was trying to find the adress of LCD and the output of the program.

![Devices Table](/assets/adress.jpg)
 
![Devices Table](/assets/IMG_57772.png)

The next step I am trying to achieve is to connect my KY-015, which shows humidity and temperature, to my LCD. 
Here is a small part of my code:

![Arduino code](/assets/ky015.jpg)























