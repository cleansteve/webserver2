<?php

$maintenance_mode = false;
$maintenance_url = "/src/maintenance.php";

// a nice enhancement would be a simple login that checks for admin + password or privileged user + password. What if the person is authorized?
$is_privileged = false;

while ($maintenance_mode && !$is_privileged) {
    header('Location: ' . $maintenance_url);
    // in the event page cannot redirect
    die('Under maintenance, please come back later');
    // Make sure that code below does not get executed when we redirect. 
    exit;
}

?>