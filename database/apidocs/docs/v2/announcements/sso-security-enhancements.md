# SSO  Security Enhancements

As we seek to improve our existing Web SSO services, on September 24, 2019, LoginRadius will be rolling out security and performance improvements surrounding the Web SSO services. While no action is required on your end, you can read along this document for details as to what will change.


## How these enhancements will benefit you

- Increased security as to how we maintain our secure tokens.

- Improved token extensibility with a format change from a simple string to JSON.

**What does this actually mean?**

These changes will improve the security, standards, performance, and extendability of how your Web SSO session is stored in the browser, this will be done by overhauling the algorithms and encoding format used for the tokens. 

**Security:** To improve security we will be using HMAC-SHA 256 hashing moving forward on the ``"_htok_"`` cookie.

**Extensibility:** We will change the format from a simple string to JSON(JavaScript Object Notation) which will be designed to allow the addition of new capabilities or functionality in the future.


## Impact

**Changes:** There won’t be any changes in the implementation of LoginRadius services that are required on your end.
 
**Experience:** Following this release on 24th September 2019, all of the active Single Sign-On sessions will be invalidated. Consequently, the end-users will be required to re-authenticate in order to recreate their Single Sign on session. 

## Timeline

On September 24, 2019, LoginRadius will be rolling out these changes. 

If you have any questions, please contact LoginRadius Support at: support@loginradius.com. 


