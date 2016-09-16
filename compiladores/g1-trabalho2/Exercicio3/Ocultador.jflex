import java.util.*;

%%
%class Ocultador
%standalone

%{
    private String substitui(String s) {

        int tam;
        String aux = "<HIDE>";

        aux = s.substring(6, s.length() - 7);
        tam = aux.length();

        aux = "<HIDE>";

        for (int i = 0; i < tam; i++)
            aux = aux + "X";

        aux = aux + "</HIDE>";

        return aux;
    }
%}

%%

"<HIDE>".*"</HIDE>" { System.out.print(substitui(yytext())); }
. { System.out.print(yytext()); }
