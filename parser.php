<?php

if ($argc < 2)
    die("[ERRO] Uso: php parser.php <nome_do_arquivo_de_entrada>\n");

$arquivo = @fopen($argv[1], 'r');

if (false == $arquivo)
    die("[ERRO] Não foi possíve abrir o arquivo.\n");

$erros = [];
$tokens = [];
$simbolos = [];
$inicial = 'q0';
$finais = [
    'q2' => 'IDENTIFICADOR',
    'q3' => 'NÚMERO INTEIRO',
    'q5' => 'NÚMERO REAL',
    'q9' => 'COMENTÁRIO',
    'q12' => 'INT',
    'q17' => 'FLOAT',
    'q21' => 'REAL',
    'q27' => 'DOUBLE',
    'q31' => 'CHAR',
    'q38' => 'BOOLEAN'
];

// Percorre todas a linhas do arquivo
for ($i = 1; $linha = fgets($arquivo); $i++) {

    // A função inicial sempre é q0
    $estado = $inicial;

    // Percorre todos os caracteres da linha
    for ($j = 0; isset($linha[$j]); $j++) {

        // Caso o estado atual retorne outro estado válido continua a verificar
        if ($estado = $estado($linha[$j]))
            continue;

        // Armazena linha com erro
        $erros[] = $i;

        break;
    }

    if (!$estado)
        continue;

    switch ($estado) {

        case 'q2':
        case 'q3':
        case 'q5':
            if (in_array($linha, $simbolos)) {
                $n = array_keys($simbolos, $linha);
                $n = $n[0];
            }
            else {
                $n = count($simbolos) + 1;
                $simbolos[$n] = $linha;
            }
        break;

        default:
            $n = '';
    }

    echo "[{$i}] {$finais[$estado]} {$n}\n";
}

fclose($arquivo);

echo "Tabela de Símbolos\n";

foreach ($simbolos as $id => $valor)
    echo "{$id} - {$valor}";

if (count($erros) == 1) {
    echo "O programa possui erro na linha: {$erros[0]}\n";
}
else if (count($erros) > 1) {
    $ultimo = array_pop($erros);
    $erros = implode(', ', $erros);
    echo "O programa possui erros nas linhas: {$erros} e $ultimo\n";
}

function q0($c) {

    switch ($c) {

        case '_':
            return 'q1';

        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
            return 'q3';

        case '/':
            return 'q6';

        case 'i':
            return 'q10';

        case 'f':
            return 'q13';

        case 'r':
            return 'q18';

        case 'd':
            return 'q22';

        case 'c':
            return 'q28';

        case 'b':
            return 'q32';
    }

    return false;
}
function q1($c) {

    switch ($c) {

        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
        case 'a':
        case 'b':
        case 'c':
        case 'd':
        case 'e':
        case 'f':
        case 'g':
        case 'h':
        case 'i':
        case 'j':
        case 'k':
        case 'l':
        case 'm':
        case 'n':
        case 'o':
        case 'p':
        case 'q':
        case 'r':
        case 's':
        case 't':
        case 'u':
        case 'v':
        case 'w':
        case 'x':
        case 'y':
        case 'z':
        case 'A':
        case 'B':
        case 'C':
        case 'D':
        case 'E':
        case 'F':
        case 'G':
        case 'H':
        case 'I':
        case 'J':
        case 'K':
        case 'L':
        case 'M':
        case 'N':
        case 'O':
        case 'P':
        case 'Q':
        case 'R':
        case 'S':
        case 'T':
        case 'U':
        case 'V':
        case 'W':
        case 'X':
        case 'Y':
        case 'Z':
            return 'q2';
    }

    return false;
}
function q2($c) {

    switch ($c) {

        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
        case 'a':
        case 'b':
        case 'c':
        case 'd':
        case 'e':
        case 'f':
        case 'g':
        case 'h':
        case 'i':
        case 'j':
        case 'k':
        case 'l':
        case 'm':
        case 'n':
        case 'o':
        case 'p':
        case 'q':
        case 'r':
        case 's':
        case 't':
        case 'u':
        case 'v':
        case 'w':
        case 'x':
        case 'y':
        case 'z':
        case 'A':
        case 'B':
        case 'C':
        case 'D':
        case 'E':
        case 'F':
        case 'G':
        case 'H':
        case 'I':
        case 'J':
        case 'K':
        case 'L':
        case 'M':
        case 'N':
        case 'O':
        case 'P':
        case 'Q':
        case 'R':
        case 'S':
        case 'T':
        case 'U':
        case 'V':
        case 'W':
        case 'X':
        case 'Y':
        case 'Z':
            return 'q2';

        case "\n":
            return 'q2';
    }

    return false;
}
function q3($c) {

    switch ($c) {

        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
            return 'q3';

        case '.':
            return 'q4';

        case "\n":
            return 'q3';
    }

    return false;
}
function q4($c) {

    switch ($c) {

        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
            return 'q5';
    }

    return false;
}
function q5($c) {

    switch ($c) {

        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
            return 'q5';

        case "\n":
            return 'q5';
    }

    return false;
}
function q6($c) {

    switch ($c) {

        case '*':
            return 'q7';
    }

    return false;
}
function q7($c) {

    switch ($c) {

        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
        case 'a':
        case 'b':
        case 'c':
        case 'd':
        case 'e':
        case 'f':
        case 'g':
        case 'h':
        case 'i':
        case 'j':
        case 'k':
        case 'l':
        case 'm':
        case 'n':
        case 'o':
        case 'p':
        case 'q':
        case 'r':
        case 's':
        case 't':
        case 'u':
        case 'v':
        case 'w':
        case 'x':
        case 'y':
        case 'z':
        case 'A':
        case 'B':
        case 'C':
        case 'D':
        case 'E':
        case 'F':
        case 'G':
        case 'H':
        case 'I':
        case 'J':
        case 'K':
        case 'L':
        case 'M':
        case 'N':
        case 'O':
        case 'P':
        case 'Q':
        case 'R':
        case 'S':
        case 'T':
        case 'U':
        case 'V':
        case 'W':
        case 'X':
        case 'Y':
        case 'Z':
        case ' ':
            return 'q7';

        case '*':
            return 'q8';
    }

    return false;
}
function q8($c) {

    switch ($c) {

        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
        case 'a':
        case 'b':
        case 'c':
        case 'd':
        case 'e':
        case 'f':
        case 'g':
        case 'h':
        case 'i':
        case 'j':
        case 'k':
        case 'l':
        case 'm':
        case 'n':
        case 'o':
        case 'p':
        case 'q':
        case 'r':
        case 's':
        case 't':
        case 'u':
        case 'v':
        case 'w':
        case 'x':
        case 'y':
        case 'z':
        case 'A':
        case 'B':
        case 'C':
        case 'D':
        case 'E':
        case 'F':
        case 'G':
        case 'H':
        case 'I':
        case 'J':
        case 'K':
        case 'L':
        case 'M':
        case 'N':
        case 'O':
        case 'P':
        case 'Q':
        case 'R':
        case 'S':
        case 'T':
        case 'U':
        case 'V':
        case 'W':
        case 'X':
        case 'Y':
        case 'Z':
        case ' ':
            return 'q7';

        case '/':
            return 'q9';
    }

    return false;
}
function q9($c) {

    switch ($c) {

        case "\n":
            return 'q9';
    }

    return false;
}
function q10($c) {

    switch ($c) {

        case 'n':
            return 'q11';
    }

    return false;
}
function q11($c) {

    switch ($c) {

        case 't':
            return 'q12';
    }

    return false;
}
function q12($c) {

    switch ($c) {

        case "\n":
            return 'q12';
    }

    return false;
}
function q13($c) {

    switch ($c) {

        case 'l':
            return 'q14';
    }

    return false;
}
function q14($c) {

    switch ($c) {

        case 'o':
            return 'q15';
    }

    return false;
}
function q15($c) {

    switch ($c) {

        case 'a':
            return 'q16';
    }

    return false;
}
function q16($c) {

    switch ($c) {

        case 't':
            return 'q17';
    }

    return false;
}
function q17($c) {

    switch ($c) {

        case "\n":
            return 'q17';
    }

    return false;
}
function q18($c) {

    switch ($c) {

        case 'e':
            return 'q19';
    }

    return false;
}
function q19($c) {

    switch ($c) {

        case 'a':
            return 'q20';
    }

    return false;
}
function q20($c) {

    switch ($c) {

        case 'l':
            return 'q21';
    }

    return false;
}
function q21($c) {

    switch ($c) {

        case "\n":
            return 'q21';
    }

    return false;
}
function q22($c) {

    switch ($c) {

        case 'o':
            return 'q23';
    }

    return false;
}
function q23($c) {

    switch ($c) {

        case 'u':
            return 'q24';
    }

    return false;
}
function q24($c) {

    switch ($c) {

        case 'b':
            return 'q25';
    }

    return false;
}
function q25($c) {

    switch ($c) {

        case 'l':
            return 'q26';
    }

    return false;
}
function q26($c) {

    switch ($c) {

        case 'e':
            return 'q27';
    }

    return false;
}
function q27($c) {

    switch ($c) {

        case "\n":
            return 'q27';
    }

    return false;
}
function q28($c) {

    switch ($c) {

        case 'h':
            return 'q29';
    }

    return false;
}
function q29($c) {

    switch ($c) {

        case 'a':
            return 'q30';
    }

    return false;
}
function q30($c) {

    switch ($c) {

        case 'r':
            return 'q31';
    }

    return false;
}
function q31($c) {

    switch ($c) {

        case "\n":
            return 'q31';
    }

    return false;
}
function q32($c) {

    switch ($c) {

        case 'o':
            return 'q33';
    }

    return false;
}
function q33($c) {

    switch ($c) {

        case 'o':
            return 'q34';
    }

    return false;
}
function q34($c) {

    switch ($c) {

        case 'l':
            return 'q35';
    }

    return false;
}
function q35($c) {

    switch ($c) {

        case 'e':
            return 'q36';
    }

    return false;
}
function q36($c) {

    switch ($c) {

        case 'a':
            return 'q37';
    }

    return false;
}
function q37($c) {

    switch ($c) {

        case 'n':
            return 'q38';
    }

    return false;
}
function q38($c) {

    switch ($c) {

        case "\n":
            return 'q38';
    }

    return false;
}
