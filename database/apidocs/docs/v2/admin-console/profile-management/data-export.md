# Data Export

You can export data for profiles created in the specified date range in JSON or CSV format using Data Export tab in Admin Console. Here is the step-by-step guide to export data using Data Export:

1. Click **Add a New Request** button to create a request

   ![](https://apidocs.lrcontent.com/images/DE_206235e83d8a1cdc1e2.60263275.png)

2. It will pop-up a form tab. Fill all the required fields, Export Type, Start Date, End Date, Email addresses and Encryption Key. If you select export type to CSV, the “Select Fields” dropdown will be rendered. You can select multiple data fields from the dropdown for CSV format. After that click **Request export**.

   ![enter image description here](https://apidocs.lrcontent.com/images/de2_278435e83d8d566b595.39992476.png)

   > **Note:** **Custom Object** export and **Profile and Custom Object** export will have the custom object field only when the custom object schema has been configured by LoginRadius in the analytical database.

3. Once **Request export** button is clicked, LoginRadius will send you (and any additional recipients) an email with a secure link to download the data extract in requested (CSV or JSON) format. You will need the Encryption key from the step 2 to open the file.

## Maximum number of export records

In order to comply with industry security and compliance best practices data exports originating from the LoginRadius admin console are limited to 1M results of total user profiles in a single export request. If you exceed these metrics in a single export request you will receive the below error message. Contact support or your Customer Success Manager to generate a full data export.
