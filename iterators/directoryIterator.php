<?php
    $dir = new DirectoryIterator('.');
    foreach( $dir as $file ) {
        //echo $file . "<br/>";
        if( $file->isFile() ) {
            echo $file . ": " . $file->getSize() . " bytes<br/>";
        }
    }