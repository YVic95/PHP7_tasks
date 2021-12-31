<?php
    //format method of the DateTime class echoes 
    //current date and time 
    $date = new DateTime();
    echo $date->format('d-m-Y H:i:s') . '<br/>';

    //or random custom date and time
    $date = new DateTime('2018-01-01 00:01:59');
    echo $date->format('d-m-Y H:i:s') . '<br/>';

    //there are some constant string with time format
    //DateTime::RSS format
    // without quotes!!!
    $date = new DateTime('2018-01-01 00:01:59');
    echo $date->format(DateTime::RSS) . '<br/>';
    //DateTime::RFC1036 format
    $date = new DateTime('2018-01-01 10:01:59');
    echo $date->format(DateTime::RFC1036) . '<br/>';

    //DateTimeZone class - representation of time zone.
    $date = new DateTime( "2020-01-01 00:00:00", 
                            new DateTimeZone("Europe/Prague") );
    echo $date->format( 'd-m-Y H:i:s' ) . '<br/>';
    echo "<br/>";

    $timeZones = DateTimeZone::listIdentifiers(DateTimeZone::EUROPE);
    foreach ( $timeZones as $key => $zoneName )
    {
        $tz = new DateTimeZone($zoneName);
        $loc = $tz->getLocation();
        print_r($zoneName . " = " . $loc['country_code'] . "<br>");
    }
    echo "----------------------------------------------------<br/>";

    //an object of the DateInterval class is an instruction 
    //to get from one date/time to another date/time. Use Method diff()
    $date = new DateTime( '2016-12-31 0:0:0' );
    $currentDate = new DateTime();
    $interval = $currentDate->diff($date);

    echo $date->format( 'd-m-Y H:i:s' ) . '<br/>';
    echo $currentDate->format( 'd-m-Y H:i:s' ) . '<br/>';
    echo $interval->format( "%Y-%m-%d %H:%S" ) . '<br/>';

    echo '<pre>';
    print_r( $interval );
    echo '</pre>';
    echo "----------------------------------------------------<br/>";
    //sub() method
    //Subtracts an amount of days, months, years, hours, minutes and seconds 
    //from a DateTime object
    $nowdate = new DateTime();
    $date = $nowdate->sub( new DateInterval("P3Y1M14DT12H19M2S") );
    echo $date->format( 'd-m-Y H:i:s' ) . '<br/>';
    echo "----------------------------------------------------<br/>";
    
    // DatePeriod class
    //A date period allows iteration over a set of dates and times, 
    //recurring at regular intervals, over a given period.
    $now = new DateTime();
    $step = new DateInterval( 'P1Y' );
    $period = new DatePeriod( $now, $step, 7 );

    foreach( $period as $datetime ) {
        echo $datetime->format( 'Y-m-d' ) . '<br/>';
    }

