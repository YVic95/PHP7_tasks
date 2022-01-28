<?php
    require_once("filterIterator.php");
    $limit = new LimitIterator(
                new ExtensionFilter(new DirectoryIterator('.'), "php" ),
                0, 4 );
    foreach( $limit as $file ) {
        echo $file . "<br/>";
    }

                