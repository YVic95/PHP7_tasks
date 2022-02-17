<?php 
    $fp = fsockopen( "localhost", 80 );
    fputs( $fp, "GET / HTTP/1.1\r\n" );
    fputs( $fp, "Host: localhost\r\n" );
    //turning off Keep-alive mode; server will close
    //connection immediatly after receiving the respond 
    fputs( $fp, "Connection: close\r\n" );
    fputs( $fp, "\r\n" );

    echo "<pre>";
    while( !feof( $fp ) ) echo htmlspecialchars( fgets( $fp, 1000 ) );
    echo "</pre>";
    fclose( $fp );

