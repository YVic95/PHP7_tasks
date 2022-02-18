<?php
    include_once "mailx.php";
    $text = "Cookies need love like everything does!";
    $tos =[ "lecorbeaulibre@gmail.com", "vika.yevlentieva@gmail.com" ];
    $tpl = file_get_contents("mail.eml");

    foreach( $tos as $to ) {
        $mail = $tpl;
        $mail = strtr( $mail, [
            "{TO}" => $to,
            "{TEXT}" => $text
        ] );
        mailx( $mail );
        //list($head, $body) = preg_split("/\r?\n\r?\n/s", $mail, 2);

        //mail( "", "", $body, $head );
    }

    