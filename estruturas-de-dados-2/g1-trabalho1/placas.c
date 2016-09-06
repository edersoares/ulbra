#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct placa {
    char letras[4];
    int numeros;
} Placa;

typedef struct no {
    struct placa *placa;
    struct no *esquerda;
    struct no *direita;
} No;

Placa * allocPlaca() {
    return (Placa *) malloc(sizeof(Placa));
}

No * allocNo() {
    return (No *) malloc(sizeof(No));
}

int main(int argc, char const *argv[]) {

    Placa *placa;
    No *no;

    placa = allocPlaca();
    no = allocNo();

    strcpy(placa->letras, "IUY");
    placa->numeros = 1230;

    no->placa = placa;

    printf("Placa: %s%i\n", no->placa->letras, no->placa->numeros);

    return 0;
}
