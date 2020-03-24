<?php

//D:\PROYECTOS\DENTRODEDRIVE\CENTOS\WEB\SERVER_WEB_CENTOS\gallery\vendor\mongodb\mongodb\.phpcs\autoload.php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/mongodb/mongodb/.phpcs/autoload.php'; // incluir lo bueno de Composer

// Manager Class
$manager  = new \MongoDB\Driver\Manager('mongodb://root:root@localhost:27017/test');
// Query Class
$query = new MongoDB\Driver\Query(array('age' => 30));

// Output of the executeQuery will be object of MongoDB\Driver\Cursor class
$cursor = $manager->executeQuery('testDb.testColl', $query);

// Convert cursor to Array and print result
echo"";
echo"";
echo"";
echo"";
print_r($cursor->toArray());
// $colección = $cliente->demo->beers;

// $resultado = $colección->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );

// echo "Inserted with Object ID '{$resultado->getInsertedId()}'";

?>