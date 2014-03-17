<?php

namespace nd;

class solution {
    /*
    * current instance of solution
    */
    static protected $instance = null;

    /*
    * instance
    */
    static public function currentSolution() { return self::$instance; }

    /*
    * json passed in contructor
    */
    protected $raw;
    
    /*
    * Map of string -> entity
    */
    protected $entities = array();

    /*
    * Map of string -> storage
    */
    protected $storages = array();

    /*
    * Map of string -> app
    */
    protected $apps = array();

    /*
    * current app instance
    */
    protected $app = null;

    public function __construct($json_data){
        $this->raw = $json_data;
        $i = 0; $item = null; $keys = null;

        $len = count($json_data["objects"]);
        for($i = 0; $i < $len; $i++) {
            $item = $json_data["objects"][$i];
            $this->objects[$item["name"]] = new entity($item, $this);
        };

        $len = count($json_data["storages"]);
        for($i = 0; $i < $len; $i++) {
            $item = $json_data["storages"][$i];
            $this->storages[$item["name"]] = new storage($item);
        };

        $len = count($json_data["apps"]);
        for($i = 0; $i < $len; $i++) {
            $item = $json_data["apps"][$i];
            $this->apps[$item["name"]] = new app($item, $this);
        };

        self::$instance = $this;
    }

    /*
    * internal function to retrieve info from mapping
    */
    protected function getItem($kind, $name){
        switch ($kind) {
            case "entity":
                return $this->entities[$name];
                break;
            case "storage":
                return $this->storages[$name];
                break;
            case "app":
                return $this->apps[$name];
                break;
            default:
                return null;
        }
    }
    
    public function getEntity($name) { return $this->getItem("entity", $name); }
    public function getStorage($name) { return $this->getItem("storage", $name); }
    public function getApp($name) { return $this->getItem("app", $name); }
    
    /*
    * start and application (conenct to database, update, etc.)
    */
    public function startApp($appname){
        if (!isset($this->apps[$appname])) throw new error("Application dosen't exists, cannot start");
        $this->app = $this->apps[$appname];
        return $this->app->start();
    }
    
    

};

?>