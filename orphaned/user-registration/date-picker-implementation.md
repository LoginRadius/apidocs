Date Picker Implementation
=====

------


##Introduction

If you would like to implement a date picker to your LoginRadius JavaScript Registration Interface, can follow the steps below for an easy method on how-to to add a calendar interface on a date field.

###Steps to implement

- Add the style and script below on the page where you want to display the interface:

```
// style
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
```
<br>

```
// script
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
```

<br>
- Add the code below to your document:

```
$(document).ready(function(){
        var maxYear = new Date().getFullYear();
        var minYear = maxYear - 100;
        $('body').on('focus', ".loginradius-birthdate", function () {
            $('.loginradius-birthdate').datepicker({
                dateFormat: 'mm-dd-yy',
                maxDate:  new Date(),
                minDate: "-100y",
                changeMonth: true,
                changeYear: true,
                yearRange: (minYear + ":" + maxYear)
            });
        });
    });
```

**Note**: - You can customize this date picker by using [JQuery Datepicker Widget](https://api.jqueryui.com/datepicker/) documentation.
