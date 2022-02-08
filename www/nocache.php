<?php 
    function nocache() {
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); //should be  Date in the past
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0");
        header("Pragma: no-cache");
    }
    //Many proxies and clients can be forced to disable caching 
    //with these headers