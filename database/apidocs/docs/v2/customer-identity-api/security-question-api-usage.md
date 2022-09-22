# Security Question API overview


In this document section, you can find out the API endpoints provided by LoginRadius to retrieve and update security questions and answers for your application.

Security questions configured through your Admin Console will be stored as **key-value pairs** . A random string will be generated and used as the _QuestionId_ of the configured security question.

- [Account Get Configurations API](/api/v2/customer-identity-api/configuration/get-configurations#protactedContent): This API is used to retrieve your site's configuration, in response, it returns the configured_ questions_ and generated _QuestionId_ on your site.

For an example here is sample return of security questions:
 ```
{
    ...
    "SecurityQuestions": {
      "Questions": [
        {
          "QuestionId": "2acec20722394dc3bd6362ef27df824e",
          "Question": "What is your favourite donut?"
        },
        {
          "QuestionId": "5ea913df084b4dbcb3100820769e8d1a",
          "Question": "What's your first job?"
        }
      ],
      "SecurityQuestionCount": 2
    }
    ...
  }
```

## Retrieve security questions for a customer

There are several API endpoints for returning the security question your customer has configured:

- [Get Security Questions By Access Token](/api/v2/customer-identity-api/authentication/security-questions-by-access-token/): This API is used to retrieve the list of security questions based on user’s Access Token.

- [Get Security Questions By Email](/api/v2/customer-identity-api/authentication/security-questions-by-email/): This API is used to retrieve the list of security questions based on the user’s email id.

- [Get Security Questions By User Name](/api/v2/customer-identity-api/authentication/security-questions-by-user-name/): This API is used to retrieve the list of security questions based on the username of the user.

- [Get Security Question By Phone Id](/api/v2/customer-identity-api/authentication/security-questions-by-phone/): This API is used to retrieve the list of security questions based on user’s phone id.

These API endpoints will only return the question(s) the user has configured upon registration for an example : 
```
[
  {
    "QuestionId": "0a67b****343fdab*****fe9a5c16b",
    "Question": "what is your middlename?"
  }
]
```

## Update the security question answer for a customer 


 - [Put Auth Update Security Question](/api/v2/customer-identity-api/authentication/auth-update-security-question-by-access-token/): This API endpoint will be used to update the security question answer for a customer with their access token. 

Please note that the body must be submitted in this format, with the random string QuestionId as the key holding the answer as value.

```
{
  "securityquestionanswer": {
    "abcd1234abcd1234": "Answer"
  }
}
```
This endpoint will not change the security questions returned by the endpoints documented in the section "Retrieve security questions for a customer".

If your application has 2 security questions set up, but a customer has only answered Question 1 (but not Question 2) during registration, then updating their answer to Question 2 will not result in both Question 1 and Question 2 being returned by the retrieve security question by access token/email/username/ phone ID API endpoints. Only Question 1 will be returned for this customer since they have only configured Question 1 at the time of their registration.
For the API used to update this setting, please read on to the next section.

## Update the customer’s configured security questions


- [Put Account Update Security Question API](/api/v2/customer-identity-api/account/account-update-security-question): This API endpoint will be used to update the security questions configured on an existing account.

If your customer has only configured Question 1 at the time of registration and has not provided an answer for Security Question 2, calling this API with the answer and QuestionID of Security Question 2 will result in Question 2 being configured for them in addition to Question 1. From this point on, calling retrieve security question with access token/email/username/phone ID endpoints will result in both security questions being returned for this customer.
