<?php
    require_once "iterator.php";
    $dir = new FSDirectory ( "/Users/mikekoth/Downloads" );
    foreach( $dir as $path => $entry ) {
        if( $entry instanceof FSFile) {
            echo "<tt>$path</tt>:" . $entry->getSize() . "<br/>";
        }
        
    }