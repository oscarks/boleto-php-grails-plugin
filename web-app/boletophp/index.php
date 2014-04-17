<?php
$dias_de_prazo_para_pagamento=5;
$taxa_boleto = 0.0;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
$valor_cobrado=0.0;
$valor_boleto=0.0;

if ($_POST['dias_de_prazo_para_pagamento']) {
	$dias_de_prazo_para_pagamento=(int) $_POST['dias_de_prazo_para_pagamento'];
} 
if ($_POST['taxa_boleto']) {
	$taxa_boleto = (float) $_POST['taxa_boleto'];
} 
if ($_POST['data_venc']) {
	$data_venc=date("d/m/Y",$_POST['data_venc']);
}
if ($_POST['valor']) {
	$valor_cobrado = $_POST['valor']; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
	$valor_cobrado = str_replace(",", ".",$valor_cobrado);
	$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');
}
