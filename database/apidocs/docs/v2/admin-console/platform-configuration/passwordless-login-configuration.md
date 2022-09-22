#Passwordless Login Configuration

To Configure Passwordless Login, navigate to your LoginRadius <a href = https://adminconsole.loginradius.com/ target=_blank>**Admin Console**</a> from the top header select **Platform Configuration** and under **Authentication Configuration** select **Passwordless Login**. Here, On the left-hand panel you will be provided with two different options **Passwordless Login with Email** and **Passwordless Login with OTP**.

##Passwordless Login with Email

When using Passwordless Login with Email, a verification email gets sent to the user's email address and on click of the link included in the verification email, the user is logged into the account. Follow below steps to configure Passwordless Login with Email settings:

1. Click on Passwordless Login with Email settings and fill up 'Request Limit', 'Request disabled period' and 'Passwordless login email token validity limit'.
   <br><br>![](https://apidocs.lrcontent.com/images/ac1_42235e931570cb4805.12612726.png)
2. Select the Email template that you would like to manage and can perform actions such as 'Add Template','Edit Template','Send Test Email' and 'Delete Template'.
   <br><br>![Passwordless-Email-Template](https://apidocs.lrcontent.com/images/8--Passwordless-Email-Template_1507763025b94206084.04962289.png "Passwordless-Email-Template")

##Passwordless Login with OTP

1. Click on Passwordless Login with OTP settings and fill up 'Request Limit', 'Request disabled period' and 'Passwordless login OTP validity limit'.
   <br><br>![](https://apidocs.lrcontent.com/images/ac3_192385e9315ce249905.98556117.png )
2. Select the SMS template that you would like to manage and can perform actions such as 'Add Template','Edit Template' and 'Delete Template'.
   <br><br>![](https://apidocs.lrcontent.com/images/ac4_262495e9315eee1f6f6.69094428.png)

Each of the available email/SMS templates has corresponding settings that can be configured to control the usage and mitigate malicious requests.

- REQUEST LIMIT- The Request Limit is the number of times a user can request a given email/OTP during the request period (in minutes) before this feature is temporarily disabled. For example, a user can only request this email 5 times (Request Limit) over the course of 120 minutes (Request Period) before the feature is disabled.
- REQUEST AND DISABLED PERIOD- The amount of time (in minutes) that the given email/OTP request feature remains disabled for the user once they have reached their Request Limit.
- VALIDITY LIMIT- The amount of time (in minutes) for which the link/OTP included in the given email/SMS is valid.
