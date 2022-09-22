General CMS Integrations
===
----

##CMS Social Login Flowchart
![enter image description here](https://apidocs.lrcontent.com/images/cms-social-login-flowchart_990158d129a85e76a3.06814169.png "")



###Overview

This document outlines the flow of Social Login by LoginRadius installed on a content management system(cms). **Note:** Some content management systems may vary.

 </br>


The user starts by initiating a Social Login by clicking on a social provider. The user completes their login process by entering their social provider username and password and submitting the popup.

 
 </br>
 </br>
The users data is retrieved from the social provider and the data is checked for an email address. If an email address is not provided for the social provider data, the user is prompted to enter their email. After an email address is retrieved successfully and the user does not exist from the user temporary data is saved and the user is sent an email for verification.

 </br>
 </br>

 

If an email address has been retrieved from the provider this information is checked against the existing users.

 </br>
 </br>

 
If the user already exists and valid the users data can then be updated and the user can be logged in. If the user is not valid the existing data is deleted and new data is created and a new user is registered.

 </br>

If a user does not exist a new user is created and logged in.