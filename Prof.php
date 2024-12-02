<?php
include("connection.php");



class Prof{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $role;
    public $reg_date;
  
    public function __construct($firstname, $lastname, $email, $password,$role) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT); 
        $this->role = $role;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface EMSI Maroc</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="navbar">
        <div class="navbar-brand">
            <img src="https://portail.emsi.ac.ma/assets/app_logo.png" alt="Logo EMSI Maroc" class="logo">
        </div>
        <nav>
            <ul class="navbar-links">
                <li><a href="encadrant.php">Encadrant</a></li>
                <li><a href="#">Rapporteur</a></li>
                <li><a href="#">Examinateur</a></li>
                <li><a href="#">Président</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h1>Bienvenue au Portail EMSI</h1>
            <p>Accédez facilement à vos fonctions académiques et administratives.</p>
        </section>
    </main>
</body>
</html>
