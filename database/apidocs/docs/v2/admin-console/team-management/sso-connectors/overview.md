# SSO Connectors Overview

This document provides information regarding the SSO connectors that LoginRadius offers to enable Single-sign-on in Admin Console using the various SSO connectors. These connectors act as  identity providers and LoginRadius Admin console as service providers.

The following are the list of SSO connectors supported by LoginRadius Admin Console, using these you can add team members and customize their access permissions:

- ADFS
- Salesforce
- SAML
- Azure AD

## ADFS

Active Directory Federation Services (ADFS) is a Single Sign-On (SSO) solution created by Microsoft. As a component of Windows Server operating systems, it provides customers with authenticated access to applications that are not capable of using Integrated Windows Authentication (IWA) through Active Directory (AD).

Developed to provide flexibility, ADFS manages authentication through a proxy service hosted between AD and the target application. It uses a Federated Trust, linking ADFS and the target application to grant access to customers. This enables customers to log onto the federated application through SSO without needing to authenticate their identity on application directly.

Refer to this [document](/api/v2/admin-console/team-management/sso-connectors/adfs-setup-in-admin-console/) to check the complete ADFS Setup in Admin Console.

## Salesforce

LoginRadius provides a functionality where Salesforce customers can access LoginRadius Admin Console by setting up Salesforce as IDP and LoginRadius Admin Console as an SP using a SAML workflow. Refer to this [document](/api/v2/admin-console/team-management/sso-connectors/salesforce/) for more details.

## SAML

LoginRadius Identity Platform supports both SAML 1.1 and SAML 2.0 flows to manage an Identity Provider (IDP) or as a Service Provider (in case of Custom IDP). It supports both IDP initiated, and SP-initiated SAML flows.

The LoginRadius Admin Console allows you to configure the SAML app by customizing the assertions, keys, and endpoints to match any SAML provider requirements. Refer to this [document](/api/v2/admin-console/team-management/sso-connectors/Saml/#configuresamlsettingsinsalesforceapplication0) for more details.

Additionally, LoginRadius allows your team members to log in to LoginRadius Admin Console using Okta, Ping Identity and OneLogin. You can refer below for more details on this.

[Okta Integration](/api/v2/admin-console/team-management/sso-connectors/okta-integrations/)

[Ping Identity Integration](/api/v2/admin-console/team-management/sso-connectors/ping-identity-integration/)

[OneLogin Integration](/api/v2/admin-console/team-management/sso-connectors/onelogin-integration/)

## Azure AD

You can secure and manage your apps with Azure Active Directory (Azure AD), an integrated identity solution that's being used to help protect millions of apps today. It provides frictionless user experience through single sign-on (SSO) Simplified app deployment with a centralized user portal. The Azure Active Directory (Azure AD) enterprise identity service provides a single sign-on to help protect your users from cybersecurity attacks. **LoginRadius provides you with the functionality where you can setup Azure AD on Windows Azure Active Directory and on your LoginRadius Admin Console to enable SSO.**

Refer to this [document](/api/v2/admin-console/team-management/setup-azure-ad/#configuringapponwindowsazureactivedirectory0) for more details.

> **Note:** If you want us to enforce IAM SSO only for your LoginRadius Admin Console, you need to first login via SSO after successful set-up and click on the checkbox for enabling the same.