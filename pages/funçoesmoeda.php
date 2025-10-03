<?php





function validarEntrada($valor, $moeda) {
    
    $valor = str_replace(',', '.', $valor);
    if (!is_numeric($valor) || (float)$valor <= 0) {
        return " <h1>Erro: informe um número válido maior que zero. </h1>";
    }
    return true;
}


