# PIN Authentication Overview

**PIN Authentication** feature allows the customer to set a PIN in addition to the password during registration or login. Later, during the subsequent logins for authentication or re-authentication, the application requests the same PIN in addition to the password. You can also request PIN while performing the particular action(s) in the application.

This is not a stand alone authentication feature i.e. will always require the first level authentication feature in place to work with it.

The Password and PIN authentications use two separate tokens, which helps in managing the multiple use cases. The password authentication uses the Access Token, and PIN authentication uses the Session Token.

For example, the customer first enters the username and password at the initial level of authentication, and then the customer can set the PIN at the pre-configured event.  Later, when the customer visits the application, the customer only needs to enter the PIN (until the session token is expired). Once the session token expires, the application looks for an access token and:

- If the access token is expired, your customer needs to authenticate itself first with username and password and then with the PIN.
- If the access token is not expired, your customer will only need to authenticate itself with the PIN.

> Note: In this case, the **access token** and a **session token** are returned on login through username and password (or another authentication method). Then the **session token** is used for PIN APIs and it’s related functionalities.                 

When enabling PIN Authentication on your LoginRadius account, you can decide to keep the PIN setup as **Optional** or **Mandatory**. Depending on which one you choose, it will have an impact on your PIN workflows. For more details, refer to the configuration section.

The following displays the flow of PIN setup and working for the account:

![](https://apidocs.lrcontent.com/images/PIN-Functional-Flow_71305eac46fce5c339.84048503.png)


The following displays the functional flow of the PIN Authentication.

![](https://apidocs.lrcontent.com/images/PA2_84905eac438ce4b9c7.46334296.png)


The following explains the working of the above sequence diagram:



1. The application generates the PIN login interface to initiate the feature.
2. Your customer logs in via the LoginRadius API call. The API returns an **access token** and a **session token**.
3. The returned access token is used to authenticate your customer with the **Login by PIN API** and request access to customer’s data. This request is validated further and upon validation returns with customer’s data.
4. From the retrieved data, the application parse the customer's ID and UID.
5. The application sends the customer’s ID and UID as a request in the API call, which is validated further and upon validation returns a JSON object.
6. The application uses the returned JSON object in login through PIN.


# PIN Authentication Guide
This guide will take you through the process to set up and implement PIN Authentication. It covers everything you need to know on how to configure PIN Authentication in the LoginRadius Identity Platform and deploy it onto your web application. 

> Pre-requisites:
> - PIN Authentication feature should be enabled on your account.   
>- Basic knowledge of  HTML and JavaScript.                  

## Enable PIN Authentication

Log in to your [Admin Console](https://adminconsole.loginradius.com/) account and navigate to [Platform Security > Multi-Layered Security > PIN Authentication](https://adminconsole.loginradius.com/platform-security/multi-layered-security/pin-authentication).

The following screen will appear (if PIN Authentication feature is enabled for your plan):

![](https://apidocs.lrcontent.com/images/PA3_132345eac43a48ddce1.68195178.png)

If it is not enabled, raise an enable request to the LoginRadius Support Team.

## Part 1:  Configuration

This section covers the required configurations that you need to perform in the LoginRadius Admin Console to allow your customer to set a PIN for their account. 


**Step 1:** Add a PIN field to your registration form. To do so, navigate to the [Platform Configuration > Authentication Configuration > Standard Login > Data Schema](https://adminconsole.loginradius.com/platform-configuration/authentication-configuration/standard-login/data-schema) and add PIN field from the Default FIelds list.

The following screen displays the added PIN field to the registration form schema:

![](https://apidocs.lrcontent.com/images/PA4_121805eac43b76036a9.46469414.png)


> Note: Depending on your desired use case, set the PIN field as required or optional in the Advanced tab. 
>- **Required**: If you require your customers to set and use the PIN for their account.
>- **Optional**: If you want to keep it optional for your customers to set and use the PIN for their account.

**Step 2:** Now, to configure your PIN Authentication, navigate to [Platform Security > Multi-Layered Security > PIN Authentication](https://adminconsole.loginradius.com/platform-security/multi-layered-security/pin-authentication) and turn on the toggle button to enable the feature.

The following screen highlights the toggle button to enable the PIN Authentication:

![](https://apidocs.lrcontent.com/images/PA5_17735eac43cb5fbdb0.00101786.png)

Enabling the PIN Authentication displays the related options on the screen as displayed below:

![](https://apidocs.lrcontent.com/images/PA7_149795eac43f0b6aa59.96401477.png)


**Step 3:** Select the desired flow i.e. Optional or Required.
- **Optional:** If the PIN is set as optional, your customers will be able to skip setting the PIN.
> Note: Make sure that the PIN field added to the registration form schema in Step 1 is set as optional.

- **Mandatory:** If the PIN is set as mandatory, your customers will have to set an account PIN during registration or login (as configured in Step 4). 
> **Note:** Make sure that the PIN field added to the registration form schema in Step 1 is set as required.

**Step 4:** Configure events to set a PIN from the following:
- **Register:** To set the account PIN during the registration.
- **First Login:** To set the account PIN during the first time login into the account.

    - Login: To set the account PIN on login (You can use this option to ask your existing customers to set PIN for their account).
        > **Note:** Login is a subset of FirstLogin. To enable Login, you must first enable FirstLogin.

**Step 5:** Enter the desired session token expiry time (in minutes for **PinAuthToken**) and save the configurations.

The following displays an example of PIN Authentication settings:

![](https://apidocs.lrcontent.com/images/PA8_62065eac44006b5086.25955493.png)


With the above settings, the following explains how PIN set-up process will work for your new, existing and social login customers:


> **Note:** Considering that the PIN field has been added to the registration form schema as optional (as explained in Step-1).

**New Customers:**

1. During the registration, the application prompts your customer to set a PIN for the account. Customers either set or skip setting the PIN.
2. If the customer skipped setting PIN during registration, the application prompts again to set a PIN for the account during the first login. Customers can either set or skip setting the PIN. 
3. If the customer skipped setting PIN during first login, the application prompts again to set a PIN for the account during login until the PIN is set. However, the customer can skip setting the PIN. 

If your customer sets a PIN at any of the above consecutive steps, the application will not request a PIN setup on the other step.

**Existing Customers:** If you set up PIN Authentication while the application is already in use, your existing customers are prompted to set a PIN during the login. In such cases, the customer will be returned a PINAuthToken as opposed to an access_token. This PINAuthToken can then be used to add the PIN code to the account using the Set PIN By Auth Token API.

**Social Login:** During Social Login (first time), the application does not request PIN, since the PIN is set as optional in the registration form schema. However, during the login, the application prompts your customer to set a PIN. The customer can then set the PIN or skip it. 

> **Note:** LoginRadius Admin Console allows you to configure settings for PIN Set up. The deployment section explains how you can utilize the set PIN for authentication at desired events.


## Part 2: Deployment
The LoginRadius Identity Platform supports a variety of implementation methodologies that allow you to customize the customer flows. 
This guide focuses on the following deployment methods:

- **Identity Experience Framework:** You should refer to these deployment steps if you are targeting LoginRadius Identity Platform implementation using IDX. 

- **JavaScript Libraries:** You should refer to these deployment steps if you are targeting LoginRadius Identity Platform implementation using JavaScript.

However, you can similarly accomplish the deployment with any of the implementation methodologies. Full details on these methodologies can be found here: https://www.loginradius.com/docs/api/v2/getting-started/implementation-workflows/

> **Note:** 
> - To  deploy the PIN Authentication using API refer to this [document](/api/v2/customer-identity-api/pin-authentication/login-by-pin/).
> - To deploy the PIN Authentication using technology-specific SDK refer to this [document](/api/v2/deployment/sdk-libraries/overview/).


### IDX Deployment

After configuring the PIN feature from LoginRadius Admin Console, the PIN capture and PIN Login feature are  enabled on the IDX page by default. In order to add other functionalities, you need to follow the below steps:

**Step 1: Change PIN**

Add the following code into the BeforeScript of our IDX’s Auth Page files to enable this functionality:

```
var changepin_options = {};
changepin_options.container = "changepin-container";
changepinoptions.onSuccess = function(response) {
// On Success
console.log(response);
};
changepin_options.onError = function(response) {
// On Error
console.log(response);
};
LRObject.util.ready(function() {
LRObject.init("changePIN",changepin_options);
});
```

**HTML Container**

```
<div id="changepin-container"></div>
```

**Step 2: Forgot/Reset PIN**

This feature will provide an option to the customer to reset their PIN. A customer can reset PIN by using the following methods:
1. Forgot/reset pin by email/phone/username
2. Reset pin by security questions

Add the following code into the BeforeScript of our IDX’s Auth Page files to enable this functionality:

**Sample code for Forgot Pin:**

```
forgot_options = {
    onSuccess: function(response) {
        console.log(response);
    },
    onError: function(errors) {
        console.log(errors);
    },
    container: 'forgotpin-container'
};
LRObject.util.ready(function() {
    LRObject.init('forgotPIN', forgot_options );
});
```

**HTML Container**
```
<div id='forgotpin-container'></div>
```

**Sample code for Reset Pin:**

```
reset_pin_options = {
    onSuccess: function(response) {
        console.log(response);
    },
    onError: function(errors) {
        console.log(errors);
    },
    container: 'resetPIN-container'
};
LRObject.util.ready(function() {
    LRObject.init('resetPIN', reset_pin_options );
});
```


**HTML Container**
```
<div id='resetPIN-container'></div>
```

The following the RAAS option properties can be included for forgot and Reset PIN functions:

```
raasoption.resetPINConfirmationEmailTemplate
raasoption.resetPINEmailTemplate
raasoption.forgotPINUrl
raasoption.resetPINUrl
```

**Step 3: Reset PIN using security questions**

To reset PIN using security questions, you need to configure and enable [security questions](https://adminconsole.loginradius.com/platform-security/multi-layered-security/security-question/settings) from your LoginRadius Admin Console. This  workflow allows customers to reset their pin by providing a secret answer to a predefined security question. 

The customers will then be asked upon registration via the registration form to fill out the questions. Once configured the security questions flow, the same can be used for resetting the configured PIN.

Add the following code into the **BeforeScript** of our [**IDX’s Auth Page**](https://adminconsole.loginradius.com/deployment/identity-experience-framework-hosted) files to enable this functionality:


**Sample code for Reset PIN By Security Questions:**

```
var resetPINBySecQ_options = {};
resetPINBySecQ_options.container = "resetPINBySecQ-container";
resetPINBySecQ_options.onSuccess = function(response) {
  // On Success
  console.log(response);
};
resetPINBySecQ_options.onError = function(errors) {
  // On Errors
  console.log(errors);
}

LRObject.util.ready(function() {
  LRObject.init("resetPINBySecurityQuestion", resetPINBySecQ_options );
});
```

**HTML Container**

```
<div id="resetPINBySecQ-container"></div>
```

### JavaScript Deployment

The following are the sequential steps to deploy the PIN Authentication feature using the LoginRadius JavaScript Libraries:

**Step 1:** In order to move forward with setting up PIN functionality through JS, it needs to be captured first. For setting up PIN at different levels, its related configuration needs to be set through Admin Console which you can refer from here.


**Step 2:** You need to include below PIN flags with common options variable in JS to initiate with the PIN functionalities:

```
commonOptions.PINConfiguration = {
    "PINLogin": true,
    "IsRequired": false,
    "AskOnRegistration": true,
    "AskOnLogin": true,
    "AskOnlyOnFirstLogin": true
}
```

**PIN Authentication Scenario**

The PIN Authentication is a feature which comes into existence after capturing the PIN as explained in the configuration section. This differentiates the usage of PIN between Login using PIN and Re-Authenticate using PIN.

**Case 1: PIN Login flag is true**

```
{
    "IsRequired": true,
    "AskOnRegistration": false,
    "AskOnLogin": true,
    "AskOnlyOnFirstLogin": false,
    "PINLogin": true,
    "SessionTokenExpiration": 10
}
```

Under this condition, you can use the feature of Login through PIN.

**Case 2: PIN Login flag is false**

```
{
    "IsRequired": true,
    "AskOnRegistration": false,
    "AskOnLogin": true,
    "AskOnlyOnFirstLogin": false,
    "PINLogin": false,
    "SessionTokenExpiration": 10
}
```

Under this condition, the login through PIN feature will be disabled and you can only capture the PIN to use for Re-Authentication purposes.

**Step 3:** To implement the change pin interface, use the LRObject.init method with the changePIN action. The following code can be used for reference:

```
var changepin_options = {};
changepin_options.container = "changepin-container";
changepinoptions.onSuccess = function(response) {
// On Success
console.log(response);
};
changepin_options.onError = function(response) {
// On Error
console.log(response);
};
LRObject.util.ready(function() {
LRObject.init("changePIN",changepin_options);
});
```


**HTML Container**
```
<div id="changepin-container"></div>
```

**Step 4:** To implement the Forgot/Reset PIN, you can use the following methods:
- Forgot/reset pin by email/phone/username
- Reset pin by security questions

**Sample code for Forgot Pin:**

```
forgot_options = {
    onSuccess: function(response) {
        console.log(response);
    },
    onError: function(errors) {
        console.log(errors);
    },
    container: 'forgotpin-container'
};
LRObject.util.ready(function() {
    LRObject.init('forgotPIN', forgot_options );
});
```

**HTML Container**
```
<div id='forgotpin-container'></div>
```

**Sample code for Reset Pin:**
```
reset_pin_options = {
    onSuccess: function(response) {
        console.log(response);
    },
    onError: function(errors) {
        console.log(errors);
    },
    container: 'resetPIN-container'
};
LRObject.util.ready(function() {
    LRObject.init('resetPIN', reset_pin_options );
});
```
**HTML Container**
```
<div id='resetPIN-container'></div>
```

Common options properties for forgot and Reset PIN functions are below:
```
resetPINConfirmationEmailTemplate
resetPINEmailTemplate
forgotPINUrl
resetPINUrl
```
**Step 5:** To reset PIN using security questions, you need to configure and enable security questions from your LoginRadius Admin Console. This  workflow allows customers to reset their pin by providing a secret answer to a predefined security question. 

The customers will then be asked upon registration via the registration form to fill out the questions. Once configured the security questions flow, the same can be used for resetting the configured PIN.

**Sample code for Reset PIN By Security Questions:**

```
var resetPINBySecQ_options = {};
resetPINBySecQ_options.container = "resetPINBySecQ-container";
resetPINBySecQ_options.onSuccess = function(response) {
  // On Success
  console.log(response);
};
resetPINBySecQ_options.onError = function(errors) {
  // On Errors
  console.log(errors);
}

LRObject.util.ready(function() {
  LRObject.init("resetPINBySecurityQuestion", resetPINBySecQ_options );
});
```
**HTML Container**

```
<div id="resetPINBySecQ-container"></div>
```

## More Details on PIN feature

Refer to the below document in case of using PIN feature for Re-Authentication.

[Document](/api/v2/customer-identity-api/re-authentication/pin/overview/)

