## BigCommerce Configuration
---
1. Log in to your BigCommerce admin panel
1. Click on "Apps"
1. Click on Marketplace
1. Search for "LoginRadius"
1. Click on the LoginRadius app and click "Install"

This will install the LoginRadius App into your BigCommerce environment. If you receive any errors or have not previously spoken with the LoginRadius Support team to configure your BigCommerce integration reach out via the LoginRadius support channels to get access to the BigCommerce integration. 

## LoginRadius Account Configuration

In order to support the BigCommerce SSO flows you will need to handle the following: 

1. Set First and Last Name to Required in your LoginRadius account -> API Configuration-> Registration Service
2. Configure your BigCommerce site in the LoginRadius Admin Console-> Deployment

## Uninstall Process

If you have installed the LoginRadius BigCommerce App on your BigCommerce Site and have customized the Stencil Theme with the below steps please make sure you revert the following items: 

1. Remove the Scripts, CSS, and Content included in "Stencil Theme Setup" Section
1. Remove the LoginRadius component files from the "components"
1. Revert any Customizations made to the theme->templates->pages>auth->login.html
1. Revert any Customizations made to theme->templates->components->common->header.html
1. Revert any Customizations made to embedded links and any other pages that you have added a LoginRadius Panel. 

## Stencil Theme Setup

It is recommended that you backup your theme before making any modifications in case you would like to revert the changes at some point. 

1. Download a copy of your existing Stencil theme. 
1. Unzip the [LoginRadius BigCommerce-Stencil-Package](https://github.com/LoginRadius/bigcommerce-identity-plugin)
1. Copy the contents of the "assets" folder into your theme's assets folder
1. Copy the contents of the "components" folder into your themes templates->components folder. 

## Modifying your Stencil Theme

1. Open the config.js in your theme->assets->loginradius->assets->js and update the LoginRadius options object with your LoginRadius API key and Site Name. 

1. Include the reference files for LoginRadius in your header section by including the following code in your theme->templates->components->common->header.html just before the closing </header> tag
```
{{> components/loginradius/LRreferences }}
```

1. If you are using Single Sign On also include the tag
```
{{> components/loginradius/LRsso }}
```

1. Open the login.html file in your theme->templates->pages>auth->login.html and replace the existing Login page code with
```
{{> components/loginradius/auth }}
```
This will display the pre-styled User authentication features which includes handling of Login, Social Login, Registration, Forgot password, and Reset Password. 

1. If you are using SSO you will need to handle the Logout functionality by opening the navigation.html file in your theme->templates->components->common and change the logout link to 
```
<a class="navUser-action" onclick="lrSSOlogoutCallback()" href="#">{{lang 'common.logout'}}</a>
```

## Additional Theme options

The above steps will allow you to get quickly setup and all of the interfaces can be directly customized using the css, js and html that comes in the Stencil Package. We have also included some more basic functions to display the interfaces that you can use to customize the look and feel or to embed specific interfaces directly on your preexisting forms. 

The following options are available to render specific interfaces:
1. ```{{> components/loginradius/auth }}``` - Displays the full LoginRadius interface.
1. ```{{> components/loginradius/login }}``` - Displays the Traditional Login interface.
1. ```{{> components/loginradius/social }}``` - Displays the Social Login interface.
1. ```{{> components/loginradius/register }}``` - Displays the Traditional Registration interface.  
1. ```{{> components/loginradius/verify }}``` - Includes the code to handle the email verification process. 
1. ```{{> components/loginradius/forgot }}``` - Displays the interfaces for Forgot password and Reset Password. 
