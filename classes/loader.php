<?php
if(DEBUG){
    ini_set('display_errors', '1');
}else{
    ini_set('display_errors', '0');
}


function getTime($created) {
	
	
	$sdate = new DateTime($created);  
	$edate = new DateTime(date("Y-m-d"));  
	$interval = $sdate->diff($edate);  


	if ($interval->y > 0) {//years
        $output = (string)$interval->y;
        $timeFormat = "years";
    }
	else if ($interval->m > 0) {//months
        $output = (string)$interval->m;
        $timeFormat = "months";
    }
	else if ($interval->d > 0) {//days
        $output = (string)$interval->d;
        $timeFormat = "days";
    }
	else {//under a day
        
    return "Less than 1 day ago";
    }
	
    return "about " . $output . " " . $timeFormat . " ago";
}