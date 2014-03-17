<?php

namespace nd;

require_once 'solution.php';

class entity_field {
    protected $field_name;
    protected $field_type;
    protected $isKey = false;
	protected $unique = false;
	protected $autoincremental = false;
	protected $length = 0;
	protected $default_value;
	protected $entity_related = "";
	
    public function __construct($json) {
        $this->field_name = $json["name"];
        $this->field_type = $json["type"];
        if (isset($json["isKey"])) $this->isKey = $json["isKey"];
        if (isset($json["unique"])) $this->unique = $json["unique"];
        if (isset($json["autoincremental"])) $this->autoincremental = $json["autoincremental"];
        if (isset($json["length"])) $this->length = $json["length"];
        if (isset($json["default_value"])) $this->default_value = $json["default"];
        if ($this->field_type == "array") $this->entity_related = $json["relation_name"];
        if ($this->field_type == "object") $this->entity_related = $json["object_name"];
        
    }
    
    //public function generate
};

class entity {
    protected $nd_instance;
    protected $entity_name;
	protected $nd_fields = false;
	protected $fields = array();
	protected $inherit = "";
	
	public function __construct($json, solution $solution = null) {
        $this->entity_name = $json["name"];
        $this->nd_fields = $json["nd_fields"];
        $this->inherit = isset($json["inherit"]) ? $json["inherit"] : "";
        foreach ($json["fields"] as $field) {
            $this->fields[ $field["name"] ] = new entity_field($field);
        };
    }
		
    public function create(array $defaults) {
        
    }
};

?>