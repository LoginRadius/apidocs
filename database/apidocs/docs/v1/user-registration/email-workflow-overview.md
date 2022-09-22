Email Registration Workflow Overview
======

---------


##Email Verification
This is the default flow of the LoginRadius Email registration process. This flow handles the email verification process by sending out a fully customizable verification email message to the provided email address. The email message contains a link that, when navigated to, will flag this user’s email as having been verified, which will allow them to login to through the LoginRadius interfaces. This process is triggered whenever an email is gathered from an end-user, including instances in which a Social Provider does not return an email address with the user’s profile data.

###Setup and Implementation
In order to setup the default email verification flow, you will need to handle a few things:









1.  Setup your email templates as per [this document](https://support.loginradius.com/hc/en-us/articles/203402419-User-Registration-Email-Message-Customization).

2. Setup your SMTP Server information as per [this document](https://support.loginradius.com/hc/en-us/articles/203824509-How-do-I-set-up-customized-email-templates-and-configure-them-to-go-through-my-SMTP-).

3. Include the following parameters in your LoginRadius init options object as shown in the interface initialization sect ion [here](http://apidocs.loginradius.com/v1/reference#section-step-2-loginradius-init-method):


-    **emailVerificationUrl** -  This will set the URL placeholder in the customized email template and should be set to the location you have implemented the code detailed in step 4.
-    **emailVerificationTemplate** - This should be set to the template ID that you would like to include as the email message. If you are using the default template, you can ignore this para meter.

4.Include the email verification javascript code on the page that users will be sent to by the link in the email verification message. You can refer to this document to setup the javascript code.


###Pre-defined Rules

- Users registration must include a valid email address.

##Optional Email Verification
The optional verification flow is a middle point between the full email verification and no email verification; it ties into some of the features of both flows. This flow allows end users to verify their email if they want to, but also allows the users to login with an unverified email. Just like the full email verification flow, this flow would send out a customizable verification email message to the provided email with a link for the user to follow in order to verify their address. Until the link has been navigated to, the user's profile will be flagged as having an unverified email. The user will be able to login with the unverified email but will have some restrictions on the features that are available for use until their email has been verified.

###Setup and Implementation


1. [Contact the LoginRadius Support team](https://support.loginradius.com/hc/en-us/requests/new) to enable this feature for your account.
2. Setup your email templates as per [this document](https://support.loginradius.com/hc/en-us/articles/203402419-User-Registration-Email-Message-Customization).
3. Setup your SMTP Server information as per [this document](https://support.loginradius.com/hc/en-us/articles/203824509-How-do-I-set-up-customized-email-templates-and-configure-them-to-go-through-my-SMTP-).
4. Include the following parameters in your LoginRadius init options object as shown in the interface initialization section [here](http://apidocs.loginradius.com/v1/reference#section-step-2-loginradius-init-method):

 

 - **emailVerificationUrl** - This will set the URL placeholder in the customized email template and should be set to the location you have implemented the code detailed in step 4.
 - **emailVerificationTemplate** - This should be set to the template ID that you would like to include as the email message. If you are using the default template you can ignore this parameter.
 - **OptionalEmailVerification** - set to True, This will enable the optional verification feature on the interface.
 - Use following JavaScript code to handle on registration to login your user immediately.

```
$LR.util.ready(function() {
  var raasoption = {};
  raasoption.apikey = "<Your API key>";
  LoginRadiusRaaS.init(raasoption, 'registration', function(response) {
    // On Success you will get access_token
    console.log(response.access_token);
  }, function(errors) {
    // On Errors
    console.log(errors);
  }, "registration-container");
});
```

HTML Code:

```
<div id="registration-container"></div>
```

> Note

> The init functions success callback will return a json array with userprofile and access_token. you can use this token for further process like you can login the user directly just after the registration.

 5 . Include the email verification javascript code on the page that users will be sent to after clicking on the link in the email verification message. You can refer to this document to setup the javascript code.


###Pre-defined Rules



- Automatic Account Linking is disabled until a verified email is set.

- User may be unable to reset password if they have included an invalid or non-existent email.

##No Email Verification
The no email verification flow allows you to bypass the email verification process. This flow fully removes the email verification process, so all users registering with your site will be able to login without validating their email address, and there will be no email verification messages sent out.


###Setup and Implementation



1. [Contact the LoginRadius Support team](https://support.loginradius.com/hc/en-us/requests/new) to enable this feature for your account.

2. Include the following parameters in your LoginRadius init options object as shown in the interface intialization section [here](http://apidocs.loginradius.com/v1/reference#section-step-2-loginradius-init-method):

 

- **DisabledEmailVerification** - Set to true, This will enable the no email verification feature on the interface.
- Use following JavaScript code to handle on registration to login your user immediately.

```
$LR.util.ready(function() {
  var raasoption = {};
  raasoption.apikey = "<Your API key>";
  LoginRadiusRaaS.init(raasoption, 'registration', function(response) {
    // On Success you will get access_token
    console.log(response.access_token);
  }, function(errors) {
    // On Errors
    console.log(errors);
  }, "registration-container");
});
```

HTML Code:

```
<div id="registration-container"></div>
```

> Note:

> The init functions success callback will return a json array with userprofile and access_token. you can use this token for further process like you can login the user directly just after the registration.

###Pre-defined Rules



- Automatic Account Linking is disabled.

- User may be unable to reset password if they have included an invalid or non-existent email.