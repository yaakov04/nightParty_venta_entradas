<?php

if (! function_exists('diffDatetimeEvent')) {
    function diffDatetimeEvent($eventDate)
    {
        $date = new DateTime($eventDate);
        $currentDate= new DateTime();
        $dateDiff=$currentDate->diff($date);
        $t=[
            'Y'=>$dateDiff->format('%Y'),
            'm'=>$dateDiff->format('%m'),
            'd'=>$dateDiff->format('%d'),
            'H'=>$dateDiff->format('%H')
        ];
        return $t;
    }
}


if (!function_exists('isLessToHour')) {
    function isLessToHour($hour,$eventDate)
    {
        $t = diffDatetimeEvent($eventDate);
        $result = $t['Y']==0 & $t['m']==0 & $t['d']==0 & $t['H']<$hour;
        return $result;
    }

}

if(true){
    function paymentMethod($paymentMethod)
    {
        return "App\Classes\PaymentProcessor\\$paymentMethod";
    }
}