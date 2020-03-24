<?php
echo "cosa";
/*
try {
     
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $filter = [ 'key' => $_POST["key_User"] ]; 
    $query = new MongoDB\Driver\Query($filter);     
    $res = $mng->executeQuery("test.usertemp", $query);
    $car = current($res->toArray());

    if (!empty($car)) {
    
        echo $car;
    } else {
    
        echo "No match found\n";
    }
        
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);
    
    echo "The $filename script has experienced an error.\n"; 
    echo "It failed with the following exception:\n";
    
    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";    
}
*/
?>