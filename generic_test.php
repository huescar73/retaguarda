<head>
<title>TECNOSAT - Retaguarda</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>


<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tecnosat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->set_charset("utf8");

$sql = "SELECT * FROM tecnosat.produto ORDER BY DescricaoResumida";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table border='1'><tr bgcolor='#dddddd'><th>ID</th><th>NOME</th><th>PREÇO</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["IdProduto"]."</td><td>".$row["DescricaoResumida"]."</td><td align='right'>". $row["ValorVenda"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

