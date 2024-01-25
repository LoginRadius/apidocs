#  Consent Management Introduction

The LoginRadius Consent Management feature allows you to collect consent information from your new or existing customers. This feature is provided to you in order to help you fulfill the requirements of some regulations such as the GDPR which requires that you may only use your customer's data provided that you have obtained prior consent. Consent Management can be used for a range of purposes such as obtaining consent from a customer to send them marketing content or permission to contact them regarding product updates.

## Consent Management Guide

This guide will take you through the process to set up and implement Consent Management. It covers everything you need to know on how to configure Consent Management in the LoginRadius Identity Platform and deploy it onto your web application.

>**Pre-requisites:** 
- Consent Management feature should be enabled on your account, please contact LoginRadius Support to enable this feature.
- Basic knowledge of HTML/JavaScript.

## Part 1- Consent Management Workflow

- Consent Management allows you to capture your customer’s consent during predefined events created in your consent form. You can also create custom events in the consent form and collect consent details from your customers. 

- The consent form that has the newest applicable date before the current date will be deemed to be the current consent form.
- Previously given consents can be withdrawn by the customer.
- LoginRadius provides following status of forms:
<br>1. **Published Form:** Refers to a form that is Live and currently running on your web application with the latest date.
<br>2. **Disabled Form:** Refers to a form that has been disabled, due to being replaced by a newly published form for the same event.

### Consent Management with Registration Flow

Leverage the [Auth User Registration By Email](/api/v2/customer-identity-api/authentication/auth-user-registration-by-email/)API for registration when the Consent Management feature is enabled. For example pass the following JSON in the body parameter:

```
{
"Email": [
    {
      "Type": "Primary",
      "Value": "example@example.com"
    }
  ],
  "Password": "dummy_password",
  "Consents": {
    "Events": [
      {
        "Event": "Register",
        "IsCustom": false
      }
    ],
    "Data": [
      {
        "ConsentOptionId": "email_consent",
        "IsAccepted": true
      },
{
        "ConsentOptionId": "sms_consent",
        "IsAccepted": true
      }
    ]
  }
}

```
>**Note:** 
- Consent parameters may vary on the basis of your configurations made over Admin Console.
- In the response of this API call you will receive the **ErrorCode** 1226 along with the **ConsentToken**. You can use the received consent token to leverage other Consent [APIs](/api/v2/customer-identity-api/consent-management/consent-by-consent-token/)

## Part 2- Pre-defined conditions for Consent Management

LoginRadius provides the following 3 predefined events on which consent can be applied:

- Register event
- First login event
- Login event

**Register Event:** At the time of registration your customer will be prompted to provide consent. The Customer will not be able to register without providing consent if the consent is set as mandatory, else you can skip the consent at the time of registration.

**First Login Event:** At the time of first login just after registration, the Customer will be prompted to provide consent. The Customer will not be able to login without providing consent if the consent is set as mandatory, else you can skip the consent at the time of first Login.

**Login Event:** On every Login your customer will be prompted to provide consent.The Customer will not be able to login without providing consent if the consent is set as mandatory, else you can skip the consent at the time of Login.


>**Note:** You can also create custom events as per your requirements, as explained below in Admin Console Configuration section.

- Among the default events provided by LoginRadius (Registration, Login, and First Login) you can select as many events as needed to capture consent however you will not be able to select **Login** if you have not selected **First Login** before, as Login is the subset of **First Login**.

- If a form is activated on the set date for one defined event then the form that was previously running for the same event will go into disabled mode automatically.

- The **Disabled Form** cannot be activated or edited again. It can only be viewed and cloned (If required).

- You can disable the published form as explained below.   

- You **CAN NOT** modify, edit, provide consent, on the customer's behalf as this feature is intended to help with compliance and in that case consent should **NOT** be modified.

## Part 3- Admin Console Configurations

This section covers the required configurations that you need to perform in the LoginRadius Admin Console to implement the Consent Management feature.

By default, the Consent Management feature is disabled on your LoginRadius site. To enable this feature for your site contact to LoginRadius Support. 

**Step 1:** To configure the Consent Management, navigate to [**Data Governance > Trust Center > Consent Center**](https://adminconsole.loginradius.com/data-governance/trust-center/consent-center/consent-management). 

The following screen appears:

![enter image description here](https://apidocs.lrcontent.com/images/Consent-Center---LoginRadius-User-Dashboard-2-1_26495ea1715f18bb54.56882798.png "")

**Step 2:** Under the Consent Management section create the consent form for your customers by clicking the Add New Form button.

![enter image description here](https://apidocs.lrcontent.com/images/Consent-Center---LoginRadius-User-Dashboard-3-1_96515ea171e6156762.24046796.png "")

**Step 3:** Choose the available Consent Options, Events, and Start Date as per your requirement while creating the form.

> **Note:** You can configure the consent management form for independent events such as **Register, First Login and Login**.

The following screen displays Consent Options, Events, and Start Date:

![enter image description here](https://apidocs.lrcontent.com/images/Consent-1_120957421165b28de23af9a3.05750314.png "")

**Step 4:** Now, click on the Publish Form button to publish the form on your web application.

The following screen displays Consent form ready to publish:

![enter image description here](https://apidocs.lrcontent.com/images/Consent-2_175584353565b28ec9379b09.05123808.png "")

**Step 5:** You can view all your published forms under the Published Form section by clicking the View button.

The following screen appears:

![enter image description here](https://apidocs.lrcontent.com/images/Consent-Center---LoginRadius-User-Dashboard-6-1_314495ea17542325677.42562773.png "")

>**Note:** 
Note: If you wish to create a duplicate form then you can achieve this by clicking on the Clone button in the required form and you will be able to modify and publish the form as per your requirement. 

The following screen displays how to clone the created form:

![enter image description here](https://apidocs.lrcontent.com/images/Consent-Center---LoginRadius-User-Dashboard-7-1_66495ea17699320304.45500916.png "")

### How to create custom Consent options

- Click on the **Add New Form** button to create the consent form.

- To add custom consent option click on **Add Consent Option** button under **Consent Options**.
<br><br>The following screen displays how to create custom consent option:
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/Consent-Center---LoginRadius-User-Dashboard-14-1_261805ea178827ab183.00755592.png "")

- Now, fill the form by adding **ID, Tittle, Description** and click on the **Save** button. 
<br><br>The following screen appears:

![enter image description here](https://apidocs.lrcontent.com/images/Consent-Center---LoginRadius-User-Dashboard-12-2_237185ea6711016c7c8.31271200.png "custom consent option")

- The new custom consent option will appear under **Consent Options**, now you can select the option to add in the consent form. 
<br><br> The following screen displays how to select the added custom consent option:
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/Consent-Center---LoginRadius-User-Dashboard-13-1_48495ea67230eeb7c5.27002058.png "")

### How to create Custom event

- Click on the **Add New Form** button to create the consent form.

- To add a custom event click on **Add New** button under **Choose Events** and **Start Date**. 
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/Consent-3_185364430465b28f5c46d3f8.60099751.png "")

- Add the **Event Name** as per your requirement and click on the **Save** button.
<br><br>![Event name](https://apidocs.lrcontent.com/images/Consent-4_109733081865b28feda29025.03652361.png "Event name")

- The new custom event will appear under **Custom Events**, check the custom event to add in the consent form. 
<br><br>The following screen displays how to select custom event:
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/Consent-5_97757548565b29035396556.47260733.png "")

## Part 4 -Deployment

The LoginRadius Identity Platform supports a variety of implementation methodologies that allow you to customize the customer flows. 

This guide focuses on the following deployment methods:

* **[Identity Experience Framework](#idxdeployment6):** You should refer to these deployment steps if you are targeting LoginRadius Identity Platform implementation using IDX. 

* **[JavaScript Libraries](#javascriptdeployment7):** You should refer to these deployment steps if you are targeting LoginRadius Identity Platform implementation using JavaScript.

However, you can similarly accomplish the deployment with any of the implementation methodologies. Full details on these methodologies can be found [here](/api/v2/getting-started/implementation-workflows/).

>**Note:** To deploy the Consent Management using API, refer to this [document](/api/v2/customer-identity-api/consent-management/consent-by-consent-token/).

### IDX Deployment

Make sure you have implemented the following redirects and callbacks from your web application.

**Step 1:** Locate the **Auth Page URL** as explained below:

Navigate to <a href = https://adminconsole.loginradius.com/deployment/idx target=_blank>**Deployment > Identity Experience Framework (Hosted)**</a> and the following screen will appear:

![enter image description here](https://apidocs.lrcontent.com/images/22_26641620416f771eb40.01736567.png "enter image title here")

The **Auth Page URL** displays your unique IDX domain in the following format:

```
<https://<sitename>.hub.loginradius.com/auth.aspx> 
```
In the above URL, [sitename](/api/v2/admin-console/deployment/get-site-app-name/) is the name of your LoginRadius Site. 

**Step 2:** Embed Authentication Pages in your Website as explained below:

Add a link on your webpage for redirecting customers to the Identity Experience Framework(Hosted) Page. 

```
<a href="https://<LoginRadius Site Name>.hub.loginradius.com/auth.aspx?action=<Desired Action>&return_url=<Return URL>">Register</a>
```

In the above URL replace the following: 

1. **LoginRadius Site Name** : Your unique LoginRadius [sitename](/api/v2/admin-console/deployment/get-site-app-name/). 

2. **Desired Action** : Following are the action list you can use.
<br><br> Login
<br> Register
<br> Logout

**Examples:**

**Login Page**

```
<a href="https://<LoginRadius Site Name>.hub.loginradius.com/auth.aspx?action=login&return_url=<Return URL>">Login</a>
 ```
 
**Registration Page**

```
 <a href="https://<LoginRadius Site Name>.hub.loginradius.com/auth.aspx?action=register&return_url=<Return URL>">Register</a>
 ```
<br> **3. Return URL** : The URL you would like to redirect customers after completing the selected action.

Try this link out on your page, you should be redirected over to the LoginRadius Hosted Page where you can register and login.

>**Note:** Use the following URL link to display the profile page of logged in customers.

```
 <a href="https://<LoginRadius site name>.hub.loginradius.com/profile.aspx">View Profile</a>
```
Use the below Consent template on [Auth.aspx](https://adminconsole.loginradius.com/deployment/identity-experience-framework-hosted) page to show Consent Management interface on your page: 

```
<script type="text/html" id="loginradius_consent_custom_tmpl">
   <div id="loginradius_consent_group_tmpl">
        <div id="loginradius_consent_option_tmpl">
          <h3><#=consentTitle #></h3>
          <p><#=consentDescription #> <input name="<#=consentId #>" type="checkbox"></p>
        </div>
      </div>
    </div>
 <h2>Terms of Service</h2>
  <p><#=TermOfService #></p>
  <br/>
  <h2>Privacy Policy</h2>
  <p><#=PrivacyPolicy #></p>
</script>
```
**Placeholder Tags**

- **consentId:** Displays Consent Option ID, configured in the Admin Console (ConsentID is mandatory in the template).
- **consentTitle:** Displays Consent option title configured in the Admin console.
- **consentDescription:** Displays Consent option description configured in the Admin Console.
- **TermOfService:** DisplaysTermOfService for the consent event form added in the Admin Console.
- **PrivacyPolicy:** DisplaysPrivacyPolicy for the consent event form added in the Admin Console.

>**Note:** All of the above variables are optional however the consentID is mandatory in the template and should be associated with input attribute name. This is a mandatory condition form to be worked. 

Apart from the variables There should be a predefined ID for the consent template indicating the presence of a template for the consent form. That is **"loginradius_consent_custom_tmpl"**.

Also, for templates of consent options you have to define the wrapper div element mentioning the template ID for the same. i.e. **loginradius_consent_option_tmpl** for all the consent options template. 

The following displays the Identity Experience Framework page with the **Consent form** Interface:
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/unnamed-9_169375ea680224faed7.15541716.png "Consent Management Interface")

**Step 3**: To view the consent related information of any particular customer you need to Log in to your [Admin Console](https://adminconsole.loginradius.com/) account and navigate to [Profile Management > Customer Management](https://adminconsole.loginradius.com/profile-management/customer-management/search-customers). 

The following screen will appear with the list of the customers registered in your account:

![enter image description here](https://apidocs.lrcontent.com/images/1_153915f0e00c51ad4f3.28131144.png "Search Customers")

**Step 4**: Click the **Manage** button to manage the customer profile as highlighted in the following screen:

![enter image description here](https://apidocs.lrcontent.com/images/2_46515f0e0115612a42.35286390.png "Manage")

**Manage** action provides a comprehensive range of functions and information for each customer. 

**Step 5**: Click on **Consent info** which will show you the **status** whether the customer has accepted consent or not with a lot of other information like ID, Title, description and last modified date.

The following screen shows the consent info details:

![enter image description here](https://apidocs.lrcontent.com/images/3_223505f0e02fb669308.08154341.png "Status")

### How to disable the created consent form

To disable any consent form select the form which you want to disable from the list of **Published Form**, click on **View** button and **Clone** the form. Publish the form with the new Live date, make sure to add the date greater than the old form date. Once the form will go Live the previous form will be disabled and will come under **Disabled Form** list.

The following screen displays the disabled forms:
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/Consent-Center---LoginRadius-User-Dashboard-11-1_224775ea680ce4bf901.58705697.png "enter image title here")



### JavaScript Deployment

The following are the sequential steps to deploy the Consent Management feature using the LoginRadius JavaScript Libraries:

**Step 1:** Include the LoginRadius JavaScript Libraries as explained below:

Add the following JavaScript to head tag just before closing the body tag of Index.html file:

```
https://auth.lrcontent.com/v2/js/LoginRadiusV2.js
```

**Step 2:** Initialize the LoginRadiusV2 Object as explained below:

Add this JavaScript code to initialize LoginRadiusV2 Object on your website.

```

var commonOptions = {};
commonOptions.apiKey = "<your loginradius API key>";
commonOptions.appName = "<LoginRadius site name>";
var LRObject= new LoginRadiusV2(commonOptions);
```

**Step 3:** Include the following code to load the Consent Management interface in your web application:

```
<script type="text/html" id="loginradius_consent_custom_tmpl">
   <div id="loginradius_consent_group_tmpl">
        <div id="loginradius_consent_option_tmpl">
          <h3><#=consentTitle #></h3>
          <p><#=consentDescription #> <input name="<#=consentId #>" type="checkbox"></p>
        </div>
      </div>
    </div>
 <h2>Terms of Service</h2>
  <p><#=TermOfService #></p>
  <br/>
  <h2>Privacy Policy</h2>
  <p><#=PrivacyPolicy #></p>
</script>
```





