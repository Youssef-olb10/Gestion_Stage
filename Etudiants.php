<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Étudiant - EMSI Maroc</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="navbar">
        <div class="navbar-brand">
            <img src="https://portail.emsi.ac.ma/assets/app_logo.png" alt="Logo EMSI Maroc" class="logo">

        </div>
        <nav>
            <ul class="navbar-links">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Mes Informations</a></li>
                <li><a href="#">Deroulement Stages</a></li>
                <li><a href="#">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h1>Bienvenue sur votre espace étudiant</h1>
            <p>Gérez vos rapports de stage et participez à vos réunions.</p>
        </section>

        <section class="student-actions">
            <div class="action-card">
                <h2>Uploader un rapport de stage</h2>
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="rapport" accept=".pdf,.doc,.docx" required>
                    <button type="submit">Uploader</button>
                </form>
            </div>

            <div class="action-card">
                <h2>Accéder à une réunion</h2>
                <p>Rejoignez la réunion organisée par votre encadrant.</p>
                <a href="https://meet.google.com/" target="_blank" class="btn">Rejoindre la réunion</a>
            </div>
        </section>
        <div class="table-container">
 
</div>


    </main>
</body>
</html> 
