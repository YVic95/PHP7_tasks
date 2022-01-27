<?php 
    //file directory - returns content during iteration
    //Iterator interface has only one method - getIterator()
    class FSDirectory implements IteratorAggregate
    {
        public $path;
        public function __construct( $path )
        {
            $this->path = $path;
        }

        public function getIterator()
        {
            return new FSDirectoryIterator( $this );
        }
    }

    //Iterator class
    class FSDirectoryIterator implements Iterator 
    {
        private $owner;

        //descriptor
        private $descr = null;

        //current string
        private $current = false;

        public function __construct( $owner )
        {
            $this->owner = $owner;
            $this->descr = opendir( $owner->path );
            $this->rewind();
        }

        public function rewind()
        {
            rewinddir( $this->descr );
            $this->current = readdir( $this->descr );
        }

        //checks if elements exist 
        public function valid()
        {
            return $this->current !== false;
        } 

        //returns current key
        public function key()
        {
            return $this->current;
        }

        //returns current value
        public function current()
        {
            $path = $this->owner->path . "/" . $this->current;
            return is_dir( $path ) ? new FSDirectory( $path ) : new FSFile( $path );
        }

        public function next() {
            $this->current = readdir( $this->descr );
        }
    }

    //File
    class FSFile
    {
        public $path;

        public function __construct( $path )
        {
            $this->path = $path;
            
        }

        public function getSize()
        {
            return (filesize( $this->path )/1000000)." mbs";
        }
    }
