<?php

if ($argc < 2)
    die("[ERRO] Uso: php parser.php <nome_do_arquivo_de_entrada>\n");

$arquivo = @fopen($argv[1], 'r');

if (false == $arquivo)
    die("[ERRO] Não foi possíve abrir o arquivo.\n");

for ($i = 1; $linha = fgets($arquivo); $i++)
    for ($j = 0; isset($linha[$j]); $j++)
        echo $linha[$j];

fclose($arquivo);
