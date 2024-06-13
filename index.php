<!DOCTYPE html>
<html>
<head>
<title>Afficher une table MariaDB</title>
</head>
<body>

<h1>Mon logo</h1>
<img src="test.png" alt="Logo de mon site">

<?php
// Paramètres de connexion
$host = 'bdd-man.mysql.database.azure.com';
$username = 'mndiaye';
$password = 'Simplon2024@';
$database = 'Employés';

// Connecter à la base de données MariaDB
$db = new mysqli($host, $username, $password, $database);

// Vérifier la connexion
if ($db->connect_error) {
    die('Erreur de connexion (' . $db->connect_errno . ') ' . $db->connect_error);
}

// Sélectionner les données de la table
$query = "SELECT nom, prenom, service, fonction, login, mail FROM salaries";
$result = $db->query($query);

// Vérifier le résultat de la requête
if (!$result) {
    die('Erreur dans la requête (' . $db->errno . ') ' . $db->error);
}

// Afficher les données dans un tableau HTML
echo "<table>";
echo "<tr><th>nom</th><th>prenom</th><th>service</th><th>fonction</th><th>login</th><th>mail</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['service']) . "</td>";
    echo "<td>" . htmlspecialchars($row['fonction']) . "</td>";
    echo "<td>" . htmlspecialchars($row['login']) . "</td>";
    echo "<td>" . htmlspecialchars($row['mail']) . "</td>";
    
    echo "</tr>";
}
echo "</table>";

// Fermer la connexion à la base de données
$db->close();
?>

</body>
</html>
