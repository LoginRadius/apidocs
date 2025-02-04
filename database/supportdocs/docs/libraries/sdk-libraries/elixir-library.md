# Elixir Library

{{table_container}}

## Installation

Install the SDK by adding LoginRadius to your `mix.exs` dependencies:

```elixir
def deps do
  [{:loginradius, "~> 1.0"}]
end
```

Then, run `$ mix deps.get`. A copy of the SDK can also be found on our [Github](https://github.com/LoginRadius/elixir-sdk).

## Quickstart Guide

Before you can use any of the functions available in the library, some settings need to be configured first. To do this, add the following to your list of configurations in your `config.exs` file:

```elixir
config :loginradius,
  appname: <Your LoginRadius AppName>,
  apikey: <Your ApiKey>,
  apisecret: <Your ApiSecret>,
  customapidomain: <Custom API Domain if any, "" if none>
```

The API key and secret can be obtained from the LoginRadius Admin Console. Details on retrieving your key and secret can be found [here](https://www.loginradius.com/legacy/docs/api/v2/admin-console/get-api-key-and-secret#retrieve-your-api-key-and-secret).

All API wrappers contained in the SDK will return either an ok or error tuple in the following format:

```elixir
{<:ok | :error>, {<Status Code>, <Response Body>, <HTTPoison Response>}
(4XX-5XX responses will return :error)
```

### Custom Domain
When initializing the SDK, optionally specify a custom domain. for more click [here](#quickstartguide1)

```
 customapidomain: <Custom API Domain if any, "" if none>
```

## SOTT Generation

Secured One Time Tokens can be generated locally using the provided helper function `LoginRadius.Infrastructure.local_generate_sott/1`, which takes in an integer representing lifetime in minutes as its only argument.

## API

### Authentication API

- [Auth Add Email](#auth-add-email)
- [Auth Forgot Password](#auth-forgot-password)
- [Auth User Registration by Email](#auth-user-registration-by-email)
- [Auth Login by Email](#auth-login-by-email)
- [Auth Login by Username](#auth-login-by-username)
- [Auth Email Availability](#auth-email-availability)
- [Auth Username Availability](#auth-username-availability)
- [Auth Read Profiles by Token](#auth-read-profiles-by-token)
- [Auth Privacy Policy Accept](#auth-privacy-policy-accept)
- [Auth Send Welcome Email](#auth-send-welcome-email)
- [Auth Social Identity](#auth-social-identity)
- [Auth Validate Access Token](#auth-validate-access-token)
- [Auth Verify Email](#auth-verify-email)
- [Auth Delete Account](#auth-delete-account)
- [Auth Invalidate Access Token](#auth-invalidate-access-token)
- [Security Questions by Access Token](#security-questions-by-access-token)
- [Security Questions by Email)](#security-questions-by-email)
- [Security Questions By Username](#security-questions-by-user-name)
- [Security Questions by Phone](#security-questions-by-phone)
- [Auth Verify Email by OTP](#auth-verify-email-by-otp)
- [Auth Change Password](#auth-change-password)
- [Auth Link Social Identities](#auth-link-social-identities)
- [Auth Resend Email Verification](#auth-resend-email-verification)
- [Auth Reset Password by Reset Token](#auth-reset-password-by-reset-token)
- [Auth Reset Password by OTP](#auth-reset-password-by-otp)
- [Auth Reset Password by Security Answer and Email](#reset-password-by-security-answer-and-email-put-)
- [Auth Reset Password by Security Answer and Phone](#reset-password-by-security-answer-and-phone-put-)
- [Auth Reset Password by Security Answer and Username](#reset-password-by-security-answer-and-username-put-)
- [Auth Set or Change User Name](#auth-set-or-change-user-name)
- [Auth Update Profile by Token](#auth-update-profile-by-token)
- [Auth Update Security Questions by Access Token](#auth-update-security-question-by-access-token)
- [Auth Delete Account with Email Confirmation](#auth-delete-account-with-email-confirmation)
- [Auth Remove Email](#auth-remove-email)
- [Auth Unlink Social Identities](#auth-unlink-social-identities)

<br>

##### Auth Add Email

Adds additional emails to a user's account. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-add-email)

Example:

```
access_token = "<Access Token>"
data = %{
  "email" => "<Email>",
  "type" => "Secondary"
}
verification_url = "<Verification URL>"
email_template = "<Template>"

response = access_token
  |> LoginRadius.Authentication.add_email(data, verification_url, email_template)
```

<br>

##### Auth Forgot Password

Sends a reset password url to a specified account. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-forgot-password)

Example:

```
reset_password_url = "<Reset URL>"
data = %{
  "email" => "<Email>"
}
email_template = "<Template>"

response = reset_password_url
  |> LoginRadius.Authentication.forgot_password(data, email_template)
```

<br>

##### Auth User Registration by Email

Creates a user in the database and sends a verification email to the user. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-user-registration-by-email)

Example:

```
data = %{
  "Email" => [
    %{
      "Type" => "Primary",
      "Value" => "<Email>"
    }
  ],
  "Password" => "<Password>"
}
verification_url = "<Verification URL>"
email_template = "<Template>"

response = data
  |> LoginRadius.Authentication.user_registration_by_email(verification_url, email_template)
```

<br>

##### Auth Login by Email

Retrieves a copy of user data based on email. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-login-by-email)

Example:

```
data = %{
  "email" => "<Email>",
  "password" => "<Password>"
}
verification_url = "<Verification URL>"
email_template = "<Template>"

response = data
  |> LoginRadius.Authentication.login_by_email(verification_url, "", email_template)
```

<br>

##### Auth Login by Username

Retrieves a copy of user data based on username. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-login-by-username)

Example:

```
data = %{
  "username" => "<Username>",
  "password" => "<Password>"
}
verification_url = "<Verification URL>"
email_template = "<Template>"

response = data
  |> LoginRadius.Authentication.login_by_username(verification_url, "", email_template)
```

<br>

##### Auth Email Availability

Check if the specified email exists on your site. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-email-availability)

Example:

```
email = "<Email>"

response = email
  |> LoginRadius.Authentication.check_email_availability()
```

<br>

##### Auth Username Availability

Check if the specified username exists on your site. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-username-availability)

Example:

```
username = "<Username>"

response = username
  |> LoginRadius.Authentication.check_username_availability()
```

<br>

##### Auth Read Profiles by Token

Retrieves a copy of user data based on access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-read-profiles-by-token)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.Authentication.read_profiles_by_access_token()
```

<br>

##### Auth Privacy Policy Accept

Updates the privacy policy status in a user's profile based on access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-privacy-policy-accept)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.Authentication.privacy_policy_accept()
```

<br>

##### Auth Send Welcome Email

Sends a welcome email. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-send-welcome-email)

Example:

```
access_token = "<Access Token>"
welcome_email_template = "<Template>"

response = access_token
  |> LoginRadius.Authentication.send_welcome_email(welcome_email_template)
```

<br>

##### Auth Social Identity

Prevents RAAS profile of the second account from getting created (called before account linking API). [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-social-identity)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.Authentication.social_identity()
```

<br>

##### Auth Validate Access Token

Validates access token, returns an error if token is invalid. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-validate-access-token)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.Authentication.validate_access_token()
```

<br>

##### Auth Verify Email

Verifies the email of a user. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-verify-email)

Example:

```
verification_token = "<Verification Token>"
welcome_email_template = "<Template>"

response = verification_token
  |> LoginRadius.Authentication.verify_email("", welcome_email_template)
```

<br>

##### Auth Delete Account

Delete an account based on delete token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-delete-account)

Example:

```
delete_token = "<Delete Token>"

response = delete_token
  |> LoginRadius.Authentication.delete_account()
```

<br>
 
##### Auth Invalidate Access Token
Invalidates an active access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-invalidate-access-token)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.Authentication.invalidate_access_token()
```

<br>

##### Security Questions by Access Token

Retrieves the list of security questions that have been configured for an account by access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/security-questions-by-access-token)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.Authentication.security_questions_by_access_token()
```

<br>

##### Security Questions by Email

Retrieves the list of security questions that have been configured for an account by email. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/security-questions-by-email)

Example:

```
email = "<Email>"

response = email
  |> LoginRadius.Authentication.security_questions_by_email()
```

<br>

##### Security Questions by User Name

Retrieves the list of security questions that have been configured for an account by username. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/security-questions-by-user-name)

Example:

```
username = "<Username>"

response = username
  |> LoginRadius.Authentication.security_questions_by_username()
```

<br>

##### Security Questions by Phone

Retrieves the list of security questions that have been configured for an account by phone ID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/security-questions-by-phone)

Example:

```
phone_id = "<Phone ID>"

response = phone_id
  |> LoginRadius.Authentication.security_questions_by_phone()
```

<br>

##### Auth Verify Email by OTP

Verifies the email of a user when OTP Email verification flow is enabled. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-verify-email-by-otp)

Example:

```
data = %{
  "otp" => "<OTP>",
  "email" => "<Email>"
}
welcome_email_template = "<Template>"

response = data
  |> LoginRadius.Authentication.verify_email_by_otp("", welcome_email_template)
```

<br>

##### Auth Change Password

Changes an account's password based on previous password. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-change-password)

Example:

```
access_token = "<Access Token>"
data = %{
  "oldpassword" => "<Old Password>",
  "newpassword" => "<New Password>"
}

response = access_token
  |> LoginRadius.Authentication.change_password(data)
```

<br>

##### Auth Link Social Identities

Links a social provider account with a specified account based on access token and social provider's user access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-link-social-identities)

Example:

```
access_token = "<Access Token>"
data = %{
  "candidatetoken" => "<Provider Access Token>"
}

response = access_token
  |> LoginRadius.Authentication.link_social_identities(data)
```

<br>

##### Auth Resend Email Verification

Resends a verification email to the user. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-resend-email-verification)

Example:

```
data = %{
  "email" => "<Email>"
}
verification_url = "<Verification URL>"
email_template = "<Template>"

response = data
  |> LoginRadius.Authentication.resend_email_verification(verification_url, email_template)
```

<br>

##### Auth Reset Password by Reset Token

Sets a new password for a specified account using a reset token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-reset-password-by-reset-token)

Example:

```
data = %{
  "resettoken" => "<Reset Token>",
  "password" => "<New Password>",
  "welcomeemailtemplate" => "<Template>",
  "resetpasswordemailtemplate" => "<Template>"
}

response = data
  |> LoginRadius.Authentication.reset_password_by_reset_token()
```

<br>

##### Auth Reset Password by OTP

Sets a new password for a specified account using a One Time Passcode. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-reset-password-by-otp)

Example:

```
data = %{
  "otp" => "<OTP>",
  "email" => "<Email>",
  "password" => "<Password>",
  "welcomeemailtemplate" => "<Template>",
  "resetpasswordemailtemplate" => "<Template>"
}

response = data
  |> LoginRadius.Authentication.reset_password_by_otp()
```

<br>

##### Reset Password by Security Answer and Email (PUT)

Sets a new password for a specified account using a security answer and email. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-reset-password-by-email)

Example:

```
data = %{
  "securityanswer" => %{
    "<Security Question ID>" => "<Answer>"
  },
  "email" => "<Email>",
  "password" => "<New Password>",
  "resetpasswordemailtemplate" => "<Template>"
}

response = data
  |> LoginRadius.Authentication.reset_password_by_security_answer_and_email()
```

<br>

##### Reset Password by Security Answer and Phone (PUT)

Sets a new password for a specified account using a security answer and phone. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-reset-password-by-phone)

Example:

```
data = %{
  "securityanswer" => %{
    "<Security Question ID>" => "<Answer>"
  },
  "phone" => "<Phone ID>",
  "password" => "<New Password>",
  "resetpasswordemailtemplate" => "<Template>"
}

response = data
  |> LoginRadius.Authentication.reset_password_by_security_answer_and_phone()
```

<br>

##### Reset Password by Security Answer and Username (PUT)

Sets a new password for a specified account using a security answer and username. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-reset-password-by-username)

Example:

```
data = %{
  "securityanswer" => %{
    "<Security Question ID>" => "<Answer>"
  },
  "username" => "<Username>",
  "password" => "<New Password>",
  "resetpasswordemailtemplate" => "<Template>"
}

response = data
  |> LoginRadius.Authentication.reset_password_by_security_answer_and_username()
```

<br>

##### Auth Set or Change User Name

Sets or changes a username using an access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-set-or-change-user-name)

Example:

```
access_token = "<Access Token>"
data = %{
  "username" => "<Username>"
}

response = access_token
  |> LoginRadius.Authentication.set_or_change_username(data)
```

<br>

##### Auth Update Profile by Token

Updates a user's profile using an access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-update-profile-by-token)

Example:

```
access_token = "<Access Token>"
data = %{
  "Gender" => "<Gender>"
}
verification_url = "<Verification URL>"

response = access_token
  |> LoginRadius.Authentication.update_profile_by_access_token(data, verification_url)
```

<br>

##### Auth Update Security Question by Access Token

Updates security questions using an access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-update-security-question-by-access-token)

Example:

```
access_token = "<Access Token>"
data = %{
  "securityquestionanswer" => %{
    "<Security Question ID>" => "<Answer>"
  }
}

response = access_token
  |> LoginRadius.Authentication.update_security_questions_by_access_token(data)
```

<br>

##### Auth Delete Account with Email Confirmation

Deletes a user account using its access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-delete-account-with-email-confirmation)

Example:

```
access_token = "<Access Token>"
email_template = "<Template>"

response = access_token
  |> LoginRadius.Authentication.delete_account_with_email_confirmation("", email_template)
```

<br>

##### Auth Remove Email

Removes additional emails from a user's account. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-remove-email)

Example:

```
access_token = "<Access Token>"
data = %{
  "email" => "<Email>"
}

response = access_token
  |> LoginRadius.Authentication.remove_email(data)
```

<br>

##### Auth Unlink Social Identities

Unlinks a social provider account with a specified account using its access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/authentication/auth-unlink-social-identities)

Example:

```
access_token = "<Access Token>"
data = %{
  "provider" => "<Provider>",
  "providerid" => "<Provider ID>"
}

response = access_token
  |> LoginRadius.Authentication.unlink_social_identities(data)
```

<br>

### Account API

- [Account Create](#account-create)
- [Get Email Verification Token](#get-email-verification-token)
- [Get Forgot Password Token](#get-forgot-password-token)
- [Account Identities by Email](#account-identities-by-email)
- [Account Impersonation API](#account-impersonation-api)
- [Account Password](#account-password)
- [Account Profiles by Email](#account-profiles-by-email)
- [Account Profiles by Username](#account-profiles-by-user-name)
- [Account Profiles by Phone ID](#account-profiles-by-phone-id)
- [Account Profiles by UID](#account-profiles-by-uid)
- [Account Set Password](#account-set-password)
- [Account Update](#account-update)
- [Account Update Security Question](#account-update-security-question)
- [Account Invalidate Verification Email](#account-invalidate-verification-email)
- [Account Email Delete](#account-email-delete)
- [Account Delete](#account-delete)

<br>

##### Account Create

Creates an account in LoginRadius Cloud Directory, bypassing the normal email verification process. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-create)

Example:

```
data = %{
  "Email" => [
    %{
      Type" => "Primary",
      "Value" => "<Email>"
    }
  ],
  "Password" => "<Password>"
}

response = data
  |> LoginRadius.Account.create()
```

<br>

##### Get Email Verification Token

Retrieves an Email Verification token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/get-email-verification-token)

Example:

```
data = %{
  "email" => "<Email>"
}

response = data
  |> LoginRadius.Account.email_verification_token()
```

<br>

##### Get Forgot Password Token

Retrieves a Forgot Password token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/get-forgot-password-token)

Example:

```
data = %{
  "email" => "<Email>"
}

response = data
  |> LoginRadius.Account.forgot_password_token()
```

<br>
 
##### Account Identities by Email
Retrieves all identities associated with a specified email. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-identities-by-email)

Example:

```
email = "<Email>"

response = email
  |> LoginRadius.Account.identities_by_email()
```

<br>

##### Account Impersonation

Retrieves a LoginRadius access token based on UID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-impersonation-api)

Example:

```
uid = "<UID>"

response = uid
  |> LoginRadius.Account.user_impersonation()
```

<br>

##### Account Password

Retrieves the hashed password of an account based on UID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-password)

Example:

```
uid = "<UID>"

response = uid
  |> LoginRadius.Account.password()
```

<br>

##### Account Profiles by Email

Retrieves profile data based on email. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-profiles-by-email)

Example:

```
email = "<Email>"

response = email
  |> LoginRadius.Account.profiles_by_email()
```

<br>

##### Account Profiles by Username

Retrieves profile data based on username. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-profiles-by-user-name)

Example:

```
username = "<Username>"

response = username
  |> LoginRadius.Account.profiles_by_username()
```

<br>

##### Account Profiles by Phone ID

Retrieves profile data based on phone ID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-profiles-by-phone-id)

Example:

```
phone_id = "<Phone ID>"

response = phone_id
  |> LoginRadius.Account.profiles_by_phoneid()
```

<br>

##### Account Profiles by UID

Retrieves profile data based on UID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-profiles-by-uid)

Example:

```
uid = "<UID>"

response = uid
  |> LoginRadius.Account.profiles_by_uid()
```

<br>

##### Account Set Password

Sets the password of an account. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-set-password)

Example:

```
uid = "<UID>"
data = %{
  "password" => "<Password>"
}

response = uid
  |> LoginRadius.Account.set_password(data)
```

<br>

##### Account Update

Updates the information of an existing account based on UID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-update)

Example:

```
uid = "<UID>"
data = %{
  "Gender" => "<Gender>"
}

response = uid
  |> LoginRadius.Account.update(data)
```

<br>

##### Account Update Security Question

Updates the security questions configuration of an existing account based on UID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-update-security-question)

Example:

```
uid = "<UID>"
data = %{
  "securityquestionanswer" => %{
    "<Security Question ID>" => "<Answer>"
  }
}

response = uid
  |> LoginRadius.Account.update_security_question_configuration(data)
```

<br>

##### Account Invalidate Verification Email

Invalidates the Email Verification status of an account. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-invalidate-verification-email)

Example:

```
uid = "<UID>"
verification_url = "<Verification URL>"
email_template = "<Template>"

response = uid
  |> LoginRadius.Account.invalidate_verification_status(verification_url, email_template)
```

<br>

##### Account Email Delete

Removes an email on an existing account based on UID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-email-delete)

Example:

```
uid = "<UID>"
data = %{
  "email" => "<Email>"
}

response = uid
  |> LoginRadius.Account.email_delete(data)
```

<br>

##### Account Delete

Removes an existing user account based on UID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/account/account-delete)

Example:

```
uid = "<UID>"

response = uid
  |> LoginRadius.Account.delete()
```

<br>

### Roles Management

- [Roles Create](#roles-create)
- [Get Context](#get-context)
- [Roles List](#roles-list)
- [Get Roles by UID](#get-roles-by-uid)
- [Add Permissions to Role](#add-permissions-to-role)
- [Assign Roles by UID](#assign-roles-by-uid)
- [Upsert Context](#upsert-context)
- [Delete Role](#delete-role)
- [Unassign Roles by UID](#unassign-roles-by-uid)
- [Remove Permissions](#remove-permissions)
- [Delete Context](#delete-context)
- [Delete Role from Context](#delete-role-from-context)
- [Delete Permissions from Context](#delete-permissions-from-context)

<br>

##### Roles Create

Creates roles with permissions. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/roles-create)

Example:

```
data = %{
  "roles" => [
    %{
      "name" => "<Role Name>",
      "permissions" => %{
        "<Permission Name>" => true,
        "<Permission Name>" => true
      }
    }
  ]
}

response = data
  |> LoginRadius.RolesManagement.roles_create()
```

<br>

##### Get Context

Retrieves the contexts which have been configured for a user and its associated roles and permissions. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/get-context)

Example:

```
uid = "<UID>"

response = uid
  |> LoginRadius.RolesManagement.get_contexts()
```

<br>

##### Roles List

Retrieves complete list of created roles with permissions of your app. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/roles-list)

Example:

```
response = LoginRadius.RolesManagement.roles_list()
```

<br>

##### Get Roles by UID

Retrieves all assigned roles of a particular user by uid. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/get-roles-by-uid)

Example:

```
uid = "<UID>"

response = uid
  |> LoginRadius.RolesManagement.roles_by_uid()
```

<br>

##### Add Permissions to Role

Adds permissions to a given role. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/add-permissions-to-role)

Example:

```
role_name = "<Role Name>"
data = %{
  "permissions" => [
    "<Permission Name>",
    "<Permission Name>"
  ]
}

response = role_name
  |> LoginRadius.RolesManagement.add_permissions_to_role(data)
```

<br>

##### Assign Roles by UID

Assigns created roles to a user. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/assign-roles-by-uid)

Example:

```
uid = "<UID>"
data = %{
  "Roles" => [
    "<Role Name>"
  ]
}

response = uid
  |> LoginRadius.RolesManagement.assign_roles_by_uid(data)
```

<br>

##### Upsert Context

Creates a context with a set of roles. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/upsert-context)

Example:

```
uid = "<UID>"
data = %{
  "rolecontext" => [
    %{
      "context" => "<Role Context Name>",
      "roles" => [
        "<Role Name>",
        "<Role Name>"
      ],
      "additionalpermissions" [
        "<Additional Permission Name>",
        "<Additional Permission Name>"
      ],
      "expiration" => "<Expiration Date>"
    }
  ]
}

response = uid
  |> LoginRadius.RolesManagement.upsert_context(data)
```

<br>

##### Delete Role

Deletes a role given a role name. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/delete-role)

Example:

```
role_name = "<Role Name>"

response = role_name
  |> LoginRadius.RolesManagement.delete_role()
```

<br>

##### Unassign Roles by UID

Unassigns roles from a user given uid. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/unassign-roles-by-uid)

Example:

```
uid = "<UID>"
data = %{
  "roles" => [
    "<Role Name>"
  ]
}

response = uid
  |> LoginRadius.RolesManagement.unassign_roles_by_uid(data)
```

<br>

##### Remove Permissions

Removes permissions from a role. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/remove-permissions)

Example:

```
role_name = "<Role Name>"
data = %{
  "permissions" => [
    "<Permission Name>"
  ]
}

response = role_name
  |> LoginRadius.RolesManagement.remove_permissions(data)
```

<br>

##### Delete Context

Deletes a specified role context given UID and role context name. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/delete-context)

Example:

```
uid = "<UID>"
role_context_name = "<Role Context Name>"

response = uid
  |> LoginRadius.RolesManagement.delete_role_context(role_context_name)
```

<br>

##### Delete Role from Context

Deletes a specified role from a context. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/delete-role-from-context)

Example:

```
uid = "<UID>"
role_context_name = "<Role Context Name>"
data = %{
  "roles" => [
    "<Role Name>"
  ]
}

response = uid
  |> LoginRadius.RolesManagement.delete_role_from_context(role_context_name, data)
```

<br>

##### Delete Permissions from Context

Deletes additional permissions from context. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/roles-management/delete-permissions-from-context)

Example:

```
uid = "<UID>"
role_context_name = "<Role Context Name>"
data = %{
  "additionalpermissions" => [
    "<Additional Permission Name>"
  ]
}

response = uid
  |> LoginRadius.RolesManagement.delete_additional_permissions_from_context(role_context_name, data)
```

<br>

### Social APIs

- [Post Message API](#post-message-api)
- [Get Trackable Status Stats](#get-trackable-status-stats)
- [Access Token](#access-token)
- [Validate Access Token](#validate-access-token)
- [Invalidate Access Token](#invalidate-access-token)
- [Album](#album)
- [Audio](#audio)
- [Check-In](#check-in)
- [Company](#company)
- [Contact](#contact)
- [Event](#event)
- [Following](#following)
- [Group](#group)
- [Like](#like)
- [Mention](#mention)
- [Get Message API](#get-message-api)
- [Page](#page)
- [Photo](#photo)
- [Post](#post)
- [Status Fetching](#status-fetching)
- [Status Posting](#status-posting)
- [User Profile](#user-profile)
- [Video](#video)

<br>

##### Post Message API

Posts messages to a user's contacts. This is part of the Friend Invite System. Used after the Contact API, and requires setting of permissions in LoginRadius Admin Console. Supported: Twitter, LinkedIn. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/post-message-api)

Example:

```
access_token = "<Access Token>"
to = "<Recipient Social Provider ID>"
subject = "<Message Subject>"
message = "<Message>"

response = access_token
  |> LoginRadius.SocialLogin.message_post(to, subject, message)
```

<br>

##### Get Trackable Status Stats

Updates the status on a user's wall. Supported: Facebook, Twitter, LinkedIn. [More Info](https://www.loginradius.com/legacy/docs/api/v2/social-login/post-status-posting)

Example:

```
access_token = "<Access Token>"
title = "<Title of Linked URL>"
url = "<URL to be shared in status>"
image_url = "<Image to be displayed in share>"
status = "<Status Body>"
caption = "<Message displayed below description>"
description = "<Description of displayed URL>"

response = access_token
  |> LoginRadius.SocialLogin.status_posting_post(title, url, image_url, status, caption, description)
```

<br>

##### Access Token

Translates the request token returned during social provider authentication into an access token that can be used with LoginRadius API calls. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/access-token)

Example:

```
request_token = "<Request Token>"

response = request_token
  |> LoginRadius.SocialLogin.access_token()
```

<br>

##### Validate Access Token

Validates an access token, returns error if invalid. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/validate-access-token)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.validate_access_token()
```

<br>

##### Invalidate Access Token

Invalidates an active access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/invalidate-access-token)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.invalidate_access_token()
```

<br>

##### Album

Retrieves the photo albums associated with an access token. Supported: Facebook, Google, Live, Vkontakte. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/album)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.album()
```

<br>

##### Audio

Retrieves the audio files associated with an access token. Supported: Live, Vkontakte. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/audio)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.audio()
```

<br>

##### Check-In

Retrieves the check in data associated with an access token. Supported: Facebook, Foursquare, Vkontakte. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/check-in)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.check_in()
```

<br>

##### Company

Retrieves a user's followed companies data associated with an access token. Supported: Facebook, LinkedIn. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/company)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.company()
```

<br>

##### Contact

Retrieves the contacts/friends/connections data associated with an access token. This is part of the LoginRadius Friend Invite System, and requires permissions to be set in the LoginRadius Admin Console. Supported: Facebook, Foursquare, Google, LinkedIn, Live, Twitter, Vkontakte, Yahoo. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/contact)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.contact()
```

<br>

##### Event

Retrieves Event data associated with an access token. Supported: Facebook, Live. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/event)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.event()
```

<br>

##### Following

Retrieves Following user list associated with an access token. Supported: Twitter. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/following)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.following()
```

<br>

##### Group

Retrieves Group data associated with an access token. Supported: Facebook, Vkontakte. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/group)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.group()
```

<br>

##### Like

Retrieves Like data associated with an access token. Supported: Facebook. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/like)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.like()
```

<br>

##### Mention

Retrieves Mentions data associated with an access token. Supported: Twitter. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/mention)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.mention()
```

<br>

##### Get Message API

Posts messages to a user's contacts. This is part of the Friend Invite System. Used after the Contact API, and requires setting of permissions in LoginRadius Admin Console. Identical to Message (POST). Supported: LinkedIn, Twitter. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/get-message-api)

Example:

```
access_token = "<Access Token>"
to = "<Recipient Social Provider ID>"
subject = "<Message Subject>"
message = "<Message>"

response = access_token
  |> LoginRadius.SocialLogin.message_get(to, subject, message)
```

<br>

##### Page

Retrieves page data associated with an access token. Supported: Facebook, LinkedIn. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/page)

Example:

```
access_token = "<Access Token>"
page_name = "<Page Name>"

response = access_token
  |> LoginRadius.SocialLogin.page(page_name)
```

<br>

##### Photo

Retrieves photo data associated with an access token. Supported: Facebook, Foursquare, Google, Live, Vkontakte. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/photo)

Example:

```
access_token = "<Access Token>"
album_id = "<Album ID>"

response = access_token
  |> LoginRadius.SocialLogin.photo(album_id)
```

<br>

##### Post

Retrieves Post message data associated with an access token. Supported: Facebook. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/post)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.post()
```

<br>

##### Status Fetching

Retrieves status messages associated with an access token. Supported: Facebook, LinkedIn, Twitter, Vkontakte. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/status-fetching)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.status_fetching()
```

<br>

##### Status Posting

Updates the status on a user (associated with an access token)'s wall. Identical to Status Posting (POST). Supported: Facebook, Twitter, LinkedIn. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/status-posting)

Example:

```
access_token = "<Access Token>"
title = "<Title of Linked URL>"
url = "<URL to be shared in status>"
image_url = "<Image to be displayed in share>"
status = "<Status Body>"
caption = "<Message displayed below description>"
description = "<Description of displayed URL>"

response = access_token
  |> LoginRadius.SocialLogin.status_posting_get(title, url, image_url, status, caption, description)
```

<br>

##### User Profile

Retrieves social profile data associated with an access token. Supported: All. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/user-profile)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.user_profile()
```

<br>

##### Video

Retrieves video files data associated with an access token. Supported: Facebook, Google, Live, Vkontakte. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/advanced-social-api/video)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.SocialLogin.video()
```

<br>

### Phone Authentication

- [Phone Login](#phone-login)
- [Phone Forgot Password by OTP](#phone-forgot-password-by-otp)
- [Phone Resend OTP](#phone-resend-otp)
- [Phone Resend OTP by Token](#phone-resend-otp-by-token)
- [Phone User Registration by SMS](#phone-user-registration-by-sms)
- [Phone Number Availability](#phone-number-availability)
- [Phone Send OTP](#phone-send-otp-get-)
- [Phone Login Using OTP](#phone-login-using-otp-put-)
- [Phone Number Update](#phone-number-update)
- [Phone Reset Password by OTP](#phone-reset-password-by-otp)
- [Phone Verify OTP](#phone-verify-otp)
- [Phone Verify OTP by Token](#phone-verify-otp-by-token)
- [Reset Phone ID Verification](#reset-phone-id-verification)
- [Remove Phone ID by Access Token](#remove-phone-id-by-access-token)

<br>

##### Phone Login

Retrieves a copy of user data based on Phone ID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-login)

Example:

```
data = %{
  "phone" => "<Phone ID>",
  "password" => "<Password>",
  "securityanswer" => %{
    "<Security Question ID>" => "<Answer>"
  }
}

response = data
  |> LoginRadius.PhoneAuthentication.login()
```

<br>

##### Phone Forgot Password by OTP

Sends OTP to reset the account password. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-forgot-password-by-otp)

Example:

```
data = %{
  "phone" => "<Phone ID>"
}
sms_template = "<Template>"

response = data
  |> LoginRadius.PhoneAuthentication.forgot_password_by_otp(sms_template)
```

<br>

##### Phone Resend OTP

Resends a verification OTP to verify a user's phone number. User will receive a verification code that they will need to input. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-resend-otp)

Example:

```
data = %{
  "phone" => "<Phone ID>"
}
sms_template = "<Template>"

response = data
  |> LoginRadius.PhoneAuthentication.resend_verification_otp(sms_template)
```

<br>

##### Phone Resend OTP by Token

Resends a verification OTP to verify a user's phone number in cases where an active token already exists. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-resend-otp-by-token)

Example:

```
access_token = "<Access Token>"
data = %{
  "phone" => "<Phone ID>"
}
sms_template = "<Template>"

response = data
  |> LoginRadius.PhoneAuthentication.resend_verification_otp_by_access_token(data, sms_template)
```

<br>

##### Phone User Registration by SMS

Registers a new user into Cloud Directory and triggers the phone verification process. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-user-registration-by-sms)

Example:

```
data = %{
  "PhoneId" => "<Phone ID>",
  "Email" => [
    %{
      "Type" => "Primary",
      "Value" => "<Email>"
    }
  ]
  "Password" => "<Password>"
}
sms_template = "<Template>"

response = data
  |> LoginRadius.PhoneAuthentication.user_registration_by_sms("", sms_template)
```

<br>

##### Phone Number Availability

Checks if the specified phone number already exists on your site. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-number-availability)

Example:

```
phone_id = "<Phone ID>"

response = phone_id
  |> LoginRadius.PhoneAuthentication.phone_number_availability()
```

<br>

##### Phone Send OTP

Sends a One Time Passcode by verified phone ID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passwordless-login/passwordless-login-by-phone/)

Example:

```
phone_id = "<Phone ID>"
sms_template = "<Template>"

response = phone_id
  |> LoginRadius.PhoneAuthentication.send_one_time_passcode(sms_template)
```

<br>

##### Phone Login Using OTP

Verifies a login by One Time Passcode. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passwordless-login/phone-login-using-otp)

Example:

```
data = %{
  "phone" => "<Phone ID>",
  "otp" => "<OTP>"
}

response = data
  |> LoginRadius.PhoneAuthentication.login_using_one_time_passcode()
```

<br>

##### Phone Number Update

Updates a user's login phone number. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-number-update)

Example:

```
access_token = "<Access Token>"
data = %{
  "phone" => "<Phone ID>"
}

response = access_token
  |> LoginRadius.PhoneAuthentication.phone_number_update(data)
```

<br>

##### Phone Reset Password by OTP

Resets a user's password using OTP. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-reset-password-by-otp)

Example:

```
data = %{
  "phone" => "<Phone ID>",
  "otp" => "<OTP>",
  "password" => "<Password>"
}

response = data
  |> LoginRadius.PhoneAuthentication.reset_password_by_otp()
```

<br>

##### Phone Verify by OTP

This API is used to validate the verification code sent to verify a user's phone number. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-verify-otp)

Example:

```
otp = "<OTP>"
data = %{
  "phone" => "<Phone ID>"
}

response = otp
  |> LoginRadius.PhoneAuthentication.verify_otp(data)
```

<br>

##### Phone Verify OTP by Access Token

Consumes the verification code sent to verify a user's phone number. For use in front-end where user has already logged in by passing user's access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/phone-verify-otp-by-token)

Example:

```
access_token = "<Access Token>"
otp = "<OTP>"

response = access_token
  |> LoginRadius.PhoneAuthentication.verify_otp_by_access_token(otp)
```

<br>

##### Reset Phone ID Verification

Resets phone number verification of a user's account. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/reset-phone-id-verification)

Example:

```
uid = "<UID>"

response = uid
  |> LoginRadius.PhoneAuthentication.reset_phone_id_verification()
```

<br>

##### Remove Phone ID by Access Token

Deletes the Phone ID on a user's account using access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/phone-authentication/remove-phone-id-by-access-token)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.PhoneAuthentication.remove_phone_id_by_access_token()
```

<br>

### Multi-Factor Authentication

- [MFA Email Login](#mfa-email-login)
- [MFA Username Login](#mfa-user-name-login)
- [MFA Phone Login](#mfa-phone-login)
- [MFA Validate Access Token](#mfa-validate-access-token)
- [MFA Backup Code by Access Token](#mfa-backup-code-by-access-token)
- [MFA Reset Backup Code by Access Token](#mfa-reset-backup-code-by-access-token)
- [MFA Backup Code by UID](#mfa-backup-code-by-uid)
- [MFA Reset Backup Code by UID](#mfa-reset-backup-code-by-uid)
- [MFA Validate Backup Code](#mfa-validate-backup-code)
- [MFA Validate OTP](#mfa-validate-otp)
- [MFA Validate Google Auth Code](#mfa-validate-google-auth-code)
- [MFA Update Phone Number](#mfa-update-phone-number)
- [MFA Update Phone Number by Token](#mfa-update-phone-number-by-token)
- [Update MFA by Access Token](#update-mfa-by-access-token)
- [Update MFA Setting](#update-mfa-setting)
- [MFA Reset Google Authenticator by Token](#mfa-reset-google-authenticator-by-token)
- [MFA Reset SMS Authenticator by Token](#mfa-reset-sms-authenticator-by-token)
- [MFA Reset Google Authenticator by UID](#mfa-reset-google-authenticator-by-uid)
- [MFA Reset SMS Authenticator by UID](#mfa-reset-sms-authenticator-by-uid)

<br>

##### MFA Email Login

Logs in by Email ID on a Multi-Factor Authentication enabled site. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-email-login)

Example:

```
data = %{
  "email" => "<Email ID>",
  "password" => "<Password>"
}

response = data
  |> LoginRadius.MultiFactorAuthentication.login_by_email()
```

<br>

##### MFA Username Login

Logs in by Username on a MFA enabled site. API wrapper is identical to email, except data object contains username instead of email. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-user-name-login)

Example:

```
data = %{
  "username" => "<Username>",
  "password" => "<Password>"
}

response = data
  |> LoginRadius.MultiFactorAuthentication.login_by_username()
```

<br>

##### MFA Phone Login

Logs in by Phone ID on a MFA enabled site. API wrapper is identical to email, except data object contains phone instead of email. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-phone-login)

Example:

```
data = %{
  "phone" => "<Phone ID>",
  "password" => "<Password>"
}

response = data
  |> LoginRadius.MultiFactorAuthentication.login_by_phone()
```

<br>

##### MFA Validate Access Token

Configures MFA after login using access token. For use with MFA set to optional. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-validate-access-token)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.MultiFactorAuthentication.validate_access_token()
```

<br>

##### MFA Backup Code by Access Token

Retrieves a set of backup codes using access token to allow user login on a site with MFA enabled in the event that the user does not have a secondary factor available. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-backup-code-by-access-token)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.MultiFactorAuthentication.backup_codes_by_access_token()
```

<br>

##### MFA Reset Backup Code by Access Token

Resets the backup codes on a given account using access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-reset-backup-code-by-access-token)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.MultiFactorAuthentication.reset_backup_codes_by_access_token()
```

<br>

##### MFA Backup Code by UID

Retrieves a set of backup codes using UID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-backup-code-by-uid)

Example:

```
uid = "<UID>"

response = uid
  |> LoginRadius.MultiFactorAuthentication.backup_codes_by_uid()
```

<br>

##### MFA Reset Backup Code by UID

Resets the backup codes on a given account using UID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-reset-backup-code-by-uid)

Example:

```
uid = "<UID>"

response = uid
  |> LoginRadius.MultiFactorAuthentication.reset_backup_codes_by_uid()
```

<br>

##### MFA Validate Backup Code

Validates the backup code provided by the user, returns an access token allowing user to login. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-validate-backup-code)

Example:

```
second_factor_authentication_token = "<Second Factor Authentication Token>"
data = %{
  backupcode => "<Backup Code>"
}

response = second_factor_authentication_token
  |> LoginRadius.MultiFactorAuthentication.validate_backup_code(data)
```

<br>

##### MFA Validate OTP

Validates the One Time Passcode received via SMS for use with MFA. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-validate-otp)

Example:

```
second_factor_authentication_token = "<Second Factor Authentication Token>"
data = %{
  otp => "<OTP>"
}

response = second_factor_authentication_token
  |> LoginRadius.MultiFactorAuthentication.validate_otp(data)
```

<br>

##### MFA Validate Google Auth Code

Validates google authenticator code for use with MFA. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-validate-google-auth-code)

Example:

```
second_factor_authentication_token = "<Second Factor Authentication Token>"
data = %{
  "googleauthenticatorcode" => "<Google Auth Code>"
}

response = second_factor_authentication_token
  |> LoginRadius.MultiFactorAuthentication.validate_google_auth_code(data)
```

<br>

##### MFA Update Phone Number

Updates (if configured) the phone number used for MFA. API authenticates using the second factor authentication token. Sends a verification OTP to provided phone number. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-update-phone-number)

Example:

```
second_factor_authentication_token = "<Second Factor Authentication Token>"
data = %{
  "phoneno2fa" => "<Multi Factor Phone Number>"
}
sms_template_2fa = "<Template>"

response = second_factor_authentication_token
  |> LoginRadius.MultiFactorAuthentication.update_phone_number(data, sms_template_2fa)
```

<br>

##### MFA Update Phone Number by Access Token

Updates the MFA phone number by sending a verification OTP to the provided phone number. API authenticates using user's login access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-update-phone-number-by-token)

Example:

```
access_token = "<Access Token>"
data = %{
  "phoneno2fa" => "<Multi Factor Phone Number>"
}
sms_template_2fa = "<Template>"

response = access_token
  |> LoginRadius.MultiFactorAuthentication.update_phone_number_by_access_token(data, sms_template_2fa)
```

<br>

##### Update MFA by Access Token

Enables Multi Factor Authentication by access token upon user login. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/update-mfa-by-access-token)

Example:

```
access_token = "<Access Token>"
data = %{
  "googleauthenticatorcode" => "<Google Auth Code>"
}

response = access_token
  |> LoginRadius.MultiFactorAuthentication.update_mfa_by_access_token(data)
```

<br>

##### Update MFA Setting

Enables Multi Factor Authentication by OTP upon user login. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/update-mfa-setting)

Example:

```
access_token = "<Access Token>"
data = %{
  "otp" => "<OTP>"
}

response = access_token
  |> LoginRadius.MultiFactorAuthentication.update_mfa_setting(data)
```

<br>

##### MFA Reset Google Authenticator by Access Token

Resets the Google Authenticator configurations on a given account using user's access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-reset-google-authenticator-by-token)

Example:

```
access_token = "<Access Token>"
data = %{
  "googleauthenticator" => true
}

response = access_token
  |> LoginRadius.MultiFactorAuthentication.reset_google_authenticator_by_access_token(data)
```

<br>

##### MFA Reset SMS Authenticator by Access Token

Resets the SMS Authenticator configurations on a given account using user's access token. Identical to Reset Google Authenticator by Access Token except data object has key otpauthenticator instead of googleauthenticator. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-reset-sms-authenticator-by-token)

Example:

```
access_token = "<Access Token>"
data = %{
  "otpauthenticator" => true
}

response = access_token
  |> LoginRadius.MultiFactorAuthentication.reset_sms_authenticator_by_access_token(data)
```

<br>

##### MFA Reset Google Authenticator by UID

Resets the Google Authenticator configurations on a given account using user's UID. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-reset-google-authenticator-by-uid)

Example:

```
uid = "<UID>"
data = %{
  "googleauthenticator" => true
}

response = uid
  |> LoginRadius.MultiFactorAuthentication.reset_google_authenticator_by_uid(data)
```

<br>

##### MFA Reset SMS Authenticator by UID

Resets the SMS Authenticator configurations on a given account using user's UID. Identical to Reset Google Authenticator by UID except data object has key otpauthenticator instead of googleauthenticator. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/multi-factor-authentication/mfa-reset-sms-authenticator-by-uid)

Example:

```
uid = "<UID>"
data = %{
  "otpauthenticator" => true
}

response = uid
  |> LoginRadius.MultiFactorAuthentication.reset_sms_authenticator_by_uid(data)
```

<br>

### Passwordless Login

- [Passwordless Login by Email](#passwordless-login-by-email)
- [Passwordless Login by Username](#passwordless-login-by-username)
- [Passwordless Login Verification](#passwordless-login-verification)

<br>

##### Passwordless Login by Email

Sends a Passwordless Login verification link to provided email. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passwordless-login/passwordless-login-by-email)

Example:

```
email = "<Email>"
passwordless_login_template = "<Template>"
verification_url = "<Verification URL>"

response = email
  |> LoginRadius.PasswordlessLogin.login_by_email(passwordless_login_template, verification_url)
```

<br>

##### Passwordless Login by Username

Sends a Passwordless Login verification link to provided username. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passwordless-login/passwordless-login-by-username)

Example:

```
username = "<Username>"
passwordless_login_template = "<Template>"
verification_url = "<Verification URL>"

response = username
  |> LoginRadius.PasswordlessLogin.login_by_email(passwordless_login_template, verification_url)
```

<br>

##### Passwordless Login Verification

Verifies a Passwordless Login verification link. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/passwordless-login/passwordless-login-verification)

Example:

```
verification_token = "<Verification Token>"
welcome_email_template = "<Template>"

response = verification_token
  |> LoginRadius.PasswordlessLogin.login_verification(welcome_email_template)
```

<br>

### Smart Login

- [Smart Login By Email](#smart-login-by-email)
- [Smart Login by Username](#smart-login-by-username)
- [Smart Login Ping](#smart-login-ping)
- [Smart Login Verify Token](#smart-login-verify-token)

<br>

##### Smart Login By Email

Sends a Smart Login link to a user's email using specified email. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/smart-login/smart-login-by-email)

Example:

```
email = "<Email>"
client_guid = "<Client GUID>"
smart_login_email_template = "<Template>"
welcome_email_template = "<Template>"
redirect_url = "<Redirect URL>"

response = email
  |> LoginRadius.SmartLogin.login_by_email(client_guid, smart_login_email_template, welcome_email_template, redirect_url)
```

<br>

##### Smart Login by Username

Sends a Smart Login link to a user's email using specified username. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/smart-login/smart-login-by-username)

Example:

```
username = "<Username>"
client_guid = "<Client GUID>"
smart_login_email_template = "<Template>"
welcome_email_template = "<Template>"
redirect_url = "<Redirect URL>"

response = username
  |> LoginRadius.SmartLogin.login_by_email(client_guid, smart_login_email_template, welcome_email_template, redirect_url)
```

<br>

##### Smart Login Ping

Checks if the Smart Login link has been clicked or not. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/smart-login/smart-login-ping)

Example:

```
client_guid = "<Client GUID>"

response = client_guid
  |> LoginRadius.SmartLogin.ping()
```

<br>

##### Smart Login Verify Token

Verifies the provided token for Smart Login. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/smart-login/smart-login-verify-token)

Example:

```
verification_token = "<Verification Token>"
welcome_email_template = "<Template>"

response = verification_token
  |> LoginRadius.SmartLogin.verify_token(welcome_email_template)
```

<br>

### One Touch Login

- [One Touch Login by Email](#one-touch-login-by-phone-captcha)
- [One Touch Login by Phone](#one-touch-login-by-phone-get-)
- [One Touch Email Verification](#one-touch-email-verification)
- [One Touch OTP Verification](#one-touch-otp-verification)

<br>

##### One Touch Login by Email

Sends a link to a specified email for frictionless login. [More Info](https://www.loginradius.com/legacy/docs/api/v2/one-touch/one-touch-login-by-email)

Example:

```
email = "<Email>"
client_guid = "<Client GUID>"
name = "<Name of User>"
redirect_url = "<Redirect URL>"
one_touch_login_email_template = "<Template>"
welcome_email_template = "<Template>"

response = email
  |> LoginRadius.OneTouchLogin.login_by_email(client_guid, name, redirect_url, one_touch_login_email_template, welcome_email_template)
```

<br>

##### One Touch Login by Phone

Sends a One Time Password to a given phone number for a frictionless login. [More Info](https://www.loginradius.com/legacy/docs/api/v2/one-touch/one-touch-login-by-phone)

Example:

```
phone_id = "<Phone ID>"
name = "<Name of User>"
sms_template = "<Template>"

response = phone_id
  |> LoginRadius.OneTouchLogin.login_by_phone(name, sms_template)
```

<br>

##### One Touch Email Verification

Verifies the provided token for One Touch Login by email. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/one-touch-login/one-touch-email-verification)

Example:

```
verification_token = "<Verification Token>"
welcome_email_template = "<Template>"

response = verification_token
  |> LoginRadius.OneTouchLogin.verify_otp_by_email(welcome_email_template)
```

<br>

##### One Touch OTP Verification

Verifies the One Time Passcode for One Touch Login. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/one-touch-login/one-touch-otp-verification)

Example:

```
otp = "<OTP>"
data = %{
  "phone" => "<Phone ID>"
}
sms_template = "<Template>"

response = otp
  |> LoginRadius.OneTouchLogin.verify_otp(data, sms_template)
```

<br>

### Custom Object Management

- [Create Custom Object by UID](#create-custom-object-by-uid)
- [Create Custom Object by Token](#create-custom-object-by-token)
- [Custom Object by ObjectRecordId and UID](#custom-object-by-objectrecordid-and-uid)
- [Custom Object by ObjectRecordId and Token](#custom-object-by-objectrecordid-and-token)
- [Custom Object by Token](#custom-object-by-token)
- [Custom Object by UID](#custom-object-by-uid)
- [Custom Object Update by ObjectRecordId and UID](#custom-object-update-by-objectrecordid-and-uid)
- [Custom Object Update by ObjectRecordId and Token](#custom-object-update-by-objectrecordid-and-token)
- [Custom Object Delete by ObjectRecordId and UID](#custom-object-delete-by-objectrecordid-and-uid)
- [Custom Object Delete by ObjectRecordId and Token](#custom-object-delete-by-objectrecordid-and-token)

<br>

##### Create Custom Object by UID

Writes data to a custom object for a specified account by uid. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/create-custom-object-by-uid)

Example:

```
uid = "<UID>"
object_name = "<Object Name>"
data = %{
  "<Custom Data Key>" => "<Custom Data Value>",
  "<Custom Data Key>" => "<Custom Data Value>"
}

response = uid
  |> LoginRadius.CustomObjectManagement.create_by_uid(object_name, data)
```

<br>

##### Create Custom Object by Token

Writes data to a custom object for a specified account by access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/create-custom-object-by-token)

Example:

```
access_token = "<Access Token>"
object_name = "<Object Name>"
data = %{
  "<Custom Data Key>" => "<Custom Data Value>",
  "<Custom Data Key>" => "<Custom Data Value>"
}

response = access_token
  |> LoginRadius.CustomObjectManagement.create_by_access_token(object_name, data)
```

<br>

##### Custom Object by ObjectRecordId and UID

Retrieves Custom Object data for a specified account by object name, id, and account uid. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-by-objectrecordid-and-uid)

Example:

```
uid = "<UID>"
object_record_id = "<Object Record ID>"
object_name = "<Object Name>"

response = uid
  |> LoginRadius.CustomObjectManagement.get_by_objectrecordid_and_uid(object_record_id, object_name)
```

<br>

##### Custom Object by ObjectRecordId and Token

Retrieves Custom Object data for a specified account by object name, id, and access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-by-objectrecordid-and-token)

Example:

```
access_token = "<Access Token>"
object_record_id = "<Object Record ID>"
object_name = "<Object Name>"

response = access_token
  |> LoginRadius.CustomObjectManagement.get_by_objectrecordid_and_access_token(object_record_id, object_name)
```

<br>

##### Custom Object by Token

Retrieves Custom Object data for a specified account by object name and access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-by-token)

Example:

```
access_token = "<Access Token>"
object_name = "<Object Name>"

response = access_token
  |> LoginRadius.CustomObjectManagement.get_by_access_token(object_name)
```

##### Custom Object by UID

Retrieves Custom Object data for a specified account by object name and account uid. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-by-uid)

Example:

```
uid = "<UID>"
object_name = "<Object Name>"

response = uid
  |> LoginRadius.CustomObjectManagement.get_by_uid(object_name)
```

<br>

##### Custom Object Update by ObjectRecordId and UID

Updates Custom Object data for a specified account by object name, id, and account uid. If updatetype = replace, object will be replaced with new object. If updatetype = partialreplace, new object will be upserted(merged). [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-update-by-objectrecordid-and-uid)

Example:

```
uid = "<UID>"
object_record_id = "<Object Record ID>"
object_name = "<Object Name>"
update_type = "<Update Type>"
data = %{
  "<Custom Data Key>" => "<Custom Data Value>"
}

response = uid
  |> LoginRadius.CustomObjectManagement.update_by_objectrecordid_and_uid(object_record_id, object_name, update_type, data)
```

<br>

##### Custom Object Update by ObjectRecordId and Token

This API is used to update the specified custom object data of the specified account. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-update-by-objectrecordid-and-token)

Example:

```
access_token = "<Access Token>"
object_record_id = "<Object Record ID>"
object_name = "<Object Name>"
update_type = "<Update Type>"
data = %{
  "<Custom Data Key>" => "<Custom Data Value>"
}

response = access_token
  |> LoginRadius.CustomObjectManagement.update_by_objectrecordid_and_access_token(object_record_id, object_name, update_type, data)
```

<br>

##### Custom Object Delete by ObjectRecordId and UID

Deletes Custom Object data from a specified account by object name, id, and account uid. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-delete-by-objectrecordid-and-uid)

Example:

```
uid = "<UID>"
object_record_id = "<Object Record ID>"
object_name = "<Object Name>"

response = uid
  |> LoginRadius.CustomObjectManagement.delete_by_objectrecordid_and_uid(object_record_id, object_name)
```

<br>

##### Custom Object Delete by ObjectRecordId and Access Token

Deletes Custom Object data from a specified account by object name, id, and access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-object/custom-object-delete-by-objectrecordid-and-token)

Example:

```
access_token = "<Access Token>"
object_record_id = "<Object Record ID>"
object_name = "<Object Name>"

response = access_token
  |> LoginRadius.CustomObjectManagement.delete_by_objectrecordid_and_access_token(object_record_id, object_name)
```

<br>

### Custom Registration Data

- [Add Registration Data](#add-registration-data)
- [Validate Code](#validate-code)
- [Get Registration Data](#get-registration-data)
- [Auth Get Registration Data](#auth-get-registration-data)
- [Update Registration Data](#update-registration-data)
- [Delete Registration Data](#delete-registration-data)

<br>

##### Add Registration Data

Adds data to your custom DropDownList configured for user registration. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-registration-data/add-registration-data)

Example:

```
data = %{
  "Data" => [
    %{
      "type" => "<Type of Datasource>",
      "key" => "<Text to Display>",
      "value" => "<Value>",
      "parentid" => "<ID of Parent Member>",
      "code" => "<Validation Code>",
      "isactive" => #true/false
    }
  ]
}

response = data
  |> LoginRadius.CustomRegistrationData.add_registration_data()
```

<br>

##### Validate Code

Adds data to your custom DropDownList configured for user registration. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-registration-data/validate-code)

Example:

```
data = %{
  "recordid" => "<Record ID>",
  "code" => "<Validation Code>"
}

response = data
  |> LoginRadius.CustomRegistrationData.validate_code()
```

<br>

##### Get Registration Data

Retrieves dropdown data. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-registration-data/get-registration-data)

Example:

```
type = "<Type of Datasource>"
parent_id = "<ID of Parent Member>"
skip = "<Records to Skip>"
limit = "<Records to Retrieve>"

response = type
  |> LoginRadius.CustomRegistrationData.get_registration_data(parent_id, skip, limit)
```

<br>

##### Auth Get Registration Data

Retrieves dropdown data. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-registration-data/auth-get-registration-data)

Example:

```
type = "<Type of Datasource>"
parent_id = "<ID of Parent Member>"
skip = "<Records to Skip>"
limit = "<Records to Retrieve>"

response = type
  |> LoginRadius.CustomRegistrationData.auth_get_registration_data(parent_id, skip, limit)
```

<br>

##### Update Registration Data

Updates a member of configured DropDownList. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-registration-data/update-registration-data)

Example:

```
record_id = "<Record ID>"
data = %{
  "IsActive" => #true/false,
  "Type" => "<Type of Datasource>",
  "Key" => "<Text to Display>",
  "Value" => "<Value>",
  "ParentId" => "<ID of Parent Member>",
  "Code" => "<Validation Code>"
}

response = record_id
  |> LoginRadius.CustomRegistrationData.update_registration_data(data)
```

<br>

##### Delete Registration Data

Deletes a member of configured DropDownList. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/custom-registration-data/delete-registration-data)

Example:

```
record_id = "<Record ID>"

response = record_id
  |> LoginRadius.CustomRegistrationData.delete_registration_data()
```

<br>

### Configuration/Infrastructure

- [Get Configurations](#get-configurations)
- [Get Server Time](#get-server-time)
- [Generate SOTT Token](#generate-sott-token)
- [Generate Local SOTT Token (Helper)](#generate-local-sott-token-helper-)

<br>

##### Get Configurations

Gets set configurations from the LoginRadius Admin Console for a particular site from apikey. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/configuration/get-configurations)

Example:

```
response = LoginRadius.Configuration.get_configurations()
```

<br>

##### Get Server Time

Queries for basic server information. Time difference is used to generate values for SOTT generation. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/configuration/get-server-time)

Example:

```
time_difference = "<Time Difference>"

response = time_difference
  |> LoginRadius.Infrastructure.get_server_time()
```

<br>

##### Generate SOTT Token

Generates a Secured One Time Token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/session/generate-sott-token)

Example:

```
validity_length = "<Valid time for SOTT>"

response = validity_length
  |> LoginRadius.Infrastructure.generate_sott()
```

<br>

##### Generate Local SOTT Token

Generates a Secured One Time Token locally. Returns a `String.t()`.

Example:

```
validity_length = "<Valid time for SOTT>"

sott = validity_length
  |> LoginRadius.Infrastructure.local_generate_sott()
```

<br>

### Token Management

- [Access Token via Facebook Token](#access-token-via-facebook-token)
- [Access Token via Twitter Token](#access-token-via-twitter-token)
- [Access Token via Vkontakte Token](#access-token-via-vkontakte-token)
- [Refresh User Profile](#refresh-user-profile)
- [Refresh Token](#refresh-token)
- [Get Active Session Details](#get-active-session-details)

<br>

##### Access Token via Facebook Token

Retrieves a LoginRadius access token by sending Facebook's access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/native-social-login-api/access-token-via-facebook-token)

Example:

```
fb_access_token = "<Access Token from Facebook>"

response = fb_access_token
  |> LoginRadius.TokenManagement.access_token_via_facebook_token()
```

<br>

##### Access Token via Twitter Token

Retrieves a LoginRadius access token by sending Twitter's access token and token secret. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/native-social-login-api/access-token-via-twitter-token)

Example:

```
tw_access_token = "<Access Token from Twitter>"
tw_token_secret = "<Token Secret from Twitter>"

response = tw_access_token
  |> LoginRadius.TokenManagement.access_token_via_twitter_token(tw_token_secret)
```

<br>

##### Access Token via Vkontakte Token

Retrieves a LoginRadius access token by sending Vkontakte's access token. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/native-social-login-api/access-token-via-vkontakte-token)

Example:

```
vk_access_token = "<Access Token from Vkontakte>"sss

response = vk_access_token
  |> LoginRadius.TokenManagement.access_token_via_vkontakte_token()
```

<br>

##### Refresh User Profile

Retrieves the latest updated social profile data after authentication. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/refresh-token/refresh-user-profile)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.TokenManagement.refresh_user_profile()
```

<br>

##### Refresh Token

Refreshes the LoginRadius access token after authentication. Also refreshes the provider access token if available. Supported Providers: Facebook, Yahoo, Google, Twitter, Linkedin. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/refresh-token/refresh-token)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.TokenManagement.refresh_access_token()
```

<br>

##### Get Active Session Details

Retrieves all active sessions by an access token. Supported Providers: Facebook, Yahoo, Google, Twitter, Linkedin. [More Info](https://www.loginradius.com/legacy/docs/api/v2/customer-identity-api/social-login/get-active-session-details)

Example:

```
access_token = "<Access Token>"

response = access_token
  |> LoginRadius.TokenManagement.get_active_session_details()
```

<br>

### Webhooks

- [Webhook Subscribe](#webhook-subscribe)
- [Webhook Test](#webhook-test)
- [Webhook Subscribed URLs](#webhook-subscribed-urls)
- [Webhook Unsubscribe](#webhook-unsubscribe)

<br>

##### Webhook Subscribe

Subscribes a Webhook on your LoginRadius site. [More Info](https://www.loginradius.com/legacy/docs/api/v2/integrations/web-hook-subscribe-api)

Example:

```
data = %{
  "targeturl" => "<Target URL>",
  "event" => "<Event>"
}

response = data
  |> LoginRadius.Webhooks.subscribe()
```

<br>

##### Webhook Test

Tests subscribed Webhooks. [More Info](https://www.loginradius.com/legacy/docs/api/v2/integrations/web-hook-test)

Example:

```
response = LoginRadius.Webhooks.test()
```

<br>

##### Webhook Subscribed URLs

Retrieves all subscribed URLs for a particular event. [More Info](https://www.loginradius.com/legacy/docs/api/v2/integrations/web-hook-subscribed-urls)

Example:

```
event = "<Event>"

response = event
  |> LoginRadius.Webhooks.get_subscribed_urls()
```

<br>

##### Webhook Unsubscribe

Unsubscribes a Webhook configured on your LoginRadius site. [More Info](https://www.loginradius.com/legacy/docs/api/v2/integrations/web-hook-unsubscribe)

Example:

```
data = %{
  "targeturl" => "<Target URL>",
  "event" => "<Event>"
}

response = data
  |> LoginRadius.Webhooks.unsubscribe()
```

<br>

### Tests

A test suite is included and available for use in the [Github repository](https://github.com/LoginRadius/elixir-sdk). To run these tests, download the project and navigate to its root directory. Fill out your credential information in `config/config.exs`. Use `$ mix test` to run the test suite. To test Social APIs, ensure that the social provider tokens are filled out in the `test/loginradius_test.exs` file. To test Custom Object Management APIs, ensure that the test custom object name is filled out in the same file.

To test Multi Factor Authentication APIs, ensure that MFA is set to enabled on your LoginRadius Admin Console, and use `$ mix test --only mfa` to run the suite.
<br>

## Demo

A simple demo web application with an Elixir server backend (using the Elixir SDK) is available [here](https://github.com/LoginRadius/elixir-sdk). The following features are included:

- Traditional Email Login
- Multi-Factor Email Login
- Passwordless Login
- Social Login
- Registration
- Email Verification
- Forgot Password
- Reset Password
- Change Password
- Set Password
- Update Account
- Multi-Factor Configuration
- Account Linking
- Custom Object Management
- Roles Management

### Configuration

Install Elixir from their site [here](https://elixir-lang.org/install.html).

##### Back-end

1. Fill your app name, API key and secret in the `config/config.exs` file in the back-end demo directory.
2. Run `$ mix deps.get` to fetch any required dependencies.
3. Start the server with `$ mix phx.server`.

##### Front-end

1. Put the front-end project into the root directory of your server.
2. Fill your API key, app name and an SOTT in the `js/options.js` file in the front-end demo directory.
3. Ensure the Elixir server is running in the background.

## Reference Manual

Find the Elixir hex.pm reference manual [here](https://hexdocs.pm/loginradius/1.0.0/LoginRadius.html).
