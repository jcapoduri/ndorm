<?php

namespace nd;

abstract class facade {
    abstract public function setup($json);
    abstract public function init($name);
    
    /* global operations */
    abstract public function nuke();
    abstract public function updateSchema();
    abstract public function commit();
    public function setAutocommit($value) { $this->autocommit = $value; }
    
    /* orm statemens*/
    abstract public function dispense($modelName);
    abstract public function save($objs);
    abstract public function trash($objs);
    abstract public function untrash($objs);
    abstract public function load($obj, $id);
    abstract public function raise($obj, $id);
    abstract public function find($modelName, $query, $dataArr);
    abstract public function findOne($modelName, $query, $dataArr);
    
    /* sql statements*/
    abstract public function query($queryStr, $params);
    
    protected $autocommit = false;
}

?>