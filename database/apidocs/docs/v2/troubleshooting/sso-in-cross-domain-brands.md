# Achieving SSO across multiple cross-domain brands

The LoginRadius web SSO uses the cross-domain API call to set, remove, or retrieve the token from the cookie on the centralized domain. Furthermore, Safari's newer version is blocking cross-domain API calls to manage cookies, thus making it mandatory to set the SSO token via HTTPs redirect. Considering this limitation, there are a few workarounds listed below that you might consider in case of multiple cross-domain brands.

- **Option 1:** Leverage the LoginRadius's [Custom Domain](https://www.loginradius.com/legacy/docs/libraries/identity-experience-framework/overview/#customdomain4) feature to host the LoginRadius IDX page (`https://<your-site-name>.hub.loginradius.com`) on your own domain (say **example.com**)  and move your websites (say **abc.com** and **xyz.com**) to the same top-level IDX domain (say **abc.example.com** and **xyz.example.com**). This will facilitate maintaining a similar flow for the Safari browser to that on the Chrome browser. 

    Following this, you can make the same domain API calls for managing the cookies on the centralized domain. Here, you do not have to redirect the user from your brand/website when there is an existing SSO session on the IDX. LoginRadius's [JavaScript library for SSO](https://www.loginradius.com/legacy/docs/single-sign-on/tutorial/web-sso/overview/#partdeployment2) will return the LoginRadius access token to your website for a seamless experience. 

- **Option 2:** Redirect the user from any of your websites (say **abc.com** and **xyz.com**) to the centralized domain (IDX page: `https://<your-site-name>.hub.loginradius.com`) for authentication, followed by updating the code for the IDX page to support the following workflows: 

    - If there is an existing SSO session on the centralized domain (IDX page), the user will be redirected to the respective website with the LoginRadius access token.

    - If there is no existing SSO session, the user will be asked to authenticate on the IDX page and then redirected to the respective website with the LoginRadius access token.

    Alternatively, you can display the LoginRadius JS form to log in on your brand/website page. After login, the user can be redirected to the IDX page to set the SSO token and redirect back to the respective brand website.

> **Note:** You can leverage the LoginRadius's [Custom Domain](https://www.loginradius.com/legacy/docs/libraries/identity-experience-framework/overview/#customdomain4) feature to host the LoginRadius IDX page (`https://<your-site-name>.hub.loginradius.com`) on your own domain (say **example.com**) and customize the IDX page (centralized domain) with the branding requirements based on which brand/website the user was redirected from. For more information, you can refer to the [Multi-Branding Configuration](https://www.loginradius.com/legacy/docs/libraries/identity-experience-framework/multi-branding-configuration/#multi-branding-configuration) document.


