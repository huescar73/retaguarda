<!DOCTYPE html>
<meta charset="UTF-8">

<html>
<head>
    <title>CheckList de Venda</title>

</head>
<body>
<style>
@page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
    width: 210mm;
    height: 297mm;
	max-height: 297mm;
    max-width: 210mm;
    min-height: 297mm;
    min-width: 210mm;
  }
}

body {
	background-image: url("fundo2.jpg");
	background-size: 975px 1380px;
	background-repeat: no-repeat;
    background-position: top left;
	    background-position: 0 0;
    margin: 0in;
    padding: 0in;
	}

</style>
  
<table border="0px" class="tg" style="undefined; table-layout: fixed; width: 975px">

<tr>
  <td height="29" colspan="3" align="right" class="tg2-us36" style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;"></td>
  </tr>
<tr>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right">&nbsp;</td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
</tr>
<tr>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"><b>
    <h1>CHECKLIST DE<br>
      V E N D A</h1>
  </b></td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
</tr>
<tr>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right">&nbsp;</td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
</tr>
<tr>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right">&nbsp;</td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
</tr>
<tr>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right">&nbsp;</td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
</tr>
<tr>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"><b>
    <h1>...</h1>
  </b></td>
  <td style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="tg2-us36" align="right"></td>
</tr>
<tr>
    <td colspan="3" align="right" class="tg2-us36" style="background-color:transparent; border-left: thin thin solid; border-top: thin thin solid; border-right: thin thin solid; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;"><b></b>
    </td>
  </tr>


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
                `o`.`IdOrcamento` AS `Id`,
        `io`.`Quantidade` AS `Qtd`,
        `o`.`Email` AS `Email`,
        `o`.`Telefone` AS `Tel`,
        `o`.`Celular` AS `Celular`,
        `o`.`Cidade` AS `Cidade`,
        `o`.`Estado` AS `Estado`,
        `o`.`ValorTotal` AS `ValorTotal`,
        `o`.`IdVendedor` AS `IdVendedor`
    FROM
        ((((`orcamento` `o`
        JOIN `cliente` `c` ON ((`o`.`IdCliente` = `c`.`IdCliente`)))
        JOIN `orcamento_item` `io` ON ((`o`.`IdOrcamento` = `io`.`IdOrcamento`)))
        JOIN `produto` `p` ON ((`io`.`IdProduto` = `p`.`IdProduto`)))
        JOIN `baixa_estoque_pedido` `bep` ON ((`io`.`IdOrcamentoItem` = `bep`.`IdOrcamentoItem`)))
    WHERE
        (`o`.`IdOrcamento` = '".$busca."')
	ORDER BY
		(`o`.`DataPedido`)";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
   echo "<table border='1px' class='tg' style='undefined; table-layout: fixed; width: 975px'><tr bgcolor='#dddddd'>
			<th width='36px'></th>
			<th width='36px'>QTD.</th>
			<th width='428px'>PRODUTO</th>
			<th width='128px'>MODELO</th>
			<th width='132px'>NUM.SERIAL</th>
			<th width='63px'>EMPR.</th>
			<th width='63px'>CLI.</th>
			<th width='36px'></th>
		</tr>"; 

    	// output data of each row
		
    	while($row = $result->fetch_assoc()) {
        echo "<tr>
			<td width='36px'></td>
			<td width='36px'>".$row["Qtd"]."</td>
			<td width='428px'>".$row["Produto"]."</td>
			<td width='128px'></td>
			<td width='132px'>".$row["NumeroSerial"]."</td>
			<td width='63px'></td>
			<td width='63px'></td>
			<td width='36px'></td>
		</tr>";
//			<td>".$row["Id"]."</td>
//			<td>".$row["Tipo"]."</td>
//			<td>".$row["DataMovimento"]."</td>
//			<td>".$row["Numero"]."</td>
//			<td>".$row["IdCliente"]."</td>
//			<td>".$row["Pessoa"]."</td>
			
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>


</table>



</body>
</html>

