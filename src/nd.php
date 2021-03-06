<?php

require_once "storage.php";
require_once 'orm/modelDefinition.php';
require_once 'orm/protoObject.php';

class nd {
	static protected $storages = array();
	static protected $PDOhandler = null;

	static public function setup($json) {
		if (isset($json->objects)) {
			$objs = $json->objects;
			foreach ($objs as $name => $value) {
			 	\nd\modelDefinition::define($name, $value);
			};
		};
		if (isset($json->storages)) {
			$sto = $json->storages;
			foreach ($sto as $name => $value) {
			 	self::$storages[$name] = new \nd\storage($value);
			};	
		};
	}

	static public function init($name) {
		if (isset(self::$storages[$name])) {
			self::$PDOhandler = self::$storages[$name]->connect();
		}
	}
    
    /* global operations */
    static public function nuke() {
        if (is_null(self::$PDOhandler)) return false;
        self::$PDOhandler->exec("SHOW TABLES;");
    }
    
    static public function updateSchema() {
        if (is_null(self::$PDOhandler)) return false;
        $result = self::$PDOhandler->query("SHOW TABLES;");
        while ($result as $row) {
            
        };
    }

    static public function updateModelScheme($name) {
    	$model = \nd\modelDefinition::model($name);
    	if ( $model->isAbstract() ) return true; 
    	
    	//assert that the table exist
    	$scheme = "CREATE TABLE IF NOT EXIST `" . $name . "`";
    	if ($model->inheriteFrom()) {
    	    $scheme .= " LIKE " . $model->inheriteFrom();
    	} else {
    	    $scheme .= "( id PRIMARY KEY INT UNSIGNED AUTO_INCREMENT NOT NULL) ENGINE innoDB;";
    	};
    	
    	
    	
    	$fields = $model->getFields();
    	foreach ($fields as $field) {
    	    
    	};
    	
    }
    
    static protected function fieldToScheme(\nd\fieldDefinition $field) {
        
    }

    static public function commit() {

    }

    static public function setAutocommit($value) { $this->autocommit = $value; }
    
    /* orm statemens*/
    static public function define($name, $json) { return \nd\modelDefinition::define($name, $json); }
    static public function dispense($modelName) {}
    static public function save($objs) {}
    static public function trash($objs) {}
    static public function untrash($objs) {}
    static public function load($obj, $id) {}
    static public function raise($obj, $id) {}
    static public function find($modelName, $query, $dataArr) {}
    static public function findOne($modelName, $query, $dataArr) {}
    
    /* sql statements*/
    static public function query($queryStr, $params) {

    }	
};

?>