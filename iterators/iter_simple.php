<?php
    class Monolog
    {
        public $first = 'It`s him';
        protected $second = 'The Anomaly';
        private $third = 'Do we proceed?';
        protected $fourth = 'Yes.';
        private $fifth = 'He is still...';
        public $sixth = '... just a human.';
    }

    $monolog = new Monolog();
    //only public variables will be printed
    foreach ( $monolog as $key=>$value ){
        echo "$key: $value <br/>";
    }