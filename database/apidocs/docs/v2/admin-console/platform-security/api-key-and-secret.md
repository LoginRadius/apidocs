# API Key and Secret

## Account API Keys

### Getting your API Key and Secret

The API key and secret are used to interact with LoginRadius' APIs. To get your API key and secret, navigate to Platform Security > API Credentials:

<iframe src="https://www.youtube.com/embed/kkK-3zNUa0E" width="1152" height="620" scrolling="no" frameborder="0" allowfullscreen=""></iframe>

You should see the following:

![Account API Keys](https://apidocs.lrcontent.com/images/api1_102935eea86f1a8daf8.12944217.png "Account API Keys")

### Resetting your API Secret

To reset your API secret, click on "Reset Secret" to delete the current secret and generate a new one:

![Reset API Secret](https://apidocs.lrcontent.com/images/api2_159495eea873b7b57c1.44437676.png "Reset API Secret")


> **Note:** After resetting the **API secret** it will take approx 15-20 minutes to reflect the changes.


## Additional API Secret(s)

Additional API Secrets, these API Secrets can be generated to take the place of the Primary Secrets for specific actions based on their permissions.

Therefore, in the case where multiple people need access to the site, you can provide each team member with their own respective secrets. You will then be able to revoke this if required.

To add an additional API secret, click on "Add a New API secret" under Platform Security > API Credentials > Additional API Secret(s) in your Admin Console.

![Additional API](https://apidocs.lrcontent.com/images/Api-Credentials---LoginRadius-User-Dashboard_481661d499bc84a508.81757255.png "Additional API")


The roles can be set to grant access to certain aspects of your site like Analytics, Cloud Directory, Customer Identity and SSO Federation areas and can be revoked at any time.

**Note:** Up to 10 additional API Secrets can be added for your LoginRadius site by selecting the desired APIs from the list. Use these API Secret(s) to securely grant limited access to certain areas of your site.Once the limit is exceed it will throw the below message.

![API MAX](https://apidocs.lrcontent.com/images/Api-CredentialsMAX---LoginRadius-User-Dashboard-1_1305761d49d374f0d19.33341235.png "API MAX")