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

- Initiate Registration using [GET Registration Begin by Passkey API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/registration-begin-by-passkey/), which starts the registration process.

- Complete Registration using [POST Register Finish By Passkey API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/register-finish-by-passkey/) to finalize passkey registration.

- (Optional) Add Another Passkey using POST [Account: Add Passkey Finish API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/add-passkey-finish/), which Adds additional passkeys to the account.

### Passkey Login Flow:

- Initiate Login with [GET Login Begin by Passkey API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/login-begin-by-passkey/), which starts login with the user's Passkey.

- Complete Login using [POST Login Finish By Passkey API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/login-finish-by-passkey/): to finalize passkey-based login.

### (Optional) Reset Passkey:

- Start the Reset Process using [GET Login Reset Passkey Begin API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/login-reset-passkey-begin/): which Begins the Passkey reset.

- Complete Reset with [POST Login Reset Passkey Finish API](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/login-reset-passkey-finish/):. Complete the reset with a new passkey.

### Autofill Login with Passkey:

- Initiate Autofill Login using [GET Autofill Login Begin By Passkey](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/autofill-login-begin-by-passkey/) API: which starts the login process using the browser's autofill passkey.

- Complete Autofill Login using [POST Autofill Login Finish By Passkey](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/autofill-login-finish-by-passkey/) API: which finalizes the autofill-based passkey login.

### Passkey Management APIs:

- List User Passkeys with [GET List User Passkeys](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/list-user-passkeys/) API: to  Retrieves all passkeys registered by a specific user.

- Delete User Passkey by ID using [DEL Remove Passkey By ID](https://www.loginradius.com/legacy/docs/docs/api/v2/customer-identity-api/passkey/remove-passkey-by-id/) API: which Deletes a specific passkey using its unique ID.

- Delete Passkey by User ID (UID) using [DEL Manage Remove Passkey By Uid](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/manage-remove-passkey-by-uid/) API: to Remove all passkeys for a user based on their unique UID.

You can also use our [POST Forgot Passkey](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/forgot-passkey/) API, which allows a user to request assistance for a forgotten passkey, and our [GET Manage List Users Passkeys](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passkey/list-user-passkeys/) API, which allows an admin to view passkeys registered for a specific user.