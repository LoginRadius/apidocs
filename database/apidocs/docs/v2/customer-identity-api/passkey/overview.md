# Passkey Overview

Passkeys are advanced cryptographic keys designed to replace passwords, offering faster, easier, and more secure sign-ins across websites and apps on all your devices. Unlike traditional passwords, passkeys are inherently strong, resistant to phishing, and eliminate the need for shared secrets.
Passkeys represent a secure, passwordless future where each passkey is a unique cryptographic key pair enabling seamless access to online services.

## Benefits of Using Passkeys

- Enhanced Security: Resistance to phishing attacks and stronger authentication.
- Improved User Experience: Faster logins without the hassle of remembering passwords.
- Reduced Risk of Credential Theft: Elimination of password-related risks.
- Future-Proof Authentication: Ready for evolving security standards and technologies.

## LoginRadius API usage for Passkey:

### Passkey Registration Flow:

- Initiate Registration using [Get Registration Begin by Passkey API](/api/v2/customer-identity-api/passkey/registration-begin-by-passkey/), which starts the registration process.

- Complete Registration using [POST Register Finish By Passkey API](/api/v2/customer-identity-api/passkey/register-finish-by-passkey/) to finalize passkey registration.

- (Optional) Add Another Passkey using POST [Account: Add Passkey Finish API](/api/v2/customer-identity-api/passkey/add-passkey-finish/), which Adds additional passkeys to the account.

### Passkey Login Flow:

- Initiate Login with [Get Login Begin by Passkey API](/api/v2/customer-identity-api/passkey/login-begin-by-passkey/), which starts login with the user's Passkey.

- Complete Login using [POST Login Finish By Passkey API](/api/v2/customer-identity-api/passkey/login-finish-by-passkey/): to finalize passkey-based login.

### (Optional) Reset Passkey:

- Start the Reset Process using [Get Login Reset Passkey Begin API](/api/v2/customer-identity-api/passkey/login-reset-passkey-begin/): which Begins the Passkey reset.

- Complete Reset with [POST Login Reset Passkey Finish API](/api/v2/customer-identity-api/passkey/login-reset-passkey-finish/):. Complete the reset with a new passkey.