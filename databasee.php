<?php

include('connection.php');

$connection = new Connection();

$connection->createDatabase("gestion_Stage");

$query = "
CREATE TABLE IF NOT EXISTS Etudiants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    filiere VARCHAR(30) NOT NULL,
    annee YEAR NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(80),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

$query1 = "
CREATE TABLE IF NOT EXISTS Responsables (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(80),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

$query2 = "
CREATE TABLE IF NOT EXISTS Profs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(80),
    role ENUM('Encadrant', 'Rapporteur', 'Examinateur', 'Président') NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);";

$query3 = "
CREATE TABLE IF NOT EXISTS Remarks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student_id INT(6) UNSIGNED,
    remark TEXT NOT NULL,
    date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES Etudiants(id) ON DELETE CASCADE
);";

$connection->selectDatabase("gestion_Stage");

$connection->createTable($query);
$connection->createTable($query1);
$connection->createTable($query2);
$connection->createTable($query3); 

$password = password_hash("123456", PASSWORD_DEFAULT);
// $sql = "
// INSERT INTO Etudiants (firstname, lastname, filiere, annee, email, password) VALUES
// ('youssef', 'ouldbouya', '3IIR', '3emeannee', 'Yobouya@emsi.ma',  '$password'),
// ('Atmani', 'Hamza', '3IIR', '3emeannee', 'AtHamza@emsi.ma', '$password'),
// ('hamid', 'Alaoui', '3IIR', '3emeannee', 'AlaouiHa@emsi.ma', '$password');
// ";

// $connection->insertIntoEtudiants($sql);
?>
