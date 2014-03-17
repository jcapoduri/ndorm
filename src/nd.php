<?php

namespace nd;

require_once "response.php";
require_once "app.php";
require_once "entity.php";
require_once "storage.php";
require_once "solution.php";
require_once "query.php";
require_once "predicative.php";
require_once "error.php";
require_once "persistence.php";


function query($entity_name) {
    return new query(solution::currentSolution());
};

?>