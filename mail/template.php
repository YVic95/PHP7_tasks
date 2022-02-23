<?php 
    function template( $__fname, $vars )
    {   //Turn on output buffering
        ob_start();

        //Run file like a PHP program
        extract( $vars, EXTR_OVERWRITE );
        include( $__fname );

        $text = ob_get_contents();
        ob_end_clean();
        return $text;
    }