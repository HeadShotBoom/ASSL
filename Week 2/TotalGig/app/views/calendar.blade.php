@extends('layout')

@section('content')

<?php
//This gets today's date

$date =time () ;

//This puts the day, month, and year in seperate variables

$day = date('d', $date) ;

$month = date('m', $date);


$year = date('Y', $date) ;



//Here we generate the first day of the month

$first_day = mktime(0,0,0,$month, 1, $year) ;



//This gets us the month name

$title = date('F', $first_day) ;

//Here we find out what day of the week the first day of the month falls on
$day_of_week = date('D', $first_day) ;



//Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero

switch($day_of_week){

    case "Sun": $blank = 0; break;

    case "Mon": $blank = 1; break;

    case "Tue": $blank = 2; break;

    case "Wed": $blank = 3; break;

    case "Thu": $blank = 4; break;

    case "Fri": $blank = 5; break;

    case "Sat": $blank = 6; break;

}

//We then determine how many days are in the current month

$days_in_month = cal_days_in_month(0, $month, $year) ;

//Here we start building the table heads

echo "<ul class='large-8 large-push-2 small-12 columns maincalendar'>";

echo "<li class='title'> $title $year </li>";
echo "<li class='mainday-header' >
<div class='large-1 mainday'>Sun</div>
        <div class='large-1 mainday'>Mon</div>
        <div class='large-1 mainday'>Tue</div>
        <div class='large-1 mainday'>Wed</div>
        <div class='large-1 mainday'>Thu</div>
        <div class='large-1 mainday'>Fri</div>
        <div class='large-1 mainday'>Sat</div>
</li>";


//This counts the days in the week, up to 7

$day_count = 1;



echo "<li class='mainweek'>";

//first we take care of those blank days

while ( $blank > 0 )

{

    echo "<div class='large-1 previous-month mainday'></div>";

    $blank = $blank-1;

    $day_count++;

}

//sets the first day of the month to 1

$day_num = 1;

$namesforcal = array();
$datesforcal = array();
$idforcal = array();

foreach($gig as $gig){
    $gigdate = $gig->gig_date;
    $strarr = str_split($gigdate, 2);
    $gigday = $strarr[4];
    $giginfo = array();
    $giginfo[0] = $gig->gig_name;
    $giginfo[1] = $gig->gig_date;
    $giginfo[2] = $gig->id;
    $namesforcal[intval($gigday)] = $giginfo[0];
    $datesforcal[intval($gigday)] = $giginfo[1];
    $idforcal[intval($gigday)] = $giginfo[2];
}

//count up the days, untill we've done all of them in the month

while ( $day_num <= $days_in_month )

{

    echo "<div class='large-1 mainday'>$day_num";
        if(array_key_exists($day_num, $namesforcal)) {
            echo "<br /><a href='/view/$idforcal[$day_num]'>$namesforcal[$day_num] <br />$datesforcal[$day_num]</a>";
        }
        echo "</div>";

    $day_num++;

    $day_count++;



    //Make sure we start a new row every week

    if ($day_count > 7)

    {

        echo "</li><li class='mainweek'>";

        $day_count = 1;

    }

}

//Finaly we finish out the table with some blank details if needed

while ( $day_count >1 && $day_count <=7 )

{

    echo "<li class='mainweek'> </li>";

    $day_count++;

}


echo "</li></ul>";
?>

@stop