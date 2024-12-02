<?php

class Connection {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $connexion;

    public function __construct() {
        $this->connexion = mysqli_connect($this->servername, $this->username, $this->password);

        if (!$this->connexion) {
            die('ERROR: ' . mysqli_connect_error());
        }
        // echo "connected successfully";
    }

    function createDatabase($dbName) {
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
        if (mysqli_query($this->connexion, $sql)) {
            // echo "Database '$dbName' created successfully.<br>";
        } else {
            echo "Error creating database: " . mysqli_error($this->connexion) . "<br>";
        }
    }

    function selectDatabase($dbName) {
        mysqli_select_db($this->connexion, $dbName);
    }

    function createTable($query) {
        if (mysqli_query($this->connexion, $query)) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . mysqli_error($this->connexion) . "<br>";
        }
    }
    // function insertIntoEtudiants($sql) {
    //     if (mysqli_query($this->connexion, $sql)) {
    //         echo "Enregistrement ajouté avec succès dans la table Etudiants.<br>";
    //     } else {
    //         echo "Erreur lors de l'ajout de l'enregistrement : " . mysqli_error($this->connexion) . "<br>";
    //     }
    // }
    
}
