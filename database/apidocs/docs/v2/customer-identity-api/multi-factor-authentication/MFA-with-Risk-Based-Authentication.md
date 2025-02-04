# MFA with Risk Based Authentication

## Overview

Risk-Based authentication is also sometimes referred to as adaptive authentication because actions taken in this type of authentication are completely based on the certain events which get triggered based on the consumer's action. This feature uses a set of information to determine if the consumer’s behavior is different relative to their past activity and triggers the additional actions at the LoginRadius end. To know more about RBA, kindly visit our detailed document [here](https://www.loginradius.com/legacy/docs/api/v2/admin-console/platform-security/risk-based-auth/#risk-based-auth).

This document will take you through the process and knowledge of MFA with Risk-Based Authentication. It covers everything you need to configure this on your LoginRadius account and deploy it onto your web application for implementing the Risk-Based Authentication as an additional layer of security on top of Second Factor Authentication to allow secure user authentication. 

## How does it work?

You can configure the **Browser**, **City**, **Country**, **IP address** or **Device** of the customer's login as a risk factor in the Admin Console by navigating [Platform Security > Risk Based Authentication > RBA Settings](https://adminconsole.loginradius.com/platform-security/multi-layered-security/risk-based-authentication/rba-settings) section. You can enable the notification settings to **Admin** and **Consumer**.

> **Note:** The RBA with the MFA feature is not offered by default. This needs to be enabled from the LoginRadius operation team from the backend.To reach out the LoginRadius Support click [here](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket). 

To understand this, let's see the working of **RBA with Multi Factor authentication** through below given points:

1. A consumer will log in to his/her account using valid credentials.

2. After login he/she will be prompted to complete second factor authentication using the various configured MFA Methods. 

3. At this stage, LoginRadius will compare the configured risk factors (i.e.Browser, City, Country, IP address and Device) with the previous consumer’s behaviour. For example: If the consumer has set Country as a risk factor then LoginRadius will compare the country value to check the risk. 

4. If all factors match with each other, LoginRadius will predict it as a known (valid) request. In this case no actions will get executed and the consumer will be logged in.

5. If a factor does not match with the current factor, it will be considered as an unknown request and a notification email will be sent to the consumer and/or admin based on the configured settings under the Risk Based authentication in the Admin console. The email will notify the consumer and/or Admin that someone has logged in from the different risk factors e.g. Browser. 

  > **Note:** If all the five risk factors are configured by the consumer, then the verification order will be **Device > Browser > City > Country > IP**
  

## Flow Diagram

This flow diagram shows the working of Risk Based Authentication workflow with MFA in a most simplified manner. 

![RBA flow chart](https://apidocs.lrcontent.com/images/RBA-flow_251666102616289b879-97744838-1_148520117965bc93fd7a9eb5.38377724.png "RBA with MFA")


# RBA Configuration with MFA via Admin Console

Refer to the following document [here](https://www.loginradius.com/legacy/docs/api/v2/admin-console/platform-security/multi-factor-auth/) for how to configure MFA settings in the Admin Console. 

Below are the step by step instructions to add RBA on the top of MFA feature in the Admin console:

1. Log in to your LoginRadius Admin Console and navigate to [Platform Security > Multi-Layered Security > Risk Based Authentication](https://adminconsole.loginradius.com/platform-security/multi-layered-security/risk-based-authentication/rba-settings). On the left-hand panel, you will be provided with the supported **RBA Settings**.

2. **Toggle** the switch corresponding to the available risk factor options to **enable** them. Accordingly, the risk criteria for **City**, **Country**, **IP**, **Browser** and **Device** will then be displayed. Here is a quick snapshot of the Risk-Based Authentication configuration in your LoginRadius user account.

  ![Step 1](https://apidocs.lrcontent.com/images/Step-1_1312464252651e521929af05.96200837.png "Step 1")

3. These are a predefined list of risk factors where you can configure one or more factors. Currently, LoginRadius is  supporting the following risk factors: **City, Country, Browser, IP** and **Device**.

4. To configure any of the above shown risk factors, Click on the **Edit** button (Pencil icon), modify required fields and click **SAVE**.

  ![Step 3](https://apidocs.lrcontent.com/images/Step-3_276185980651e5a6f74f2e9.47745436.png "Step 3")

You can use multiple options provided under each section as per your requirements. These options are:

1.**On the basis of number of days :** When this option is selected, LoginRadius preserves the details for the entered number of days. After that, information is expired. For example: If a consumer successfully logs in from a different city, the city information will be valid till the number of days set. After that if a login is detected from a similar location it will be again treated as a risk criteria.

2.**On the basis of number:** When this option is enabled, LoginRadius preserves the detail of that event in a list.

3.**Actions:** Set action to None. When adding RBA on top of MFA, LoginRadius only allows sending notifications to the Admin and/or consumer. No other actions are allowed in this workflow. 

4.**Notification:** Using this option you can configure who can receive the notification whenever a risk criteria is met.

## Multi factor Settings:
This section is not applicable when you are adding the RBA feature on top of the MFA feature. 

## Admin Email

If the consumer's behaviour matches with the configured risk criteria, you can send a notification email to the administrators. For that you need to add emails of admins who will receive notifications whenever RBA is triggered in the[ Admin Console](https://adminconsole.loginradius.com/platform-security/multi-layered-security/risk-based-authentication/admin-email). Multiple emails can be added under this section.

![enter image description here](https://apidocs.lrcontent.com/images/RBA-image-4_17019610264ec3b0df6.84290074.png "enter image title here")

## Email Templates

This section allows you to customize the email which will be sent to the customers and admins whenever any risk based event is detected. Multiple email templates can be added under this section.

![enter image description here](https://apidocs.lrcontent.com/images/RBA-image-5_1052861026542e99b74.06145917.png "enter image title here")

  - Click on the **drop down** tool and select the event for which you want to customize the email template. You can have different email templates for each event separately. Below image shows configuration for **City** event. Similarly, email templates for all other events can be configured.


  ![enter image description here](https://apidocs.lrcontent.com/images/RBA-image-6_28609610265a3b8b216.15257531.png "enter image title here")

>**Note:** The email template for the Risk Identified Email To Admin can be edited but it cannot have a new template added other than the default template.

![enter image description here](https://apidocs.lrcontent.com/images/RBA-Image-7_243516102660857df46.93777514.png "enter image title here")
