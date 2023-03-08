<?php //Riku Ketomäki

require_once 'functions.php';
require_once 'headers.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
    return 0;
}

try {
    $database = openDatabase();
    $sql = "select * from item";
    $query = $database->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    header('HTTP/1.1 200 OK');
    print json_encode($results);
    
} catch (PDOException $pdoex) {
    returnErr($pdoex);
}