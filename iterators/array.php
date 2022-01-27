<?php   
    class InsensitiveArray implements ArrayAccess
    {
        private $a = []; 

        //returns true if offset exists
        public function offsetExists( $offset ) 
        {
            $offset = strtolower($offset);
            $this->log( "offsetExists('$offset')" );
            return isset( $this->a[$offset] );
        }

        //returns element by the key
        public function offsetGet( $offset )
        {
            $offset = strtolower($offset);
            $this->log( "getOffset('$offset')" );
            return $this->a[$offset];
        }

        //sets the new value of an element by its key
        public function offsetSet( $offset, $data )
        {
            $offset = strtolower($offset);
            $this->log( "setOffset('$offset', '$data')" );
            $this->a[$offset] = $data;
        }

        //deletes element with its key
        public function offsetUnset( $offset )
        {
            $offset = strtolower($offset);
            $this->log( "offsetUnset('$offset')" );
            unset( $this->a[$offset] ); 
        }
        public function log($str)
        {
            echo "$str<br>";
        }
    }
    $a = new InsensitiveArray();
    $a->log("##Setting values (operator =)");
    $a['php'] = 'There is more than one way to do it.';
    $a['php'] = 'This value should overwrite the previous one';

    $a->log("#Getting the value of the element (operator [])");
    $a->log("<b>Value:</b> '{$a['php']}'");

    $a->log("##Checking if element exists (operator isset())");
    $a->log("<b>Exists: </b>" . (isset($a['php']) ? "true" : "false"));

    $a->log("##Deleting the element(operator unset())");
    unset($a['php']);

    