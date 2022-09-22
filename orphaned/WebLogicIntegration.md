# Weblogic Integration : SSLKeyException: Hostname verification failed – LoginRadius

LoginRadius is a software as a service(SaaS) provider and it's services are interoperable with any platform or service. LoginRadius API calls are always operated over a secured SSL encrypted connection over HTTP and for this purpose we have acquired wildcard certificates for domain names : "*.hub.loginradius.com" and "*.api.loginradius.com".

We have observed some customers using Java based application servers such WebLogic getting the following error while making LoginRadius API calls.

 "SSLKeyException: Hostname verification failed HostnameVerifier=weblogic.security.utils.SSLWLSHostnameVerifier, hostname=api.loginradius.com"

This occurs due to the inability of default hostname verifier in releases prior to WLS 10.3.6 to validate wildcard certificates. See [here][1] for the official release notes from Oracle.

 We suggest customers using WebLogic to perform  the following in the event of such errors.

**For customers using releases older than WLS 10.3.6 :**

1. Implement hotfix by turning off host-name verification in WebLogic console. Navigate to WebLogic admin console -> Environment -> Servers -> Server -> Configuration -> SSL . Set the Hostname Verification field to None.

2. Raise a tech support call and get the patch from Oracle that will fix the issue.

**For customers using releases later than WLS 10.3.6 :**

1. Go to the WebLogic admin console -> Environment -> Servers -> Server -> Configuration -> SSL

2. Under advanced options , change "Hostname Verification" from "BEA Hostname Verifier" to "Custom Hostname Verifier".

3. Set "Custom Hostname Verifier" to weblogic.security.utils.SSLWLSWildcardHostnameVerifier

4. Click "Save" and then "Activate Changes"

5. Restart your server.



[1]: https://docs.oracle.com/middleware/11119/wls/NOTES/whatsnew.htm#NOTES182
