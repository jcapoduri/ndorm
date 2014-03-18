<?php

class fieldDefinition {
    protected $defString;

    protected $type = "string";
    protected $length = 128;
    protected $nullable = false;
    protected $index = false;
    protected $unique = false;
    
    public function __construct($defstring) {
        $this->defString = $defstring;
        $confparams = preg_split("/\ +/", trim($b));
        $len = count($confparams);
        for ($i = 0; $i < $len; $i++) {
        	$param = $confparams[$i];
        	switch ($param) {
        		case 'string':
        		case 'integer':
        		case 'int':
        		case 'float':
        		case 'double':
        		case 'time':
        		case 'datetime':
        		case 'date':
        		case 'bool':
        		case 'blob':
        			$this->type = $param;
        			if (isset($confparams[$i + 1]) && is_numeric($confparams[$i + 1])){
        				$length = $confparams[$i + 1];
        				$i++;
        			}
        			if ($param === "int") $this->type = "integer";
        			break;
        		case 'nullable':
        			$this->nullable = true;
        			break;
        		case 'index':
        			$this->index = true;
        			break;
        		case 'unique':
        			$this->unique = true;
        			break;
        		default:
        			throw new Exception("Error Processing Request", 1);
        			
        			break;
        	}
        }
    }

};

?>