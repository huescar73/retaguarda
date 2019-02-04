<head>
<title>SINAPSE-Retaguarda</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<h2>Clientes / Histórico</h2>
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

//$sql = "SELECT * FROM tecnosat.cliente WHERE Nome LIKE '%$busca%' OR DiretorNome LIKE '%$busca%' ORDER BY Nome";
$sql = "SELECT 
        (CASE `o`.`OrcamentoModulo`
            WHEN 1 THEN 'Venda'
            WHEN 2 THEN 'Serviço'
            WHEN 3 THEN 'Locação'
        END) AS `Tipo`,
        `o`.`DataPedido` AS `DataMovimento`,
        `o`.`IdOrcamento` AS `Numero`,
        `c`.`IdCliente` AS `IdCliente`,
        `c`.`Nome` AS `Pessoa`,
        `bep`.`NumeroSerial` AS `NumeroSerial`,
        `p`.`DescricaoResumida` AS `Produto`,
        `o`.`IdOrcamento` AS `Id`
    FROM
        ((((`orcamento` `o`
        JOIN `cliente` `c` ON ((`o`.`IdCliente` = `c`.`IdCliente`)))
        JOIN `orcamento_item` `io` ON ((`o`.`IdOrcamento` = `io`.`IdOrcamento`)))
        JOIN `produto` `p` ON ((`io`.`IdProduto` = `p`.`IdProduto`)))
        JOIN `baixa_estoque_pedido` `bep` ON ((`io`.`IdOrcamentoItem` = `bep`.`IdOrcamentoItem`)))
    WHERE
        ((`bep`.`NumeroSerial` IS NOT NULL)
            AND (`bep`.`NumeroSerial` <> ''))  AND (`c`.`Nome` LIKE '%$busca%' )
	ORDER BY
		(`o`.`DataPedido`)";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table border='1'><tr bgcolor='#dddddd'>
			<th>TIPO</th>
			<th>DTA.MOVIMENTO</th>
			<th>NUM.ORÇ.</th>
			<th>IDCLIENTE</th>
			<th>PESSOA</th>
			<th>NUM.SERIAL</th>
			<th>PRODUTO</th>
			<th>ID</th>
		</tr>";
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
        echo "<tr>
			<td>".$row["Tipo"]."</td>
			<td>".$row["DataMovimento"]."</td>
			<td>".$row["Numero"]."</td>
			<td>".$row["IdCliente"]."</td>
			<td>".$row["Pessoa"]."</td>
			<td>".$row["NumeroSerial"]."</td>
			<td>".$row["Produto"]."</td>
			<td>".$row["Id"]."</td>
		</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

