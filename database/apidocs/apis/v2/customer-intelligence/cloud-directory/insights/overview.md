Insights API Overview
====
------

While you can leverage the Cloud Directory's [Identity API](/api/v2/cloud-directory-api/identity/getting-started) to get data on your individual customers, it does not allow you to pull aggregate data. By using the Insights API you're able to query your customer data and obtain aggregated data in return. This means that you can perform analytics directly via LoginRadius on your Customer data. With the data returned from this API, you can also pass it further down to your visualization tools to help you analyze the results. 

**NOTE:** In order to use this API, you will need to have an [API Secret](/api/v2/admin-console/platform-security/api-key-and-secret#additionalapisecrets2) that has the **Analytics API** Permission enabled. If you need assistance, please contact the [LoginRadius Support](https://adminconsole.loginradius.com/support/tickets/open-a-new-ticket) team.

### Use Case

As the Insights API pulls aggregate data, it is useful for obtaining averages, totals, and data for your visualization tools.

This API allows to you to perform the following aggregations: 

| Aggregation Type
|:-:|
|   [GROUP](#group)|
|   [RANGE](#range-daterange) |
|   [DATERANGE](#range-daterange) |
|   [HISTOGRAM](#histogram-date-histogram) |
|   [DATEHISTOGRAM](#histogram-date-histogram) | 
|   [AVG](#avg-max-min-sum)  |
|   [MAX](#avg-max-min-sum) |
|   [MIN](#avg-max-min-sum)|
|   [SUM](#avg-max-min-sum)  |


Here's an example:

Let's say you want to know the average of your customers age, you would use the `AVG` Aggregation Type, and you would apply it to the "Age" field, a query for this would look like so:

```
{  
   "from":"2007-01-01",
   "to":"2018-12-31",
   "q":{  
      "aggregations":{  
         "AvgAge":{  
            "field":"Age",
            "type":"AVG"
         }
      }
   }
}
```
In this case the API would return the result in the following format:

```
{
    "total": 618,
    "aggregations": {
        "AvgAge": 26.365853658536587
    }
}

```

You can find more details on using each Aggregation type in their respective sections below, for the AVG type you can find details in the [AVG / MAX/ MIN / SUM](avg-max-min-sum) section.


> Note: The aggregations are performed on the LoginRadius profile fields, support for an aggregation type will vary depending on the field you're querying. Please see the [Supported Fields and their types](#supported-fields-and-their-types) section for details on what type of aggregation is supported on which fields.



##### Base URL
The following is the Base URL for all API requests:

```
https://cloud-api.loginradius.com/insights
```


### Formatting your Insights Queries
The Query should have aggregations defined along with mandatory from and to values:

```
{
    "from": "2017-01-01",
    "to": "2018-12-31",
    "q": {
      "aggregations": {
            "usersbydate": {
                "field": "CreatedDate",
                "type": "datehistogram",
                "interval": "month"
            },
            "userage": {
                "field": "Age",
                "type": "range",
                "ranges" : {
                    "minrange": { "to" : 10.0 },
                    "midrange":{ "from" : 10.0, "to" : 20.0 },
                    "maxrange":{ "from" : 20.0 }
                }
            }
      }
  }
}

```

An `aggregations` object should be passed in the query. Each aggregation will have a name, a field and the aggregation type defined as

```
<aggregation name>: {
  "field": <Field to be aggregated>,
  "type": <Type of Aggregation>
}
```

#### Supported Field Types and Aggregations

* String: GROUP
* Integer: RANGE, HISTOGRAM, MIN, MAX, SUM, AVG
* Date: DATERANGE, DATEHISTOGRAM, MIN, MAX
* Boolean: GROUP

#### Supported Fields and their types

Field| Data Type| Aggregation Types Supported
:-----:|:-----:|:-----:
Provider| String| GROUP
Prefix|  String| GROUP
Suffix|  String| GROUP
BirthDate| Date| DATERANGE; DATEHISTOGRAM; MIN; MAX
Gender| String| GROUP
HomeTown|  Text & String | GROUP
State| Text & String | GROUP
City|  Text & String | GROUP
Industry|  Text & String | GROUP
TimeZone|  String| GROUP
LocalLanguage| String| GROUP
Language|  String| GROUP
Verified|  String| GROUP
UpdatedTime| String| GROUP
CreatedDate| Date| DATERANGE; DATEHISTOGRAM; MIN; MAX
ModifiedDate|  Date| DATERANGE; DATEHISTOGRAM; MIN; MAX
LocalCity| String| GROUP
LocalCountry|  String| GROUP
ProfileCountry|  String| GROUP
FirstLogin|  Bool| GROUP
IsProtected| Bool| GROUP
RelationshipStatus|  String| GROUP
FollowersCount|  integer| RANGE; HISTOGRAM; MIN; MAX; SUM; AVG
FriendsCount|  integer| RANGE; HISTOGRAM; MIN; MAX; SUM; AVG
IsGeoEnabled|  String| GROUP
TotalStatusesCount|  Integer| RANGE; HISTOGRAM; MIN; MAX; SUM; AVG
NumRecommenders| Integer| RANGE; HISTOGRAM; MIN; MAX; SUM; AVG
Hireable|  Bool| GROUP
Age| Integer| RANGE; HISTOGRAM; MIN; MAX; SUM; AVG
TotalPrivateRepository|  Integer| RANGE; HISTOGRAM; MIN; MAX; SUM; AVG
Currency|  String| GROUP
PublicGists| Integer| RANGE; HISTOGRAM; MIN; MAX; SUM; AVG
PrivateGists|  Integer| RANGE; HISTOGRAM; MIN; MAX; SUM; AVG

Text, Array of Objects, Object, Array type fields are not supported.

**Note: The system limits aggregation to individual fields, nested aggregations are currently not supported.**

#### Aggregation Defintions

##### GROUP

Get the counts of each unique value

``` 
  " userprovider":{
      "field": "Provider",
      "type": "GROUP"
  }
```


Response: 
```
{
    "total": 401,
    "aggregations": {
        "userprovider": {
            "RAAS": 369,
            "google": 23,
            "twitter": 6,
            "facebook": 3
        }
    }
}
```

##### RANGE / DATERANGE
For Range type aggregations, ranges are required. Ranges are key.value pairs of from,to values objects
For DateRange type, ranges would be dates

```
"ageranges": {
    "field": "Age",
    "type": "RANGE",
    "ranges": {
          "minrange": { "to" : 10.0 },
          "midrange":{ "from" : 10.0, "to" : 20.0 },
          "maxrange":{ "from" : 20.0 }
    }
}
```

Response:
```
{
    "total": 401,
    "aggregations": {
        "ageranges": {
            "minrange": 75,
            "midrange": 1,
            "maxrange": 28
        }
    }
}
```

##### HISTOGRAM / DATE HISTOGRAM
The Histogram returns a count of values grouped as per interval provided. 

**Note:** Interval is a required parameter.

For Histogram the interval should be an integer.

Date histogram intervals would be date type. Available expressions for date histogram interval: `year`, `quarter`, `month`, `week`, `day`, `hour`, `minute`, `second`

```
"agehistogram": {
    "field": "Age",
    "type": "histogram",
    "interval": 10
}
```

Response

```
{
    "total": 401,
    "aggregations": {
        "agehistogram": {
            "0": 75,
            "10": 1,
            "20": 26,
            "30": 2
        }
    }
}
```

##### AVG / MAX/ MIN / SUM

AVG: computes the average of numeric values that are extracted from the aggregated documents. 
MAX: returns the maximum value among the numeric values extracted from the aggregated documents
MIN: returns the minimum value among numeric values extracted from the aggregated documents. 
SUM:aggregation that sums up numeric values that are extracted from the aggregated documents. 

Examples:
```
"maxage": {
  "field": "Age",
  "type": "Max"
}

"minage": {
  "field": "Age",
  "type": "MIN"
}

"totalfriends": {
  "field": "FriendsCount",
  "type": "SUM"
}

"AvgAge": {
  "field": "Age",
  "type": "AVG"
}
```

Response
```
{
    "total": 401,
    "aggregations": {
        "maxage": 70
    }
}

{
    "total": 401,
    "aggregations": {
        "minage": 10
    }
}
{
    "total": 401,
    "aggregations": {
        "totalfriends": 100
    }
}
{
    "total": 401,
    "aggregations": {
        "AvgAge": 20
    }
}
```
