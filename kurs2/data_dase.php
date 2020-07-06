<?php

$dbhost = "localhost"; 
$dbname = "kurs2"; 
$username = "root"; 
$password = ""; 

$db = new PDO ("mysql:host=$dbhost; dbname=$dbname", $username, $password);

function get_all() {
    global $db;
    $showall = $db->query("SELECT * FROM binary_data");
    return $showall;
}
function get_project($id) {
    global $db;

    $project = $db->query("SELECT * FROM portfolio WHERE id_project = '$id'");
    return $project;
}
function get_table_of_type(){
    global $db;
    $showalltype = $db->query("SELECT * FROM type_of_project");
    return $showalltype;
}
