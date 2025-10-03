<?php  //pega os numeros via post
$valor_raw = $_POST['valor'] ?? '';
$moeda     = $_POST['moeda'] ?? '';


//verifica se a moeda foi prenchida || escolhida
if ($valor_raw === '' || $moeda === 'moeda') {
    echo "<h1>Erro: preencha o valor e escolha a moeda. </h1>";
    exit;
}

$valor_raw = str_replace(',', '.', $valor_raw);
//verifica se o numero esta abaixo de zero
if (!is_numeric($valor_raw) || (float)$valor_raw <= 0) {
    echo "<h1>Erro: informe um número válido maior que zero. <h1>";
    exit;
}

$valor = (float) $valor_raw;
//adiçao das taxas
$taxas = [
    'usd' => 0.20,
    'eur' => 0.18,
    'ars' => 48.50
];

$moeda = strtolower($moeda);




//calculo da conversao de valor
$resultado = $valor * $taxas[$moeda];

$valor_fmt = 'R$ ' . number_format($valor, 2, ',', '.');
//dolar
if ($moeda === 'usd') {
    $conversor = 'US$ ' . number_format($resultado, 2, ',', '.');
} elseif ($moeda === 'eur')//euro
 {
    $conversor = '€ ' . number_format($resultado, 2, ',', '.');
} else
//peso argentino
{
    $conversor = '$ ' . number_format($resultado, 2, ',', '.') . ' ARS';
}
//mostra o valor que voce inseriu para a moeda selecionada
//echo "{$valor_fmt} = {$conversor}";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><h1><?= "{$valor_fmt} = {$conversor}";      ?></h1></p>
</body>
</html>
