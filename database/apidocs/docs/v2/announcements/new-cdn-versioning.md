#New CDN-based versioning process for LoginRadiusV2.js

As per the existing process, the latest version of LoginRadiusV2.js resides at the following URL:

`https://auth.lrcontent.com/v2/js/LoginRadiusV2.js`

For every LoginRadiusV2.js release, the changes are published at the URL above. Hence, if you are using the LoginRadiusV2.js directly from this URL, you will automatically be updated to the latest version. 
 
However, if you do not want to receive automatic updates for the latest LoginRadiusV2.js you can instead leverage our new CDN-based release process. This allows you to operate on your desired LoginRadiusV2.js version until you explicitly decide to update to another version.

Starting from LoginRadiusV2.js 3.10.0, you can specify your desired version in the CDN's URL. 

The format is as follows:
`https://auth.lrcontent.com/v2/LoginRadius-vX.Y.Z.js`

Where each letter represents the type of change: X, Y and Z are Major, Minor and Patch versions.

Thus to access 3.10.0, the CDN URL will be:

`https://auth.lrcontent.com/v2/LoginRadius-v3.10.0.js`

For more details, please see our [Developer Documentation](https://www.loginradius.com/legacy/docs/api/v2/deployment/js-libraries/getting-started/#installation1).
