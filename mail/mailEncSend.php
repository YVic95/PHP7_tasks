<?php 
    include_once "mailx.php";
    include_once "mailEnc.php";
    $text = "Well, aint this a surprise?";
    $tos = [ "Пупкин Никонор <lecorbeaulibre@gmail.com>", "Иванова Иванна <vika.yevlentieva@gmail.com>" ];
    $tpl = file_get_contents( "mail.eml" );

    foreach( $tos as $to ) {
        $mail = $tpl;
        $mail = strtr( $mail, [
            "{TO}" => $to,
            "{TEXT}" => $text
        ] );
        $mail = mailenc( $mail );
        echo "<pre>".$mail."</pre>";
        echo "<br><br>";
        mailx( $mail );
    }