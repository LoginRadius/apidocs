# Infrastructure and API Security

Data Security is a crucial component of any platform infrastructure and at LoginRadius we take our role very seriously. In order to provide our customers with the most up-to-date technology and services, we are dedicated to further strengthening, standardizing, and improving our infrastructure to better align with industry standards and security best practices. Below we go over some of the changes that we will be rolling out in the next quarter, as well as how they may affect your system:

## Infrastructure Changes

**SNI-based SSL Certificate:**  We are removing support for IP-based SSL certificates. Modern browsers do not require an IP-based SSL certificate, and 99% of traffic currently goes through [SNI certificates](https://tools.ietf.org/html/rfc3546#section-3.1). By removing the IP-based SSL certification option, we can improve the security of the application as well as improve how our system manages caching of requests.

This means that you will need to ensure your application uses a SNI-based SSL certificate before the IP-based SSL deprecation occurs.

**Standardization:** We are improving and bringing our system in line with security and system best practices. This primarily relates to how you interact with the LoginRadius API and how our systems process requests, including:

- Support for new ways of securely communicating [API access credentials](/api/v2/admin-console/platform-security/api-key-and-secret/), such as through keys and secrets.
- Additional options to restrict access to the API infrastructure by Domain and IP
- Removing support for invalid or custom HTTP methods
- Enforce HTTPS requests
- Enforce [TLS 1.2 SSL requirements](/api/v2/troubleshooting/tls-compatibility)

**Optimizations:** We are adding multiple improvements to our infrastructure that relate to how we receive and process requests. This allows us to directly improve security and response times while having no impact on customer implementations. We will deploy systems to handle:

- Redundant filtering of common threat vectors on both the Transport and Application layers
- Optimized routing of requests to improve performance globally
- Removing invalid or unauthorized requests and its negative side effects

## Implementation-Specific Changes

**Standardized API Methods:** We will no longer support invalid or non-standard HTTP methods. All requests communicating with the LoginRadius API will need to be standardized according to industry best practices. Methods should be uppercase and use only standard methods, e.g. GET, POST, PUT, DELETE, OPTIONS. We will no longer support non-standard methods, such as Get, post... etc.

This means that you will need to ensure you are using the latest LoginRadius SDK or that you update any current SDK or custom request methods to use the correct method conventions.

**Enforce HTTPS:** All interactions with the LoginRadius API will now enforce communication over [HTTPS](https://support.google.com/webmasters/answer/6073543?hl=en) as per security best practices. This ensures interactions with customer data of any kind are made securely.

If you are currently making requests over HTTP, you will need to ensure you update these to secure requests over HTTPS.

**SDK and Plugin Standardization:** We are in the process of standardizing and releasing updated versions of all of our current [SDK](/api/v2/deployment/sdk-libraries/overview) and [CMS](/api/v2/deployment/turn-key-plugins/general-cms-integrations) libraries. This will allow us to unify the support of these systems, so that you will have the same level of service regardless of what platform or technology you are working with. These updated systems will also support all of the latest LoginRadius features and security enhancements.

**Feature Support:** We continually release new and improved features driven by our customers and internal analysis. We are improving support for some of our existing platforms and features to better support diverse use cases:

- Invisible [CAPTCHA](/api/v2/deployment/js-libraries/advanced-js-customizations#googlerecaptcha23) on all forms
- Additional CAPTCHA providers to better support a global audience
- Improved event-based [MFA](/api/v2/customer-identity-api/multi-factor-authentication/overview)
- Optimized [SMS](/api/v2/admin-console/sms-workflow/overview) and [SMTP](/api/v2/admin-console/email-workflow/overview) message deliveries via our messaging partners
- Additional [Password Policy](/api/v2/admin-console/platform-security/password-policy) options, Dictionary Words, and Profile Fields

**Automated Security:** New and improved ways to assist your Ops and Security teams in securing your platform. This removes the need to develop or handle common security cases outside the LoginRadius platform, freeing up your teams to focus on other initiatives. These security cases include the following:

- Automated spam email domain restrictions
- Improved [Adaptive Authentication](/platform-features-overview/user-security/risk-based-authentication) criteria and triggers
- Streamlined automated lockout procedures

You may have already seen some of these features in our recent release. Stay tuned to see how we are improving our systems on our [Changelog](/api/changelog) and [Blog](https://blog.loginradius.com/)
