<?php

require 'fieldDefinition.php';

class modelDefinition {
    protected $defString;
    protected $fields = array();
    protected $stampable = false;
    protected $versionable = false;
    protected $archivable = false;
    
    public function __construct($json){
        if ($defJson["nd_field"]) {
            $confstring = strtolower($defJson["nd_field"]);
            if (strpos("versionable", $confstring) !== FALSE) { $this->versionable = true; }
            if (strpos("stampable", $confstring) !== FALSE) { $this->stampable = true; }
            if (strpos("archivable", $confstring) !== FALSE) { $this->archivable = true; }
        };
        for($defJson as $fieldName => $fieldConf) {
            if (strtolower($fieldName) !== "nd_field") {
                $this->fields[$fieldName] = new fieldDefinition($fiedConf);
            }
        }    
    }

};

?>