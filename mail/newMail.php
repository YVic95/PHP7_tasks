<?php
    include_once "mailx.php";
    include_once "mailEnc.php";
    include_once "template.php";

    $text = "Well, aint this a surprise?";
    $tos = ["Пупкин Никонор <lecorbeaulibre@gmail.com>"];

    foreach( $tos as $to ) {
        $mail = template( "mail.php.eml", [
            "to" => $to,
            "text" => $text
        ] );
    }
    $mail = mailenc($mail);
    echo "<pre>";
    echo $mail;
    echo "</pre>";
    mailx( $mail );
    

