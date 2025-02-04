# Consent Management Customization via JS


The LoginRadius Consent Management feature allows you to collect consent information from your new or existing customers. This feature is provided to you in order to help you fulfil the requirements of some regulations such as the GDPR which requires that you may only use your customer's data provided that you have obtained prior consent.

For more details on the Consent Management feature’s functional specification click [here](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/consent-mangement/overview/). 

This guide will take you through the process to set up and implement Consent Management via V2JS. It covers everything you need to know on how to configure Consent Management in the LoginRadius Identity Platform and deploy it onto your web application.

> Prerequisites
> - Consent Management feature should be enabled on your account, please contact [LoginRadius Support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket) to enable this feature.
> - Basic knowledge of HTML/JavaScript.

## Part 1- Consent Configuration via Admin Console

In order to start with consent configuration, there are setting which needs to be done from the LoginRadius Admin Console. For more information regarding Admin Console configuration, refer to this [document](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/consent-mangement/overview/#partadminconsoleconfigurations4).

## Part 2 - Deployment via V2JS
The following are the sequential steps to deploy the Consent Management feature using the LoginRadius JavaScript Libraries:

### Step 1: Include the LoginRadius JavaScript Libraries as explained below:

Add the following JavaScript to head tag just before closing the body tag of Index.html file:

```
https://auth.lrcontent.com/v2/js/LoginRadiusV2.js
```

> Note: It is recommended to utilize the script from our CDN domain (https://auth.lrcontent.com/v2/js/LoginRadiusV2.js) rather than making a local copy.

### Step 2: Initialize the LoginRadiusV2 Object as explained below:

Add this JavaScript code to initialize LoginRadiusV2 Object on your website.

```
var commonOptions = {};
commonOptions.apiKey = "<your loginradius API key>";
commonOptions.appName = "<LoginRadius site name>";
var LRObject= new LoginRadiusV2(commonOptions);
```


### Step 3: Consent Form UI  

Include the following code to load the Consent Management interface in your web application file:

```
<script type="text/html" id="loginradius_consent_custom_tmpl">
  <h2>Terms of Service</h2>
  <p><#=TermOfService #></p>
  <br/>
  <h2>Privacy Policy</h2>
  <p><#=PrivacyPolicy #></p>
  <br/>
  <div id="loginradius_consent_option_tmpl">
          <h3><#=consentTitle #></h3>
          <p><#=consentDescription #> <input type="checkbox" name="<#=consentId #>"></p>
        </div>
</script>
```


And after adding the above code add the div container for this as given below:

```
<div id="consent-container"></div>
```






### Step 4:  Providing Consent Form Template

Include the following form to load the template for your consent form:

```
<script type="text/html" id="loginradius_consent_custom_tmpl">
        <div id="loginradius_consent_option_tmpl">
          <h3><#=consentTitle #></h3>
          <p><#=consentDescription #> <input name="<#=consentId #>" type="checkbox"></p>
        </div>
      </div>
 <h2>Terms of Service</h2>
  <p><#=TermOfService #></p>
  <br/>
  <h2>Privacy Policy</h2>
  <p><#=PrivacyPolicy #></p>
</script>
```

## Part 3- Deployment of Add On Consent Features

### Step 1: Consent on Custom Event

Include the following code to load the Custom Event configuration interface for consent in your web application file in order to set up consent on the custom event:


```
consentCustomEvent_options = {
    onSuccess: function(response) {
        console.log(response);
    },
    onError: function(errors) {
        console.log(errors);
    },
    container: 'customeventconsent-container',
    event: 'xyz'
};
 
const customevt_opt = this.consentCustomEvent_options;
LRObject.util.ready(function() {
    LRObject.init('customeventconsent', customevt_opt);
});
```



And after adding the above code add the div container for this as given below:

```
<div id="customeventconsent-container"></div>
```

> Note: Similarly, for providing the template to the custom events, you can use the template form given [above](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/consent-mangement/consent-customization-via-js/#stepprovidingconsentformtemplate5).


### Step 2: Consent Editing

Include the following code to load the Consent Editor interface in your web application file in order to edit consents:


```
consent_editor_options = {};
consent_editor_options.container = "consenteditor-container";
consent_editor_options.onSuccess = function (response) {
  console.log(response);
};
consent_editor_options.onError = function (errors) {
  console.log(errors);
};
LRObject.util.ready(function () {
  LRObject.init('consenteditor', consent_editor_options);
});
``` 



And after adding the above code add the div container for this as given below:

```
<div id="consenteditor-container"></div>
```


> Note: Similarly, for providing the template for consent editor, you can use the template form given [above](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/consent-mangement/consent-customization-via-js/#stepprovidingconsentformtemplate5).


## Part 4- More related Information

### Consent Management Overview

For more details on consent functionalities, please refer to this [document](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/consent-mangement/overview/).

### Leveraging Consent APIs

For more details on leveraging consent APIs, please refer the API document [here](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/consent-management/consent-by-consent-token/).
