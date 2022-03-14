<?php
    if( empty( $_POST['mail_to'] ) ) exit( "Enter receiver`s email" );
    $pattern = "/^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,6}$/i";
    if( !preg_match( $pattern, $_POST['mail_to'] ) ) {
        exit( "Enter email address using this format: somebody@server.com" );
    }
    $_POST['mail_to'] = htmlspecialchars( stripslashes( $_POST['mail_to'] ) );
    $_POST['mail_subject'] = htmlspecialchars( stripslashes( $_POST['mail_subject'] ) );
    $_POST['mail_msg'] = htmlspecialchars( stripslashes( $_POST['mail_msg'] ) );
    $picture = "";

    //$_FILES['userfile']['tmp_name'] temporary name of the file
    //in which the uploaded file was stored on the server.

    //$_FILES['userfile']['name'] the original name of the 
    //file on the client machine.

    //copy(string $from, string $to, ?resource $context = null): bool
    //Returns true on success or false on failure.

    if( !empty( $_FILES['mail_file']['tmp_name'] ) ) {
        $path = $_FILES['mail_file']['name'];
        if( copy( $_FILES['mail_file']['tmp_name'], $path ) ) $picture = $path;
    }
    $thm = $_POST['mail_subject'];
    $msg = $_POST['mail_msg'];
    $mail_to = $_POST['mail_to'];

    if( empty( $picture ) ) mail( $mail_to, $thm, $msg );
    else send_mail( $mail_to, $thm, $msg, $picture );

    function send_mail( $to, $thm, $html, $path ) {
        $fp = fopen( $path, "r" );
        if( !$fp ) {
            print "File $path cannot be open!";
            exit();
        }
        $file = fread( $fp, filesize( $path ) );
        fclose( $fp );

        $boundary = "--" . md5( uniqid( time() ) );
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\n";
        $multipart .= "--$boundary\n";
        $code = 'utf-8';
        $multipart .= "Content-Type: text/html; charset=$code\n";
        $multipart .= "Content-Transfer-Encoding: QUot-Printed\n\n";
        $multipart .= "$html\n\n";

        $message_part = "--$boundary\n";
        $message_part .= "Content-Type: application/octet-stream\n";
        $message_part .= "Content-Transfer-Encoding: base64\n";
        $message_part .= "Content-Disposition: attachment; filename = \" . $path .\" \n\n";
        $message_part .= chunk_split(base64_encode($file))."\n";
        $multipart .= $message_part."--$boundary--\n";

        if( !mail( $to, $thm, $multipart, $headers ) )
        {
            exit( "Sorry, letter couldnt been sent" );
        }
    }
    header( "Location: " . $_SERVER['PHP_SELF'] );


    


