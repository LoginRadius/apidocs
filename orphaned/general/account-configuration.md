Account Configuration
===
----
This document details the steps that you will need to take in order to setup your account to support social login.

<iframe scrolling="no" frameborder="0" id="player" src="https://player.vimeo.com/video/174413103?referrer=http%3A%2F%2Fapidocs.loginradius.com%2Fv2%2Fdocs%2Faccount-configuration" allowfullscreen="true"></iframe>

##Requirements
You will need to have the following details gathered before beginning the integration process.

1. A LoginRadius account.
2. A site configured that you will implement Social Login on. This site can be a dev, staging, local, or live site.
3. Developer accounts for your desired social ID providers.

##Social Login Implementation Flow Chart
![enter image description here](https://apidocs.lrcontent.com/images/Lr7_2044158b56553e0a343.66545351.png "")

##Steps to Implement:

Below is an overview of the process you will take when setting up LoginRadius Social Login on your site.



1. If you already have an account, login to your LoginRadius Admin Console [here](https://secure.loginradius.com/login). Otherwise,​ you can get signed up for a new site [here](https://www.loginradius.com/pricing/).

2. Select your LoginRadius site from the drop-down list in the upper right corner.
![enter image description here](https://apidocs.lrcontent.com/images/Lr8_1256158b566e02b7238.47079867.png "")
3. Navigate to API Configuration -> Social Login on the top panel.

4. You will land on the site configuration tab and will need to include the Website URL on this page.

5. Next, navigate to API Configuration > Social Login. Select your desired providers and follow the displayed step-by-step guides to configure the Social Provider apps that will service your account.
![enter image description here](https://apidocs.lrcontent.com/images/Lr9_477158b5677ecef598.30031177.png "")
6. You will now need to configure the selected Social Providers.                                                                                                                                                                                                                                                                            
![enter image description here](https://apidocs.lrcontent.com/images/Lr10_909658b5679bed7fd1.63416914.png "")
7. Next Navigate to Deployment > Web & Mobile and depending on your site technology you can either go to JS Widgets or Libraries & Plugins, follow the displayed steps to setup the plugin or interface on your site.
![enter image description here](https://apidocs.lrcontent.com/images/Lr11_1701958b567b234a222.23707082.png "")
8. With the initial interface, you are now able to get users logging into your site. With a successfully authenticated user, you can now access the additional APIs we have available, either through our APIs detailed [here](/), or through the built in features of our [CMS plugins](/api/v2/cms-turn-key-plugins/drupal-v7-x-customer-identity-module-instructions).

9. (Optional) Setup a custom interface branded to your site's theme. Follow these instructions to replace the default LoginRadius interface with a custom interface. (Available with Pro Essentials and higher plans)

10. (Optional) Select extended permissions for accessing our advanced APIs by navigating to your LoginRadius Admin Console->Social Login->Social Data Settings and check off the desired permissions for each provider. (Available with Pro Essentials and higher plans)
