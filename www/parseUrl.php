<?php
    //$url = "http://username:password@host.com:80/path?arg=value#anchor";
    //echo "<pre>"; print_r(parse_url($url)); echo "</pre>";

    //custom function to create url from the parts of array
    function http_build_url( $parsed ) {
        if(  !is_array( $parsed ) ) return false;

        if( isset( $parsed['scheme'] ) ) {
            $sep = ( strtolower( $parsed['scheme'] ) == 'mailto' ? ':' : '://' );
            $url = $parsed['scheme'] . $sep;
        } else $url = '';

        if( isset( $parsed['pass'] ) ) {
            $url .= "$parsed[user]:$parsed[pass]@";
        } elseif( isset( $parsed['user'] ) ) {
            $url .= "$parsed[user]@";
        }

        if( @!is_scalar( $parsed['query'] ) ) {
            $parsed['query'] = http_build_query( $parsed['query'] );
        }

        if (isset($parsed['host'])) $url .= $parsed['host'];
        if (isset($parsed['port'])) $url .= ":".$parsed['port'];
        if (isset($parsed['path'])) $url .= $parsed['path'];
        if (isset($parsed['query'])) $url .= "?".$parsed['query'];
        if (isset($parsed['fragment'])) $url .= "#".$parsed['fragment'];
        return $url;
    }

    $url = "http://user@example.com:80/path?arg=value#anchor";
    $parsed = parse_url( $url );
    //var_dump( $parced );
    $query = [];
    parse_str($parsed['query'], $query);
    //print_r( $query );
    $query['names']['read'] = 'tom';
    $parsed['query'] = http_build_query($query);
    $newurl = http_build_url($parsed);
    echo "Old URL: $url<br>";
    echo "New URL: $newurl";