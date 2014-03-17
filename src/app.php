<?php

namespace nd;

class app {
    protected $nd_instance;
    protected $name;
    protected $storage_name;
    protected $db;
    
    public function __construct($json, $nd = null) {
        $this->nd_instance = (is_null($nd) ?  0: $nd);
        $this->name = $json["name"];
        $this->storage_name = $json["storage"];
        $this->db = $this->nd_instance->getStorage($this->storage_name);
    }
    
    /*
    * @return storage instance with the current conection
    */
    public function storage() { return $this->db; }
    
    public function start() {
        return $this->db->connect();
    }
};

?>