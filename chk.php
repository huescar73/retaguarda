<!DOCTYPE html>
<meta charset="utf-8">

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

table, th, td {
  border-collapse: collapse;
}

</style>
  
<table border="0px" class="tg" style="border-collapse:collapse; undefined; table-layout: fixed; width: 975px">
<colgroup>
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
</colgroup>

<tr>
    <td style="background-color:transparent; border-left: transparent; border-top: transparent; border-right: transparent; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="td" colspan="2" align="right">
    </td>
    
	<td style="background-color:transparent; border-left: transparent; border-top: transparent; border-right: transparent; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="td" colspan="50" align="right">
	<b><h3><br/>CHECKLIST DE<br>
    VENDA<br/></h3></b>
    </td>
    <td style="background-color:transparent; border-left: transparent; border-top: transparent; border-right: transparent; font-family:Arial, sans-serif;font-weight:bold; font-size:20px;" class="td" colspan="2" align="right">
    </td>
</tr>

<tr>
    <td style="background-color:transparent; border-left: transparent; border-top: transparent; border-right: transparent; font-family:Arial, sans-serif; font-weight:bold; font-size:24px;" class="td" colspan="54" align="center"><b>I T E N S</b>
    </td>
</tr>


<?php

		$empresa = "XYZ";
		$requerente = "John Doe";
		$telefone =  "(00)000";
		$email =  "comercial@tecnosat.com.br";
		$total = 10.00;
		$idvendedor =  "";
		$vendedor =  "";
		$numorcamento =  "0010";
		

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tecnosat";
$busca = $_POST['orcamento'];// palavra que o usuario digitou
$observ = $_POST['observ'];// Observações que o usuario digitou
$numorcamento = 0;
$count = 0;

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
   echo "<table border='0px' class='tg' style='undefined; table-layout: fixed; width: 975px'><tr >
			<th style='background-color:transparent; width:36px'></th>
			<th style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; background-color:#cfcfcf; width:36px align:center'>QTD.</th>
			<th style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; background-color:#cfcfcf; width:428px'>PRODUTO</th>
			<th style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; background-color:#cfcfcf; width:128px'>MODELO</th>
			<th style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; background-color:#cfcfcf; width:132px'>NUM.SERIAL</th>
			<th style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; background-color:#cfcfcf; width:63px'>EMPR.</th>
			<th style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; background-color:#cfcfcf; width:63px'>CLI.</th>
			<th style='background-color:transparent; width:36px'></th>
		</tr>"; 

    	// output data of each row
		
		
    	while($row = $result->fetch_assoc()) {
		
		if (!empty($row["Pessoa"])){
			$empresa = $row["Pessoa"];
			$requerente = $row["Pessoa"];
			$telefone = $row["Tel"];
			$email = $row["Email"];
			$total = $row["ValorTotal"];
			$idvendedor = $row["IdVendedor"];
			$favcolor = "red";

			switch ($idvendedor) {
				case "1":
					$vendedor = "Vend_1";
					break;
				case "2":
					$vendedor = "Ricardo Huescar";
					break;
				case "3":
					$vendedor = "Vend_3";
					break;
				default:
					$vendedor = "Vendedor:_____________________________";
			}
			$numorcamento = $row["Numero"];
		}
		
        
		echo "<tr>
			<td width='36px'></td>
			<td  align='center'; style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:36px'>".$row["Qtd"]."</td>
			<td style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:428px'>".$row["Produto"]."</td>
			<td  align='center'; style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:128px'></td>
			<td  align='center'; style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:132px'>".$row["NumeroSerial"]."</td>
			<td style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:63px'></td>
			<td style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:63px'></td>
			<td style='width:36px'></td>
		</tr>";
		



		
//			<td>".$row["Id"]."</td>
//			<td>".$row["Tipo"]."</td>
//			<td>".$row["DataMovimento"]."</td>
//			<td>".$row["Numero"]."</td>
//			<td>".$row["IdCliente"]."</td>
//			<td>".$row["Pessoa"]."</td>
		$count+=1;			
    }
	
	    while($count < 24) {
        echo "<tr>
			<td width='36px'>&nbsp</td>
			<td style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:36px'></td>
			<td style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:428px'></td>
			<td style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:128px'></td>
			<td style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:132px'></td>
			<td style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:63px'></td>
			<td style='border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; width:63px'></td>
			<td width='36px'></td>
		</tr>";
		$count+=1;
	}
    echo "</table>";
} else {
    echo "0 results";
}
echo '
<table border="0px" class="tg" style="border-collapse:collapse; undefined; table-layout: fixed; width: 975px">
<colgroup>
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
</colgroup>

<!-- INICIO BLOCO OBSERVACOES -->
<tr><td colspan="53"></td></tr>
<tr >
  <td colspan="2"></td>
  <td height="60" colspan="4" align="right" valign="top" bgcolor="#CCCCCC" style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;"><strong><u>Obs.:</u></strong></td>
  <td colspan="46" align="left" valign="top" style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;">Num. Orç.: ' . $numorcamento . '</td>
  <td colspan="2"></td>
</tr>

<tr><td colspan="53"></td></tr>
<tr>
    <td colspan="2"></td>
    <td style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; background-color: #CCCCCC;" colspan="4"  align=right><b>Saída:</b></td>
    <td colspan="20" align="center" valign="middle" background-color:"#cfcfcf" style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;"><br>_____/_____/__________ --- ______:______</td>
    <td style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; background-color:#cfcfcf;" colspan="5" align=right><b>Visto:</b></td>
    <td style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;" colspan="21"></td>
    <td colspan="2"></td>
</tr>
    <tr>
    <td colspan="2"></td>
    <td style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;background-color: #CCCCCC;" colspan="4"  align=right><b>Retorno:</b></td>
    <td colspan="20" align="center" valign="middle" bgcolor="#FFFFFF" style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;"><br>_____/_____/__________ --- ______:______</td>
    <td style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;background-color:#cfcfcf;" colspan="5" align=right><b>Visto:</b></td>
    <td style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;" colspan="21"></td>
    <td colspan="2"></td>
  </tr>   
  <tr><td colspan="53"></td></tr>


<tr style="height:10px;">
    <td style="height:16px; border-style: hidden; border-right: thin solid;" colspan="2"></td>
    <td style="height:16px; border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid; background-color: #CCCCCC;" colspan="4"  align=right><b>Cliente:</b></td>
    <td colspan="20" align="left" background-color:"#cfcfcf" style="height:10px; border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;">'. $empresa .'</td>
	
<td style="height:10px; border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;background-color: #CCCCCC;" colspan="5" align=right><p><b>Vendedor:</b></p></td>
<td colspan="21" align="left" background-color:"#cfcfcf" style="height:10px; border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;">Ricardo M. Huescar</p></td>
<td style="height:16px;" colspan="2"></td>
</tr>



<tr>
    <td style="border-style: hidden;; border-right: thin solid;" colspan="2"></td>
    <td style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;background-color: #CCCCCC;" colspan="4"  align=right><b>Req.:</b></td>
    <td colspan="20" align="left" background-color:"#cfcfcf" style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;">'. $requerente .'</td>
	
<td style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;background-color: #CCCCCC;" colspan="5" align=right><p><b>Envio:</b></p></td>
<td colspan="21" align="left" background-color:"#cfcfcf" style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;">'. $envio .'</p></td>
<td colspan="2"></td></tr>
  
  

<tr>
    <td style="border-style: hidden;; border-right: thin solid;" colspan="2"></td>
    <td style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;background-color: #CCCCCC;" colspan="4"  align=right><b>Resp.:</b></td>
    <td colspan="20" align="left" background-color:"#cfcfcf" style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;">'. $requerente .'</td>
	
<td style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;background-color: #CCCCCC;" colspan="5" align=right><p><b>Valor:</b></p></td>
<td colspan="21" align="left" background-color:"#cfcfcf" style="border-style: hidden; border-left: thin solid; border-top: thin solid; border-right: thin solid; border-bottom: thin solid;">R$ 200,00(diária)</p></td>
<td colspan="2"></td></tr>



<tr>
    <td 
		style="border-style: hidden;
		border-right: thin solid;" 
		colspan="2">
		</td>
    <td style="border-style: hidden; 
		border-left: thin solid; 
		border-top: thin solid; 
		border-right: thin solid; 
		border-bottom: thin solid; 
		background-color: #CCCCCC;" 
		colspan="4"  
		align=right><b>
		Telefone:</b></td>
    <td colspan="20" 
		align="left" 
		background-color:"#cfcfcf" 
		style= "border-style: hidden; 
				border-left: thin solid; 
				border-top: thin solid; 
				border-right: thin solid; 
				border-bottom: thin solid;">'. 
		$telefone .'</td>
	
	<td style="border-style: hidden; 
		width:12;
		border-left: thin solid; 
		border-top: thin solid; 
		border-right: thin solid; 
		border-bottom: thin solid;
		background-color: #CCCCCC;" 
		colspan="5" align=right><p><b>
		Condições:</b></p></td>
		
	<td colspan="21" 
		align="left" 
		background-color:"#cfcfcf" 
		style= "border-style: hidden; 
				width:12;
				border-left: thin solid; 
				border-top: thin solid; 
				border-right: thin solid; 
				border-bottom: thin solid;"></b>'. 
		'vazio' .'</p></td>
		
	<td colspan="2"></td>
</tr>
  
  

<tr>
    <td style="border-style: hidden; 
		border-right: thin solid;" 
		colspan="2">
		</td>
    <td style= "border-style: hidden; 
				width:12;
				border-left: thin solid; 
				border-top: thin solid; 
				border-right: thin solid; 
				border-bottom: thin solid;
				background-color: #CCCCCC;" 
		colspan="4"  
		align=right><b>
		Email:</b></td>
    <td colspan="20" 
		align="left" 
		background-color:"#cfcfcf" 
		style= "border-style: hidden; 
				width:12;
				border-left: thin solid; 
				border-top: thin solid; 
				border-right: thin solid; 
				border-bottom: thin solid;">'. 
		$email .'</td>
	<td style= "border-style: hidden; 
				border-left: thin solid; 
				border-top: thin solid; 
				border-right: thin solid; 
				border-bottom: thin solid;
				background-color: #CCCCCC;" 
		colspan="5" 
		align=right><p><b>
		Frete:</b></p></td>
	<td colspan="21" 
		align="left" 
		background-color:"#cfcfcf" 
		style= "border-style: hidden; 
				border-left: thin solid; 
				border-top: thin solid; 
				border-right: thin solid; 
				border-bottom: thin solid;">'. 
	   '&nbsp [&nbsp &nbsp &nbsp] Correios <br>
		&nbsp [&nbsp &nbsp &nbsp] Transportadora <br>
	    &nbsp [&nbsp &nbsp &nbsp] Retirado ' .'</p></td>
	<td colspan="2"></td>
</tr>
</table>

<table border-style="hidden" border="0px" width="975px">
<colgroup>
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
<col style="width: 18px">
</colgroup>


<tr><td colspan="53">&nbsp;<br></td></tr>
<tr><td colspan="53">&nbsp;<br></td></tr>
<tr><td colspan="53">&nbsp;<br></td></tr>

<tr>
    
    <td colspan="2"></td>
    <td style="border-style: none; border-top: thin solid;" colspan="15" align=center>Frederico Laterza Pinheiro<br>Estoque
    </td>
    <td colspan="2">
    </td>
    <td style="border-style: none; border-top: thin solid;" colspan="15" align=center>'. 
	$vendedor .'<br>Vendedor
    </td>
     <td colspan="2">
    </td>
    <td style="border-style: none; border-top: thin solid;" colspan="15" align=center>'. 
	$requerente .'
    </td>
    <td colspan="2">
    </td>
</tr> 

<tr><td colspan="53">&nbsp;<br></td></tr>  
<tr><td colspan="53">&nbsp;<br></td></tr>
<tr><td colspan="53">&nbsp;<br></td></tr>  
<tr><td colspan="53">&nbsp;<br></td></tr>
<tr><td colspan="53">&nbsp;<br></td></tr>
<tr><td colspan="53">&nbsp;<br></td></tr>
<tr><td colspan="53">&nbsp;<br></td></tr>
<tr><td colspan="53">&nbsp;<br></td></tr>  
<tr><td colspan="53">&nbsp;<br></td></tr>
<tr><td colspan="53">&nbsp;<br></td></tr>  
<tr><td colspan="53">&nbsp;<br></td></tr>
<tr><td colspan="53">&nbsp;<br></td></tr>
<tr><td colspan="53">&nbsp;<br></td></tr>
<tr><td colspan="53">&nbsp;<br></td></tr>

</table>


</body>
</html>';
	
		
$conn->close();
?>





