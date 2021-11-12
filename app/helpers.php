<?php

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;

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

if(!function_exists('paymentMethod')){
    function paymentMethod($paymentMethod)
    {
        return "App\Classes\PaymentProcessor\\$paymentMethod";
    }
}

if(!function_exists('getQr')){
    function getQr($directory, $token)
    {
        Storage::makeDirectory($directory);
        $writer = new PngWriter();
        $qrCode = QrCode::create(
            route('home')."/attendee/{$token}"
        )
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

            $result = $writer->write($qrCode);

            $result->saveToFile(base_path()."/storage/app/public/qr/{$token}.png");

            //php artisan storage:link
            return url("storage/qr/{$token}.png");
    }
}