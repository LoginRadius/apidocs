# Scheduled Export

---

The Scheduled Export area will allow you to request a **Recurring, Scheduled Export** of your user data. To request this:

- Click on "Add a New Request"
  <br><br>![Scheduled Export](https://apidocs.lrcontent.com/images/de4_206675e83d9f661df31.38060690.png)
- Select the export type **JSON”** or **CSV** in which you want to export the fields.
  <br><br>![Scheduled Export](https://apidocs.lrcontent.com/images/de5_20215e83dc685219e1.73462090.png)
- Choose the frequency of exports on which you’d like the report to be generated.
  <br><br>![Scheduled Export](https://apidocs.lrcontent.com/images/de6_296575e83dc7b181a73.39015772.png)

- For "Daily", select the UTC time(UTC is the time standard, we use for all data export request and the value should be between 1 to 24).
- For "Weekly", select any weekday.
- For "Monthly", select a date.
- Add in the email addresses of any team members who should be receiving the emailed .csv or .json file.
- Set the Encryption Key
  <br><br>_This will be the password you will need to enter in order to access the file. For security reasons, LoginRadius will not be able to provide you with this if forgotten, so be sure to remember what you have entered._

Once you have submitted your request, you and those you have input as recipients will receive the password-protected **.csv** or **.json** file in the scheduled intervals you have specified. The first export will include all user data, and each subsequent export will include any new or updated data gathered during the time between exports.
