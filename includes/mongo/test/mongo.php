<?php

try {
    // conectar
	$conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    /*
    $stats = new MongoDB\Driver\Command(["dbstats" => 1]);
    $res = $conn->executeCommand("test", $stats);//conectar con la bd
    $cosa = current($res->toArray());
    
    print_r($cosa);
    */

    //Apartir de aqui es data
    $query = new MongoDB\Driver\Query([]); 
    $rows = $conn->executeQuery("test.cars", $query);
    
    foreach ($rows as $row) {
    
        echo "$row->name : $row->price<br>";
    }
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);
    
    echo "The $filename script has experienced an error.\n"; 
    echo "It failed with the following exception:\n";
    
    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";       
}
?>