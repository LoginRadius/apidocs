
Overview
=====

This section provides details regarding LoginRadius data storage and security compliances. It also provides information about the hashing algorithms and encryption methods supported by LoginRadius for data security.

### Data Storage

We have various data centers all over the world for data storage, and users’ current data storage location can be viewed in <a href = https://adminconsole.loginradius.com/data-governance/data-storage/data-center target=_blank>LoginRadius Admin Console</a>. The [Standard](/api/v2/admin-console/platform-configuration/standard-login) and [Custom](/api/v2/admin-console/platform-configuration/custom-field-configuration) data fields are stored by LoginRadius Cloud Directory for the users’ web properties. LoginRadius has [Custom Object](/api/v2/customer-identity-api/custom-object/overview) for users to store multiple dynamic data as per their requirements.

### Data Security

LoginRadius provides top-notch security to the users’ data and supports numerous methods for data security. LoginRadius platform uses cryptographic hash [algorithms](/security/platform-security/cryptographic-hashing-algorithms/) to store sensitive data such as password, security questions, etc. into the cloud database. We also support encryption for **data transfers** and **data storage** by respective **Encryption in Transit** and **Encryption at Rest** methods.

### Regulations

To meet the requirements of the most security-sensitive organizations, LoginRadius adheres to numerous standards and compliances which you can view <a href = https://adminconsole.loginradius.com/data-governance/trust-center/security-center/data-compliances target=_blank>here</a>. We help users fully comply with GDPR Compliance as well. In addition, we have provided settings in <a href = https://adminconsole.loginradius.com/data-governance/trust-center/privacy-center/privacy-versioning target=_blank>LoginRadius Admin Console</a> for users to set the minimum age required for sign up as per Children's Online Privacy Protection Act (COPPA) rule.