<?php   
    function simple( $from = 0, $to = 100 ) {
        for( $i = $from; $i < $to; $i++ ) {
            yield $i;
        }
    }

    // foreach( simple( 1, 5 ) as $val ) {
    //     echo ( $val * $val ) . " ";
    // }
    
    // Simple function calls the instance of the class Generator
    $obj = simple( 1, 5 );
    //var_dump( $obj );

    // Instead of foreach loop we can use methods of tha class Generator:
    while( $obj->valid() ) {
        echo ( $obj->current() * $obj->current() . " ");
        //to the next element
        $obj->next();
    }
    