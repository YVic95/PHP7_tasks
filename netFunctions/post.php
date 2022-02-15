<?php
    $body = "first_name=Melanie&last_name=Smith";
    $opts = [
        'http' => [
            'method' => 'POST',
            'user_agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0)',
            'header' => [
                "Content-type: application/x-www-form-urlencoded",
                "Content-Length: " . mb_strlen( $body )],
            'content' => $body
        ]
    ];

    // echo "<pre>";
    // print_r( $opts );
    // exit();
    // echo "</pre>";

    $context = stream_context_create( $opts );
    echo file_get_contents( 'http://localhost/netFunctions/handler.php', false, $context );
