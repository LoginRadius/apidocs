# SMTP Troubleshooting

## Overview

Simple Mail Transfer Protocol (SMTP) is the standard protocol for email services on a TCP/IP network.
SMTP provides the ability to send and receive email messages. This document outlines the details regarding how to troubleshoot your SMTP errors/issues with LoginRadius. 

## Common Causes

There are some common mistakes that can cause issues regarding sending/ receiving
emails in the recipient’s inbox. The following are the common cases that can cause
sending/ receiving mails issues.

## SMTP issues

SMTP issues are very easy to detect. Using any application feature that sends mail.
If the mail never arrives in the recipient’s inbox, there is something wrong with the SMTP. 
For recognizing the SMTP error just follow the below points. It might be helpful for SMTP
troubleshooting:

1. Check your junk mailbox as some SMTP providers by default have a setting 
   that emails were getting delivered to the Junk Email folder. For Ex: [Outlook](https://answers.microsoft.com/en-us/outlook_com/forum/oemail-osend/outlook-sending-legitimate-emails-to-junk-folder/11fe1048-f3c5-43fb-bf37-85a7649ee16f) Provider.

2. Please verify your SMTP parameters which you have set on your email client
   with the correct SMTP parameters at the time of configuration (parameters,
   syntax, etc.)like SMTP password,username,SMTP host.

3. SMTP providers require special configuration steps to send mails from cloud
   applications. For example, Google Mail requires you to enable less secure 3rd
   Party Apps integration.

  * If an app uses less secure sign-in technology, you might not be able to  login.
    for example, Google Account doesn't allow to access, In order to grant access to
    other third-party apps you need to enable it by Login in to your Gmail account.
    After that follow the below steps:

  * Go to the Less secure app access section of your Google Account. You
    might need to sign in. 
  *  Turn allow **Less secure apps** off.

4. Check your SPAM folder sometimes cloud services may block mail traffic for security reasons.
   For example, because of potential SPAM abuses, Google Cloud does not allow traffic in ports 25 or
   465.

5. Change your SMTP port: The outgoing mail server uses normally port 25, but some ISPs may block
 due to the increasing spam traffic that’s been passing through it. For more, you can refer to this
  [SMTP ports](https://serversmtp.com/port-for-smtp/) Documentation.

6. An outgoing mail server can conflict with the computer’s protection systems.  Please verify that
 your firewall or antivirus is not blocking it.

7. Issues can be occurred on the SMTP server end, you need to check your SMTP server logs/response and
 investigate the issue with their SMTP provider. Receiving traffic in the customer’s SMTP service for
 any specific events can also cause the sending/receiving issues of email.

**Note**: For further troubleshooting, you can also check if the issue arises with your organization’s
 email addresses or outside of that.
 
 ## IP Address related issue

 If your server has firewall protection and you require the IP addresses of LoginRadius services to
add to the firewall, then LoginRadius has some sought of dedicated IPs that need to be whitelisted and
 it would be good to make sure that all of them are whitelisted. You can find the list of our
  IPs [here](https://www.loginradius.com/docs/infrastructure-and-security/ip-addresses-list/).

 ## Issue related to Email Domain

To troubleshoot the issue further please identify if the issue is occurring with some specific email
addresses or its occurring globally.

## Admin Console configuration

Improper SMTP configurations in [Admin Console](https://adminconsole.loginradius.com/platform-configuration/identity-workflow/communication-configuration) also leads to mail sending/ receiving issues. So it’s better to cross-check your SMTP configurations settings there. For more you can refer this [DOC](https://www.loginradius.com/docs/api/v2/admin-console/platform-configuration/communication-configuration/email/email-configuration/#sendgrid-smtp-configuration) 


The above are some common cases that cause email sending/receiving issues and the customer can
troubleshoot the issue at their end to some level. If still the issue persists then please collect the
following details and contact support:
1. From when you started observing this issue?
2. Let us know if you are using any proxy at your end.
3. Sample of Email IDs for which you are facing this issue.
4. Did the user's verified their Spam/Junk folder for these emails?