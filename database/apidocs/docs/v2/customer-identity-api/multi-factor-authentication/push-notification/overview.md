# Push Notification Overview

Push authentication simplifies the verification process significantly. When a user undergoes an MFA Push Notification challenge, the consumer receives a push notification on their mobile device.

Our implementation of Push MFA will be available in our Mobile SDKs and the Loginradius MFA Authenticator App for both Android and iOS platforms. This document outlines the specifications, and the functional flow of implementing Push MFA within our system.

## Configuring Push Notification

Send push notifications for Multi-Factor Authentication that your customers can respond to using the LoginRadius Authenticator or your own native mobile apps. Upon configuring push notifications, the consumer receives a notification on their mobile device for multi-factor authentication instead of typing in a one-time passcode (OTP). The following are the steps.

![enter image description here](https://apidocs.lrcontent.com/images/unnamed-17_7068832566694b634e6e48.74341485.png "enter image title here")

## Configuration Steps:

- Check the box labeled **Enable Push Notifications** to activate the feature.
- Now you have two options: **LoginRadius Authenticator** or **Custom**.

## Configuring via LoginRadius Authenticator:

- Message: Enter the message that will be displayed to users during the authentication process. Example: Please verify your login attempt using the below QR code.
 - QR Code Width: Define the width of the QR code.
- Click the **SAVE** button to apply the changes.

After setting up Push Notifications with the LoginRadius Authenticator, you can scan the QR code using our app, which is available on the [Google Play Store](https://play.google.com/store/apps/details?id=com.loginradius.authenticator).

## Configuring Custom Push Notification App:

![Push Notification config](https://apidocs.lrcontent.com/images/unnamed-18_662303524666958609546b7.59735061.png "Push Notification config")

- Choose the **Custom** option to use your own native mobile apps for push notifications.


- **Custom app name (optional):** Enter the name of your custom app.


- **Push notification service:** Select the push notification service from the dropdown list (AWS/Native).

- For Amazon AWS, you need to give the Access Key, Secret Access, and Key Region Details.


## Android App Configuration:

- **Enable android:** Check this box to enable push notifications for Android.


- **Playstore URL (optional):** Enter the URL of your app on the Google Play Store.

## iOS App Configuration:

- **Enable iOS:** Check this box to enable push notifications for iOS.


- **Appstore URL (optional):** Enter the URL of your app on the Apple App Store.:

Click the **SAVE** button to save the Configuration.
