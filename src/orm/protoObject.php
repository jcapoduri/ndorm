<?php

class protoObject {
    public function __construct() {}
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
};

?>