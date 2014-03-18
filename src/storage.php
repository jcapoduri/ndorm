<?php

namespace nd;

class storage {
    protected $handler = null;
    protected $db_type;
	protected $db_host;
	protected $db_name;
	protected $db_user;
	protected $db_pass;
	protected $db_port = 3061;
    
    public function __construct($json) {
        $this->db_type = $json["db_type"];
        $this->db_host = $json["db_host"];
        $this->db_name = $json["db_name"];
        $this->db_user = $json["db_user"];
        $this->db_pass = $json["db_pass"];
        $this->db_port = isset($json["db_port"]) ? $json["db_port"] : 3061;        
    }
    
    public function connect() {
        $dns = $this->db_type . ":dbname=" . $this->db_name.";host=".$this->host;
        $this->handler = new \PDO($dns, $this->db_user, $this->db_pass);
        return $this->handler;
    }
    
    public function disconnect() {
        unset($this->handler);
    }
}

?>