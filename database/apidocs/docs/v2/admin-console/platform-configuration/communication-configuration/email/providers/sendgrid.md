# SendGrid SMTP Configuration


LoginRadius offers fully-managed SendGrid services to handle your SendGrid account setup and administration. If you want to learn more about this option contact the  <a href = "https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket" target="blank"> LoginRadius Support Team </a>.



> **Note:** SendGrid announced that all accounts must have two-factor authorization(2FA) before 2021. For more information refer to the <a href = "https://sendgrid.com/docs/for-developers/sending-email/upgrade-your-authentication-method-to-api-keys/" target="_blank" rel="noopener noreferrer"> article </a>.


- If an account has 2FA, sending emails must be authenticated using API keys.
- Using a SendGrid account's username and password for authentication no longer works with 2FA.



## SendGrid Dashboard Configuration

&nbsp;1. Within the [SendGrid Admin-console](https://app.sendgrid.com/), click on your account's dropdown menu in the top-left corner and select the **Setup Guide**. Now expand the **Send your first email** section and click **Start** under **Integrate using our Web API or SMTP relay**. Kindly refer to the following screenshot.

![Integrate](https://apidocs.lrcontent.com/images/1_248175fc6f1898a7788.94693615.png "Integrate")


&nbsp;2. Choose **SMTP Relay**.

![enter image description here](https://apidocs.lrcontent.com/images/sendgrid_setup_overview_92345b9849a72c9f56.90019908.png "enter image title here")

&nbsp;3. Under **Create an API key**, enter an API Key Name and and click **Create Key**. It will create an API Key as following


![API](https://apidocs.lrcontent.com/images/2_263405fc6f20cc3b0d3.21883836.png "API")

## LoginRadius Admin Console Configuration



- Navigate to <a href="https://adminconsole.loginradius.com/platform-configuration/identity-workflow/communication-configuration/email-configuration" target="_blank" rel="noopener noreferrer"> **Admin Console ➔ Platform Configuration ➔ Identity Workflow  ➔ Communication Configuration  ➔ Email Configuration** </a>.

- Select **SendGrid** from the list of SMTP providers. The SMTP Host and Port fields will be automatically populated, and SSL is enabled by default.
- Enter credentials as following

    From Name: "Sender's from name"

    From Email Address: "Sender's email ID"

    SMTP User Name: apikey

    SMTP Password: Password(generated API Key in previous Step)

- Click **Verify** to send a test email using the new SMTP configuration, It will open the following dialog box.

    ![enter image description here](https://apidocs.lrcontent.com/images/3_21035fc6f34d95ccc8.54526815.png "enter image title here")

-  Enter the "email ID" where you want to receive the test email and click **"Send"**. If successful, you will receive an email confirming your SMTP configuration is valid as follows. 


![enter image description here](https://apidocs.lrcontent.com/images/sendgrid_test_email_265005b984d5a957161.29155422.png "enter image title here")

- Click on **"Save"** to save the configurations.
