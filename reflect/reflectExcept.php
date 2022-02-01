<?php 
    try {
        $obj = new ReflectionFunction("newFunction");
    } catch( ReflectionException $e ) {
        echo "Exception: ", $e->getMessage();
    }

    /**
     * Documentation for
     * next function ( no whitespaces after "/**"!)
    */
    function func($firstArg, $secondArg) {}
    $newObj = new ReflectionFunction("func");
    echo "<pre>" . $newObj->getDocComment() . "</pre>";
    

    $paramsObj = new ReflectionParameter("func", 0);
    echo "<pre>" . $paramsObj->getName() . "</pre>";

    //its better to create reflect using getParameters() method
    echo "<pre>" . print_r ($newObj->getParameters()) . "</pre>";
    



