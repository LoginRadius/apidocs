# Platform Security Overview

Platform Security details the multiple solutions LoginRadius offers to secure your platform, from enabling CAPTCHA services, to managing token lifetime, to configuring Multi-Factor Authentication and more. These authentication features ensure the security of your web properties during registration and login while protecting your customer’s account and identity.

## Auth Security

You can configure authentication security settings directly from the Auth Security section of the Admin Console to protect your site. CAPTCHA settings allow you to add an additional layer of security to your registration forms with [Google reCAPTCHA](/api/v2/admin-console/platform-security/captcha-providers/google-recaptcha-configuration) or [QQ Tencent CAPTCHA](/api/v2/admin-console/platform-security/captcha-providers/tencent-captcha-configuration). You can also provide multiple APIs with bot protection by triggering CAPTCHA depending on the select stages of authentication beyond registration. Besides protecting your customers’ data from bots, you can also protect their accounts by enabling Brute Force Lockout so that it restricts account access after a certain number of failed login attempts. LoginRadius also provides you with the option to whitelist or blacklist registration or access to your site from certain domains and email addresses.

Beyond protecting your customer data, you can also secure your platform with IP Access Control by allowing or denying access to the LoginRadius APIs from certain IP addresses.

See how to enable these authentication settings [here](/api/v2/admin-console/platform-security/auth-security-configuration).

## Password Policy

Password Policy allows you to follow security best practices by providing options for automating the process of changing the password, setting the number of past passwords customers are not allowed to re-use, adding security questions and configuring the complexity of passwords.

See how to enable and configure these settings [here](/api/v2/admin-console/platform-security/password-policy).

## Multi-Factor Authentication

Multi-Factor Authentication protects your user accounts by enabling another step of authentication at login. LoginRadius provides the option of using SMS Passcode or Google Authenticator for MFA.

See how to enable and configure these settings [here](/api/v2/admin-console/platform-security/multi-factor-auth).

## Session Management

Managing your sites access tokens protects your customer accounts after login. An access token lifetime is the amount of time a customer is logged in to your site until it expires and prompts the customer to log back in. You can view the access token lifetime directly from the Admin Console. Additionally, you can enable Force Logout so that all active sessions of a customer will expire after a password change or reset. You can also enable the Remember Me option to have the customers remain logged in even after the browser closes until the access token expires.

See how to view and enable these settings [here](/api/v2/admin-console/platform-security/session-management).

## Regulations

LoginRadius helps secure your platform and meet the requirements of the most security-sensitive organizations by adhering to and being compliant-ready with numerous standards and regulations, including GDPR and COPPA.

See the regulations LoginRadius is compliant with [here](/api/v2/admin-console/platform-security/regulations).
