# High Concurrency API Stack Overview

The High Concurrency API Stack is designed to handle high peak load events for a limited period of time, such as product sales, ticket sales, voting events, etc. It uses highly optimized endpoints that are based on our standard LoginRadius APIs but are architected with highly scalable infrastructure designed to handle peak load events. This API stack maintains low latency and high performance for those who require authentication services under high-stress loads (upwards of ~10M requests per minute).

##Supported Features

The API stack is in its first version and currently supports the following features:

- Traditional Login Authentication
- Customer Registration
- Basic Customer Profile Information
- [Brute Force Lockout](/api/v2/admin-console/platform-security/auth-security-configuration#bruteforcelockout2) (Limited to 3 attempts per 24 hours)
- Checks Availability for Email, Username, and Phone Number

##When Should I Use This API?

This API is aimed at customers who receive upwards of ~10M requests per minute for high peak load events, and as such, may have custom requirements. If you do not have demand for this type of load, LoginRadius already offers auto-scaling services with our standard V2 APIs.

##Performance Admin Console

The High Concurrency API stack comes with a separate performance Admin Console where customers can analyze the performance activity on their web and mobile applications for all requests sent to these endpoints.

The data tracked include the following:

- The volume of registration events
- The volume of login events
- The response time for each incoming API request
- The processing time for each incoming API request
- Platform availability
- Peak load analysis

##Limitations

While the features of the High Concurrency API stack are based on existing LoginRadius API endpoints, there are some limitations that have been put in place to separate this API from other services and to optimize the performance.
Please see the list of current limitations below:

- Only one authentication flow is supported. Customers can use one method of authentication on their web or mobile application: email, username or phone number. For example, you cannot offer both log in via email and username at the same time, you have to select one.
- [Brute Force Lockout](/api/v2/admin-console/platform-security/auth-security-configuration#bruteforcelockout2) is available but cannot be customized. If enabled, the default setting will be used and users will be locked out after 3 attempts for 24 hours.
- MFA ([Multi-Factor Authentication](/platform-features-overview/user-security/multi-factor-authentication)) is not supported when using this API stack. You can still use LoginRadius API v2 for MFA but it won’t be able to support high peak volumes.

##Enabling The High Concurrency API Stack

The High Concurrency API stack is available only to customers on the LoginRadius Enterprise Plan at an additional cost. You will need to contact your LoginRadius Customer Success Manager to enable the High Concurrency API stack for your account.
