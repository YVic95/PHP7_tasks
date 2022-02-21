<?php
    function mailenc( $mail ) {
        // echo $mail."<br>";
        list( $head, $body ) = preg_split( "/\r?\n\r?\n/s", $mail, 2 );
        
        //defining the message encoding by the Content-type header
        $encoding = '';
        $re = '/^Content-type:\s*\S+\s*;\s*charset\s*=\s*(\S+)/mi';
        if( preg_match( $re, $head,  $p ) ) $encoding = $p[1];
        // print_r( $p );
        // echo "<br>";
        // echo '$encoding = '. $encoding;

        //looping all headers
        $newhead = "";
        foreach( preg_split( '/\r?\n/s', $head ) as $line ) {
            $line = mailenc_header( $line, $encoding );
            $newhead .= "$line\r\n";
        }
        echo "------------------";
        // echo $line;
        // echo "<br>";
        // echo '$newhead = '. $newhead;
        // echo "<br>";
        // //echo $body;
        // echo "<br>";


        return "$newhead\r\n$body";

       
    }

    function mailenc_header( $header, $encoding = 'UTF-8' ) {
        
        return preg_replace_callback(
            "/([\x7F-\xFF][^<>\r\n]*)/s",
            function ( $p ) use ( $encoding ) {
                preg_match( '/^(.*?)(\s*)$/s', $p[1], $sp );
                // print_r( $sp );
                return "=?$encoding?B?" . base64_encode( $sp[1] ) . "?=" . $sp[2];
            },
            $header
        );
    }