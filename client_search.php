<head>
<title>SINAPSE-Retaguarda</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<h2>Clientes</h2>
<br />


<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tecnosat";
$busca = $_POST['palavra'];// palavra que o usuario digitou

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->set_charset("utf8");

$sql = "SELECT * FROM tecnosat.cliente WHERE Nome LIKE '%$busca%' OR DiretorNome LIKE '%$busca%' ORDER BY Nome";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table border='1'><tr bgcolor='#dddddd'><th>ID</th><th>NOME</th><th>CPF/ CNPJ</th><th>DIRETOR</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["IdCliente"]."</td><td>".$row["Nome"]."</td><td align='right'>". $row["CNPJ_CPF"]."</td><td>".$row["DiretorNome"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

