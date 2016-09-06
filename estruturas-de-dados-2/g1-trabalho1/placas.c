#include <stdio.h>
#include <stdlib.h>

typedef struct placa {
    char letras[3];
    int numeros;
} Placa;

typedef struct no {
    struct placa placa;
    struct no *esquerda;
    struct no *direita;
} No;

int main(int argc, char const *argv[]) {

    printf("Hello!\n");

    return 0;
}
