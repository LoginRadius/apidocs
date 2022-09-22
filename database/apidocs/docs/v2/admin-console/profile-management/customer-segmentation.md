# Customer Segmentation
Customer Segmentation allows you query your customer data and export the returned data from the query. This means that you can perform analytics directly via LoginRadius on your Customer data.
## Basic Segmentation
You can apply multiple filters to create a segmented list if your customers meet the criteria you have set. After that you will be able  the filtered data if the return dataset is less than 1M number of records. Here is the step-by-step guide to export the data: 

1. Click on **+** button to add multiple conditions and then click filter button.
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/cs2_203755e83bd7d747291.81867924.png "")

2. Click “Export” button to export the filtered data 

3. It will pop-up a form tab showing basic query in the filter Query box. You can select the export type to JSON or CSV. If you select export type to CSV, the **Select Fields** dropdown will be rendered. You can select multiple data fields from the dropdown for CSV format. Fill all the required fields,  Export Type, Email addresses and Encryption Key.  After that click **Request export**.
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/cs4_323405e83be14c57287.05187228.png "")

3. Once **Request export** button is clicked, LoginRadius will send you (and any additional recipients) an email with a secure link to download the data extract in requested (CSV or JSON) format. You will need the Encryption key from the previous step to open the file.

## Advanced Segmentation
Advanced Segmentation allows you filter using nested queries or JSON code segmentation. You can create filters with more refined criteria and use this information to target specific customer groups. After that you will be able  the filtered data if the return dataset is less than 1M number of records. Here is the step-by-step guide to export the data:

1. Click **+** and **Add Group** buttons to add multiple conditions in nested form.
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/cs8_255125e83c0125908e8.78841762.png "Advanced segmentation export")

2. Click **Export** button to export the filtered data 

3. It will pop-up a form tab showing basic query in the filter Query box. You can select the export type to JSON or CSV. If you select export type to CSV, the “Select Fields” dropdown will be rendered. You can select multiple data fields from the dropdown for CSV format. Fill all the required fields,  Export Type, Email addresses and Encryption Key.  After that click **Request export**.
<br><br>![enter image description here](https://apidocs.lrcontent.com/images/cs10_238655e83c0833d74e2.82111239.png "")

4. Once **Request export** button is clicked, LoginRadius will send you (and any additional recipients) an email with a secure link to download the data extract in requested (CSV or JSON) format. You will need the Encryption key from the previous step to open the file.

## Maximum number of export records
In order to comply with industry security and compliance best practices data exports originating from the LoginRadius admin console are limited to 1M of total user profiles in a single export request. If you exceed these metrics in a single export request you will receive the message as **"Contact support or your Customer Success Manager to generate a full data export"**.