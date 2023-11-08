<?php
$numProcessos = 100;

function execucaoParalela($pid) {
  
    $resultado = 0;
    for ($i = 0; $i < 1000000; $i++) {
        $resultado += sqrt($i) * sin($i);
    }

  
    echo "Processo filho com PID $pid iniciado." . PHP_EOL;
    sleep(5);
    echo "Processo filho com PID $pid concluído." . PHP_EOL;
}

$inicio = microtime(true);

for ($i = 0; $i < $numProcessos; $i++) {
    $pid = pcntl_fork();

    if ($pid == -1) {
        die("Erro ao criar processo filho.");
    } elseif ($pid == 0) {
      
        execucaoParalela(getmypid());
        exit();
    }
}

while (pcntl_waitpid(0, $status) != -1) {
    $status = pcntl_wexitstatus($status);
    echo "Processo filho com PID $status terminou." . PHP_EOL;
}

$fim = microtime(true);

$tempoTotal = $fim - $inicio;
echo "Tempo total: " . number_format($tempoTotal, 2) . " segundos." . PHP_EOL;

$pontuacao = 1000 / $tempoTotal;
echo "Pontuação: " . number_format($pontuacao, 2) . PHP_EOL;
?>
