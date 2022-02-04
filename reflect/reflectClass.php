<?php 
    $cls = new ReflectionClass('ReflectionClass');
    //echo "<pre>" . $cls . "</pre>";
    print_r ($cls->getInterfaces());
    echo "<br/>";
    print_r ($cls->getConstants());
    echo "<br/>";
    print_r( Reflection::getModifierNames($cls->getModifiers()) );
    echo "<br/>";
    print_r ($cls->isInstantiable());
    if( $cls->isInstantiable() ) echo " Congrats! This class can be instantialized!";
    echo "<br/>";
    print_r ($cls->getConstructor());
    echo "<br/>";
    print_r ($cls->getMethod('getMethod'));
    echo "<br/>";
    print_r ($cls->getProperties());
    echo "<br/>";
