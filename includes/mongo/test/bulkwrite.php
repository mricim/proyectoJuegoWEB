<?php

try {
     
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $bulk = new MongoDB\Driver\BulkWrite;
    
    $bulk->delete(['name' => 'Toyota']);
    $bulk->delete(['name' => 'Toyota1']);
    $bulk->delete(['name' => 'audi']);
    $doc = ['_id' => new MongoDB\BSON\ObjectID, 'name' => 'Hummer', 'price' => 300];
    $bulk->insert($doc);
    $doc = ['_id' => new MongoDB\BSON\ObjectID, 'name' => 'Toyota', 'price' => 26700];
    $bulk->insert($doc);
    $bulk->insert(['_id' => new MongoDB\BSON\ObjectID, 'name' => 'audi', 'price' => 200]);
    $bulk->insert(['_id' => new MongoDB\BSON\ObjectID, 'name' => 'Toyota1', 'price' => 26701]);
    $bulk->update(['name' => 'audi'], ['$set' => ['price' => 52000]]);
    $bulk->delete(['name' => 'Hummer']);
    
    $mng->executeBulkWrite('test.cars', $bulk);
        
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);
    
    echo "The $filename script has experienced an error.\n"; 
    echo "It failed with the following exception:\n";
    
    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";    
}

?>