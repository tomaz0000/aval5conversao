<?php






function validarEntrada($valor, $moeda) {
    
    $valor = str_replace(',', '.', $valor);
    if (!is_numeric($valor) || (float)$valor <= 0) {
        return " <h1>Erro: informe um número válido maior que zero. </h1>";
    }
    return true;
}

function exibirMensagem($valor, $resultado, $simbolo) {
    echo 'R$ ' . number_format($valor, 2, ',', '.') . " = " . number_format($resultado, 2, ',', '.') . " $simbolo";
}

function converterDolar($valor) {
    $taxaUSD = 0.20;
    return ['valor' => $valor * $taxaUSD, 'simbolo' => 'US$'];
}

function converterEuro($valor) {
    $taxaEUR = 0.18;
    return ['valor' => $valor * $taxaEUR, 'simbolo' => '€'];
}

function converterPeso($valor) {
    $taxaARS = 48.50;
    return ['valor' => $valor * $taxaARS, 'simbolo' => 'ARS'];
}

$valor_raw = $_POST['valor'] ?? '';
$moeda = $_POST['moeda'] ?? '';

$validacao = validarEntrada($valor_raw, $moeda);
if ($validacao !== true) {
    echo $validacao;
    exit;
}

$valor = (float) str_replace(',', '.', $valor_raw);


//conerte o valor slecionado pelo usario e converte ou para dolar,euro,peso

$moeda = strtolower($moeda);
if ($moeda == 'usd') {
    $conv = converterDolar($valor);
} elseif
 ($moeda == 'eur') {
    $conv = converterEuro($valor);
} elseif


($moeda == 'ars') {
    $conv = converterPeso($valor);
} else

{
    echo "<h1>Erro: moeda inválida. </h1>";
    exit;

}


//strlower=transforma o valor da moeda em letras
//replace==troca a virgula por ponto
//float=converte o caracter por numero



//exibirMensagem($valor, $conv['valor'], $conv['simbolo']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance do Aluno</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>
 
<body>
    <main class="container">
        <h1>resultado da conversão</h1>
        <p><h1><?= exibirMensagem($valor, $conv['valor'], $conv['simbolo']);
?></h1> </p>
       
    </main>
</body>
 
</html> 
