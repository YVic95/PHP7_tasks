<?php 
    class Base
    {
        private $prop = 0;
        function getBase() { return $this->prop; }
    }
    class Derive extends Base
    {
        public $prop = 1;
        function getDerive() { return $this->prop; }
    }

    echo "<pre>";
    $cls = new ReflectionClass('Derive');
    $obj = $cls->newInstance();
    $obj->prop = 2;

    echo "Base: {$obj->getBase()}, Derive: {$obj->getDerive()}<br/>";
    var_dump( $cls->getProperties() );
    var_dump( $cls->getMethods() );
    echo "</pre>";

