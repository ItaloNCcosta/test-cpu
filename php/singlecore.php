<?php

function execucaoSerial() {
  $numOperacoes = 10000000;
  
    $resultado = 0;
    for ($i = 0; $i < $numOperacoes; $i++) {
        $resultado += sqrt($i) * sin($i);
    }

    echo "Execução em série concluída." . PHP_EOL;
}

$inicio = microtime(true);

execucaoSerial();

$fim = microtime(true);

$tempoTotal = $fim - $inicio;
echo "Tempo total: " . number_format($tempoTotal, 2) . " segundos." . PHP_EOL;

$pontuacao = 1000000 / $tempoTotal;
echo "Pontuação: " . number_format($pontuacao, 2) . PHP_EOL;
?>
