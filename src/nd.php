<?php

require_once "storage.php";
require_once 'orm/modelDefinition.php';
require_once 'orm/protoObject.php';

class nd {
	protected $storages = array();
	protected $entities = array();
	protected $PDOhandler = null;

	static public function setup($json) {
		if (isset($json->objects)) {
			$objs = $json->objects;
			foreach ($objs as $name => $value) {
			 	$this->entities[$name] = new modelDefinition($value);
			};
		};
		if (isset($json->storages)) {
			$sto = $json->storages;
			foreach ($sto as $name => $value) {
			 	$this->storages[$name] = new storage($value);
			};	
		};
		return $this;
	}

	static public function init($name) {
		if (isset($this->storages[$name])) {
			$this->PDOhandler = $this->storages[$name]->connect();
		}
	}
    
    /* global operations */
    static public function nuke() {

    }
    
    static public function updateSchema() {

    }

    static public function commit() {

    }

    static public function setAutocommit($value) { $this->autocommit = $value; }
    
    /* orm statemens*/
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