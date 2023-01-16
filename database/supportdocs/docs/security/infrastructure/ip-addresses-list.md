# IP addresses of LoginRadius services

If your server has firewall protection and you require the IP addresses of LoginRadius services to add to the firewall, refer to the list of LoginRadius IP addresses below.
 
## IP addresses of LoginRadius services include:
- [Service IPs](#serviceips1)
- [Test email IPs](#testemailips2)

### Service IPs
These IPs are used to connect external services to the LoginRadius Platform. These services include SMTP relays to send Email Messages, SMS Gateway to send SMS, 3rd party Integration Connectors, and SSO Federation services.
 
**For high availability on your LoginRadius services, make sure to whitelist all zone's IP addresses.**

|Zone|IP|
|-|-|
|Zone 1| 54.92.157.147 <br> 52.228.29.72|
|Zone 2| 52.0.146.28 <br> 40.76.212.1|
|Zone 3| 18.233.46.237 <br> 52.240.152.148|
|Zone 4| 40.68.221.95|
|Zone 5| 35.177.174.5 <br> 3.8.226.58|
|Zone 6| 18.138.167.131 <br> 18.136.228.214|


> **Note**: We have deprecated the following IPs as on Nov 2019:
- 52.228.29.72
- 40.76.212.1
- 52.240.152.148
- 40.68.221.95.

### Test email IPs
These IPs are used to service the test clients built into the LoginRadius Admin Console. They are used when sending test emails/SMS or configuring your SMTP or Mobile SMS settings.

|Client|IP|
|-|-|
|Mail Test Client|52.240.152.148<br>40.76.212.1<br>52.228.29.72<br>40.68.221.95|