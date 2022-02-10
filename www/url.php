<?php 
    //parse_str() example
    $str = 'sullivan=paul&names[roy]=noni&names[read]=alex';
    parse_str( $str, $result );
    echo '<pre>';
    print_r( $result );
    echo '</pre>';

    // http_build_query() example
    $data = array(
        'foo' => 'bar',
        'baz' => 'boom',
        'cow' => 'milk',
        'null' => null,
        'php' => 'hypertext processor'
    );
    
    echo http_build_query($data) . "\n";
    echo '<br>';
    echo http_build_query($data, '', '~');
    
