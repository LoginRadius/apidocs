# SMS Workflow Overview

The LoginRadius SMS workflow is the process in which the LoginRadius API retrieves the message and based on that it generates the OTP. Then makes calls to the configured SMS provider to send the message and OTP to the end user. For more details about the SMS workflow please refer to [**here**](/authentication/concepts/sms-communication/).

## SMS Provider Configuration

In order to send out SMS messages from your SMS provider, you will need to configure your SMS provider setting in the Admin Console.

To configure them you can Navigate to your LoginRadius  [**Admin Console ➔ Platform Configuration ➔ Identity Workflow ➔ Communication Configuration**](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/communication-configuration/email-configuration), click on the third tab called "SMS Configuration".

On this page you can update your configured Provider details in the Admin Console. To know about the provider we support and how to configure them you can refer [**here**](/api/v2/admin-console/platform-configuration/communication-configuration/sms/providers/twilio-configuration/).


## Global SMS Settings

LoginRadius provides multiple SMS Templates such as, Phone Number verification, Phone Number Change, Password Reset, Welcome SMS that will be sent to customers based on the different events and you can customize the settings of any SMS Template like type of OTP, OTP limit, etc. For more details about Global SMS setting kindly refer [**here.**](/authentication/concepts/sms-communication/#partglobalsmssettings0)

## SMS Template Settings

As we know that LoginRadius supports different-different types of SMS template. So, LoginRadius also provides the way through which you can customize each SMS template as per your requirement and also you customize the setting for each SMS template individually. To know how to do this please see this [**document**](/authentication/concepts/sms-communication/#partsmstemplatesettings1).

