## Overview

With Chrome phasing out third-party cookies, web services must adapt to new privacy standards that limit cross-site tracking. These standards, including cookie restrictions, tracking prevention, and privacy-focused settings, give users more control over their online privacy. To address these changes, LoginRadius has introduced Related Website Sets (RWS) as a solution.

For more details on Chrome's third-party cookie deprecation, visit [Google's Privacy Sandbox](https://developers.google.com/privacy-sandbox/3pcd).

## Changes Due to Chrome's Trials

Starting July 1, 2024, sites and services enrolled in Chrome's third-party cookie deprecation trials will have a 60-day grace period to implement trial tokens, beginning from the date of approval. This grace period allows continued use of third-party cookies for non-advertising purposes. Chrome introduced this timeframe to help sites transition away from reliance on third-party cookies. Sites approved before July 1, 2024, will receive a one-time 60-day extension, ending on August 30, 2024. Sites experiencing user-facing issues but not yet in a trial should apply immediately to maintain access. The deprecation trials for both first and third-party cookies are scheduled to conclude on December 27, 2024, though Chrome may extend this deadline. Sites are advised to deploy trial tokens promptly for thorough testing and preparation.

For more information, you can visit [Google's Privacy Sandbox blog](https://developers.google.com/privacy-sandbox/blog/grace-period-update).

## Related Website Sets (RWS)

LoginRadius supports the use of Related Website Sets (RWS), which allow companies to declare relationships between their domains, enabling browsers to provide limited third-party cookie access for specific purposes. These declared relationships help browsers like Chrome determine whether to grant or deny a site's access to cookies in a third-party context. Essentially, a Related Website Set consists of a group of domains, with one designated as the "set primary" and the others as "set members. For more information on what this change include and what you need to do, kindly refer to our [documentation](https://www.loginradius.com/legacy/docs/single-sign-on/faq/chrome-blocking-third-party-cookies/).