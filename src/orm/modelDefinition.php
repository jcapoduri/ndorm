<?php

require 'fieldDefinition.php';

class modelDefinition {
    static protected $models = array();
    //static protected function define($name, )


    protected $defString;
    protected $fields = array();
    protected $stampable = false;
    protected $versionable = false;
    protected $archivable = false;
    
    public function __construct($json){
        if ($defJson["nd_attrs"]) {
            $confstring = strtolower($defJson["nd_attrs"]);
            if (strpos("versionable", $confstring) !== FALSE) { $this->versionable = true; }
            if (strpos("stampable", $confstring) !== FALSE) { $this->stampable = true; }
            if (strpos("archivable", $confstring) !== FALSE) { $this->archivable = true; }
        };
        foreach ($defJson as $fieldName => $fieldConf) {
            if (strtolower($fieldName) !== "nd_attrs") {
                $this->fields[$fieldName] = new fieldDefinition($fiedConf);
            }
        }    
    }

};

?>