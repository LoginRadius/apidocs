Livefyre Commenting
=====

-------

Livefyre commenting is a commenting platform available from http://livefyre.com. In this sample integration Livefyre commenting has been integrated with the LoginRadius Social Login.

**Important: Please ensure you have set up your LoginRadius account with at least once Social Login provider (e.g Facebook, Twitter, Google). If you need help with this please refer to [this](/development/social-network/social-networks-permissions) document.**

**To obtain the required Livefyre credentials, you will need to have an enterprise account set up with livefyre.com. This is NOT a sample integration with Livefyre's free commenting platform.**

##Setup and Configuration
- Clone the integrations repository.

```
 $ git clone https://github.com/LoginRadius/integrations.git
```


- Configure the required parameters
 - Open the config.php file located in Livefyre->PHP->config folder.
 - Find the defined constants as shown below.
 - Replace the placeholders {{ }} with the correct values.
 - ARTICLE_ID and URL are customization specific depending on your individual website.

```
define('LIVEFYRE_NETWORK', '{{LiveFyre Domain}}'); // Obtain from LiveFyre Enterprise Account
define('LIVEFYRE_NETWORK_KEY', '{{LiveFyre Network Key}}'); // Obtain from LiveFyre Enterprise Account
define('LIVEFYRE_SITE_ID', '{{LiveFyre Site Id}}'); // Obtain from LiveFyre Enterprise Account
define('LIVEFYRE_SITE_KEY', '{{LiveFyre Site Key}}'); // Obtain from LiveFyre Enterprise Account

define('ARTICLE_ID', '123456789'); // Article ID can be anything e.g POST-123 this identifies the article
define('URL', 'http://example.com'); // Current Page URL

define('LR_API_KEY', '{{LoginRadius API Key}}'); // LoginRadius API KEY obtain from loginradius.com
```



- Navigate to the server root where you've set up the project in your browser e.g localhost/Livefyre/PHP/index.php. The Livefyre commenting interface should now be shown.
- Click on the "Post comment as" or the "Share" button to trigger the LoginRadius Social Login pop-up.
- Login using a listed social provider - The pop-up should close after login and you should now see the user listed in the top left of the Livefyre interface.
- Post a comment.

##Additional Customization
Currently in this same project the views for Profile and Edit Profile have not been created as this involved configuring Livefyre's "Ping for Pull" Service. These views currently trigger alerts which are located in the lr_livefyre.js file.

To implement Livefyre's ping for pull service please see this document [here](http://answers.livefyre.com/developers/identity-integration/your-identity/)