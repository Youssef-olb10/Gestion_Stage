<?php
include("connection.php");

class Encadrant {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getEtudiants() {
        $query = "SELECT id, firstname, lastname, filiere, annee, email, sujet, reg_date, lieu FROM Etudiants";
        $result = mysqli_query($this->connection->connexion, $query);
        return $result;
    }

    public function addRemark($studentId, $remark) {
        $query = "INSERT INTO Remarks (student_id, remark, created_at) VALUES ('$studentId', '$remark', NOW())";
        return mysqli_query($this->connection->connexion, $query);
    }
}

$connection = new Connection();
$connection->selectDatabase("gestion_Stage");
$encadrant = new Encadrant($connection);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['student_id'];
    $remark = $_POST['remark'];

    if (!empty($studentId) && !empty($remark)) {
        if ($encadrant->addRemark($studentId, $remark)) {
            echo "Remarque ajoutée avec succès.";
        } else {
            echo "Erreur lors de l'ajout de la remarque.";
        }
    } else {
        echo "Données invalides.";
    }
    exit;
}

$etudiants = $encadrant->getEtudiants();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encadrant - Liste des Étudiants</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .table-container {
            max-width: 1000px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f9f9f9;
            font-weight: bold;
        }
        .textarea-container {
            margin-top: 10px;
        }
        .textarea-container textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .textarea-container button {
            margin-top: 8px;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .textarea-container button:hover {
            background-color: #0056b3;
        }
    </style>
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
        <section class="student-list">
            <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nom & Prénom</th>
                            <th>Année</th>
                            <th>Titre du Sujet</th>
                            <th>Date de Dernière Modification</th>
                            <th>Lieu</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($etudiants && mysqli_num_rows($etudiants) > 0) {
                            while ($row = mysqli_fetch_assoc($etudiants)) {
                                echo "<tr>";
                                echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                                echo "<td>" . $row['filiere'] . "</td>";
                                echo "<td>" . $row['sujet'] . "</td>";
                                echo "<td>" . $row['reg_date'] . "</td>";
                                echo "<td>" . $row['lieu'] . "</td>";
                                echo "<td>
                                    <button class='modify-btn' data-id='" . $row['id'] . "'>Ajout</button>
                                    <div class='textarea-container' id='textarea-" . $row['id'] . "' style='display: none;'>
                                        <textarea placeholder='Entrez vos remarques ici...' rows='4'></textarea>
                                        <button class='save-btn' data-id='" . $row['id'] . "'>Enregistrer</button>
                                    </div>
                                  </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Aucun étudiant trouvé</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script>
        
        document.querySelectorAll('.modify-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const textareaContainer = document.getElementById(`textarea-${id}`);
                textareaContainer.style.display = (textareaContainer.style.display === 'none') ? 'block' : 'none';
            });
        });

    
        document.querySelectorAll('.save-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const textarea = document.querySelector(`#textarea-${id} textarea`);
                const remark = textarea.value;

                if (remark.trim() === '') {
                    alert('Veuillez entrer une remarque avant d’enregistrer.');
                    return;
                }

                <?php
include("connection.php");

class Encadrant {
    private $connection;
    public function __construct($connection) {
        $this->connection = $connection;
    }
    public function getEtudiants() {
        $query = "SELECT id, firstname, lastname, filiere, annee, sujet, reg_date, lieu FROM Etudiants";
        return mysqli_query($this->connection->connexion, $query);
    }
    public function addRemark($studentId, $remark) {
        $query = "INSERT INTO Remarks (student_id, remark, created_at) VALUES ('$studentId', '$remark', NOW())";
        return mysqli_query($this->connection->connexion, $query);
    }
}

$connection = new Connection();
$connection->selectDatabase("gestion_Stage");
$encadrant = new Encadrant($connection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['student_id'];
    $remark = $_POST['remark'];
    if (!empty($studentId) && !empty($remark)) {
        if ($encadrant->addRemark($studentId, $remark)) {
            echo json_encode(['success' => true, 'message' => 'Remarque ajoutée avec succès.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout de la remarque.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Les champs sont obligatoires.']);
    }
    exit;
}

$etudiants = $encadrant->getEtudiants();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encadrant - Étudiants</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .table-container { max-width: 1000px; margin: 20px auto; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f9f9f9; }
        .add-remark-btn { padding: 8px 12px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .add-remark-btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <main>
        <section class="student-list">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nom & Prénom</th>
                            <th>Année</th>
                            <th>Titre du Sujet</th>
                            <th>Date</th>
                            <th>Lieu</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($etudiants && mysqli_num_rows($etudiants) > 0) {
                            while ($row = mysqli_fetch_assoc($etudiants)) {
                                echo "<tr>";
                                echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                                echo "<td>" . $row['filiere'] . "</td>";
                                echo "<td>" . $row['sujet'] . "</td>";
                                echo "<td>" . $row['reg_date'] . "</td>";
                                echo "<td>" . $row['lieu'] . "</td>";
                                echo "<td><button class='add-remark-btn' data-id='" . $row['id'] . "'>Ajouter Remarque</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Aucun étudiant trouvé</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script>
        document.querySelectorAll('.add-remark-btn').forEach(button => {
            button.addEventListener('click', function () {
                const studentId = this.getAttribute('data-id');
                const remark = prompt('Entrez votre remarque pour cet étudiant :');
                if (remark) {
                    fetch('', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: new URLSearchParams({ student_id: studentId, remark: remark })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => alert('Erreur : ' + error.message));
                }
            });
        });
    </script>
</body>
</html>

            });
        });
    </script>
</body>
</html>
