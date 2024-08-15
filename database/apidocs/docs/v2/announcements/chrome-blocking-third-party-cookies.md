# Chrome blocking third-party cookies

## Overview

In response to Chrome's third-party cookie deprecation, web services must adapt to new privacy standards that restrict cross-site tracking. To mitigate cross-site tracking, including cookie restrictions, tracking prevention, and privacy-focused settings, allowing users more control over their online privacy, LoginRadius has implemented Related Website Sets (RWS).

For more information on Chrome's third-party cookie deprec please refer to: https://developers.google.com/privacy-sandbox/3pcd

## Changes Due to Chrome's Trials

Starting July 1, 2024, sites and services registered for third-party cookie deprecation trials will receive a 60-day grace period to deploy trial tokens, beginning from their approval date. This period allows continued access to third-party cookies for non-advertising purposes.
Chrome introduced this grace period to give sites time to migrate away from third-party cookie dependencies. For those approved before July 1, 2024, a one-time 60-day extension is granted, ending August 30, 2024. Sites facing user-facing breakage but not yet in a trial should apply immediately to maintain access. The deprecation trials, covering both first and third-party cookies, are set to conclude on December 27, 2024, though Chrome may extend this deadline. Sites are encouraged to deploy trial tokens quickly for better testing and readiness.

For more information please visit: https://developers.google.com/privacy-sandbox/blog/grace-period-update


## Related Website Sets (RWS) 

Related Website Sets (RWS) enable companies to declare relationships between their sites, allowing browsers to permit limited third-party cookie access for certain purposes. Chrome uses these declared relationships to determine whether to grant or deny a site access to its cookies in a third-party context.
Essentially, a Related Website Set is a group of domains with one designated as the "set primary" and others as "set members."

**Customer Side Requirements:**

- In RWS, you can configure a total of 6 eTLD+1 domains: one primary and 5 associated domains.

- Associated sites have different domains than the primary.

- Subdomains are not allowed.
- All eTLD+1 domains should expose the `.well-known/related-website-set.json endpoint`.

- The primary domain should respond with all the primary and associated domains.

- You need to host the `.well-known/related-website-set.json` file on each primary and associated domain. The domain must be eTLD+1.


**Example:**

- Primary Site: `https://primary-site.com/.well-known/related-website-set.json`


- if any domain that only changes in the country code that can be defined in the ccTLDs, there is no limit of defining the ccTLDs domain.

- in the rationaleBySite, need to defined the relation with the Primary site for all the associated sites and service sites.


```
{
   "contact": "<Email Address>",
   "primary": "https://primary-site.com",
   "associatedSites": [
      "https://associated-site1.com",
      "https://associated-site2.com",
      "https://associated-site3.com",
      "https://associated-site4.com",
      "https://associated-site5.com"
   ],
   "serviceSites": ["https://servicesite1.com"],
   "rationaleBySite": {
      "https://associated-site1.com": "Single sign-on",
      "https://associated-site2.com": "Single sign-on",
      "https://associated-site3.com": "Single sign-on",
      "https://associated-site4.com": "Single sign-on",
      "https://associated-site5.com": "Single sign-on",
      "https://servicesite1.com": "Single sign-on"
   },
   "ccTLDs": {
      "https://primary-site.com": ["https://primary-site.ca", "https://primary-site.co.uk", "https://primary-site.de"],
      "https://associated-site3.com": ["https://associated-site3.ru", "https://associated-site3.co.kr", "https://associated-site3.fr"]
   }
}
```

**Hosting the JSON Endpoint on All the associated domains:**

The `.well-known/related-website-set.json` file must be hosted on all associated domains as follows:

- https://associated-site1.com/.well-known/related-website-set.json
- https://associated-site2.com/.well-known/related-website-set.json
- https://associated-site3.com/.well-known/related-website-set.json
- https://associated-site4.com/.well-known/related-website-set.json
- https://associated-site5.com/.well-known/related-website-set.json

The content of the file should include the primary domain, as in:

```
{
   "primary": "https://primary-site.com.com"
}
```

**GitHub Repository Integration:**

After hosting the `.well-known/related-website-set.json` file on each primary and associated domain:

- Fork the github repo https://github.com/GoogleChrome/related-website-sets   

- In the Forked repo update the related_website_sets.JSON with the primarily related website sets

- Send MR to the main https://github.com/GoogleChrome/related-website-sets  repository

- MR will be validated and merged by the Chrome team, it will be reflected in the Chrome browser and ready to use RWS API.

**LoginRadius Integration**

- Custom Domain Addition: You must add your custom domain to the primary domain in their LoginRadius account, as we host domains on the loginradius.com domain. Due to the multi-tenant nature of this domain, we are unable to host the `.well-known/related-website-set.json` file for individual customers.


- User Gesture Requirement: As RWS requires a first-time user gesture, you must implement a sign-in button click event to obtain permission using the following code:

```
async function signInBtnClickListener(ev) {
    ev.preventDefault()
    try{
        if ('requestStorageAccessFor' in document){
            await document.requestStorageAccessFor("<customDomain>");
        }
    }
    catch(e) {
      console.error(e)
    }
    // To the click event operation
}
```

**User Gesture Action:** This can be managed by implementing the following:

```
async requestAccessStoragePermission() {
            try {
                let resp = await navigator.permissions.query({ name: 'top-level-storage-access', requestedOrigin: idprovider });
                if (resp.state === "granted") {
                    await _self.requestAccessStorageFor();
                }else if (resp.state === "prompt") {
                   // Can show accept cookie popup, and on accepting the cookie consent call signInBtnClickListener tio get stroage access and reload the page
                }
            } catch (error) {
                console.error(error)
            }
            return false
        }
```

No popup will be triggered here, Chrome will auto-grant permission if the page domain where this code is executed is part of the RWS, ensuring no changes in user experience.

If you have more than 6 sites, you must create groups of 6 domains each. For each group, a custom domain needs to be added on the LoginRadius side. A domain part of one group cannot be added to another set. If an already-added domain is included in another set, SSO will not work for that domain in the second group.


**LoginRadius Side**

No changes are required from the LoginRadius side. Before the first click on the site, all SSO login APIs will be blocked as accessing third-party cookies requires user gestures. After the user clicks on the element to gain access, the SSO login API will work as usual.

