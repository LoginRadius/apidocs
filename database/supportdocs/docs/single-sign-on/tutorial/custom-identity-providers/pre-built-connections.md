# Pre-Built Connections

LoginRadius supports pre-built template to expedite deploying some of the frequently leveraged custom identity providers enabling users to authenticate with the identity provider (IdP) and access multiple service provider (SP) apps through LoginRadius. And for those seeking advanced configurations, the configuration options are conveniently located under the respective protocol tab, offering a comprehensive and tailored approach to identity management.

Presently, LoginRadius supports the pre-built integration template for the below-mentioned provider.

1. Salesforce

Now, let's delve deeper into the configuration steps.

## Configuring Salesforce

1. Navigate to [Platform Configuration > Custom IDPs > Integrations](https://adminconsole.loginradius.com/platform-configuration/authentication-configuration/custom-idps/integrations) in the Admin Console and click on **Add SSO Integration**.

    ![Add SSO Integration](https://apidocs.lrcontent.com/images/Custom-IDP---Pre-Built-Connections---Step-1_132689619365887017422793.58420695.png "Add SSO Integration")

2. Now, click on the **Salesforce card** to start configuring Salesforce as identity provider.

    ![SalesForce](https://apidocs.lrcontent.com/images/Custom-IDP---Pre-Built-Connections---Step-2_7299799796588710a07a818.55583302.png "SalesForce")

3. The configuration fields would appear on the same screen as displayed below.

    ![Configuration Steps](https://apidocs.lrcontent.com/images/Custom-IDP---Pre-Built-Connections---Step-3_204484100665887340a4f0f2.05035948.png "Configuration Steps")

4. In the **Name** field, enter a unique name for your Salesforce integration.
        
    > **Note:** Below are the validation rules that should be taken care of while creating the Provider Name. If any of the below validation rule is not followed the error message: `App Name is not valid` will be shown.

    - Only **\_** (underscore) and **-** (hyphen) are allowed as a special charater.
    - App name should start with a **character**.
    - Alpha numeric values are allowed.
    - No space is allowed in between.
    - Minimum length of the app name should be **[1]** and maximum length upto **[60]** is allowed.
    - Now all the app names are allowed in lowercase only. If the uppercase is entered it will be automatically coverted into lowercase.

5. In the **ID Provider Location** field, enter the location to which an SP (Service Provider) sends assertions using whichever protocol and binding it shares with the IdP (Identity Provider).

6. In the **ID Provider Logout URL** field, enter the Sign-Out Endpoint that you get from the SAML account.

7. In the **ID Provider Certificate** field, enter the certificate for IdP and click on the **SAVE** button.

8. Upon saving the configuration, the screen below will emerge, presenting additional steps outlined within the **Tutorial** tab. These steps guide you through the necessary configurations to be implemented in the Salesforce developer console.

    ![Tutorial](https://apidocs.lrcontent.com/images/Custom-IDP---Pre-Built-Connections---Step-8_14219062665887a9155a204.20149779.png "Tutorial")

9. Additionally, you have the option to navigate to the **Configuration** tab for updating any of the configuration fields. You can also choose to **delete** the configuration by clicking on the delete button (represented by the _Bin Icon_) for the corresponding configuration.

    ![Update or Delete](https://apidocs.lrcontent.com/images/Custom-IDP---Pre-Built-Connections---Step-9_102846392565887c401639b2.53735600.png "Update or Delete")

10. Access to advanced configurations for this setup will also be available through the dedicated protocol tab (SAML). For the same, navigate to [Platform Configuration > Custom IdPs > SAML Provider](https://adminconsole.loginradius.com/platform-configuration/authentication-configuration/custom-idps/saml-provider)

    ![Advanced Configurations](https://apidocs.lrcontent.com/images/Custom-IDP---Pre-Built-Connections---Step-10_192023964165887d5bdaeb74.47364644.png "Advanced Configurations")

For comprehensive details and step-by-step configuration instructions for setting up the SAML provider, refer to the [Custom SAML Provider](/single-sign-on/tutorial/custom-identity-providers/custom-saml-provider/) document.
