SELECT 
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
        ((`bep`.`NumeroSerial` IS NOT NULL)
            AND (`bep`.`NumeroSerial` <> ''))  AND (`c`.`Nome` LIKE '%branquinho%' )
	ORDER BY
		(`o`.`DataPedido`)
    