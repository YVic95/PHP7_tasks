<?php
    $headers = getallheaders();
    Header( "Content-type: text/plain" );
    print_r( $headers );
    // instead of getallheaders() its better to use $_SERVER