# Technical documentation


A system architecture diagram provides a high-level visual representation of the components and their interactions in the Weather Station system. It helps stakeholders and developers understand how different parts—hardware, software, communication protocols, and the database—integrate and function together. 


1. Fritzing Table 
![fritzing Table](/assets/fritzing.jpg)


This BOM details all the components necessary to make the Weather Station project work successfully. All parts listed is necessary for the system to work well since they allow it to display data in real time, adjust according to ambient light and ultimately enable interaction with the user. The table below contains detailed information about each item (part name, manufacturer, description, amount required for the project, price including VAT). 



# Technical Documentation

A system architecture diagram provides a high-level visual representation of the components and their interactions in the Weather Station system. It helps stakeholders and developers understand how different parts—hardware, software, communication protocols, and the database—integrate and function together.

1. Fritzing Table
![Fritzing Table](/assets/fritzing.jpg)

## Bill of Materials (BOM)

The Bill of Materials (BOM) details all the components necessary to make the Weather Station project work successfully. Each part listed is essential for the system to function effectively, allowing it to display data in real-time, adjust according to ambient light, and enable user interaction. The table below provides detailed information about each item, including part name, manufacturer, description, quantity required, price, and additional specifications.

| Part #       | Manufacturer         | Description	                | Quantity | Price (incl. VAT) | Subtotal | Example URL | Tolerance | MTBF | Datasheet URL |
|--------------|----------------------|-----------------------------|----------|-------------------|----------|-------------|-----------|------|---------------|
| ESP8266      | Espressif Systems    | Wi-Fi microcontroller       | 1        | €4.95             | €4.95    | [Link](https://en.wikipedia.org/wiki/ESP8266#:~:text=The%20ESP8266%20is%20a%20low,Espressif%20Systems%20in%20Shanghai%2C%20China.) | N/A       | N/A  | [Datasheet](https://www.espressif.com/sites/default/files/documentation/0a-esp8266ex_datasheet_en.pdf) |
| KY-015       | Kuongshun Electronic | Temperature-Humidity Sensor | 1        | €4.95             | €4.95    | [Link](https://www.az-delivery.de/en/products/dht-11-temperatursensor-modul) | ±5%      | 50,000 hrs | [Datasheet](https://www.az-delivery.de/en/products/dht-11-temperatursensor-modul) |
| KY-018       | Keyes brand          | Photoresistor (LDR)         | 1        | €2.55             | €2.55    | [Link](https://hobbycomponents.com/sensors/160-photoresistive-light-dependent-resistor-module-ky-018#:~:text=Keyes%20brand%20KY%2D018.) | ±10%     | 40,000 hrs | [Datasheet](https://hobbycomponents.com/sensors/160-photoresistive-light-dependent-resistor-module-ky-018#:~:text=Keyes%20brand%20KY%2D018.) |
| LCD Display  | Shenzhen HZY         | 16x2 or 20x4 LCD display    | 1        | €3.45             | €3.45    | [Link](https://nl.mouser.com/ProductDetail/Same-Sky/TS02-66-50-BK-100-LCR-D?qs=A6eO%252BMLsxmQ2%2FFf8jET%252BrA%3D%3D&mgh=1&utm_id=20333439722&gad_source=1&gbraid=0AAAAADn_wf1UQnE0WD25Yx6VCdJBKsSqr&) | ±5%      | 60,000 hrs | [Datasheet](https://nl.mouser.com/ProductDetail/Same-Sky/TS02-66-50-BK-100-LCR-D?qs=A6eO%252BMLsxmQ2%2FFf8jET%252BrA%3D%3D&mgh=1&utm_id=20333439722&gad_source=1&gbraid=0AAAAADn_wf1UQnE0WD25Yx6VCdJBKsSqr&) |
| Push Buttons | Same Sky             | Momentary push buttons      | 1        | €0.10             | €0.10    | [Link](https://nl.mouser.com/ProductDetail/Same-Sky/TS02-66-50-BK-100-LCR-D?qs=A6eO%252BMLsxmQ2%2FFf8jET%252BrA%3D%3D&mgh=1&utm_id=20333439722&gad_source=1&gbraid=0AAAAADn_wf1UQnE0WD25Yx6VCdJBKsSqr&gclid=CjwKCAiAxKy5BhBbEiwAYiW--x6iR72tqx0Uc68A-t8MgzaWLuZagSaLW-0zq6WN1GmP771Ftn7JbhoCE8wQAvD_BwE) | N/A       | 100,000 cycles | [Datasheet](https://nl.mouser.com/ProductDetail/Same-Sky/TS02-66-50-BK-100-LCR-D?qs=A6eO%252BMLsxmQ2%2FFf8jET%252BrA%3D%3D&mgh=1&utm_id=20333439722&gad_source=1&gbraid=0AAAAADn_wf1UQnE0WD25Yx6VCdJBKsSqr&) |
| Jumper Wires | SparkFun             | Jumper wires for connections| 17       | €1.75             | €29.75   | [Link](https://nl.mouser.com/ProductDetail/SparkFun/PRT-12795?qs=WyAARYrbSnZ%2FIrMB64nYgw%3D%3D&mgh=1&utm_id=20333439722&gad_source=1&gbraid=0AAAAADn_wf1UQnE0WD25Yx6VCdJBKsSqr&gclid=CjwKCAiAxKy5BhBbEiwAYiW--zEFP5RHZTkgJUONBrGPEdWuuTav4gOHp9lX0mJq57axL7CYA1FnPxoCJ6sQAvD_BwE) | N/A       | N/A  | [Datasheet](https://nl.mouser.com/ProductDetail/SparkFun/PRT-12795?qs=WyAARYrbSnZ%2FIrMB64nYgw%3D%3D&mgh=1&utm_id=20333439722&gad_source=1&gbraid=0AAAAADn_wf1UQnE0WD25Yx6VCdJBKsSqr&) |
| Breadboard   | AZDelivery           | Prototyping board           | 1        | €3.99             | €3.99    | [Link](https://www.amazon.nl/AZDelivery-Mini-Breadboard-compatibel-Inclusief/dp/B07KKJSFM1/ref=asc_df_B07KKJSFM1/?tag=nlshogostdde-21&linkCode=df0&hvadid=709904968515&hvpos=&hvnetw=g&hvrand=17606101980476706710&hvpone=&hvptwo=&hvqmt=&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=9215103&hvtargid=pla-830808834908&psc=1&mcid=ac3e469720bf3d71aa7c7a2e2454492e&gad_source=1) | N/A       | N/A  | [Datasheet](https://www.amazon.nl/AZDelivery-Mini-Breadboard-compatibel-Inclusief/dp/B07KKJSFM1/ref=asc_df_B07KKJSFM1/?tag=nlshogostdde-21&linkCode=df0&hvadid=709904968515&hvpos=&hvnetw=g&hvrand=17606101980476706710&hvpone=&hvptwo=&hvqmt=&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=9215103&hvtargid=pla-830808834908&psc=1&mcid=ac3e469720bf3d71aa7c7a2e2454492e&gad_source=1) |
| USB-C Cable  | Allteq               | Cable for connection        | 1        | €5.00             | €5.00    | [Link](https://www.allekabels.nl/usb-c-kabel/11518/2259587/usb-c-naar-usb-a-kabel.html?mc=nl-nl&gad_source=1&gbraid=0AAAAAD_j8Rfy6Iau8KUYhDhhyuXYtdDM1&gclid=CjwKCAiAxKy5BhBbEiwAYiW--3D9YmvaGSwT9MmWtxZ8UmtQrc-9oyiOgVMrUVRxUigL9LO0PmoYvxoCF7MQAvD_BwE) | N/A       | N/A  | [Datasheet](https://www.allekabels.nl/usb-c-kabel/11518/2259587/usb-c-naar-usb-a-kabel.html?mc=nl-nl&gad_source=1&gbraid=0AAAAAD_j8Rfy6Iau8KUYhDhhyuXYtdDM1&) |

