<?php

// __DIR__ absolute path reference
require_once __DIR__."/DB.php";

class Fraction {
    public int $nenner; //dividend
    public int $zaehler; //divisor
    public function __construct($nenner,$zaehler) {
        $this->nenner = $nenner;
        $this->zaehler = $zaehler;
    }
}

$frac = new Fraction(3,4);
$frac2 = new Fraction(5,10);


try{
    $db = new DB("articles");
    echo "It worked!\n";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}

$result = $db->select(8);
var_dump($result);

// Created an array using the short array syntax:

$data = [
        [
            "title" => "Denniß' Böök of Prepärätiön",
            "authors" => "Denniß Haupt",
            "published_date" => date("Y-m-d H:i:s"),
            "topic" => "Umlaute!",
            "progress_perc" => 100,
            "spent_hours" => 2,
            "content" => "Testing the INSERT DB with prepäred statementß.",
            "tags" => NULL
        ]
    ];
die();
$db->insert($data);


?>