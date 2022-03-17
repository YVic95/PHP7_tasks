<?php 
    function mailx( $mail )
    {
        list($head, $body) = preg_split( "/\r?\n\r?\n/s", $mail, 2 );
        $to = "";
        if( preg_match( "/^To:\s*([^\r\n]*)[\r\n]*/m", $head, $p ) ) {
            $to = @$p[1];
            $head = str_replace( $p[0], "", $head );
        }
        //print_r($p);
        $subject = "";
        if( preg_match( "/^Subject:\s*([^\r\n]*)[\r\n]*/m", $head, $p ) ) {
            $subject = @$p[1];
            $head = str_replace( $p[0], "", $head );
        }
        //print_r($p);
        mail( $to, $subject, $body, trim($head) );
        // echo $to;
        // echo "<br>";
        // echo $subject;
        // echo "<br>";
        // echo $body;
        // echo "<br>";
        // print_r( trim($head) );
        // echo "<br>";

    }