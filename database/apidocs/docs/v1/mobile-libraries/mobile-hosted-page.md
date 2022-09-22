Customizing the Mobile Hosted page
=====
-----

## Overview

The LoginRadius Hosted Mobile page allows you to quickly setup a User Registration system using the iOS, Android, and PhoneGap Mobile SDKs:

- iOS: https://www.loginradius.com/integrations/ios/
- Android: http://apidocs.loginradius.com/v1.0/mobile-libraries/android
- PhoneGap: http://apidocs.loginradius.com/v1.0/mobile-libraries/phonegap

LoginRadius provides these pages hosted on our CDN in the following locations:

- English - https://cdn.loginradius.com/hub/prod/Theme/mobile/index.html
- Spanish - https://cdn.loginradius.com/hub/prod/Theme/mobile-spanish/index.html
- German - https://cdn.loginradius.com/hub/prod/Theme/mobile-german/index.html
- French - https://cdn.loginradius.com/hub/prod/Theme/mobile-french/index.html

The below documentation goes over how to setup your own hosted page which will allow you to fully customize the layout, design, and functionality.

##Setup

Follow the below steps to utilize the Mobile Hosted Page:

### Hosting
1. Get a copy of the Hosted page files here: https://github.com/LoginRadius/mobile-sdk-v1-hosted-page.
2. Upload the files to your ftp in the location you would like to host the page.
3. Modify the Mobile SDKs to point to your hosted location.

### Modifying the SDKs

**iOS** Follow the below steps to update the iOS SDK to point to your hosted location:

1. Go to the source( https://github.com/LoginRadius/ios-sdk )
2. Navigate to LoginRadiusRSViewController.m
3. Find line in code block of function - (void)viewWillAppear:(BOOL)animated {
4. Update the url_address to => <Mobile Hosted Page FTP Location>/index.html?apikey=%@&sitename=%@&action=%@
5. Follow the instructions to [configure your LoginRadius account](/api/v1/mobile-libraries/ios-library#configureyourloginradiusaccount2)

**Android** Follow the below steps to update the Android SDK to point to your hosted location: 

1. Get a copy of the SDK src files here: https://github.com/LoginRadius/android-sdk/tree/api-v1
2. Open sdklibrary/src/main/java/com/loginradius/sdklibrary/resource/StrResource.java 
3. Update the BASEPAGE parameter here to the following: <Mobile Hosted Page FTP Location>/index.html 
4. Follow the instructions to configure your LoginRadius Account for use with the mobile hosted page:[Configure your account](/api/v1/mobile-libraries/android#configureyourloginradiusaccount8)

**PhoneGap** Follow the below steps to update the PhoneGap SDK to your hosted location:

1. Get a copy of the SDK source files: https://github.com/LoginRadius/phonegap-sdk/tree/api-v1
2. Search for " var variables = {" in PhonegapUserRegistrationSDK.js 
3. Update the Domain here to the following: <Mobile Hosted Page FTP Location>/index.html

## Hosted Page Structure
The below files are contained in the Mobile Hosted Package and can be used to customize the interfaces and behavior of the hosted page:

1. Index.html- This page contains the Social Login Interface templates and User Registration interface containers as well as general layout.
2. Css/style.css- Contains all of the styling elements utilized in the Hosted Page.
3. Js/dynamic-action.js- Contains all of the Javascript that services the LoginRadius interfaces. Determines which interface will be displayed and handles translating of the interface fields.
