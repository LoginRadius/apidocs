# Data ETL Service Introduction
 
The Data ETL Service lets you perform customer profile migration operations ( Delete, Update and Insert)  into the LoginRadius database through the means of CSV files. Once the Data ETL request is completed in the database, LoginRadius will send you an email notification with a secure link to access the Data ETL log file showing action performed on the each record.


## Data ETL service Guide

This guide will take you through the process to start the customer profile migration using Data ETL Service. It covers everything you need to know on how to request a data operation.

To request data operation you can perform the following actions:

1. Request an **Import** into LoginRadius database
2. Request an **update** on the existing imported data.
3. Request a new **data deletion** of the existing data from the LoginRadius database.


> **Pre-requisites:**
> - Data ETL feature should be enabled on your account.
> - CSV file of customer profiles.

### Enable Data ETL Service

Login to your [**Admin Console**](https://adminconsole.loginradius.com/) account and navigate to [**Integration > Data ETL Service > Data ETL Migration**](https://adminconsole.loginradius.com/integration/data-etl-service/data-etl-migration)
The following screen will appear:

![Enable Data ETL](https://apidocs.lrcontent.com/images/etl1_256625ee3e1bab58748.84726762.png "Enable data ETL")

The above screen displays that this feature is enabled for your account. If not enabled for your account, raise a request to the [LoginRadius Support Team](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket).

## Part 1 - Data ETL

This section covers the required steps that you need to take to perform a new data Import, update an existing migrated customer profiles, and delete existing migrated records. Please follow the below steps:

## Import 

If you have the two different applications one is LoginRadius and the one is other application and you are having the list of profiles that you want to add in the LoginRadius database but the number of profiles is very high and you don’t want to do it one by one. You can leverage the **Import** operation in the Data ETL to insert the profiles in the following steps:

**Step 1:** For this please navigate to [**Integration > Data ETL Service > Data ETL Migration**](https://adminconsole.loginradius.com/integration/data-etl-service/data-etl-migration).
The following screen will appear:

![Enable Data ETL](https://apidocs.lrcontent.com/images/etl2_316545ee3e25bc26ea8.68631427.png "Enable data ETL")

**Step 2:** Select the same **CSV delimiter** you have set in your CSV file. The following screen displays the available **CSV delimiter** options: 

![CSV delimiter](https://apidocs.lrcontent.com/images/etl3_62475ee3e2c146e112.32953672.png "CSV delimiter")

The LoginRadius supports the following three **CSV delimiter**:

- Comma(,)
- Semicolon(;)
- Pipe(|)

**Step 3:** As per your requirement you can use the option **Skip first row** of the uploaded CSV file. This is useful when your CSV file may have its first row containing the column headers instead of Customer data.

![skip first row](https://apidocs.lrcontent.com/images/etl4_116855ee3e3087a2e00.09826416.png "skip first row")

**Step 4:** Set the password for the log file under the **Set log file password** field.

![Set log file password](https://apidocs.lrcontent.com/images/etl5_118025ee3e33bd7bd84.49121510.png "Set log file password")

**Step 5:** Upload a CSV file containing the customer profile information by clicking on the **Choose file option**.
The following screen will appear:

![choose file option](https://apidocs.lrcontent.com/images/etl6_92505ee3e366a98403.79366232.png "choose file option")

> **Note:** The CSV file used to upload must be of *.csv file extension. 

**Step 6:** Select the **Lookup Type** you wish to trigger. The following screen displays the available  lookup type options: 

The LoginRadius supports the following four lookup types:

- Email
- phoneId
- UId
- UserName

Lookup Type is how the Data ETL service locates the customer profile that needs to be inserted, updated, or deleted. Therefore, a valid CSV file has to include mapping for at least 1 of the 4 fields mentioned above.

It is used to search for a user profile. **For example**, if Lookup Type is **Uid,** for every row in the CSV file, our service will use the Uid value in the CSV and search the user profile database to determine if there is a profile with the same Uid. The service will use the information in CSV row to update that profile. If the profile doesn't exist yet, our service will create a new user profile and insert the corresponding data in the CSV row.

![Lookup Type](https://apidocs.lrcontent.com/images/etl7_296965ee3e3b38a19d9.36013386.png " Lookup Type").

**Step 7:** Select the Fields that you want to map the CSV columns to. Mappings for Email along with Mandatory fields in Data Schema is required, as well as a mapping that corresponds with the Lookup Type.

> **Note:** Using this feature passwords cannot be migrated. For more details around migrating the password, you can refer to this [document](/api/v2/getting-started/data-migration/).


Selecting an LR field in the dropdown menu will show a new dropdown menu to the right to select the CSV column. Once you select a CSV file as well as the corresponding delimiter, this right-side dropdown menu will be populated with number options beginning from 0, 1, 2… up to the number of columns in the CSV file. Selecting a “CSV Column” number will let the CSV data in that column to be mapped to the corresponding “LR Field”:

![Mapping](https://apidocs.lrcontent.com/images/etl8_260985ee3e428211292.86418916.png "Mapping here")


**For example**, the content of my CSV file is:

Address 1|Address 2|PostalCode
357 First Ave|Suite 102|95034
456 Second Ave|Room 902|95035

To map the address information to the “Addresses” LR Field, I would select:
- list text here“Addresses” on the left side dropdown menu

Then on the right side:

- “0” for the “Addresses.Address1” dropdown
- “1” for the “Addresses.Address2” dropdown
- “2” for the “Addresses.PostalCode” dropdown

Notice that since the column index begins with 0, the very first column in the CSV file is considered column “0” instead of column “1”. This follows for all subsequent column indices.

You can provide any number of mappings, but these fields are always required:

- Email
- Any field that is configured to be “Required” in Data Schema, under Standard Login
- The Lookup Type that has been selected

**Step 8:**  Please set the **Lookup index**. Depending upon the **CSV delimiter** you have set while creating the CSV file you have to set the same CSV delimiter while deleting the requested data operation. 

**For example,** The content of my CSV file is:

UID|Email|Password|

In CSV file if the set CSV delimiter is Pipe(|) and the lookup types are email, UID and password and you want to delete the email field. For this action, while deleting the data operation you have to set the same CSV delimiter and required lookup type which needs to be deleted.

In the Lookup Index:


- “0” for the “UID” dropdown
- “1” for the “Email” dropdown
- “2” for the “password” dropdown

> **Note:** This field is required only while deleting the previously requested data operation 

Please refer the below screenshot:

![Lookup index](https://apidocs.lrcontent.com/images/etl9_177095ee3e460a0d638.80398744.png "Lookup index")

## Update 

If you need to update one or more fields in the customer profile, e.g., your customer has signed up for the newsletter on marketing site and you need to update the consent field in the newly signed customers in the LoginRadius database,, you can upload this list in the **update** section of the Data ETL feature, filling in the remaining details. Once all the details are completed, click on the **update** option it will update all your profiles.

![Update ETL](https://apidocs.lrcontent.com/images/pasted-image-0-17_31283626b7b69155ef6.84299726.png "Update ETL")


## Delete UseCase

You can use the Data ETL feature to perform the bulk delete of the customers, e.g.,  you want to delete all the customers who are not using their account for a long time,e.g., a year, you can leverage Delete operation in the Data ETC feature in the Admin Console. 

 
You must have the list of the profiles that you want to delete in the csv format. To get the list of inactive profiles, you can use the [Advanced Segmentation](/customer-management/customer-segmentation/advanced-segmentation/#advanced-segmentation) option and can export the list of the inactive account by filtering based on the **lastlogindate** field. Once the list is available, you can upload this list in the **delete** section of the Data ETL feature, filling in the remaining details, and click on the **DELETE** option to delete all the profiles based on the CSV file.

![Data ETL](https://apidocs.lrcontent.com/images/etl_2605962664d0fd0c1d8.53587691.png "Data ETL")


## Part 2 - Data ETL Logs
 
Data ETL Logs show the request history of Data ETL requests and the downloadable links for logs if available. 
 
ETL Logs contain the following information:
 


- **Start TIme:** Time at which the data operation started.
- **Action:**  This will determine which data operation you have executed. We have 3 Actions: Upsert for Importing the data operation, Update for updating the data operation, and, **Delete** for Deleting the data operation.
- **Download link:** File can be downloaded from this button.
- **Expiry time:** Time at which the download link expires.
- **Status:** If the request data operation is done or pending.
 
You can download the file by clicking on the **Download** button available under the download link tab. Please refer to the below screenshot.

![Data ETL logs](https://apidocs.lrcontent.com/images/etl10_151645ee3e4bb1724f9.11801332.png "Data ETL logs here")

> **Note:** Also, sometimes it may take up to an hour to receive the report/download link and this depends on the pipeline requests.
