<?php

function timeAgo($time_ago)
{


    $day = $time_ago->format('d');
    $month = $time_ago->format('M');
    $year = $time_ago->format('Y');
    $time = $time_ago->format('H:i');
   
    if ($month == "May")
    {
        return $day." May ".$year."-ci il | ".$time."-də yeniləndi";
    }
    else if($month == 'Apr')
    {
        return $day." Aprel ".$year."-ci il | ".$time."-də yeniləndi";
    }
    else if($month == 'Mar')
    {
        return $day." Mart ".$year."-ci il | ".$time."-də yeniləndi";
    }
    else if($month == 'Feb')
    {
        return $day." Fevral ".$year."-ci il | ".$time."-də yeniləndi";
    }
    else if($month == 'Jan')
    {
        return $day." Yanvar ".$year."-ci il | ".$time."-də yeniləndi";
    }
    else if($month == 'Jun')
    {
        return $day." İyun ".$year."-ci il | ".$time."-də yeniləndi";
    }
    else if($month == 'Jul')
    {
        return $day." İyul ".$year."-ci il | ".$time."-də yeniləndi";
    }
    else if($month == 'Aug')
    {
        return $day." Avqust ".$year."-ci il | ".$time."-də yeniləndi";
    }
    else if($month == 'Sep')
    {
        return $day." Sentiyabr ".$year."-ci il | ".$time."-də yeniləndi";
    }
    else if($month == 'Oct')
    {
        return $day." Oktyabr ".$year."-ci il | ".$time."-də yeniləndi";
    }
    else if($month == 'Nov')
    {
        return $day." Noyabr ".$year."-ci il | ".$time."-də yeniləndi";
    }
    else if($month == 'Dec')
    {
        return $day." Dekabr ".$year."-ci il | ".$time."-də yeniləndi";
    }



}



?>
