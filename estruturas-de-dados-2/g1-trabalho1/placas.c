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

    Placa *placa = (Placa *) malloc(sizeof(Placa));

    if (placa)
        return placa;

    exit(1);
}

No * allocNo() {

    No *no = (No *) malloc(sizeof(No));

    if (no)
        return no;

    exit(1);
}

void menu() {

    printf("MENU\n");
    printf("----\n");
    printf("[1] Inserir Placa\n");
    printf("[2] Listar Placas em Pré-Ordem\n");
    printf("[3] Remover Placa\n");
    printf("[4] Apresentar Placas de Forma Hierárquicas\n");
    printf("[5] Sair\n");
    printf("\n");
    printf("Digite a opção: \n");
}

void menuEscolha(int i) {

    switch (i) {
        case 1:
            menu1();
        break;
        case 2:
            menu2();
        break;
        case 3:
            menu3();
        break;
        case 4:
            menu4();
        break;
        case 5:
            exit(1);
        break;
    }
}

void menu1() {
    printf("INSERIR PLACA\n");
    printf("-------------\n");
}

void menu2() {
    printf("LISTAR PLACAS EM PRÉ-ORDEM\n");
    printf("--------------------------\n");
}

void menu3() {
    printf("REMOVER PLACA\n");
    printf("-------------\n");
}

void menu4() {
    printf("APRESENTAR PLACAS DE FORMA HIERÁRQUICAS\n");
    printf("---------------------------------------\n");
}

int main(int argc, char const *argv[]) {

    Placa *placa;
    No *no;
    int opcao;

    placa = allocPlaca();
    no = allocNo();

    strcpy(placa->letras, "IUY");
    placa->numeros = 1230;

    no->placa = placa;

    printf("Placa: %s%i\n", no->placa->letras, no->placa->numeros);

    do {

        menu();
        scanf("%d", &opcao);
        menuEscolha(opcao);

    } while (opcao < 5);


    return 0;
}
