# Facebook "View As" Security Breach

On September 28th, 2018, Facebook [announced](https://developers.facebook.com/blog/post/2018/09/28/security-update/) that their team had identified a specific security issue that affected more than 50 million accounts. This breach allowed attackers to leverage a "View As" feature within Facebook where users could view their account as an external user. Attackers could use this "View As" feature to generate Facebook session tokens to simulate a valid authenticated session within both Facebook.com and their mobile applications. After simulating these authenticated sessions, attackers were able to assume control of a Facebook account and view any related data, connected applications, as well as leverage Facebook functionality like Facebook Login, Share, Native App Login, etc. 

## Mitigation

Following the initial announcement, Facebook [communicated](https://developers.facebook.com/blog/post/2018/10/02/facebook-login-update/) that they had directly invalidated affected accounts tokens; this closes the breach and forces affected users to re-authenticate in order to leverage their Facebook account.

LoginRadius has also worked to ensure that this breach from Facebook does not negatively impact your site or accounts. The majority of accounts leverage a default or short term LoginRadius access token, and this ensures that attackers that may have assumed an authenticated session would no longer be able to access the system as Facebook has already directly expired their sessions.

If you would like the LoginRadius team to take further action to secure your LoginRadius accounts by directly invalidating all current sessions for your users, please reach out to the LoginRadius support team or directly to your LoginRadius Customer Success Representative. 

## Ongoing Support

We will continue to monitor updates related to the breach, and evaluate any additional options such as utilizing tokens to identify specific affected accounts. At which point, we will leverage these strategies to identify any specific affected accounts that may be part of your ecosystem, and commence additional account security measures to mitigate any potential breaches. 
