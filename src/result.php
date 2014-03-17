<?php

namespace nd;

class result extends \Iterator {
    protected $resource;
    
    public function __construct ($res) {
        $this->resource = $res;
    }
    
    public function current () {}
    public function key () {}
    public function next () {}
    public function rewind () {}
    public function valid () {}
};

?>