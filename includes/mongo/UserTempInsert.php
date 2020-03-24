<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/returnIp.php');

try {
     
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    
    $bulk = new MongoDB\Driver\BulkWrite;
    
    $bulk->insert(['_id' => new MongoDB\BSON\ObjectID, 'key' => $hash, 'ip' => getUserIpAddr(), 'name'=> $UserName, 'date'=>new MongoDB\BSON\UTCDateTime((new DateTime($t))->getTimestamp()*1000)]);
    
    $mng->executeBulkWrite('test.usertemp', $bulk);
        
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);
    
    echo "The $filename script has experienced an error.\n"; 
    echo "It failed with the following exception:\n";
    
    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";    
}

?>