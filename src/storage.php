<?php

namespace nd;

class storage {
    protected $handler = null;
    protected $name;
	protected $db_host;
	protected $db_name;
	protected $db_user;
	protected $db_pass;
	protected $db_port = 3061;
	protected $map = array();
    
    public function __construct($json) {
        $this->name = $json["name"];
        $this->db_host = $json["db_host"];
        $this->db_name = $json["db_name"];
        $this->db_user = $json["db_user"];
        $this->db_pass = $json["db_pass"];
        $this->db_port = isset($json["db_port"]) ? $json["db_port"] : 3061;
        if (isset($json["map"])) $this->map = $json["map"];
    }
    
    public function connect() {
        $this->handler = new \mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name, $this->db_port);
        return $this->handler;
    }
    
    public function disconnect() {
        
    }
}

?>