# Overview

LoginRadius supports **Cross-Device SSO** feature. You can establish SSO between two different applications running on two different devices i.e mobile application and web application by using this feature.

For more detailed information regarding **Cross-Device SSO** refer [here](/single-sign-on/tutorial/cross-device-sso/overview/).

You can leverage the following **APIs** to utilize Cross Device SSO feature:

[**Generate QR Code String:**](/api/v2/single-sign-on/cross-device-sso/generate-qr-code-string/) This API is used to get the QR code string.

[**Get Access Token by QR Code:**](/api/v2/single-sign-on/cross-device-sso/get-access-token-by-qr-code/) This API will be triggered by the browser and return the access token attached with the requested QR code string from the Database.

[**Add QR Token:**](/api/v2/single-sign-on/cross-device-sso/add-qr-token/) This API is used to add/insert the QR code string with the access token into the database. 