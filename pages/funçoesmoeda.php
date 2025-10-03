<?php





function validarEntrada($valor, $moeda) {
    
    $valor = str_replace(',', '.', $valor);
    if (!is_numeric($valor) || (float)$valor <= 0) {
        return " <h1>Erro: informe um número válido maior que zero. </h1>";
    }
    return true;
}


function exibirMensagem($valor_brl, $resultado, $simbolo) {
    return "<h1>Resultado da conversão</h1>"
         . "<p><strong>" . number_format($valor_brl, 2, ',', '.') 
         . " BRL = " . number_format($resultado, 2, ',', '.') 
         . " $simbolo</strong></p>";
}

