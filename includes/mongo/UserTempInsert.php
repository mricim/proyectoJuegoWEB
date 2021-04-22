<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/returnIp.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"])."/vendor/autoload.php"); // MONGO 1.8
function conectar_dbX(){
	include(realpath($_SERVER["DOCUMENT_ROOT"])."/admin/configs/varsWeb.php");
	//docker - $client = new MongoDB\Client('mongodb://usrnames:T53HZNbuP6kxQOUf@mongodb:27017');
	//localhost - $client = new MongoDB\Client("mongodb://127.0.0.1:27017");
    $client = new MongoDB\Client('mongodb+srv://usrnames:T53HZNbuP6kxQOUf@cluster0.lapwp.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');
	$select_db = $client->test;

	if( !$select_db ){
        echo "ERROR";
		exit;
	}
	return $select_db;
}
$inRoom = array(
	//"_id" => $nameRoom,
    'key' => $hash,
    'ip' => getUserIpAddr(),
    'name'=> $UserName,
    'date'=>strtotime(gmdate("M d Y H:i:s"))
);

$salas_db = conectar_dbX()->rooms;
$salas_db->insertOne($inRoom);
/*
try { 
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    //$mng = new MongoDB\Driver\Manager('mongodb://usrname:password@mongodb:27017');
    //$options = ['ssl' => true];
    //$mng = new MongoDB\Driver\Manager('mongodb://usrname:password@mongodb:27017',$options);

    $bulk = new MongoDB\Driver\BulkWrite;
    
    $bulk->insert(['_id' => new MongoDB\BSON\ObjectID, 'key' => $hash, 'ip' => getUserIpAddr(), 'name'=> $UserName, 'date'=>new MongoDB\BSON\UTCDateTime((new DateTime($t))->getTimestamp()*1000)]);
    
    $mng->executeBulkWrite('test.usertemp', $bulk);
        
} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);
    
    echo "<br>The $filename script has experienced an error.\n"; 
    echo "It failed with the following exception:<br>\n";
    
    echo "Exception:", $e->getMessage(), "<br>\n";
    echo "In file:", $e->getFile(), "<br>\n";
    echo "On line:", $e->getLine(), "<br>\n";    
}
*/
?>