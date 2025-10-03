<?php

$valor = $_POST['valor'] ?? '';
$moeda     = $_POST['moeda'] ?? '';

function validarEntrada($valor, $moeda) { $valor = str_replace(',', '.', $valor); if (!is_numeric($valor) || (float)$valor <= 0) { return " <h1>Erro: informe um número válido maior que zero. </h1>"; } return true; }

echo validarEntrada($valor, $moeda);

function converterDolar($valor) {
    $resultado = $valor * 0.20;
    return "Dólar: " . number_format($resultado, 2, ',', '.') . " US$"; }
  

    function converterEuro($valor) {
    $resultado = $valor * 0.18;
    return "Euro: " . number_format($resultado, 2, ',', '.') . " €";


}

function converterPeso($valor) {
    $resultado = $valor * 48.50;
    return "Peso: " . number_format($resultado, 2, ',', '.') . " ARS";
}
echo converterPeso($valor);