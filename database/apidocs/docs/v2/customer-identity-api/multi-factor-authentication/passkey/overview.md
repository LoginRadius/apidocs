# MFA Passkey API Overview

The **MFA Passkey APIs** enable multi-factor authentication through passkeys, providing an additional layer of security for user authentication. These APIs support the registration, verification, and reset of passkeys for MFA purposes. The following are the key API functions available in this suite.

## API Endpoints

1. **Registering a Passkey for MFA**:
   - [Passkey MFA Register Begin using Access Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/passkey/passkey-mfa-register-begin-using-access-token/)
   - [Passkey MFA Register Finish using Access Token](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/passkey/passkey-mfa-register-finish-using-access-token/)
   - These APIs allow users to initiate and complete the registration of a passkey as an MFA method.

2. **Verifying Passkey for MFA**:
   - [Passkey MFA Verify Begin](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/passkey/passkey-mfa-verify-begin/)
   - [Passkey MFA Verify Finish](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/passkey/passkey-mfa-verify-finish/)
   - These APIs are used to start and finish the verification process, where users authenticate with their registered passkey as a secondary authentication factor.

3. **Resetting Passkey Authenticator for MFA**:
   - [Reset MFA Passkey Authenticator](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/passkey/reset-mfa-passkey-authenticator/)
   - [Account Reset MFA Passkey Authenticator](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/passkey/account-reset-mfa-passkey-authenticator/)
   - These APIs help reset the passkey authenticator, enabling users to re-register a passkey if needed.

## Sample Use Cases

1. **User Onboarding with MFA Passkey Registration**:
   - During the user onboarding process, a company might require the user to register a passkey as an MFA option for enhanced security.
   - The process begins with [Account Passkey MFA Register Begin](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/passkey/account-passkey-mfa-register-begin/) to initiate passkey registration and completes with [Account Passkey MFA Register Finish](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/passkey/account-passkey-mfa-register-finish/).

2. **Secure Login with Passkey Verification**:
   - When a user logs in, the system can trigger an MFA challenge using passkeys.
   - The [Passkey MFA Verify Begin](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/passkey/passkey-mfa-verify-begin/) API starts the verification, and [Passkey MFA Verify Finish](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/passkey/passkey-mfa-verify-finish/) completes the authentication once the user provides the correct passkey.

3. **Passkey Reset Due to Device Change**:
   - If a user changes their device or loses access to their registered passkey, they may need to reset their MFA passkey authenticator.
   - The [Account Reset MFA Passkey Authenticator](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/passkey/account-reset-mfa-passkey-authenticator/) API allows them to remove the existing passkey setup and re-register a new one.

## Benefits of Using Passkeys

- Each API is intended to enhance security while maintaining a seamless user experience.
- Integrating these APIs can reduce unauthorized access risks by implementing a stronger, possession-based second factor.
- Enhanced Security: Resistance to phishing attacks and stronger authentication.
- Improved User Experience: Faster logins without the hassle of remembering passwords.
- Reduced Risk of Credential Theft: Elimination of password-related risks.
- Future-Proof Authentication: Ready for evolving security standards and technologies.
