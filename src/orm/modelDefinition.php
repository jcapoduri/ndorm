<?php

namespace nd;

require 'fieldDefinition.php';
require "protoObject.php";

class modelDefinition {
    static public $models = array();
    
    static public function define($name, $defJson) {
        $realname = preg_split("/:/", trim($name));
        $abstract = false;
        $inheritance = "";
        
        if (count($realname) == 1) {
            $model = self::$models[$realname[0]] = new modelDefinition($defJson);
        } else {
            if ($realname[0] == "") {
                $model = self::$models[$realname[1]] = new modelDefinition($defJson);
                $model->abstract = true;
            } else {
                $model = self::$models[$realname[0]] = new modelDefinition($defJson);
                $model->inheritance = $realname[1];
            }
            
        };
        return $model;
    }

    static public function model($name) { return self::$models[$name]; }

    protected $defString;
    protected $fields = array();
    protected $stampable = false;
    protected $versionable = false;
    protected $archivable = false;
    protected $abstract = false;
    protected $inheritance = "";
    
    protected function __construct($defJson){
        if (isset($defJson->nd_attrs)) {
            $confstring = strtolower($defJson->nd_attrs);
            if (strpos("versionable", $confstring) !== FALSE) { $this->versionable = true; }
            if (strpos("stampable", $confstring) !== FALSE) { $this->stampable = true; }
            if (strpos("archivable", $confstring) !== FALSE) { $this->archivable = true; }
        };
        foreach ($defJson as $fieldName => $fieldConf) {
            if (strtolower($fieldName) !== "nd_attrs") {
                $this->fields[$fieldName] = new fieldDefinition($fieldConf);
            }
        }    
    }

    public function getFields() { return $this->fields; }

    public function isAbstrct() { return $this->abstract; }
    public function isStampable() { return $this->stampable; }
    public function isArchivable() { return $this->archivable; }
    public function isVersionable() { return $this->versionable; }
    public function inheriteFrom() { return $this->inheritance; }
};

?>