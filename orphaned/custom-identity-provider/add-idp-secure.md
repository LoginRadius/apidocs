Add Identity provider in LoginRadius Admin Console 
=====

-----

This document describes the step by step procedure to add Identity provider to your LoginRadius Admin Console.

##Steps
1. Log in to your LoginRadius account.

- Navigate to your team section in LoginRadius Admin Console from [here](https://adminconsole.loginradius.com/account/team).

- Click on **Add a new App** under the **Single Sign-On tab**.
<br><br>
![](https://apidocs.lrcontent.com/images/1st-team-sec_2651559490ffe22b686.48959558.png "")
<br>
- Fill the below form as
<br><br>
![](https://apidocs.lrcontent.com/images/2nd-form_2190559491024233bc9.34273506.png "")
<br>
  1. Select a LoginRadius **APP NAME**

  2. Select any flow from **LOGIN FLOW**

  3. Select **BINDING** from the listed ID PROVIDER BINDING

  4. Enter any **ID PROVIDER LOCATION** which you will get from Id provider.

  5. In the **ID PROVIDER LOGOUT URL** enter the id provider logout URL which you will get from Id provider.

  6. Enter certificate for IDP in **ID PROVIDER CERTIFICATE**

  7. For **RELAY STATE PARAMETER** enter **RelayState**.

  8.  In the **DATA MAPPING**, Select the Fields you wants to map. You can select multiple fields under DATA MAPPING.