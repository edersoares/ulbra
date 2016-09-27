#include <stdio.h>
#include <stdlib.h>
#include <math.h>

typedef struct no {
    int val;
    struct no *esq;
    struct no *dir;
} No;

No * alloc(int valor) {

    No * no = (No *) malloc(sizeof(No));

    no->esq = NULL;
    no->dir = NULL;
    no->val = valor;

    return no;
}

No * inserir(No * no, int valor) {

    if (no == NULL) {
        no = alloc(valor);
    }
    else if (valor > no->val) {

        if (no->dir == NULL) {
            no->dir = alloc(valor);
        }
        else {
            inserir(no->dir, valor);
        }
    }
    else if (valor < no->val) {

        if (no->esq == NULL) {
            no->esq = alloc(valor);
        }
        else {
            inserir(no->esq, valor);
        }
    }

    return no;
}

No * pesquisar(No * no, int valor) {

    if (no == NULL) {
        return no;
    }
    else if (no->val == valor) {
        return no;
    }
    else if (valor < no->val && no->esq) {
        return pesquisar(no->esq, valor);
    }
    else if (valor > no->val && no->dir) {
        return pesquisar(no->dir, valor);
    }
    else {
        return NULL;
    }
}

int grau(No * no, int nivel) {

    int esq = 0,
        dir = 0;

    if (no) {
        esq = grau(no->esq, nivel + 1);
        dir = grau(no->dir, nivel + 1);
        return (esq > dir) ? esq : dir;
    }

    return nivel;
}

void emOrdem(No * no) {

    if (no) {
        emOrdem(no->esq);
        printf("%d, ", no->val);
        emOrdem(no->dir);
    }
}

void preOrdem(No * no) {

    if (no) {
        printf("%d, ", no->val);
        preOrdem(no->esq);
        preOrdem(no->dir);
    }
}

void posOrdem(No * no) {

    if (no) {
        posOrdem(no->esq);
        posOrdem(no->dir);
        printf("%d, ", no->val);
    }
}

void imprimir(No * no, int g, int a) {

    int p, m, i;

    if (a == g)
        return;

    p = pow(2, g);
    m = (int) p / pow(2, a);
    m = m - 2;

    for (i = 0; i < m; i++)
        printf(" ");

    printf("%4d", no->val);

    printf("\n");

    for (i = 0; i < m; i++)
        printf(" ");

}

int main(int argc, char const *argv[]) {

    int g;
    No  * raiz,
        * aux;

    raiz = inserir(raiz, 15);
    raiz = inserir(raiz, 10);
    raiz = inserir(raiz, 20);
    raiz = inserir(raiz, 7);
    raiz = inserir(raiz, 9);
    raiz = inserir(raiz, 18);
    raiz = inserir(raiz, 25);
    raiz = inserir(raiz, 8);
    raiz = inserir(raiz, 27);
    raiz = inserir(raiz, 21);
    raiz = inserir(raiz, 19);

    g = grau(raiz, 0);

    printf("\n");
    printf("EM ORDEM\n");
    printf("========\n");
    emOrdem(raiz);

    printf("\n\n");

    printf("PRÉ-ORDEM\n");
    printf("=========\n");
    preOrdem(raiz);

    printf("\n\n");

    printf("PÓS-ORDEM\n");
    printf("=========\n");
    posOrdem(raiz);
    printf("\n\n");

    printf("GRAU\n");
    printf("%d\n\n", g);

    aux = pesquisar(raiz, 5);

    if (aux)
        printf("Achou\n");
    else
        printf("Não Achou\n");

    return 0;
}
