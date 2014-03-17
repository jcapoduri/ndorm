NdOrm
======

Neodimium is a POC of a object-relation mapping (ORM) for PHP (and hopely other languages)
The main idea is to design your model in a base JSON file 

The directives are:
* Highly configurable
* non-intrusive with your code
* no other dependency needed
* highly extensible
* small

The global JSON file to generate the system

    // global config
	{
		"objects": { ... },
		"storages": { ... }
	}


the object Objects contains all the object you want to keep inside your system

	//objects
	"objects": {
    	"[name]:[name2]": {
    		"nd_attrs": "archivable stampable versionable", //optional, include base neodymium fields
    		"field1": ""
    	}
    }
    
nd_attrs is a especial kind of field, it have some custom behavior about how the data will be stored on managed in the database, also provide useful structure for certain task
all other names will we fields of the objects, all fields should be defined, the values could be:
* simple types:
    - string
    - integer
    - float
    - double
    - date
    - time
    - datetime
    - bool
    - blob
    - modifiers:
        - [length]
        - nullable
        - index
        - unique
* complex types:
    - set
        - modifiers:
    - list
        - modifiers:
    - tree
        - modifiers:
    - link:
        - modifiers


the object storages contains database setups to provide connection

	//storages
	{
		"name": "storage_name",
		"db_host": "",
		"db_name": "",
		"db_user": "",
		"db_pass": "",
		"db_port": 3061,
	}
