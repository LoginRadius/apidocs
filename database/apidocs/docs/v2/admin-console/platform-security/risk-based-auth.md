# Risk Based Authentication

Risk-Based Authentication (RBA) is an additional layer of security used to trigger actions and notifications based on a customer's current behavior relative to their past activity. The customer's location, IP, and browser can be used as parameters to assess potentially risky behavior.

To access the RBA configurations, log in to your LoginRadius account and navigate to [Platform Security > Multi-Layered Security > Risk-Based Authentication](https://adminconsole.loginradius.com/platform-security/multi-layered-security/risk-based-authentication/rba-settings). On the left-hand panel, you will be provided with the supported RBA Settings.

> Note: For further details on implementing Risk-Based Authentication on your site, see [Advanced Customization](/libraries/js-libraries/advanced-js-customizations/#riskbasedauthentication1).

## RBA Settings

Click **"Select to enable"**. Risk criteria for City, Country, IP, and Browser will then be displayed. Here is a quick snapshot of the Risk-Based Authentication configuration in your LoginRadius user account.

![enter image description here](https://apidocs.lrcontent.com/images/171_23951620413928c8637.17344147.png "enter image title here")


Configure the risk criteria settings as per your requirements. If you select "MultiFactor Authentication" in the Actions drop-down, the "Multi-Factor Settings" option shows up in the left-hand panel.

![enter image description here](https://apidocs.lrcontent.com/images/172_972620413b75345e8.11071712.png "enter image title here")


## Multi-Factor Settings

Configure the Multi-Factor Authentication settings. These settings will be used when an MFA action is triggered through RBA.

![enter image description here](https://apidocs.lrcontent.com/images/173_22391620413ded04ea7.45691589.png "enter image title here")

## Admin Email

Add emails of your admins who will receive triggered RBA notifications.

![enter image description here](https://apidocs.lrcontent.com/images/174_3718620413fde56659.17482649.png "enter image title here")

## Email Templates

This section allows you to fully customize the email template that will be sent to customers and admins in case a risk is detected. Please see [Email Template Customization](/api/v2/admin-console/platform-configuration/standard-login/email-templates/#emailtemplatecustomization0) for more details.

![enter image description here](https://apidocs.lrcontent.com/images/175_915620414219ca828.27333292.png "enter image title here")

## SMS Templates

This section allows you to fully customize the SMS template that will be sent to customers in case a risk is detected.

![enter image description here](https://apidocs.lrcontent.com/images/176_1129620414475e32d6.97414600.png "enter image title here")
